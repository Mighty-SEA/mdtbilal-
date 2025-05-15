<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MDT Bilal bin Rabbah</title>
    
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            /* Gunakan font bawaan Tailwind */
        }
        .font-arabic {
            /* Gunakan font-serif Tailwind untuk Arab */
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
        .swiper-pagination-bullet {
            @apply w-3 h-3 bg-white bg-opacity-70;
        }
        .swiper-pagination-bullet-active {
            @apply bg-green-500;
        }
        .navbar-transparent {
            background: transparent !important;
            box-shadow: none !important;
        }
        /* Batik hijau background untuk section konten */
        .bg-batik-hijau {
            position: relative;
            z-index: 0;
            background-image: url('https://w1.pngwing.com/pngs/854/376/png-transparent-floral-flower-drawing-creative-work-motif-textile-texture-green-leaf.png');
            background-repeat: repeat;
            background-size: 400px 400px;
            background-position: center;
        }
        .bg-batik-hijau::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(255,255,255,0.85);
            z-index: 1;
            pointer-events: none;
        }
        .bg-batik-hijau > * {
            position: relative;
            z-index: 2;
        }
        .bg-white.bg-batik-hijau, .bg-gray-50.bg-batik-hijau {
            background-color: rgba(255,255,255,0.92);
        }
    </style>
