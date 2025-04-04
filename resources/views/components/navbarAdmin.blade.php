{{-- <div class=" flex justify-center relative">
    <nav
        class="z-50 container bg-white text-white rounded-full fixed top-4 p-2 flex items-center justify-between shadow-lg w-full mx-auto">
        <!-- Logo dan Nama Aplikasi -->
        <a href="{{ route('user.home') }}" class="flex items-center">
            <img src="{{ asset('img/logo3.png') }}" class="h-10 w-10" alt="Logo LearnMap" />
            <span class="ml-2 text-2xl barlow-condensed-semibold text-green-800">LearnMap</span>
        </a>

        <!-- Menu Navigasi -->
        @if (Auth::user() && in_array(Auth::user()->role, ['admin', 'user']))
            <ul class="flex space-x-8 text-lg poppins-regular">
                <li><a href="{{ route('admin.home') }}" class="text-black hover:text-green-600">Beranda</a></li>
                <li><a href="{{ route('kategori.index') }}" class="text-black hover:text-green-600">Kategori</a></li>
                <li><a href="{{ route('user.index') }}" class="text-black hover:text-green-600">User</a></li>
            </ul>
        @else
        @endif
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
                        @if (Auth::user() && in_array(Auth::user()->role, ['admin', 'user']))
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
</div> --}}




<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 ">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 ">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="{{ route('user.home') }}" class="flex items-center">
                    <svg class="h-7 w-7 text-green-700" viewBox="0 0 24 24" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 2C8 2 5 5 5 9c0 5 7 11 7 11s7-6 7-11c0-4-3-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5S13.38 11.5 12 11.5z" />
                    </svg>
                    <span class="text-2xl font-semibold text-green-800">LearnMap</span>
                </a>
            </div>
            <div class="flex items-center">
                <div class="flex items-center ms-3">
                    <div>
                        <button type="button"
                            class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 "
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                        </button>
                    </div>
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-sm shadow-sm "
                        id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm text-green-900 " role="none">
                                {{ Auth::user()->email }}
                            </p>
                            <p class="text-sm font-medium text-green-900 truncate d" role="none">
                                {{ Auth::user()->name }}
                            </p>
                        </div>
                        <ul class="py-1" role="none">
                            <li>
                                <a href="{{ route('admin.home') }}"
                                    class="block px-4 py-2 text-sm text-green-700 hover:bg-gray-100     "
                                    role="menuitem">Dashboard</a>
                            </li>
                            <li>
                                <a href="{{ route('password.edit') }}"
                                    class="block px-4 py-2 text-sm text-green-700 hover:bg-gray-100     "
                                    role="menuitem">Settings</a>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST"
                                    class="block px-4 py-2 text-sm text-green-700 hover:bg-gray-100     ">
                                    @csrf
                                    <button type="submit" class="w-full text-left">Sign out</button>
                                </form>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">
            <li>
                @if (Auth::user() && in_array(Auth::user()->role, ['admin', 'user']))
                    <a href="{{ route('admin.home') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-green-100 group {{ request()->routeIs('admin.home') ? 'bg-green-200 text-green-700' : 'hover:bg-green-100 hover:text-green-600' }}">
                        <svg class="w-5 h-5 transition duration-75 group-hover:text-green-700 {{ request()->routeIs('admin.home') ? 'text-green-700' : 'text-gray-500' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                @else
                @endif
            </li>

            @if (Auth::user() && in_array(Auth::user()->role, ['user']))
                <li>
                    <a href="{{ route('admin.dataKursus') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-green-100 group
                    {{ request()->routeIs(['admin.create', 'admin.dataKursus', 'admin.edit']) ? 'bg-green-200 text-green-700' : 'hover:bg-green-100 hover:text-green-600' }}">

                        <svg class="w-5 h-5 transition duration-75 group-hover:text-green-700
                        {{ request()->routeIs(['admin.create', 'admin.dataKursus', 'admin.edit']) ? 'text-green-700' : 'text-gray-500' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 18 20">
                            <path
                                d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                        </svg>

                        <span class="ms-3">Kursus</span>
                    </a>
                </li>
            @else
                <li>
                    <a href="{{ route('kategori.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-green-100 group {{ request()->routeIs('kategori.index') ? 'bg-green-200 text-green-700' : 'hover:bg-green-100 hover:text-green-600' }}">
                        <svg class="w-5 h-5 transition duration-75 group-hover:text-green-700 {{ request()->routeIs('kategori.index') ? 'text-green-700' : 'text-gray-500' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 18 18">
                            <path
                                d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                        </svg>
                        <span class="ms-3">Kategori</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-green-100 group {{ request()->routeIs('user.index') ? 'bg-green-200 text-green-700' : 'hover:bg-green-100 hover:text-green-600' }}">
                        <svg class="w-5 h-5 transition duration-75 group-hover:text-green-700 {{ request()->routeIs('user.index') ? 'text-green-700' : 'text-gray-500' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 18">
                            <path
                                d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        <span class="ms-3">Users</span>
                    </a>
                </li>
            @endif
        </ul>



    </div>
</aside>
