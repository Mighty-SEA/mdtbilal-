<?php

namespace App\Filament\Resources\SppPaymentResource\Pages;

use App\Filament\Resources\SppPaymentResource;
use App\Models\Student;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms;
use Filament\Forms\Form;

class CreateSppPayment2 extends CreateRecord
{
    protected static string $resource = SppPaymentResource::class;

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('student_id')
                ->label('Siswa')
                ->relationship('student', 'name')
                ->searchable()
                ->required()
                ->suffixAction(
                    Forms\Components\Actions\Action::make('scan')
                        ->icon('heroicon-m-qr-code')
                        ->label('Scan QR')
                        ->modalContent(view('components.qr-scanner-modal'))
                        ->action(function ($state, $set) {
                            $qrParts = explode('_', $state);
                            if (count($qrParts) === 2) {
                                $nis = $qrParts[0];
                                $qrToken = $qrParts[1];
                                $student = Student::where('nis', $nis)
                                    ->where('qr_token', $qrToken)
                                    ->first();
                                if ($student) {
                                    $set('student_id', $student->id);
                                }
                            }
                        })
                ),
            Forms\Components\Select::make('month')
                ->label('Bulan')
                ->options([
                    1 => 'Januari',
                    2 => 'Februari',
                    3 => 'Maret',
                    4 => 'April',
                    5 => 'Mei',
                    6 => 'Juni',
                    7 => 'Juli',
                    8 => 'Agustus',
                    9 => 'September',
                    10 => 'Oktober',
                    11 => 'November',
                    12 => 'Desember',
                ])
                ->required(),
            Forms\Components\TextInput::make('year')
                ->label('Tahun')
                ->numeric()
                ->default(date('Y'))
                ->required(),
            Forms\Components\DatePicker::make('paid_at')
                ->label('Tanggal Bayar')
                ->required(),
            Forms\Components\TextInput::make('amount')
                ->label('Nominal SPP')
                ->required()
                ->numeric(),
            Forms\Components\TextInput::make('infaq')
                ->label('Infaq (opsional)')
                ->numeric()
                ->default(0),
        ]);
    }

    protected function beforeCreate(): void
    {
        $studentId = $this->data['student_id'];
        if ($studentId) {
            $student = Student::find($studentId);
            if ($student && empty($student->qr_token)) {
                $student->generateQrToken();
            }
        }
    }
} 