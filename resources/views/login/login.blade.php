@include('partials.head')
@include('partials.font')

<div class="bg-[#4F7F81]">
    <nav class="border-gray-200 container bg-[#4F7F81] ">
        <div class="max-w-screen-2xl  flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center">
                <img src="{{ asset('img/Rectangle 65.png') }}" class="h-20 object-cover w-20" alt="Flowbite Logo" />
                <span
                    class="self-center text-4xl text-white font-semibold whitespace-nowrap pt-4 aclonica-regular">LearnMap</span>
            </a>
        </div>
    </nav>
</div>

<body>

    <div class="container py-10">
        <div class="grid lg:grid-cols-2 grid-cols-1">
            <div class="hidden lg:block  justify-center items-center">
                <img src="{{  asset('img/login.png') }}" alt="">
            </div>
            <div class="border border-slate-500">
                <p class="p-8 flex justify-center items-center poppins-semibold text-4xl">Login</p>
                <form class="px-8 mx-auto">
                    <div class="mb-5">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Your
                            email</label>
                        <input type="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            placeholder="email@gmail.com" required />
                    </div>
                    <div class="mb-5">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Your
                            password</label>
                        <input type="password" id="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            required />
                    </div>
                    <div class="flex items-start mb-5">
                        <div class="flex items-center h-5">
                            <input id="remember" type="checkbox" value=""
                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 "
                                required />
                        </div>
                        <label for="remember" class="ms-2 text-sm font-medium text-gray-900 ">Remember
                            me</label>
                    </div>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
