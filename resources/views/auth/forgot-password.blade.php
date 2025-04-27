@include('partials.head')
@include('partials.font')

<!--
<div class="bg-[#4F7F81]">
    <nav class="border-gray-200 container bg-[#4F7F81]">
        <div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center">
                <img src="{{ asset('img/Rectangle 65.png') }}" class="h-20 object-cover w-20" alt="Flowbite Logo" />
                <span
                    class="self-center text-4xl text-white font-semibold whitespace-nowrap pt-4 aclonica-regular">LearnMap</span>
            </a>
        </div> -->
    </nav>
</div>

<body>
    <div class="container py-10 px-8 lg:px-0 ">
        <div class="grid lg:grid-cols-2 grid-cols-1">
            <div class="hidden lg:block justify-center items-center ">
                <img src="{{ asset('img/bg-forgot pw.jpg') }}" alt="">
            </div>
            <div class="border border-slate-500">
                <p class="p-8 flex justify-center items-center text-green-800 barlow-condensed-semibold text-6xl">FORGOT PASSWORD</p>
                <div class="mb-4 text-sm poppins-regular text-gray-600 px-8">
                    Forgot your password? No problem. Just let us know your email address and we will email you a
                    password reset link that will allow you to choose a new one.
                </div>

                <!-- Session Status -->
                @if (session('success'))
                    <div
                        class="fixed top-5 left-1/2 transform -translate-x-1/2 bg-green-500 text-white px-6 py-3 rounded-md shadow-lg z-50">
                        {{ session('success') }}
                    </div>
                @endif



                <form class="px-8 mx-auto" method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-5">
                        <label for="email" class="block mb-2 text-sm poppins-regular text-gray-900">Your Email</label>
                        <input type="email" id="email" name="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm poppins-regular rounded-lg focus:ring-green-800 focus:border-green-800 block w-full p-2.5"
                            placeholder="email@gmail.com" :value="old('email')" required autofocus />
                        @error('email')
                            <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit"
                        class="text-white bg-gradient-to-tr from-[#60BC9D] to-[#12372A] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center poppins-regular">Send
                        Password Reset Link</button>
                </form>

                <!-- Back to Login -->
                <div class="text-center mt-4">
                    <a href="{{ route('login') }}" class="text-green-800 hover:text-blue-800 poppins-regular">Back to
                        Login</a>
                </div>
            </div>
        </div>
    </div>
</body>
