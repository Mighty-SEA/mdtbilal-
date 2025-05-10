<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\StudentResource\RelationManagers\StudentClassHistoriesRelationManager;
use App\Models\ClassLevel;
use App\Models\Classroom;
use App\Models\StudentClassHistory;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Master Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Lengkap')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nis')
                    ->label('NIS')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('birth_date')
                    ->label('Tanggal Lahir'),
                Forms\Components\Select::make('gender')
                    ->label('Jenis Kelamin')
                    ->options([
                        'Laki-laki' => 'Laki-laki',
                        'Perempuan' => 'Perempuan',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Lengkap')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nis')
                    ->label('NIS')
                    ->searchable(),
                Tables\Columns\TextColumn::make('birth_date')
                    ->label('Tanggal Lahir')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gender')
                    ->label('Jenis Kelamin')
                    ->searchable(),
                Tables\Columns\TextColumn::make('currentClass.classroom.classLevel.name')
                    ->label('Kelas Sekarang')
                    ->sortable(),
                Tables\Columns\TextColumn::make('currentClass.classroom.academicYear.year')
                    ->label('Tahun Ajaran')
                    ->sortable(),
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
                    Tables\Actions\BulkAction::make('promote')
                        ->label('Promosi/Naik Kelas')
                        ->form([
                            Forms\Components\Select::make('academic_year_id')
                                ->label('Tahun Ajaran Baru')
                                ->required()
                                ->relationship('classHistories.classroom.academicYear', 'year'),
                        ])
                        ->action(function ($records, array $data) {
                            foreach ($records as $student) {
                                $currentHistory = $student->currentClass;
                                if (!$currentHistory) continue;
                                $currentClassroom = $currentHistory->classroom;
                                $currentLevel = $currentClassroom->classLevel;
                                // Cek apakah kelas 6 (asumsi nama = '6')
                                if ($currentLevel->name == '6') {
                                    // Nonaktifkan semua riwayat
                                    foreach ($student->classHistories as $history) {
                                        $history->is_active = false;
                                        $history->save();
                                    }
                                    $student->is_alumni = true;
                                    $student->save();
                                } else {
                                    // Nonaktifkan riwayat aktif
                                    $currentHistory->is_active = false;
                                    $currentHistory->save();
                                    // Cari class level berikutnya
                                    $nextLevel = ClassLevel::where('name', (string)(((int)$currentLevel->name) + 1))->first();
                                    if (!$nextLevel) continue;
                                    // Cari kelas di tahun ajaran baru
                                    $nextClassroom = Classroom::where('class_level_id', $nextLevel->id)
                                        ->where('academic_year_id', $data['academic_year_id'])
                                        ->first();
                                    if (!$nextClassroom) continue;
                                    // Buat riwayat baru
                                    StudentClassHistory::create([
                                        'student_id' => $student->id,
                                        'classroom_id' => $nextClassroom->id,
                                        'is_active' => true,
                                    ]);
                                }
                            }
                        }),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            StudentClassHistoriesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
