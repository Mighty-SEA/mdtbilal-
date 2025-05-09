<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentClassHistoryResource\Pages;
use App\Filament\Resources\StudentClassHistoryResource\RelationManagers;
use App\Models\StudentClassHistory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentClassHistoryResource extends Resource
{
    protected static ?string $model = StudentClassHistory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('student_id')
                    ->label('Murid')
                    ->relationship('student', 'name')
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('classroom_id')
                    ->label('Kelas')
                    ->relationship('classroom', 'id', function ($query) {
                        return $query->with(['classLevel', 'academicYear']);
                    })
                    ->getOptionLabelFromRecordUsing(fn($record) => $record->classLevel->name . ' - ' . $record->academicYear->year)
                    ->searchable()
                    ->required(),
                Forms\Components\Toggle::make('is_active')
                    ->label('Kelas Aktif')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student.name')
                    ->label('Nama Murid')
                    ->searchable(),
                Tables\Columns\TextColumn::make('classroom.classLevel.name')
                    ->label('Tingkat Kelas'),
                Tables\Columns\TextColumn::make('classroom.academicYear.year')
                    ->label('Tahun Ajaran'),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Kelas Aktif')
                    ->boolean(),
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
            'index' => Pages\ListStudentClassHistories::route('/'),
            'create' => Pages\CreateStudentClassHistory::route('/create'),
            'edit' => Pages\EditStudentClassHistory::route('/{record}/edit'),
        ];
    }
}
