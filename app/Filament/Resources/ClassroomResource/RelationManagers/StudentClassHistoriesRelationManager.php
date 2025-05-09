<?php

namespace App\Filament\Resources\ClassroomResource\RelationManagers;

use App\Models\Student;
use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\StudentClassHistory;
use Filament\Tables\Actions\Action;

class StudentClassHistoriesRelationManager extends RelationManager
{
    protected static string $relationship = 'studentClassHistories';
    protected static ?string $title = 'Daftar Murid';

    public function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Select::make('student_id')
                ->label('Murid')
                ->relationship('student', 'name')
                ->searchable()
                ->required(),
            Forms\Components\Toggle::make('is_active')
                ->label('Kelas Aktif')
                ->default(true)
                ->required(),
        ]);
    }

    public function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('student.name')
                ->label('Nama Murid')
                ->searchable(),
            Tables\Columns\IconColumn::make('is_active')
                ->label('Kelas Aktif')
                ->boolean(),
        ])
        ->headerActions([
            Tables\Actions\CreateAction::make(),
            Action::make('bulkAssignStudents')
                ->label('Tambah Banyak Murid')
                ->form([
                    Forms\Components\Select::make('student_ids')
                        ->label('Pilih Murid')
                        ->multiple()
                        ->options(function ($livewire) {
                            return \App\Models\Student::query()
                                ->whereDoesntHave('classHistories', function($q) use ($livewire) {
                                    $q->where('classroom_id', $livewire->getOwnerRecord()->getKey());
                                })
                                ->pluck('name', 'id');
                        })
                        ->searchable()
                        ->required(),
                ])
                ->action(function (array $data, $livewire) {
                    $classroomId = $livewire->getOwnerRecord()->getKey();
                    foreach ($data['student_ids'] as $studentId) {
                        \App\Models\StudentClassHistory::create([
                            'student_id' => $studentId,
                            'classroom_id' => $classroomId,
                            'is_active' => true,
                        ]);
                    }
                })
                ->color('success')
                ->icon('heroicon-o-user-plus'),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ]);
    }
} 