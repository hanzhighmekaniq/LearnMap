<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - Email</title>
    <style>
        @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css');
    </style>
</head>
<body class="bg-gray-100 font-sans">
    <div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md mt-10">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-4">
            @lang('Email Verification')
        </h2>

        <p class="text-gray-700">
            We have sent a verification email to your email address. Please check your inbox and verify your email.
        </p>

        <div class="mt-6">
            <a href="{{ $actionUrl }}" class="bg-blue-500 text-white py-2 px-4 rounded-full hover:bg-blue-600">
                @lang('Verify Your Email')
            </a>
        </div>

        <p class="text-gray-600 mt-6 text-center">
            If you didn’t request this, please ignore this email.
        </p>
    </div>
</body>
</html>
