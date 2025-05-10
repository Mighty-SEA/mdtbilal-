<x-filament-widgets::widget>
    <x-filament::section>
        {{-- Widget content --}}
        <div class="mb-2 text-sm text-gray-500 dark:text-gray-400">
            Mulai tahun ajaran baru dengan satu klik! Semua tahun ajaran lama akan dinonaktifkan, dan kelas 1–6 otomatis dibuat untuk tahun ajaran baru.
        </div>
        <form wire:submit.prevent="simpan" class="flex items-end gap-2">
            <div class="flex-1">
                <x-filament::input
                    wire:model.defer="tahunAjaran"
                    placeholder="Contoh: 2024/2025 (Tahun ajaran baru)"
                    maxlength="20"
                    required
                    class="w-full"
                />
            </div>
            <x-filament::button
                type="submit"
                color="primary"
                onclick="return confirm('Apakah Anda yakin ingin membuat tahun ajaran baru? Semua tahun ajaran lama akan dinonaktifkan dan kelas 1-6 otomatis dibuat.')"
            >
                Tahun Ajaran Baru
            </x-filament::button>
        </form>
    </x-filament::section>
</x-filament-widgets::widget>
