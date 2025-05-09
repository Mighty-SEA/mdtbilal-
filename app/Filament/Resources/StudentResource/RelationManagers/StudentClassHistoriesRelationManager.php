<?php

namespace App\Filament\Resources\StudentResource\RelationManagers;

use App\Models\Classroom;
use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StudentClassHistoriesRelationManager extends RelationManager
{
    protected static string $relationship = 'classHistories';
    protected static ?string $title = 'Riwayat Kelas';

    public function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
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

    public function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('classroom.classLevel.name')
                ->label('Tingkat Kelas'),
            Tables\Columns\TextColumn::make('classroom.academicYear.year')
                ->label('Tahun Ajaran'),
            Tables\Columns\IconColumn::make('is_active')
                ->label('Kelas Aktif')
                ->boolean(),
        ])
        ->headerActions([
            Tables\Actions\CreateAction::make(),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ]);
    }
} 