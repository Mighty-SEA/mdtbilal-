<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SppPaymentResource\Pages;
use App\Filament\Resources\SppPaymentResource\RelationManagers;
use App\Models\SppPayment;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\DatePicker;
use Filament\Support\Helpers\js;

class SppPaymentResource extends Resource
{
    protected static ?string $model = SppPayment::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationGroup = 'Keuangan';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make()
                    ->schema([
                        Forms\Components\Section::make('Scan QR')
                            ->schema([
                                Forms\Components\TextInput::make('qr_scan')
                                    ->label('Scan QR Code')
                                    ->placeholder('Scan QR atau input manual')
                                    ->helperText('Tekan tombol scan atau masukkan kode QR secara manual')
                                    ->suffixAction(
                                        Forms\Components\Actions\Action::make('scan')
                                            ->icon('heroicon-m-qr-code')
                                            ->label('Scan')
                                            ->modalContent(view('components.qr-scanner-modal'))
                                    )
                                    ->afterStateUpdated(function ($state, $set) {
                                        if ($state) {
                                            // Pisahkan nis dan token dari hasil scan
                                            $qrParts = explode('_', $state);
                                            if (count($qrParts) === 2) {
                                                $nis = $qrParts[0];
                                                $qrToken = $qrParts[1];
                                                
                                                // Cari siswa berdasarkan nis dan qr_token
                                                $student = Student::where('nis', $nis)
                                                    ->where('qr_token', $qrToken)
                                                    ->first();
                                                
                                                if ($student) {
                                                    $set('student_id', $student->id);
                                                }
                                            }
                                        }
                                    }),
                            ])
                            ->collapsible(),
                    ]),
                
                Forms\Components\Select::make('student_id')
                    ->label('Siswa')
                    ->relationship('student', 'name')
                    ->searchable()
                    ->required(),
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
                DatePicker::make('paid_at')
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

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student.name')
                    ->label('Siswa'),
                Tables\Columns\TextColumn::make('month')
                    ->label('Bulan')
                    ->formatStateUsing(fn($state) => [1=>'Januari',2=>'Februari',3=>'Maret',4=>'April',5=>'Mei',6=>'Juni',7=>'Juli',8=>'Agustus',9=>'September',10=>'Oktober',11=>'November',12=>'Desember'][$state] ?? $state),
                Tables\Columns\TextColumn::make('year')
                    ->label('Tahun'),
                Tables\Columns\TextColumn::make('amount')
                    ->label('Nominal SPP')
                    ->numeric(),
                Tables\Columns\TextColumn::make('infaq')
                    ->label('Infaq')
                    ->numeric(),
                Tables\Columns\TextColumn::make('paid_at')
                    ->label('Tanggal Bayar')
                    ->date(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSppPayments::route('/'),
            'create' => Pages\CreateSppPayment::route('/create'),
            'view' => Pages\ViewSppPayment::route('/{record}'),
            'edit' => Pages\EditSppPayment::route('/{record}/edit'),
        ];
    }
}