</head>
<body class="font-sans bg-gray-50">
    <!-- Header/Navbar -->
    <header id="navbar" class="absolute top-0 w-full z-20 transition-all duration-300 py-3 navbar-transparent bg-transparent">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <a href="#" class="navbar-brand flex items-center space-x-3">
                    <img src="{{ asset('favicon-32x32.png') }}" alt="Logo" class="h-10 w-10">
                    <div>
                        <h1 class="text-xl md:text-2xl font-bold text-white">MDT Bilal bin Rabbah</h1>
                        <p class="text-xs text-green-100">Pendidikan Islam Berkualitas</p>
                    </div>
                </a>
                
                <!-- Menu Desktop -->
                <nav class="hidden lg:flex items-center space-x-2">
                    <a href="#beranda" class="nav-link px-4 py-2 text-white hover:text-green-200 transition font-medium">Beranda</a>
                    <a href="#tentang" class="nav-link px-4 py-2 text-white hover:text-green-200 transition font-medium">Tentang</a>
                    <a href="#galeri" class="nav-link px-4 py-2 text-white hover:text-green-200 transition font-medium">Galeri</a>
                    <a href="#kontak" class="nav-link px-4 py-2 text-white hover:text-green-200 transition font-medium">Kontak</a>
                    <a href="{{ route('ppdb') }}" class="nav-btn ml-2 px-6 py-2.5 bg-white hover:bg-green-100 text-green-700 rounded-full transition duration-300 font-medium shadow-md">Daftar Sekarang</a>
                </nav>
                
                <!-- Menu Mobile Button -->
                <div class="lg:hidden">
                    <button id="menu-toggle" class="text-white focus:outline-none">
                        <!-- Heroicon: Bars-3 -->
                        <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Menu Dropdown -->
        <div id="mobile-menu" class="hidden lg:hidden bg-white shadow-xl rounded-xl mt-3 absolute right-0 top-full mr-4 border border-green-100 overflow-hidden transition-all duration-300 transform -translate-y-2 opacity-0 z-20 w-64">
            <div class="px-3 py-2">
                <div class="flex justify-between items-center border-b border-gray-100 pb-2 mb-2">
                    <div class="flex items-center space-x-2">
                        <img src="{{ asset('favicon-32x32.png') }}" alt="Logo" class="h-7 w-7">
                        <span class="text-green-700 font-semibold text-sm">MDT Bilal bin Rabbah</span>
                    </div>
                    <button id="close-menu" class="text-gray-500 hover:text-green-700 focus:outline-none">
                        <!-- Heroicon: X-Mark -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                
                <nav class="py-1">
                    <div class="flex flex-col space-y-1">
                        <a href="#beranda" class="mobile-nav-link px-3 py-2 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-lg transition-all flex items-center text-sm">
                            <!-- Heroicon: Home -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-green-600"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125h3.375v-4.125c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21h3.375c.621 0 1.125-.504 1.125-1.125V9.75" /></svg>
                            <span>Beranda</span>
                        </a>
                        <a href="#tentang" class="mobile-nav-link px-3 py-2 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-lg transition-all flex items-center text-sm">
                            <!-- Heroicon: Information Circle -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-green-600"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25v3.75m0-7.5h.008v.008H11.25V7.5zm.75 10.5a8.25 8.25 0 100-16.5 8.25 8.25 0 000 16.5z" /></svg>
                            <span>Tentang</span>
                        </a>
                        
                        <a href="#galeri" class="mobile-nav-link px-3 py-2 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-lg transition-all flex items-center text-sm">
                            <!-- Heroicon: Photo -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-green-600"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5V7.125C3 6.504 3.504 6 4.125 6h15.75c.621 0 1.125.504 1.125 1.125v9.375M3 16.5l4.72-4.72a1.125 1.125 0 011.59 0l2.47 2.47a1.125 1.125 0 001.59 0l4.72-4.72M3 16.5V19.5c0 .621.504 1.125 1.125 1.125h15.75c.621 0 1.125-.504 1.125-1.125V16.5M3 16.5l4.72-4.72a1.125 1.125 0 011.59 0l2.47 2.47a1.125 1.125 0 001.59 0l4.72-4.72" /></svg>
                            <span>Galeri</span>
                        </a>
                        
                        <a href="#kontak" class="mobile-nav-link px-3 py-2 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-lg transition-all flex items-center text-sm">
                            <!-- Heroicon: Phone -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-green-600"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75A2.25 2.25 0 014.5 4.5h2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-.75.75H5.25v1.5A9.75 9.75 0 0015 19.5h1.5v-1.5a.75.75 0 01.75-.75h2.25a.75.75 0 01.75.75v2.25a2.25 2.25 0 01-2.25 2.25h-2.25C7.798 22.5 1.5 16.202 1.5 8.25V6.75z" /></svg>
                            <span>Kontak</span>
                        </a>
                        
                        <div class="pt-2 mt-1 border-t border-gray-100">
                            <a href="{{ route('ppdb') }}" class="block text-center bg-green-600 hover:bg-green-700 text-white py-2 px-3 rounded-lg transition duration-300 mt-1 text-sm">
                                <!-- Heroicon: User Plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline w-5 h-5 mr-2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 19.5v-1.125A2.625 2.625 0 017.125 15.75h9.75A2.625 2.625 0 0119.5 18.375V19.5M19.5 8.25h2.25m-1.125-1.125v2.25" /></svg>
                                Daftar Sekarang
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <!-- Navbar Placeholder untuk sticky navbar -->
    <div id="navbar-placeholder" class="h-0 w-full"></div>

    <!-- Hero Section -->
    <section id="beranda" class="pt-0 m-0 relative">
        <div class="swiper heroSwiper h-screen">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide relative h-screen">
                    <img src="{{ asset('assets/hero 1.jpg') }}" 
                        alt="Madrasah" class="w-full h-full object-cover brightness-50">
                    <div class="absolute inset-0 flex flex-col justify-center items-center text-white p-4 text-center">
                        <h2 class="text-4xl md:text-6xl font-bold mb-4">Madrasah Diniyah Takmiliyah<br>Bilal bin Rabbah</h2>
                        <p class="text-xl md:text-2xl max-w-3xl mb-8">Membentuk Generasi Berakhlak Mulia, Hafal Al-Qur'an, dan Siap Menghadapi Tantangan Zaman</p>
                        <a href="#kontak" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-full transition duration-300 text-lg">Daftar Sekarang</a>
                    </div>
                </div>
                
                <!-- Slide 2 -->
                <div class="swiper-slide relative h-screen">
                    <img src="{{ asset('assets/hero 2.jpg') }}" 
                        alt="Kegiatan Belajar" class="w-full h-full object-cover brightness-50">
                    <div class="absolute inset-0 flex flex-col justify-center items-center text-white p-4 text-center">
                        <h2 class="text-4xl md:text-6xl font-bold mb-4">Pendidikan Islam yang Komprehensif</h2>
                        <p class="text-xl md:text-2xl max-w-3xl mb-8">Kurikulum yang Menggabungkan Ilmu Agama, Al-Qur'an, dan Keterampilan Hidup</p>
                        <a href="#tentang" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-full transition duration-300 text-lg">Lihat Tentang Kami</a>
                    </div>
                </div>
                
                <!-- Slide 3 -->
                <div class="swiper-slide relative h-screen">
                    <img src="{{ asset('assets/hero 3.jpg') }}" 
                        alt="Kegiatan Madrasah" class="w-full h-full object-cover brightness-50">
                    <div class="absolute inset-0 flex flex-col justify-center items-center text-white p-4 text-center">
                        <h2 class="text-4xl md:text-6xl font-bold mb-4">Lingkungan Belajar yang Islami</h2>
                        <p class="text-xl md:text-2xl max-w-3xl mb-8">Membangun Karakter Siswa dalam Suasana Pembelajaran yang Menyenangkan</p>
                        <a href="#galeri" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-full transition duration-300 text-lg">Jelajahi Galeri</a>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- Tentang Kami -->
    <section id="tentang" class="py-16 bg-white bg-batik-hijau">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-green-700 mb-2">Tentang MDT Bilal bin Rabbah</h2>
                <div class="w-20 h-1 bg-green-600 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">Madrasah Diniyah Takmiliyah Bilal bin Rabbah didirikan dengan visi menciptakan generasi Qur'ani yang berakhlak mulia, cerdas, dan berwawasan luas.</p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-10 items-center">
                <div>
                    <img src="https://images.unsplash.com/photo-1546410531-bb4caa6b424d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" 
                        alt="Madrasah Kami" class="rounded-lg shadow-lg w-full h-[400px] object-cover">
                </div>
                <div>
                    <h3 class="text-2xl font-semibold text-green-700 mb-4">Sejarah Kami</h3>
                    <p class="text-gray-700 mb-6">MDT Bilal bin Rabbah berdiri sejak tahun 2010 dengan komitmen untuk memberikan pendidikan agama Islam yang berkualitas. Dimulai dengan fasilitas sederhana dan 20 santri, kini kami telah berkembang menjadi lembaga pendidikan Islam terpercaya dengan ratusan alumni yang tersebar di berbagai bidang.</p>
                    
                    <div class="grid grid-cols-2 gap-6 mb-6">
                        <div class="bg-green-50 p-4 rounded-lg">
                            <div class="text-3xl font-bold text-green-600 mb-1"><span class="counter" data-target="100">0</span>+</div>
                            <div class="text-sm text-gray-600">Santri Aktif</div>
                        </div>
                        <div class="bg-green-50 p-4 rounded-lg">
                            <div class="text-3xl font-bold text-green-600 mb-1"><span class="counter" data-target="500">0</span>+</div>
                            <div class="text-sm text-gray-600">Alumni</div>
                        </div>
                        <div class="bg-green-50 p-4 rounded-lg">
                            <div class="text-3xl font-bold text-green-600 mb-1"><span class="counter" data-target="2010">0</span></div>
                            <div class="text-sm text-gray-600">Tahun Berdiri</div>
                        </div>
                        <div class="bg-green-50 p-4 rounded-lg">
                            <div class="text-3xl font-bold text-green-600 mb-1"><span class="counter" data-target="15">0</span>+</div>
                            <div class="text-sm text-gray-600">Pengajar</div>
                        </div>
                    </div>
                    
                    <a href="#galeri" class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-full transition duration-300">Lihat Galeri Kami</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Galeri Foto -->
    <section id="galeri" class="py-16 bg-white bg-batik-hijau">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-green-700 mb-2">Galeri Foto</h2>
                <div class="w-20 h-1 bg-green-600 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">Lihat beberapa momen kegiatan dan suasana belajar di MDT Bilal bin Rabbah.</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <!-- Foto 1 dari Google Photos -->
                <div class="overflow-hidden rounded-lg shadow-md">
                    <img src="https://lh3.googleusercontent.com/pw/AP1GczO4TkRd3EhRXhLr3w2vF2_bFHs-kEQo_MlO7wXToMtbcjeFmqoYRbPDcj61ggFeNaF07qgU_ce6gVajNKeeeJil_T6JdWuvsGj34_1PQDAe3-nnLpxS=w2400   " 
                        alt="Kegiatan MDT 1" class="w-full h-64 object-cover transition-transform duration-500 hover:scale-110">
                </div>
                
                <!-- Foto 2 dari Google Photos -->
                <div class="overflow-hidden rounded-lg shadow-md">
                    <img src="https://lh3.googleusercontent.com/pw/AP1GczNqyR4A7rGH1QABYn2HlaHq2fHIj-infJqByI438cPvxBFMkmlxJsyDVJHUsBSDVHXY55-7gt0TszNmJGAjeFZjRUioI9RiUNq9w3IK2zoWx6vsPNnv=w800-h600" 
                        alt="Kegiatan MDT 2" class="w-full h-64 object-cover transition-transform duration-500 hover:scale-110">
                </div>
                
                <!-- Foto 3 dari Google Photos -->
                <div class="overflow-hidden rounded-lg shadow-md">
                    <img src="https://lh3.googleusercontent.com/pw/AP1GczPqWuw2aGygg466NgMcSJ8J9l7VOl1_Q2OqJOBCqtZwjfdL-UvbrxmXlk6hFWow6XTGwvhehr8bgrZtTsPlmHlOFNLpyXQjvI8ra3Paxw8c8ZkrdprT=w800-h600" 
                        alt="Kegiatan MDT 3" class="w-full h-64 object-cover transition-transform duration-500 hover:scale-110">
                </div>
                
                <!-- Foto 4 dari Google Photos -->
                <div class="overflow-hidden rounded-lg shadow-md">
                    <img src="https://lh3.googleusercontent.com/pw/AP1GczMZpzcaUfBNNxI4-H678D_J7uqXJS6ETpCayDaXc8m4_iNI0pGA7YyKqPhndXmEfsqwTDSyNo1X4RqgMWnqydOaEHTmxJVTGGwOU-6SL1IMxo9WJC67=w800-h600" 
                        alt="Kegiatan MDT 4" class="w-full h-64 object-cover transition-transform duration-500 hover:scale-110">
                </div>
                
                <!-- Foto 5 dari Google Photos -->
                <div class="overflow-hidden rounded-lg shadow-md">
                    <img src="https://lh3.googleusercontent.com/pw/AP1GczNwm4oSLcZdVaW8t0TD4oj6tZlGY5eSIIbifpcMyjLvxTghCv0OVHingmhYTtLh2ZSfIxHdVzWwThDrwFejhBiRAKp73oY-s9iWMuPDabKqmywQDJ75=w800-h600" 
                        alt="Kegiatan MDT 5" class="w-full h-64 object-cover transition-transform duration-500 hover:scale-110">
                </div>
                
                <!-- Foto 6 dari Google Photos -->
                <div class="overflow-hidden rounded-lg shadow-md">
                    <img src="https://lh3.googleusercontent.com/pw/AP1GczMzYpfJR77M9oNlDu4cYidl9mu3Rg5VNeMNsExXctemd3XMoWAxCyRiWjJInxIIGGp8YRDdp6uE7EDEVhLC3Y0mq_Zq4SdBEZRDX2QcfES8bX98N-B1=w800-h600" 
                        alt="Kegiatan MDT 6" class="w-full h-64 object-cover transition-transform duration-500 hover:scale-110">
                </div>
                
                <!-- Foto 7 dari Google Photos -->
                <div class="overflow-hidden rounded-lg shadow-md">
                    <img src="https://lh3.googleusercontent.com/pw/AP1GczNv_KX8Sk6zmWJLEx6sglSw3YaOtaJk4SbQ913FIVws2DecYjO3HtCph2mMbKisB-HsbE8GQD306kGCjB53wYDJ4WxpgtdbJTggJ910N87KjDS-FbZi=w800-h600" 
                        alt="Kegiatan MDT 7" class="w-full h-64 object-cover transition-transform duration-500 hover:scale-110">
                </div>
                
                <!-- Foto 8 dari Google Photos -->
                <div class="overflow-hidden rounded-lg shadow-md">
                    <img src="https://lh3.googleusercontent.com/pw/AP1GczMubF8bXkP8d15yaGBbNWpQNMAo9YS77EuwtcFnz1pPMmItj9px8YKbea9PWL1n_-W3D2CQNJEbkyufs_YVejr00-7Z6amVvS8Vgqkg7PvPM37dY5wc=w800-h600" 
                        alt="Kegiatan MDT 8" class="w-full h-64 object-cover transition-transform duration-500 hover:scale-110">
                </div>
            </div>
        </div>
    </section>

    <!-- Kontak dan Pendaftaran -->
    <section id="kontak" class="py-16 bg-gray-50 bg-batik-hijau">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-green-700 mb-2">Hubungi Kami</h2>
                <div class="w-20 h-1 bg-green-600 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">Untuk informasi lebih lanjut tentang pendaftaran dan program kami, silakan hubungi kami melalui kontak di bawah ini.</p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-10 items-stretch">
                <!-- Informasi Kontak -->
                <div class="bg-white p-8 rounded-lg shadow-lg flex-1 border border-green-100 h-full">
                    <h3 class="text-2xl font-semibold text-green-700 mb-6">Informasi Kontak</h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="bg-green-50 p-3 rounded-full mr-4 flex items-center justify-center">
                                <!-- Heroicon: MapPin -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7 text-green-500"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21.75c-4.5-4.5-7.5-7.5-7.5-11.25A7.5 7.5 0 0112 3a7.5 7.5 0 017.5 7.5c0 3.75-3 6.75-7.5 11.25z" /><circle cx="12" cy="10.5" r="2.5" fill="#22c55e"/></svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Alamat</h4>
                                <p class="text-gray-600">Jl. Pasir Pogor Kp. Pasirpogor No.Rt 05/03, Malakasari, Kec. Baleendah, Kabupaten Bandung, Jawa Barat 40375</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-green-50 p-3 rounded-full mr-4 flex items-center justify-center">
                                <!-- Heroicon: Phone -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7 text-green-500"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75A2.25 2.25 0 014.5 4.5h2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-.75.75H5.25v1.5A9.75 9.75 0 0015 19.5h1.5v-1.5a.75.75 0 01.75-.75h2.25a.75.75 0 01.75.75v2.25a2.25 2.25 0 01-2.25 2.25h-2.25C7.798 22.5 1.5 16.202 1.5 8.25V6.75z" /></svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Telepon</h4>
                                <p class="text-gray-600">+62-123-4567-8900</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-green-50 p-3 rounded-full mr-4 flex items-center justify-center">
                                <!-- Heroicon: Envelope -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7 text-green-500"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5A2.25 2.25 0 0119.5 19.5h-15A2.25 2.25 0 012.25 17.25V6.75A2.25 2.25 0 014.5 4.5h15a2.25 2.25 0 012.25 2.25z" /><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 7.5l8.25 6.75 8.25-6.75" /></svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Email</h4>
                                <p class="text-gray-600">info@mdtbilalbinrabbah.ac.id</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-green-50 p-3 rounded-full mr-4 flex items-center justify-center">
                                <!-- Heroicon: Clock -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7 text-green-500"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2" /><circle cx="12" cy="12" r="9" /></svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Jam Operasional</h4>
                                <p class="text-gray-600">Sabtu - Ahad : 07.00 - 20.00 WIB</p>
                            </div>
                        </div>
                        
                        <!-- Tombol WhatsApp -->
                        <div class="mt-6 pt-4 border-t border-gray-100">
                            <a href="https://wa.me/6281234567890?text=Assalamu'alaikum,%20saya%20ingin%20bertanya%20tentang%20MDT%20Bilal%20bin%20Rabbah" 
                               target="_blank" 
                               class="flex items-center justify-center bg-green-500 hover:bg-green-600 text-white py-3 px-6 rounded-lg transition duration-300 w-full">
                                <!-- SVG WhatsApp -->
                                <svg class="w-6 h-6 mr-2" viewBox="0 0 32 32" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M16 3C9.373 3 4 8.373 4 15c0 2.385.832 4.584 2.236 6.393L4 29l7.824-2.05C13.68 27.634 14.82 28 16 28c6.627 0 12-5.373 12-12S22.627 3 16 3zm0 22c-1.02 0-2.02-.154-2.98-.456l-.212-.067-4.65 1.22 1.24-4.53-.138-.22C7.44 19.07 7 17.06 7 15c0-5.514 4.486-10 10-10s10 4.486 10 10-4.486 10-10 10zm5.29-7.71c-.29-.145-1.71-.844-1.98-.94-.27-.1-.47-.145-.67.145-.2.29-.77.94-.95 1.13-.17.2-.35.22-.64.075-.29-.145-1.22-.45-2.33-1.43-.86-.77-1.44-1.72-1.61-2-.17-.29-.02-.44.13-.58.13-.13.29-.34.43-.51.14-.17.19-.29.29-.48.1-.2.05-.37-.025-.52-.075-.145-.67-1.62-.92-2.22-.24-.58-.48-.5-.67-.51-.17-.01-.37-.01-.57-.01-.2 0-.52.075-.8.37-.27.29-1.05 1.03-1.05 2.5 0 1.47 1.07 2.89 1.22 3.09.15.2 2.1 3.21 5.09 4.37.71.31 1.26.5 1.69.64.71.23 1.36.2 1.87.12.57-.09 1.71-.7 1.95-1.37.24-.67.24-1.25.17-1.37-.07-.12-.26-.19-.55-.33z"/></svg>
                                <span class="font-medium">WhatsApp</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Peta Lokasi -->
                <div class="bg-white p-4 rounded-lg shadow-lg flex-1 border border-green-100 mt-8 md:mt-0 flex items-center justify-center h-full min-h-[300px]">
                    <div style="position: relative; width: 100%; height: 100%;">
                        <div style="position: relative; padding-bottom: 75%; height: 0; overflow: hidden;">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.022166473485!2d107.60545887583!3d-7.006672568631148!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e98b5d3428cb%3A0x5bdf1858a8fa5e17!2sMDT%20Bilal%20Bin%20Rabbah!5e0!3m2!1sid!2sid!4v1747310917981!5m2!1sid!2sid" 
                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border:0;" 
                                allowfullscreen="" 
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                        <noscript>
                            <div class="text-red-600 mt-2">
                                Peta tidak dapat ditampilkan. Silakan buka di 
                                <a href="https://goo.gl/maps/..." target="_blank" class="underline text-green-700">Google Maps</a>
                            </div>
                        </noscript>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-green-800 text-white py-10">
        <div class="container mx-auto px-4">
            <div class="flex flex-col">
                <div class="mb-6">
                    <div class="flex items-center space-x-2 mb-4">
                        <img src="{{ asset('favicon-32x32.png') }}" alt="Logo" class="h-10 w-10">
                        <div>
                            <h3 class="text-xl font-bold">MDT Bilal bin Rabbah</h3>
                            <p class="text-xs text-green-200">Pendidikan Islam Berkualitas</p>
                        </div>
                    </div>
                    <p class="text-green-200 mb-4 max-w-xl">Membentuk generasi yang berakhlak mulia, hafal Al-Qur'an, dan siap menghadapi tantangan zaman.</p>
                    <div class="flex space-x-4">
                        <!-- Facebook -->
                        <a href="#" class="text-white hover:text-green-200 transition" aria-label="Facebook">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0h-21.35C.595 0 0 .592 0 1.326v21.348C0 23.408.595 24 1.325 24h11.495v-9.294H9.692v-3.622h3.128V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.797.143v3.24l-1.918.001c-1.504 0-1.797.715-1.797 1.763v2.313h3.587l-.467 3.622h-3.12V24h6.116C23.406 24 24 23.408 24 22.674V1.326C24 .592 23.406 0 22.675 0"/></svg>
                        </a>
                        <!-- Instagram -->
                        <a href="#" class="text-white hover:text-green-200 transition" aria-label="Instagram">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.334 3.608 1.308.974.974 1.246 2.241 1.308 3.608.058 1.266.069 1.646.069 4.85s-.012 3.584-.07 4.85c-.062 1.366-.334 2.633-1.308 3.608-.974.974-2.241 1.246-3.608 1.308-1.266.058-1.646.069-4.85.069s-3.584-.012-4.85-.07c-1.366-.062-2.633-.334-3.608-1.308-.974-.974-1.246-2.241-1.308-3.608C2.175 15.647 2.163 15.267 2.163 12s.012-3.584.07-4.85c.062-1.366.334-2.633 1.308-3.608C4.515 2.497 5.782 2.225 7.148 2.163 8.414 2.105 8.794 2.094 12 2.094m0-2.163C8.741 0 8.332.012 7.052.07 5.771.128 4.659.334 3.608 1.308 2.634 2.282 2.428 3.394 2.37 4.675.012 8.332 0 8.741 0 12c0 3.259.012 3.668.07 4.948.058 1.281.264 2.393 1.238 3.367.974.974 2.086 1.18 3.367 1.238C8.332 23.988 8.741 24 12 24s3.668-.012 4.948-.07c1.281-.058 2.393-.264 3.367-1.238.974-.974 1.18-2.086 1.238-3.367.058-1.28.07-1.689.07-4.948s-.012-3.668-.07-4.948c-.058-1.281-.264-2.393-1.238-3.367-.974-.974-2.086-1.18-3.367-1.238C15.668.012 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zm0 10.162a3.999 3.999 0 110-7.998 3.999 3.999 0 010 7.998zm6.406-11.845a1.44 1.44 0 11-2.88 0 1.44 1.44 0 012.88 0z"/></svg>
                        </a>
                        <!-- YouTube -->
                        <a href="#" class="text-white hover:text-green-200 transition" aria-label="YouTube">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a2.994 2.994 0 00-2.112-2.112C19.545 3.5 12 3.5 12 3.5s-7.545 0-9.386.574A2.994 2.994 0 00.502 6.186C0 8.027 0 12 0 12s0 3.973.502 5.814a2.994 2.994 0 002.112 2.112C4.455 20.5 12 20.5 12 20.5s7.545 0 9.386-.574a2.994 2.994 0 002.112-2.112C24 15.973 24 12 24 12s0-3.973-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                        <!-- Twitter -->
                        <a href="#" class="text-white hover:text-green-200 transition" aria-label="Twitter">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557a9.83 9.83 0 01-2.828.775 4.932 4.932 0 002.165-2.724c-.951.564-2.005.974-3.127 1.195a4.916 4.916 0 00-8.38 4.482C7.691 8.095 4.066 6.13 1.64 3.161c-.542.929-.856 2.01-.857 3.17 0 2.188 1.115 4.116 2.823 5.247a4.904 4.904 0 01-2.229-.616c-.054 2.281 1.581 4.415 3.949 4.89a4.936 4.936 0 01-2.224.084c.627 1.956 2.444 3.377 4.6 3.417A9.867 9.867 0 010 21.543a13.94 13.94 0 007.548 2.209c9.057 0 14.009-7.513 14.009-14.009 0-.213-.005-.425-.014-.636A10.012 10.012 0 0024 4.557z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-green-700 mt-8 pt-8">
                <p class="text-green-200">© 2023 MDT Bilal bin Rabbah. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Menu Toggle
        const menuToggle = document.getElementById('menu-toggle');
        const closeMenu = document.getElementById('close-menu');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const navbar = document.getElementById('navbar');
        const navbarPlaceholder = document.getElementById('navbar-placeholder');
        
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
        
        // Fungsi untuk mengatur tinggi placeholder sesuai tinggi navbar
        function updateNavbarPlaceholderHeight() {
            if (navbar.classList.contains('fixed')) {
                navbarPlaceholder.style.height = navbar.offsetHeight + 'px';
            } else {
                navbarPlaceholder.style.height = '0px';
            }
        }
        
        // Navbar Scroll Effect
        window.addEventListener('scroll', function() {
            const heroSection = document.getElementById('beranda');
            const heroHeight = heroSection.offsetHeight;
            
            if (window.scrollY >= heroHeight) {
                navbar.classList.remove('absolute', 'navbar-transparent', 'bg-transparent');
                navbar.classList.add('fixed', 'top-0', 'shadow-md', 'bg-green-600');
            } else {
                navbar.classList.add('absolute', 'navbar-transparent', 'bg-transparent');
                navbar.classList.remove('fixed', 'top-0', 'shadow-md', 'bg-green-600');
            }
            updateNavbarPlaceholderHeight();
        });
        
        // Update placeholder height ketika resize window
        window.addEventListener('resize', updateNavbarPlaceholderHeight);
        
        // Trigger scroll event once on page load to set initial navbar state
        window.addEventListener('load', function() {
            window.dispatchEvent(new Event('scroll'));
        });
        
        // Smooth scroll untuk link anchor
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const offset = 80; // Offset untuk fixed header
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - offset;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
                
                // Close mobile menu if it's open
                if (!mobileMenu.classList.contains('hidden')) {
                    closeMenuFunc();
                }
            });
        });

        // Inisialisasi Swiper dari npm setelah DOM siap
        if (window.initHeroSwiper) {
            window.initHeroSwiper();
        }
    </script>
    <!-- Cookie Consent Banner -->
    <div id="cookie-banner" class="fixed bottom-4 left-1/2 transform -translate-x-1/2 z-50 bg-white border border-green-200 shadow-lg rounded-xl px-6 py-4 flex flex-col md:flex-row items-center gap-4 max-w-lg w-[95%] md:w-auto transition-all duration-300" style="display:none;">
        <span class="text-gray-700 text-sm flex-1">
            Situs ini menggunakan cookies untuk meningkatkan pengalaman Anda. Dengan melanjutkan, Anda setuju dengan <a href="#" class="text-green-700 underline">kebijakan cookies</a> kami.
        </span>
        <button id="accept-cookies" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">Terima</button>
    </div>
    <script>
    // Cookie Consent Banner
    document.addEventListener('DOMContentLoaded', function() {
        const cookieBanner = document.getElementById('cookie-banner');
        const acceptCookies = document.getElementById('accept-cookies');
        if (!localStorage.getItem('cookieAccepted')) {
            cookieBanner.style.display = 'flex';
        }
        acceptCookies.addEventListener('click', function() {
            localStorage.setItem('cookieAccepted', 'true');
            cookieBanner.style.display = 'none';
        });
    });
    </script>

    <!-- Counter Animation Script -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const counters = document.querySelectorAll('.counter');
        const speed = 200; // Kecepatan animasi - semakin kecil semakin cepat
        
        // Fungsi untuk mengecek apakah elemen terlihat di viewport
        function isElementInViewport(el) {
            const rect = el.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }
        
        // Fungsi untuk menjalankan animasi counter
        function runCounter() {
            counters.forEach(counter => {
                if (isElementInViewport(counter) && !counter.classList.contains('counted')) {
                    counter.classList.add('counted');
                    const target = +counter.getAttribute('data-target');
                    const increment = target / speed;
                    
                    function updateCount() {
                        const currentCount = +counter.innerText;
                        if (currentCount < target) {
                            counter.innerText = Math.ceil(currentCount + increment);
                            setTimeout(updateCount, 1);
                        } else {
                            counter.innerText = target;
                        }
                    }
                    
                    updateCount();
                }
            });
        }
        
        // Jalankan counternya saat scroll
        window.addEventListener('scroll', runCounter);
        
        // Jalankan checker saat halaman dimuat
        runCounter();
    });
    </script>
</body>
</html>
