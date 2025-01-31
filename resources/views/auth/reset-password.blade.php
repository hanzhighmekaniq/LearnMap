@include('partials.head')
@include('partials.font')

<div class="bg-[#4F7F81]">
    <nav class="border-gray-200 container bg-[#4F7F81]">
        <div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center">
                <img src="{{ asset('img/Rectangle 65.png') }}" class="h-20 object-cover w-20" alt="Flowbite Logo" />
                <span
                    class="self-center text-4xl text-white font-semibold whitespace-nowrap pt-4 aclonica-regular">LearnMap</span>
            </a>
        </div>
    </nav>
</div>

<body>
    <div class="container px-8 lg:px-0">
        <div class="flex justify-center items-center pt-20">
            <div class="w-full max-w-md border border-slate-500 rounded-lg shadow-lg p-8">
                <p class="text-center poppins-semibold text-4xl mb-4">Reset Password</p>

                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div class="mb-5">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your Email</label>
                        <input type="email" id="email" name="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="email@gmail.com" :value="old('email', $request - > email)" required autofocus
                            autocomplete="username" />
                        @error('email')
                            <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-5">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">New Password</label>
                        <input type="password" id="password" name="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required autocomplete="new-password" />
                        @error('password')
                            <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-5">
                        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Confirm
                            Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required autocomplete="new-password" />
                        @error('password_confirmation')
                            <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">Reset
                        Password</button>
                </form>

                <!-- Back to Login -->
                <div class="text-center mt-4">
                    <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-semibold">Back to
                        Login</a>
                </div>
            </div>
        </div>
    </div>
</body>
