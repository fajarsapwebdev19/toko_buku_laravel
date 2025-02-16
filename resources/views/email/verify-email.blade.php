<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
        <h1 style="color: #333333;">Halo, {{ $user->name }}!</h1>
        <p style="color: #555555;">Terima kasih telah mendaftar di aplikasi kami. Silakan klik tombol di bawah ini untuk memverifikasi alamat email Anda:</p>

        <a href="{{ $verificationUrl }}" style="display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #007bff; color: #ffffff; text-decoration: none; border-radius: 5px;">
            Verifikasi Email
        </a>

        <p style="margin-top: 20px; color: #555555;">Jika Anda tidak membuat akun ini, abaikan saja email ini.</p>
    </div>
</body>
</html>
