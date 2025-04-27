<!DOCTYPE html>
<html>

<head>
    <title>Verifikasi Email</title>
</head>

<body>
    <h1>Halo! Sayang</h1>
    <p>Terima kasih telah mendaftar. Klik tautan di bawah untuk memverifikasi email Anda:</p>
    <a href="{{ $verificationUrl }}">{{ $verificationUrl }}</a>
    <p>Jika Anda tidak mendaftar, abaikan email ini.</p>
</body>

</html>
