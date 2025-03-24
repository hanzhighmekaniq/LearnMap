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
    <div class="container py-10 px-8 lg:px-0 max-w-2xl">
        @if (session('error'))
            <div class="mb-4 text-sm text-red-600">
                {{ session('error') }}
            </div>
        @endif

        <div class="border border-slate-500 pb-4">
            <p class="p-8 flex justify-center items-center barlow-condensed-semibold text-green-800 text-6xl">REGISTER</p>
            <form class="px-8 mx-auto" method="POST" action="{{ route('register.account') }}">
                @csrf
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm poppins-regular text-gray-900">Your Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm poppins-regular rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Full Name" required />
                </div>
                <div class="mb-5">
                    <label for="email" class="block mb-2 text-sm poppins-regular text-gray-900">Your Email</label>
                    <input type="email" id="email" name="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm poppins-regular rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="email@example.com" required />

                </div>
                <div class="mb-5">
                    <label for="email_confirmation" class="block mb-2 text-sm poppins-regular text-gray-900">Confirm Your
                        Email</label>
                    <input type="email" id="email_confirmation" name="email_confirmation"
                        value="{{ old('email_confirmation') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm poppins-regular rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Confirm email@example.com" required />
                </div>

                <div class="mb-5">
                    <label for="password" class="block mb-2 text-sm poppins-regular text-gray-900">Your Password</label>
                    <input type="password" id="password" name="password" value="{{ old('password') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="********" required />
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="block mb-2 text-sm poppins-regular text-gray-900">Confirm
                        Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        value="{{ old('password_confirmation') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="********" required />
                </div>
                @if ($errors->any())
                    <div class="mb-4 text-sm text-red-600">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <button type="submit"
                    class="text-white bg-gradient-to-tr from-[#60BC9D] to-[#12372A] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 poppins-regular rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Register</button>
            </form>
            <div class="text-center mt-4">
                <p class="text-sm poppins-regular text-gray-600">Already have an account?</p>
                <a href="{{ route('login') }}" class="text-green-700 hover:text-blue-800 poppins-regular">Login here</a>
            </div>
        </div>
    </div>
</body>
