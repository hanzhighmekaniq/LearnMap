<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email</title>
    <style>
        /* Inline Tailwind-like CSS for email */
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .title {
            font-size: 24px;
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
        }

        .button {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
            text-align: center;
        }

        .text {
            font-size: 16px;
            color: #555;
            margin-bottom: 15px;
        }

        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #777;
        }

        .button-red {
            background-color: #f44336;
        }
    </style>
</head>

<body class="bg-gray-100 p-4">

    <div class="container bg-white p-6 rounded-lg shadow-lg">
        <h1 class="title text-xl font-semibold mb-4">Verifikasi Email Anda</h1>

        <p class="text text-gray-700 mb-4">Halo pengguna yang terhormat,</p>

        @if (isset($resetPasswordUrl))
            @component('mail::message')
                # Reset Password

                Kami menerima permintaan untuk mereset password Anda. Klik tombol di bawah ini untuk mengubah password Anda:

                @component('mail::button', ['url' => $resetUrl])
                    Ubah Password
                @endcomponent

                Jika Anda tidak meminta ini, harap abaikan email ini.

                Salam,<br>
                {{ config('app.name') }}
            @endcomponent
        @elseif (isset($actionUrl))
            <!-- Jika itu untuk verifikasi email -->
            <p class="text text-gray-700 mb-4">Kami menerima permintaan untuk memverifikasi alamat email atau
                mengubah password Anda. Silakan
                klik
                tombol di bawah ini:</p>

            <a href="{{ $actionUrl }}" class="button">
                Verifikasi/Reset Email
            </a>

            <p class="text text-gray-700 mt-4">Jika Anda tidak meminta ini, harap abaikan email ini.</p>
        @endif

        <div class="footer mt-6 text-sm text-gray-600">
            <p>Salam,</p>
            <p>{{ config('app.name') }}</p>
        </div>
    </div>

</body>

</html>
