<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Berhasil | MDT Bilal bin Rabbah</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: #f0fdf4; }
        .card { max-width: 400px; margin: 80px auto; background: #fff; border-radius: 16px; box-shadow: 0 2px 16px #0001; padding: 32px; text-align: center; }
        .icon { color: #22c55e; font-size: 3rem; margin-bottom: 16px; }
        .regnum { font-size: 1.3rem; font-weight: 600; color: #166534; letter-spacing: 1px; }
        .btn { margin-top: 24px; background: #22c55e; color: #fff; padding: 10px 24px; border-radius: 8px; text-decoration: none; font-weight: 500; transition: background 0.2s; }
        .btn:hover { background: #166534; }
    </style>
</head>
<body>
    <div class="card">
        <div class="icon"><i class="fas fa-check-circle"></i></div>
        <h2>Pendaftaran Berhasil!</h2>
        <p>Terima kasih telah mendaftar di MDT Bilal bin Rabbah.</p>
        <p>Nomor Pendaftar Anda:</p>
        <div class="regnum">{{ $registration_number }}</div>
        <a href="/" class="btn">Kembali ke Beranda</a>
    </div>
</body>
</html> 