<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance</title>
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
    <img src="{{asset('err-img/maintenance.png')}}" alt="Maintenance" width="300">
    <h1 class="mt-3">503</h1>
    <h4>Sedang Maintenance</h4>
    <p>Maaf, Layanan anda terganggu, kami sedang melakukan perbaikan demi kelancaran server</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
