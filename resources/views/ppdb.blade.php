<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran PPDB | MDT Bilal bin Rabbah</title>
    
    <!-- Keamanan tambahan dengan CSP yang kompatibel dengan Tailwind/Vite -->
    <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval'; style-src 'self' 'unsafe-inline'; font-src 'self' data:; img-src 'self' data: https:; connect-src 'self' ws: wss:;">
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
    <link rel="stylesheet" href="{{ asset('css/ppdb.css') }}">
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
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="menu-icon">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
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
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            
                            <nav class="py-1">
                                <div class="flex flex-col space-y-1">
                                    <a href="/" class="mobile-nav-link px-3 py-2 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-lg transition-all flex items-center text-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>
                                        <span>Beranda</span>
                                    </a>
                                    <a href="/#tentang" class="mobile-nav-link px-3 py-2 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-lg transition-all flex items-center text-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>Tentang</span>
                                    </a>
                                    
                                    <a href="/#program" class="mobile-nav-link px-3 py-2 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-lg transition-all flex items-center text-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg>
                                        <span>Program</span>
                                    </a>
                                    
                                    <a href="/#galeri" class="mobile-nav-link px-3 py-2 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-lg transition-all flex items-center text-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span>Galeri</span>
                                    </a>
                                    
                                    <div class="pt-2 mt-1 border-t border-gray-100">
                                        <a href="/#kontak" class="block text-center bg-green-600 hover:bg-green-700 text-white py-2 px-3 rounded-lg transition duration-300 mt-1 text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                            Hubungi Kami
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
            @if ($errors->any())
                <div class="mb-6">
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Terjadi kesalahan:</strong>
                        <ul class="mt-2 list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
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
    <script src="{{ asset('js/ppdb.js') }}"></script>
</body>
</html> 