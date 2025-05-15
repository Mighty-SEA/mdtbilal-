<x-filament-panels::page>
    <div class="max-w-md mx-auto fi-panel rounded-xl shadow-sm overflow-hidden md:max-w-2xl p-4 sm:p-6">
        <x-filament-panels::form wire:submit="submit">
            {{ $this->form }}
            
            <div class="mt-6">
                <x-filament::button type="submit" class="w-full justify-center py-3 text-lg">
                    Proses Pembayaran SPP
                </x-filament::button>
            </div>
        </x-filament-panels::form>
    </div>
    
    <style>
        /* Memperbesar form input untuk tampilan mobile */
        .fi-input-wrp input {
            font-size: 1.1rem;
            padding: 0.75rem;
            height: auto;
        }
        
        /* Memperbesar padding pada label untuk memudahkan tap */
        .fi-fo-field-wrp {
            margin-bottom: 1.25rem;
        }
        
        /* Override ukuran font untuk header */
        .fi-section-header-heading {
            font-size: 1.25rem !important;
            font-weight: 700 !important;
        }
        
        /* Responsive pada perangkat sangat kecil */
        @media (max-width: 340px) {
            .fi-input-wrp input {
                font-size: 1rem;
                padding: 0.6rem;
            }
        }
        
        /* Penambahan ruang pada mobile */
        @media (max-width: 640px) {
            .fi-section {
                margin-bottom: 1.5rem;
                padding: 1rem;
            }
        }
    </style>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Auto fokus ke input NIS saat halaman dimuat
            setTimeout(function() {
                const nisInput = document.querySelector('input[name="data[nis]"]');
                if (nisInput) {
                    nisInput.focus();
                }
            }, 500);
            
            // Tampilkan virtual keyboard untuk input angka di perangkat mobile
            const numericInputs = document.querySelectorAll('input[inputmode="decimal"], input[inputmode="numeric"]');
            numericInputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.setAttribute('pattern', '[0-9]*');
                });
            });
        });
    </script>
</x-filament-panels::page> 