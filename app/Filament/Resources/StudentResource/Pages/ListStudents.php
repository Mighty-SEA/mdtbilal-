<?php

namespace App\Filament\Resources\StudentResource\Pages;

use App\Filament\Resources\StudentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;

class ListStudents extends ListRecords
{
    protected static string $resource = StudentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'Semua' => Tab::make('Semua'),
            'Kelas 1' => Tab::make('Kelas 1')
                ->modifyQueryUsing(fn($query) => $query->whereHas('currentClass.classroom.classLevel', fn($q) => $q->where('name', '1'))),
            'Kelas 2' => Tab::make('Kelas 2')
                ->modifyQueryUsing(fn($query) => $query->whereHas('currentClass.classroom.classLevel', fn($q) => $q->where('name', '2'))),
            'Kelas 3' => Tab::make('Kelas 3')
                ->modifyQueryUsing(fn($query) => $query->whereHas('currentClass.classroom.classLevel', fn($q) => $q->where('name', '3'))),
            'Kelas 4' => Tab::make('Kelas 4')
                ->modifyQueryUsing(fn($query) => $query->whereHas('currentClass.classroom.classLevel', fn($q) => $q->where('name', '4'))),
            'Kelas 5' => Tab::make('Kelas 5')
                ->modifyQueryUsing(fn($query) => $query->whereHas('currentClass.classroom.classLevel', fn($q) => $q->where('name', '5'))),
            'Kelas 6' => Tab::make('Kelas 6')
                ->modifyQueryUsing(fn($query) => $query->whereHas('currentClass.classroom.classLevel', fn($q) => $q->where('name', '6'))),
            'Alumni' => Tab::make('Alumni')
                ->modifyQueryUsing(fn($query) => $query->where('is_alumni', true)),
        ];
    }
}
