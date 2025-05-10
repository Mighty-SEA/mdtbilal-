<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Livewire\Attributes\Validate;
use App\Models\AcademicYear;
use App\Models\ClassLevel;
use App\Models\Classroom;
use Filament\Notifications\Notification;

class TahunAjaranBaru extends Widget
{
    protected static string $view = 'filament.widgets.tahun-ajaran-baru';

    #[Validate('required|string|max:20')]
    public $tahunAjaran;

    public function simpan()
    {
        // Tampilkan notifikasi konfirmasi sebelum lanjut
        $this->dispatch('open-confirmation-modal');
    }

    public function prosesSimpan()
    {
        $this->validate();
        // Nonaktifkan semua tahun ajaran
        AcademicYear::query()->update(['is_active' => false]);
        // Buat tahun ajaran baru
        $tahunBaru = AcademicYear::create([
            'year' => $this->tahunAjaran,
            'is_active' => true,
        ]);
        // Buat classroom kelas 1-6
        $levels = ClassLevel::all();
        foreach ($levels as $level) {
            Classroom::create([
                'class_level_id' => $level->id,
                'academic_year_id' => $tahunBaru->id,
                'teacher_id' => null,
            ]);
        }
        Notification::make()
            ->title('Tahun ajaran baru berhasil dibuat!')
            ->success()
            ->send();
        $this->reset('tahunAjaran');
    }
}
