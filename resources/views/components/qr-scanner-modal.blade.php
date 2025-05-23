<div
    x-data="{
        scanner: null,
        loading: true,
        result: '',
        init() {
            this.loading = true;
            this.result = '';
            const loadScript = (src) => new Promise((resolve, reject) => {
                if (window.Html5Qrcode) return resolve();
                const script = document.createElement('script');
                script.src = src;
                script.onload = resolve;
                script.onerror = reject;
                document.body.appendChild(script);
            });
            loadScript('https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js').then(() => {
                // Hapus element qrScanner jika sudah ada
                let oldScanner = document.getElementById('qrScanner');
                if (oldScanner) {
                    oldScanner.remove();
                }
                // Buat ulang element qrScanner
                let scannerContainer = document.createElement('div');
                scannerContainer.id = 'qrScanner';
                scannerContainer.className = 'w-full h-64 bg-gray-200 rounded overflow-hidden';
                this.$refs.qrScannerParent.appendChild(scannerContainer);
                // Clear scanner instance jika ada
                if (this.scanner) {
                    this.scanner.clear();
                    this.scanner = null;
                }
                this.scanner = new Html5Qrcode('qrScanner');
                this.startScanner();
            });
        },
        startScanner() {
            const config = { fps: 10, qrbox: { width: 250, height: 250 } };
            this.scanner.start(
                { facingMode: 'environment' },
                config,
                (decodedText) => {
                    this.result = 'QR Code terdeteksi, memproses...';
                    this.fillForm(decodedText);
                },
                () => {}
            ).then(() => {
                this.loading = false;
            }).catch(() => {
                // fallback ke kamera depan
                this.scanner.start(
                    { facingMode: 'user' },
                    config,
                    (decodedText) => {
                        this.result = 'QR Code terdeteksi, memproses...';
                        this.fillForm(decodedText);
                    },
                    () => {}
                ).then(() => {
                    this.loading = false;
                }).catch((err) => {
                    this.result = 'Gagal memulai kamera: ' + err;
                    this.loading = false;
                });
            });
        },
        fillForm(decodedText) {
            this.result = 'QR Code terdeteksi, memproses...';
            window.dispatchEvent(new CustomEvent('qr-scanned', { detail: { value: decodedText } }));
            setTimeout(() => this.closeModal(), 1000);
        },
        closeModal() {
            if (this.scanner) {
                this.scanner.stop().then(() => {
                    this.scanner.clear();
                    this.scanner = null;
                });
            }
        }
    }"
    x-init="init()"
    @keydown.escape.window="closeModal()"
>
    <div class="mb-4">
        <h2 class="text-lg font-bold mb-2">Scan QR Code Siswa</h2>
        <div class="relative" x-ref="qrScannerParent">
            <!-- qrScanner element akan dibuat ulang di sini -->
            <template x-if="loading">
                <div class="absolute inset-0 flex flex-col items-center justify-center bg-gray-200 bg-opacity-75">
                    <svg class="animate-spin h-10 w-10 text-primary-500 mb-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span class="text-gray-700">Menginisialisasi kamera...</span>
                </div>
            </template>
        </div>
        <div class="mt-4">
            <p class="text-sm text-gray-600 mb-2" x-text="result || 'Arahkan kamera ke QR code kartu siswa'"></p>
        </div>
    </div>
</div>

<script>
window.addEventListener('qr-scanned', async function(e) {
    let value = e.detail.value;
    let response = await fetch('/api/scan-qr-siswa?qr=' + value);
    let data = await response.json();
    if(data && data.student && data.student.id) {
        let select = document.querySelector('select[name="data.student_id"]');
        if(select) {
            select.value = data.student.id;
            select.dispatchEvent(new Event('input', { bubbles: true }));
            select.dispatchEvent(new Event('change', { bubbles: true }));
        }
        // Tutup modal Filament dengan delay dan fallback Escape
        setTimeout(function() {
            // Coba klik tombol close modal Filament
            let closeBtn = document.querySelector('.fi-modal [aria-label="Close"], .fi-modal button[aria-label="Close"], .fi-modal [data-dismiss]');
            if(closeBtn) {
                closeBtn.click();
            } else {
                // Coba klik tombol Cancel/Batal
                let cancelBtn = Array.from(document.querySelectorAll('.fi-modal button, .fi-modal a'))
                    .find(el => el.textContent.trim().toLowerCase() === 'cancel' || el.textContent.trim().toLowerCase() === 'batal');
                if(cancelBtn) {
                    cancelBtn.click();
                } else {
                    // Fallback: trigger Escape
                    window.dispatchEvent(new KeyboardEvent('keydown', {key: 'Escape'}));
                }
            }
        }, 300);
    } else {
        alert('Siswa tidak ditemukan dari QR!');
    }
});
</script> 