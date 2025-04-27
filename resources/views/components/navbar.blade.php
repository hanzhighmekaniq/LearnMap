<div class="flex justify-center   ">
    <nav class="w-full  md:container md:px-4  md:top-4 fixed z-[999]">
        <div class="flex justify-between py-1 md:py-2 items-center  shadow-lg bg-white px-4 md:rounded-full text-white">
            <a href="#" class="flex items-center">
                <svg class="h-7 w-7 text-green-700" viewBox="0 0 24 24" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12 2C8 2 5 5 5 9c0 5 7 11 7 11s7-6 7-11c0-4-3-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5S13.38 11.5 12 11.5z" />
                </svg>
                <span class="text-sm lg:text-xl 2xl:text-2xl font-semibold text-green-800">LearnMap</span>
            </a>
            <div class="hidden md:flex" id="navbar-menu">
                <ul class="flex space-x-8 text-sm lg:text-base 2xl:text-lg poppins-regular">
                    <li>
                        <a href="{{ route('user.home') }}"
                            class="text-black hover:text-green-600 {{ Request::routeIs('user.home') ? 'text-green-700 ' : '' }}">
                            Beranda
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.kursus') }}"
                            class="text-black hover:text-green-600 {{ Request::routeIs('user.kursus') ? 'text-green-700 ' : '' }}">
                            Kursus
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.peta') }}"
                            class="text-black hover:text-green-600 {{ Request::routeIs('user.peta') ? 'text-green-700 ' : '' }}">
                            Peta
                        </a>
                    </li>
                </ul>

            </div>
            <div class="flex items-center">


                <!-- Login / Dropdown User -->
                <div class="ml-4">
                    @if (Auth::check())
                        <div class="relative" data-dropdown>
                            <button type="button"
                                class="flex items-center text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300"
                                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full"
                                    src="{{ Auth::user()->avatar ?: 'https://www.gravatar.com/avatar/' . md5(strtolower(trim(Auth::user()->email))) }}?d=identicon"
                                    alt="user photo">
                            </button>
                            <!-- Dropdown Menu -->
                            <div id="user-dropdown"
                                class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow"
                                data-popper-placement="bottom">
                                <div class="px-4 py-3">
                                    <span class="block text-sm text-gray-900">{{ Auth::user()->name }}</span>
                                    <span class="block text-sm text-gray-500 truncate">{{ Auth::user()->email }}</span>
                                    <span
                                        class="block text-sm text-gray-500 truncate">{{ Auth::user()->username }}</span>
                                </div>
                                <ul class="py-2" aria-labelledby="user-menu-button">
                                    @if (in_array(Auth::user()->role, ['admin', 'user']))
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
                            class="bg-green-900 text-white px-4 lg:px-5  py-1.5 text-xs lg:text-sm rounded-full hover:bg-green-700">Login</a>
                    @endif
                </div>
                <!-- Hamburger Button (hanya tampil di mobile) -->
                <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar"
                    aria-controls="default-sidebar" type="button"
                    class="ml-2 md:hidden inline-flex items-center p-2 w-10 h-10 justify-center text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    aria-controls="navbar-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5 " aria-hidden="true" fill="none" viewBox="0 0 17 14"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15"></path>
                    </svg>
                </button>
                <aside id="default-sidebar"
                    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full "
                    aria-label="Sidebar">
                    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 ">
                        <ul class="space-y-2 font-medium">

                            <li>
                                <a href="#" class="flex items-center">
                                    <svg class="h-7 w-7 text-green-700" viewBox="0 0 24 24" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12 2C8 2 5 5 5 9c0 5 7 11 7 11s7-6 7-11c0-4-3-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5S13.38 11.5 12 11.5z" />
                                    </svg>
                                    <span
                                        class="text-sm lg:text-xl 2xl:text-2xl font-semibold text-green-800">LearnMap</span>
                                </a>
                            </li>
                            <li class="border border-b-2">

                            </li>
                            <li>
                                <a href="{{ route('user.home') }}"
                                    class="text-black hover:text-green-600 {{ Request::routeIs('user.home') ? 'text-green-700 ' : '' }}">
                                    Beranda
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user.kursus') }}"
                                    class="text-black hover:text-green-600
                                    {{ Request::routeIs('user.kursus', 'user.rute', 'kursus.detail', 'kursus.visit') ? 'text-green-700' : '' }}">
                                    Kursus
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user.peta') }}"
                                    class="text-black hover:text-green-600 {{ Request::routeIs('user.peta') ? 'text-green-700 ' : '' }}">
                                    Peta
                                </a>
                            </li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </nav>

</div>
