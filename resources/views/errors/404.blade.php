<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .error-container {
            text-align: center;
            margin-top: 10%;
        }
        .error-container img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

<div class="container error-container">
    <img src="{{asset('err-img/404.png')}}" alt="404 Not Found" width="400">
    <h1 class="mt-3">404</h1>
    <h4>Halaman Tidak Ditemukan</h4>
    <p>Maaf, halaman yang Anda cari tidak tersedia atau telah dipindahkan.</p>
    <a href="/" class="btn btn-primary mt-3">Kembali ke Beranda</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
