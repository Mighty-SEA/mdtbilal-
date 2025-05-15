<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gradient-to-br from-white via-sky-100 to-emerald-100 min-h-screen flex items-center justify-center">
    <div class="text-center max-w-md mx-auto p-8 bg-white/80 rounded-2xl shadow-xl border border-emerald-100">
        <!-- Ilustrasi Buku Terbuka -->
        <div class="flex justify-center mb-6">
        <img src="{{ asset('android-chrome-192x192.png') }}" alt="Logo" class="h-10 w-10">

                <!-- <svg width="90" height="60" viewBox="0 0 90 60" fill="none">
                    <path d="M10 50 Q20 30 45 40 Q70 50 80 30" stroke="#10b981" stroke-width="2" fill="#f0fdfa"/>
                    <path d="M10 50 Q20 40 45 45 Q70 50 80 40" stroke="#0ea5e9" stroke-width="2" fill="#e0f2fe"/>
                    <rect x="42" y="35" width="6" height="10" rx="2" fill="#fbbf24"/>
                </svg> -->
        </div>
        <h1 class="text-7xl font-extrabold text-emerald-400 mb-2">404</h1>
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Halaman Tidak Ditemukan</h2>
        <p class="text-base text-gray-500 mb-6">"Barangsiapa menempuh jalan untuk mencari ilmu, Allah akan mudahkan baginya jalan menuju surga."<br><span class="text-xs text-emerald-600">(HR. Muslim)</span></p>
        <a href="/" class="inline-block px-7 py-2 bg-emerald-400 text-white rounded-full shadow hover:bg-emerald-500 transition font-semibold">Kembali ke Beranda</a>
        <p class="mt-8 text-xs text-gray-400">&copy; {{ date('Y') }} MDT Bilal bin Rabbah</p>
    </div>
</body>
</html> 