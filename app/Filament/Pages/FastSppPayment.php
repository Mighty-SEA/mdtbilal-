<?php

namespace App\Filament\Pages;

use App\Models\Student;
use App\Models\SppPayment;
use Carbon\Carbon;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class FastSppPayment extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-bolt';
    protected static ?string $navigationLabel = 'Fast SPP Payment';
    protected static ?string $title = 'Pembayaran SPP Cepat';
    protected static ?string $navigationGroup = 'Keuangan';
    protected static ?int $navigationSort = 2;
    protected static bool $shouldTransformLinks = false;

    protected static string $view = 'filament.pages.fast-spp-payment';

    public $data = [
        'nis' => null,
        'student_id' => null,
        'months_count' => 1,
        'amount' => 0,
        'infaq' => 0,
    ];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Hidden::make('student_id'),
                        
                        TextInput::make('nis')
                            ->label('NIS Siswa')
                            ->required()
                            ->lazy()
                            ->placeholder('Masukkan NIS siswa')
                            ->autofocus()
                            ->extraInputAttributes(['class' => 'text-lg', 'autocomplete' => 'off'])
                            ->afterStateUpdated(function ($state, $set) {
                                $student = Student::where('nis', $state)->first();
                                
                                if ($student) {
                                    $set('student_id', $student->id);
                                    
                                    // Tampilkan nama siswa
                                    Notification::make()
                                        ->title('Siswa ditemukan')
                                        ->body('Nama: ' . $student->name)
                                        ->success()
                                        ->send();
                                    
                                    // Cek pembayaran terakhir
                                    $lastPayment = SppPayment::where('student_id', $student->id)
                                        ->orderBy('year', 'desc')
                                        ->orderBy('month', 'desc')
                                        ->first();
                                        
                                    if ($lastPayment) {
                                        $bulan = [
                                            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
                                            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
                                            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
                                        ];
                                        
                                        Notification::make()
                                            ->title('Pembayaran Terakhir')
                                            ->body('Bulan: ' . $bulan[$lastPayment->month] . ' ' . $lastPayment->year)
                                            ->info()
                                            ->send();
                                    }
                                } else {
                                    $set('student_id', null);
                                    Notification::make()
                                        ->title('Siswa tidak ditemukan')
                                        ->danger()
                                        ->send();
                                }
                            }),
                        
                        Grid::make(1)
                            ->schema([
                                TextInput::make('amount')
                                    ->label('Nominal SPP per Bulan')
                                    ->placeholder('Masukkan nominal')
                                    ->prefix('Rp')
                                    ->numeric()
                                    ->extraInputAttributes(['class' => 'text-lg', 'inputmode' => 'decimal', 'autocomplete' => 'off'])
                                    ->required(),
                                    
                                TextInput::make('infaq')
                                    ->label('Infaq (opsional)')
                                    ->placeholder('Masukkan nominal infaq')
                                    ->prefix('Rp')
                                    ->extraInputAttributes(['class' => 'text-lg', 'inputmode' => 'decimal', 'autocomplete' => 'off'])
                                    ->numeric()
                                    ->default(0),
                            ]),
                            
                        TextInput::make('months_count')
                            ->label('Jumlah Bulan')
                            ->placeholder('Masukkan jumlah bulan')
                            ->extraInputAttributes(['class' => 'text-lg', 'inputmode' => 'numeric', 'autocomplete' => 'off'])
                            ->numeric()
                            ->minValue(1)
                            ->maxValue(12)
                            ->default(1)
                            ->required(),
                    ]),
            ])
            ->statePath('data');
    }

    public function submit(): void
    {
        $data = $this->form->getState();
        
        if (empty($data['student_id'])) {
            $student = Student::where('nis', $data['nis'])->first();
            
            if (!$student) {
                Notification::make()
                    ->title('Siswa tidak ditemukan')
                    ->danger()
                    ->send();
                    
                return;
            }
            
            $data['student_id'] = $student->id;
        }
        
        // Get last paid month for this student
        $lastPayment = SppPayment::where('student_id', $data['student_id'])
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->first();
            
        $nextMonth = 1;
        $nextYear = date('Y');
        
        if ($lastPayment) {
            $nextMonth = $lastPayment->month + 1;
            $nextYear = $lastPayment->year;
            
            if ($nextMonth > 12) {
                $nextMonth = 1;
                $nextYear++;
            }
        }
        
        $paymentsToCreate = [];
        $currentMonth = $nextMonth;
        $currentYear = $nextYear;
        $bulan = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];
        
        $bulanText = '';
        
        for ($i = 0; $i < $data['months_count']; $i++) {
            $paymentsToCreate[] = [
                'student_id' => $data['student_id'],
                'month' => $currentMonth,
                'year' => $currentYear,
                'paid_at' => now(),
                'amount' => $data['amount'],
                'infaq' => $data['infaq'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
            
            $bulanText .= $bulan[$currentMonth] . ' ' . $currentYear;
            
            if ($i < $data['months_count'] - 1) {
                $bulanText .= ', ';
            }
            
            $currentMonth++;
            
            if ($currentMonth > 12) {
                $currentMonth = 1;
                $currentYear++;
            }
        }
        
        DB::beginTransaction();
        
        try {
            SppPayment::insert($paymentsToCreate);
            
            DB::commit();
            
            $student = Student::find($data['student_id']);
            
            Notification::make()
                ->title('Pembayaran SPP berhasil')
                ->body('Berhasil menambahkan pembayaran untuk ' . $student->name . '<br>Bulan: ' . $bulanText)
                ->success()
                ->send();
                
            $this->form->fill([
                'nis' => '',
                'student_id' => null,
                'months_count' => 1,
                'amount' => $data['amount'],
                'infaq' => $data['infaq'],
            ]);
            
        } catch (\Exception $e) {
            DB::rollBack();
            
            Notification::make()
                ->title('Terjadi kesalahan')
                ->body($e->getMessage())
                ->danger()
                ->send();
        }
    }
} 