<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    @if (session('success'))
        <div class="fixed top-5 left-1/2 transform -translate-x-1/2 bg-green-500 text-white px-6 py-3 rounded-md shadow-lg z-50">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="fixed top-5 left-1/2 transform -translate-x-1/2 bg-red-500 text-white px-6 py-3 rounded-md shadow-lg z-50">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="flex min-h-screen">
        <!-- Left Side -->
        <div class="w-full lg:w-1/2 flex flex-col justify-center items-center bg-white p-8">
            <div class="w-full max-w-md">
                <div class="mb-8">
                    <!--
                    <a href="/" class="flex items-center">
                        <img src="{{ asset('img/Rectangle 65.png') }}" class="h-20 object-cover w-20" alt="Logo"/>
                        <span class="self-center text-2xl text-[#4F7F81] font-semibold whitespace-nowrap pt-4 aclonica-regular">LearnMap</span>
                    </a> -->
                    <h1 class="text-5xl text-green-800 barlow-condensed-semibold mt-4">LOGIN</h1>
                </div>
                <form method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm poppins-regular mb-1" for="email">Email*</label>
                        <input class="w-full border border-gray-300 rounded-lg py-2 px-3" id="email" name="email" placeholder="Enter your email" type="email" required/>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm poppins-regular mb-1" for="password">Password*</label>
                        <input class="w-full border border-gray-300 rounded-lg py-2 px-3" id="password" name="password" placeholder="Enter your password" type="password" required/>
                        <a href="{{ route('password.forget') }}" class="text-sm text-green-800 poppins-regular mt-2 inline-block">Forgot password?</a>
                    </div>
                    <button class="w-full bg-gradient-to-tr from-[#60BC9D] to-[#12372A] text-white rounded-lg py-2 poppins-regular" type="submit">Log In</button>
                </form>
                <p class="mt-4 poppins-regula text-sm text-gray-500">
                    Don't have an account?
                    <a href="{{ route('register.index') }}" class="text-black poppins-regular">Register here</a>
                </p>
            </div>
        </div>
        <!-- Right Side -->
        <div class="hidden lg:flex lg:w-1/2 flex items-center justify-center bg-cover bg-center relative" style="background-image: url('{{ asset('img/bg-login.jpg') }}'); background-size: object-contain;">
            <div class="absolute inset-0  opacity-25"></div>
            <div class="relative z-10 p-8">
                <h2 class="text-5xl barlow-condensed-semibold text-green-800 mb-4">MARI TEMUKAN KURSUS IMPIANMU BERSAMA LEARN MAP.</h2>
                <p class="text-black poppins-regular ">Jelajahi kursus berkualitas bersama Learn Map, sekarang juga. Temukan berbagai pilihan kursus yang dirancang untuk meningkatkan keterampilan dan pengetahuanmu.</p>
            </div>
        </div>
    </div>
</body>
</html>