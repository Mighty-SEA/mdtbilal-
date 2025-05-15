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
    
    <!-- Tambahkan Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        @font-face {
            font-family: 'Font Awesome 6 Free';
            font-display: swap;
            src: url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/webfonts/fa-solid-900.woff2') format('woff2');
        }
        
        @font-face {
            font-family: 'Font Awesome 6 Brands';
            font-display: swap;
            src: url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/webfonts/fa-brands-400.woff2') format('woff2');
        }
        
        body {
            font-family: 'Poppins', sans-serif;
        }
        .font-arabic {
            font-family: 'Amiri', serif;
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
                        <i id="menu-icon" class="fas fa-bars text-2xl"></i>
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
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                
                <nav class="py-1">
                    <div class="flex flex-col space-y-1">
                        <a href="#beranda" class="mobile-nav-link px-3 py-2 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-lg transition-all flex items-center text-sm">
                            <i class="fas fa-home w-7 text-green-600"></i>
                            <span>Beranda</span>
                        </a>
                        <a href="#tentang" class="mobile-nav-link px-3 py-2 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-lg transition-all flex items-center text-sm">
                            <i class="fas fa-info-circle w-7 text-green-600"></i>
                            <span>Tentang</span>
                        </a>
                        
                        <a href="#galeri" class="mobile-nav-link px-3 py-2 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-lg transition-all flex items-center text-sm">
                            <i class="fas fa-images w-7 text-green-600"></i>
                            <span>Galeri</span>
                        </a>
                        
                        <a href="#kontak" class="mobile-nav-link px-3 py-2 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-lg transition-all flex items-center text-sm">
                            <i class="fas fa-phone-alt w-7 text-green-600"></i>
                            <span>Kontak</span>
                        </a>
                        
                        <div class="pt-2 mt-1 border-t border-gray-100">
                            <a href="{{ route('ppdb') }}" class="block text-center bg-green-600 hover:bg-green-700 text-white py-2 px-3 rounded-lg transition duration-300 mt-1 text-sm">
                                <i class="fas fa-user-plus mr-2"></i> Daftar Sekarang
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
                            <div class="bg-green-100 p-3 rounded-full mr-4">
                                <i class="fas fa-map-marker-alt text-green-600 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Alamat</h4>
                                <p class="text-gray-600">Jl. Pasir Pogor Kp. Pasirpogor No.Rt 05/03, Malakasari, Kec. Baleendah, Kabupaten Bandung, Jawa Barat 40375</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-green-100 p-3 rounded-full mr-4">
                                <i class="fas fa-phone-alt text-green-600 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Telepon</h4>
                                <p class="text-gray-600">+62-123-4567-8900</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-green-100 p-3 rounded-full mr-4">
                                <i class="fas fa-envelope text-green-600 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Email</h4>
                                <p class="text-gray-600">info@mdtbilalbinrabbah.ac.id</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-green-100 p-3 rounded-full mr-4">
                                <i class="fas fa-clock text-green-600 text-xl"></i>
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
                                <i class="fab fa-whatsapp text-xl mr-2"></i>
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
                        <a href="#" class="text-white hover:text-green-200 transition"><i class="fab fa-facebook-f text-xl"></i></a>
                        <a href="#" class="text-white hover:text-green-200 transition"><i class="fab fa-instagram text-xl"></i></a>
                        <a href="#" class="text-white hover:text-green-200 transition"><i class="fab fa-youtube text-xl"></i></a>
                        <a href="#" class="text-white hover:text-green-200 transition"><i class="fab fa-twitter text-xl"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-green-700 mt-8 pt-8">
                <p class="text-green-200">© 2023 MDT Bilal bin Rabbah. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
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
        
        // Hero Swiper
        const swiper = new Swiper('.heroSwiper', {
            spaceBetween: 0,
            centeredSlides: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            speed: 1000,
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
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
