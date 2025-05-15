<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PpdbResource\Pages;
use App\Filament\Resources\PpdbResource\RelationManagers;
use App\Models\Ppdb;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PpdbResource extends Resource
{
    protected static ?string $model = Ppdb::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Lengkap')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('registration_number')
                    ->label('Nomor Pendaftar')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('birth_date')
                    ->label('Tanggal Lahir'),
                Forms\Components\TextInput::make('birth_place')
                    ->label('Tempat Lahir')
                    ->maxLength(64),
                Forms\Components\Select::make('gender')
                    ->label('Jenis Kelamin')
                    ->options([
                        'Laki-laki' => 'Laki-laki',
                        'Perempuan' => 'Perempuan',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('nik')
                    ->label('NIK')
                    ->maxLength(32),
                Forms\Components\TextInput::make('kk')
                    ->label('No. KK')
                    ->maxLength(32),
                Forms\Components\TextInput::make('nisn')
                    ->label('NISN')
                    ->maxLength(32),
                Forms\Components\TextInput::make('father_name')
                    ->label('Nama Ayah')
                    ->maxLength(255),
                Forms\Components\TextInput::make('mother_name')
                    ->label('Nama Ibu')
                    ->maxLength(255),
                Forms\Components\TextInput::make('father_job')
                    ->label('Pekerjaan Ayah')
                    ->maxLength(255),
                Forms\Components\TextInput::make('mother_job')
                    ->label('Pekerjaan Ibu')
                    ->maxLength(255),
                Forms\Components\TextInput::make('origin_school')
                    ->label('Asal Sekolah')
                    ->maxLength(255),
                Forms\Components\Select::make('class')
                    ->label('Kelas')
                    ->options([
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4',
                        '5' => '5',
                        '6' => '6',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('whatsapp')
                    ->label('Nomor WhatsApp Orang Tua')
                    ->maxLength(20),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Lengkap')
                    ->searchable(),
                Tables\Columns\TextColumn::make('registration_number')
                    ->label('Nomor Pendaftar')
                    ->searchable(),
                Tables\Columns\TextColumn::make('birth_date')
                    ->label('Tanggal Lahir')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('birth_place')
                    ->label('Tempat Lahir'),
                Tables\Columns\TextColumn::make('gender')
                    ->label('Jenis Kelamin')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nik')
                    ->label('NIK'),
                Tables\Columns\TextColumn::make('kk')
                    ->label('No. KK'),
                Tables\Columns\TextColumn::make('nisn')
                    ->label('NISN'),
                Tables\Columns\TextColumn::make('father_name')
                    ->label('Nama Ayah'),
                Tables\Columns\TextColumn::make('mother_name')
                    ->label('Nama Ibu'),
                Tables\Columns\TextColumn::make('father_job')
                    ->label('Pekerjaan Ayah'),
                Tables\Columns\TextColumn::make('mother_job')
                    ->label('Pekerjaan Ibu'),
                Tables\Columns\TextColumn::make('origin_school')
                    ->label('Asal Sekolah'),
                Tables\Columns\TextColumn::make('class')
                    ->label('Kelas'),
                Tables\Columns\TextColumn::make('whatsapp')
                    ->label('No. WhatsApp'),
                Tables\Columns\TextColumn::make('created_at')
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
            'index' => Pages\ListPpdbs::route('/'),
            'create' => Pages\CreatePpdb::route('/create'),
            'view' => Pages\ViewPpdb::route('/{record}'),
            'edit' => Pages\EditPpdb::route('/{record}/edit'),
        ];
    }
}
