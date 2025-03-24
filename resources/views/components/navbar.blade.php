<div class=" flex justify-center relative">
    <nav
        class="z-50 container bg-white text-white rounded-full fixed top-4 p-2 flex items-center justify-between shadow-lg w-full w-full mx-auto">
        <!-- Logo dan Nama Aplikasi -->
        <a href="{{ route('user.home') }}" class="flex items-center">
            <img src="{{ asset('img/logo3.png') }}" class="h-10 w-10" alt="Logo LearnMap" />
            <span class="ml-2 text-2xl barlow-condensed-semibold text-green-800">LearnMap</span>
        </a>

        <!-- Menu Navigasi -->
        <ul class="flex space-x-8 text-lg poppins-regular">
            <li><a href="{{ route('user.home') }}" class="text-black hover:text-green-600">Beranda</a></li>
            <li><a href="{{ route('user.kursus') }}" class="text-black hover:text-green-600">Kursus</a></li>
            <li><a href="{{ route('user.peta') }}" class="text-black hover:text-green-600">Peta</a></li>
        </ul>

        <!-- Tombol Login atau Dropdown User -->
        @if (Auth::check())
            <div class="relative">
                <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full"
                        src="{{ Auth::user()->avatar ?: 'https://www.gravatar.com/avatar/' . md5(strtolower(trim(Auth::user()->email))) }}?d=identicon"
                        alt="user photo">
                </button>
                <!-- Dropdown Menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow"
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900">{{ Auth::user()->name }}</span>
                        <span class="block text-sm text-gray-500 truncate">{{ Auth::user()->email }}</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        @if (Auth::user() && Auth::user()->role === 'admin')
                            <li>
                                <a href="{{ route('admin.home') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                            </li>
                        @endif
                        <li>
                            <a href="{{ route('password.edit') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Setting</a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="block w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 text-left">Sign
                                    out</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        @else
            <a href="{{ route('login') }}"
                class="bg-green-900 text-white px-4 py-2 rounded-full hover:bg-green-700">Login</a>
        @endif
    </nav>
</div>