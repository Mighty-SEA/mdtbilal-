<x-filament-panels::page>
    <div class="max-w-md mx-auto fi-panel rounded-xl shadow-sm overflow-hidden md:max-w-2xl p-4 sm:p-6">
        <div class="mb-4 flex justify-center">
            <button type="button" id="scanQrButton" class="inline-flex items-center justify-center gap-1 py-2 px-4 text-sm rounded-lg bg-primary-500 text-white hover:bg-primary-600 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M2 4a2 2 0 012-2h4a1 1 0 010 2H4a1 1 0 00-1 1v4a1 1 0 01-2 0V4zm1 9a1 1 0 011-1h4a1 1 0 110 2H4a1 1 0 01-1-1zm13-6a1 1 0 011 1v4a1 1 0 11-2 0V8a1 1 0 011-1zm-1 9a1 1 0 011-1h4a1 1 0 110 2h-4a1 1 0 01-1-1zm-6-13a1 1 0 011 1v4a1 1 0 11-2 0V4a1 1 0 011-1zm-1 9a1 1 0 011-1h4a1 1 0 110 2H9a1 1 0 01-1-1z" />
                </svg>
                Scan QR Code
            </button>
        </div>
        
        <!-- Modal untuk Scan QR -->
        <div id="qrScannerModal" style="display:none" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75">
            <div class="bg-white rounded-lg p-4 max-w-lg w-full mx-4">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-bold">Scan QR Code Siswa</h2>
                    <button id="closeQrScannerBtn" class="text-gray-600 hover:text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="relative">
                    <div id="qrScanner" class="w-full h-64 bg-gray-200 rounded overflow-hidden">
                        <video id="qrVideo" class="w-full h-full object-cover"></video>
                    </div>
                    <div id="scannerLoading" class="absolute inset-0 flex flex-col items-center justify-center bg-gray-200 bg-opacity-75">
                        <svg class="animate-spin h-10 w-10 text-primary-500 mb-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span class="text-gray-700">Menginisialisasi kamera...</span>
                    </div>
                </div>
                <div class="mt-4">
                    <p id="scanResult" class="text-sm text-gray-600 mb-2">Arahkan kamera ke QR code kartu siswa</p>
                </div>
            </div>
        </div>
        
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
    
    <!-- Load HTML5-QRCode library -->
    <script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Setup QR Code Scanner
            const scanButton = document.getElementById('scanQrButton');
            const qrScannerModal = document.getElementById('qrScannerModal');
            const closeQrScannerBtn = document.getElementById('closeQrScannerBtn');
            const scannerLoading = document.getElementById('scannerLoading');
            const scanResult = document.getElementById('scanResult');
            let html5QrCode;
            
            // Tambahkan event handler untuk tombol ESC dan klik di luar modal
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && qrScannerModal.style.display === 'flex') {
                    closeScanner();
                }
            });
            
            // Klik di luar modal untuk menutup
            qrScannerModal.addEventListener('click', function(e) {
                if (e.target === qrScannerModal) {
                    closeScanner();
                }
            });
            
            scanButton.addEventListener('click', function() {
                qrScannerModal.style.display = 'flex';
                startScanner();
            });
            
            closeQrScannerBtn.addEventListener('click', function() {
                closeScanner();
            });
            
            function closeScanner() {
                qrScannerModal.style.display = 'none';
                stopScanner();
            }
            
            function startScanner() {
                scannerLoading.style.display = 'flex';
                scanResult.textContent = 'Arahkan kamera ke QR code kartu siswa';
                
                html5QrCode = new Html5Qrcode('qrScanner');
                const config = { fps: 10, qrbox: { width: 250, height: 250 } };
                
                html5QrCode.start(
                    { facingMode: "environment" }, 
                    config, 
                    onScanSuccess,
                    onScanFailure
                )
                .then(() => {
                    scannerLoading.style.display = 'none';
                })
                .catch((err) => {
                    scannerLoading.style.display = 'none';
                    scanResult.textContent = 'Error: ' + err;
                });
            }
            
            function stopScanner() {
                if (html5QrCode) {
                    try {
                        if (html5QrCode.isScanning) {
                            html5QrCode.stop()
                                .then(() => {
                                    console.log('Scanner stopped successfully');
                                    // Release camera resources
                                    html5QrCode = null;
                                })
                                .catch(err => {
                                    console.error('Error stopping scanner:', err);
                                    // Force release even if there's an error
                                    html5QrCode = null;
                                });
                        } else {
                            // If not scanning, just release the object
                            html5QrCode = null;
                        }
                    } catch (error) {
                        console.error('Error in stopScanner:', error);
                        // Ensure resources are released in case of any error
                        html5QrCode = null;
                    }
                }
            }
            
            function onScanSuccess(decodedText, decodedResult) {
                // Tampilkan hasil scan
                scanResult.textContent = 'QR Code terdeteksi, memproses...';
                
                // Panggil method Livewire untuk memproses QR code
                Livewire.dispatch('processQrCodeScan', {
                    qrContent: decodedText
                });
                
                // Tutup scanner setelah berhasil
                setTimeout(() => {
                    closeScanner();
                }, 1000);
            }
            
            function onScanFailure(error) {
                // Kita tidak perlu menampilkan error untuk setiap frame yang gagal
                // console.warn(`Scan error: ${error}`);
            }
            
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
            
            // Pastikan kamera dimatikan saat pengguna meninggalkan halaman
            window.addEventListener('beforeunload', function() {
                stopScanner();
            });
        });
    </script>
</x-filament-panels::page> 