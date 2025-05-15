<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran PPDB | MDT Bilal bin Rabbah</title>
    
    <!-- Keamanan tambahan dengan CSP yang kompatibel dengan Tailwind/Vite -->
    <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdnjs.cloudflare.com; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdnjs.cloudflare.com; font-src 'self' https://fonts.gstatic.com https://cdnjs.cloudflare.com; img-src 'self' data: https:; connect-src 'self' ws: wss:;">
    <meta http-equiv="X-XSS-Protection" content="1; mode=block">
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <meta http-equiv="Referrer-Policy" content="strict-origin-when-cross-origin">
    
    <!-- Mencegah caching halaman -->
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
        }
        .nav-scrolled {
            @apply bg-white shadow-md;
        }
        .nav-scrolled .navbar-brand h1 {
            @apply text-green-700;
        }
        .nav-scrolled .navbar-brand p {
            @apply text-green-600;
        }
        .nav-scrolled .nav-link {
            @apply text-gray-700 hover:text-green-700;
        }
        .nav-scrolled .nav-btn {
            @apply bg-green-600 text-white hover:bg-green-700;
        }
    </style>
</head>
<body class="font-sans bg-gray-50 min-h-screen flex flex-col">
    <!-- Header/Navbar -->
    <header id="navbar" class="bg-green-700 w-full z-20 transition-all duration-300 py-3 shadow-md">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <a href="/" class="navbar-brand flex items-center space-x-3">
                    <img src="{{ asset('favicon-32x32.png') }}" alt="Logo" class="h-10 w-10">
                    <div>
                        <h1 class="text-xl md:text-2xl font-bold text-white">MDT Bilal bin Rabbah</h1>
                        <p class="text-xs text-green-100">Pendidikan Islam Berkualitas</p>
                    </div>
                </a>
                
                <!-- Menu Desktop -->
                <nav class="hidden lg:flex items-center space-x-2">
                    <a href="/" class="nav-link px-4 py-2 text-white hover:text-green-200 transition font-medium">Beranda</a>
                    <a href="/#tentang" class="nav-link px-4 py-2 text-white hover:text-green-200 transition font-medium">Tentang</a>
                    <a href="/#program" class="nav-link px-4 py-2 text-white hover:text-green-200 transition font-medium">Program</a>
                    <a href="/#galeri" class="nav-link px-4 py-2 text-white hover:text-green-200 transition font-medium">Galeri</a>
                    <a href="/#kontak" class="nav-btn ml-2 px-6 py-2.5 bg-white hover:bg-green-100 text-green-700 rounded-full transition duration-300 font-medium shadow-md">Hubungi Kami</a>
                </nav>
                
                <!-- Menu Mobile Button -->
                <div class="lg:hidden relative">
                    <button id="menu-toggle" class="text-white focus:outline-none">
                        <i id="menu-icon" class="fas fa-bars text-2xl"></i>
                    </button>
                    
                    <!-- Mobile Menu Dropdown -->
                    <div id="mobile-menu" class="hidden lg:hidden bg-white shadow-xl rounded-xl mt-3 absolute right-0 top-full border border-green-100 overflow-hidden transition-all duration-300 transform -translate-y-2 opacity-0 z-20 w-64">
                        <div class="px-3 py-2">
                            <div class="flex justify-between items-center border-b border-gray-100 pb-2 mb-2">
                                <div class="flex items-center space-x-2">
                                    <img src="{{ asset('favicon-32x32.png') }}" alt="Logo" class="h-7 w-7">
                                    <span class="text-green-700 font-semibold text-sm">MDT Bilal bin Rabbah</span>
                                </div>
                                <button id="close-menu" class="text-gray-500 hover:text-green-700 focus:outline-none">
                                    <i class="fas fa-times text-xl"></i>
                                </button>
                            </div>
                            
                            <nav class="py-1">
                                <div class="flex flex-col space-y-1">
                                    <a href="/" class="mobile-nav-link px-3 py-2 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-lg transition-all flex items-center text-sm">
                                        <i class="fas fa-home w-7 text-green-600"></i>
                                        <span>Beranda</span>
                                    </a>
                                    <a href="/#tentang" class="mobile-nav-link px-3 py-2 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-lg transition-all flex items-center text-sm">
                                        <i class="fas fa-info-circle w-7 text-green-600"></i>
                                        <span>Tentang</span>
                                    </a>
                                    
                                    <a href="/#program" class="mobile-nav-link px-3 py-2 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-lg transition-all flex items-center text-sm">
                                        <i class="fas fa-book-open w-7 text-green-600"></i>
                                        <span>Program</span>
                                    </a>
                                    
                                    <a href="/#galeri" class="mobile-nav-link px-3 py-2 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-lg transition-all flex items-center text-sm">
                                        <i class="fas fa-images w-7 text-green-600"></i>
                                        <span>Galeri</span>
                                    </a>
                                    
                                    <div class="pt-2 mt-1 border-t border-gray-100">
                                        <a href="/#kontak" class="block text-center bg-green-600 hover:bg-green-700 text-white py-2 px-3 rounded-lg transition duration-300 mt-1 text-sm">
                                            <i class="fas fa-phone-alt mr-2"></i> Hubungi Kami
                                        </a>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="flex-1 flex items-center justify-center py-12 mt-8">
        <div class="bg-white rounded-xl shadow-lg p-8 w-full max-w-4xl border border-green-100">
            <h2 class="text-2xl font-bold text-green-700 mb-6 text-center">Formulir Pendaftaran PPDB</h2>
            <form action="{{ route('ppdb.store') }}" method="POST" class="grid grid-cols-1 gap-6 md:grid-cols-2 md:gap-6" autocomplete="off">
                @csrf
                <div class="col-span-1">
                    <label for="name" class="block text-gray-700 font-medium mb-1">Nama Lengkap</label>
                    <input type="text" id="name" name="name" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none" autocomplete="off" maxlength="100" pattern="[A-Za-z\s]+" title="Hanya huruf dan spasi diperbolehkan">
                </div>
                <div class="col-span-1">
                    <label for="birth_date" class="block text-gray-700 font-medium mb-1">Tanggal Lahir</label>
                    <input type="date" id="birth_date" name="birth_date" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none" autocomplete="off">
                </div>
                <div class="col-span-1">
                    <label for="birth_place" class="block text-gray-700 font-medium mb-1">Tempat Lahir</label>
                    <input type="text" id="birth_place" name="birth_place" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none" autocomplete="off" maxlength="100">
                </div>
                <div class="col-span-1">
                    <label for="nik" class="block text-gray-700 font-medium mb-1">NIK</label>
                    <input type="text" id="nik" name="nik" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none" autocomplete="off" pattern="[0-9]{16}" maxlength="16" title="NIK harus 16 digit angka" inputmode="numeric">
                </div>
                <div class="col-span-1">
                    <label for="kk" class="block text-gray-700 font-medium mb-1">Nomor KK</label>
                    <input type="text" id="kk" name="kk" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none" autocomplete="off" pattern="[0-9]{16}" maxlength="16" title="Nomor KK harus 16 digit angka" inputmode="numeric">
                </div>
                <div class="col-span-1">
                    <label for="nisn" class="block text-gray-700 font-medium mb-1">NISN (Opsional)</label>
                    <input type="text" id="nisn" name="nisn" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none" autocomplete="off" pattern="[0-9]{10}" maxlength="10" title="NISN harus 10 digit angka" inputmode="numeric">
                </div>
                <div class="col-span-1">
                    <label for="gender" class="block text-gray-700 font-medium mb-1">Jenis Kelamin</label>
                    <select id="gender" name="gender" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none" autocomplete="off">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="col-span-1">
                    <label for="origin_school" class="block text-gray-700 font-medium mb-1">Asal Sekolah</label>
                    <input type="text" id="origin_school" name="origin_school" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none" autocomplete="off" maxlength="100">
                </div>
                <div class="col-span-1">
                    <label for="father_name" class="block text-gray-700 font-medium mb-1">Nama Ayah</label>
                    <input type="text" id="father_name" name="father_name" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none" autocomplete="off" maxlength="100" pattern="[A-Za-z\s]+" title="Hanya huruf dan spasi diperbolehkan">
                </div>
                <div class="col-span-1">
                    <label for="mother_name" class="block text-gray-700 font-medium mb-1">Nama Ibu</label>
                    <input type="text" id="mother_name" name="mother_name" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none" autocomplete="off" maxlength="100" pattern="[A-Za-z\s]+" title="Hanya huruf dan spasi diperbolehkan">
                </div>
                <div class="col-span-1">
                    <label for="father_job" class="block text-gray-700 font-medium mb-1">Pekerjaan Ayah</label>
                    <input type="text" id="father_job" name="father_job" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none" autocomplete="off" maxlength="100">
                </div>
                <div class="col-span-1">
                    <label for="mother_job" class="block text-gray-700 font-medium mb-1">Pekerjaan Ibu</label>
                    <input type="text" id="mother_job" name="mother_job" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none" autocomplete="off" maxlength="100">
                </div>
                <div class="col-span-1">
                    <label for="class" class="block text-gray-700 font-medium mb-1">Kelas</label>
                    <select id="class" name="class" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none" autocomplete="off">
                        <option value="">Pilih Kelas</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>
                <div class="col-span-1">
                    <label for="whatsapp" class="block text-gray-700 font-medium mb-1">Nomor WhatsApp Orang Tua</label>
                    <input type="tel" id="whatsapp" name="whatsapp" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none" autocomplete="off" pattern="[0-9]{10,13}" maxlength="13" title="Nomor telepon harus 10-13 digit angka" inputmode="tel">
                </div>
                <div class="md:col-span-2 col-span-1">
                    <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-lg transition">Daftar Sekarang</button>
                </div>
            </form>
        </div>
    </main>
    <footer class="bg-green-800 text-white py-6 mt-8">
        <div class="container mx-auto px-4 text-center text-green-200">
            © {{ date('Y') }} MDT Bilal bin Rabbah. Hak Cipta Dilindungi.
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Menu Toggle
        const menuToggle = document.getElementById('menu-toggle');
        const closeMenu = document.getElementById('close-menu');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        
        function openMenu() {
            mobileMenu.classList.remove('hidden', '-translate-y-2', 'opacity-0');
            mobileMenu.classList.add('translate-y-0', 'opacity-100');
            document.body.classList.add('overflow-hidden');
        }
        
        function closeMenuFunc() {
            mobileMenu.classList.add('-translate-y-2', 'opacity-0');
            setTimeout(() => {
                mobileMenu.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }, 300);
        }
        
        menuToggle.addEventListener('click', function() {
            openMenu();
        });
        
        closeMenu.addEventListener('click', function() {
            closeMenuFunc();
        });
        
        // Close menu ketika klik di luar
        document.addEventListener('click', function(event) {
            if (!mobileMenu.contains(event.target) && !menuToggle.contains(event.target) && !mobileMenu.classList.contains('hidden')) {
                closeMenuFunc();
            }
        });
        
        // Klik link pada mobile menu
        document.querySelectorAll('.mobile-nav-link').forEach(link => {
            link.addEventListener('click', function() {
                closeMenuFunc();
            });
        });

        // Validasi form tambahan
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const nikInput = document.getElementById('nik');
            const kkInput = document.getElementById('kk');
            const nisnInput = document.getElementById('nisn');
            
            // Hanya izinkan input angka untuk field tertentu
            [nikInput, kkInput, nisnInput].forEach(input => {
                if (input) {
                    input.addEventListener('keypress', function(e) {
                        if (!/[0-9]/.test(e.key)) {
                            e.preventDefault();
                        }
                    });
                    
                    // Hapus karakter non-angka
                    input.addEventListener('input', function() {
                        this.value = this.value.replace(/[^0-9]/g, '');
                    });
                }
            });
            
            // Validasi form sebelum submit
            form.addEventListener('submit', function(e) {
                let isValid = true;
                
                // Validasi NIK harus 16 digit
                if (nikInput.value.length !== 16) {
                    alert('NIK harus 16 digit angka');
                    nikInput.focus();
                    isValid = false;
                }
                
                // Validasi KK harus 16 digit
                if (kkInput.value.length !== 16) {
                    alert('Nomor KK harus 16 digit angka');
                    kkInput.focus();
                    isValid = false;
                }
                
                // Validasi NISN jika diisi harus 10 digit
                if (nisnInput.value && nisnInput.value.length !== 10) {
                    alert('NISN harus 10 digit angka');
                    nisnInput.focus();
                    isValid = false;
                }
                
                if (!isValid) {
                    e.preventDefault();
                }
                
                // Mencegah double submit
                if (isValid) {
                    const submitBtn = form.querySelector('button[type="submit"]');
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Memproses...';
                }
            });
            
            // Hapus data form ketika halaman ditutup
            window.addEventListener('beforeunload', function() {
                // Hapus data sensitif dari form
                form.reset();
                
                // Hapus data dari localStorage jika ada
                localStorage.removeItem('form_data');
                sessionStorage.clear();
            });
        });
    </script>
</body>
</html> 