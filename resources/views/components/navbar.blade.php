<div class="bg-[#4F7F81]">
    <nav class="border-gray-200 container bg-[#4F7F81] ">
        <div class="max-w-screen-2xl  flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ route('user.home') }}" class="flex items-center  ">
                <img src="{{ asset('img/Rectangle 65.png') }}" class="h-14 object-cover w-14 lg:mw-20 lg:h-20"
                    alt="Flowbite Logo" />
                <span
                    class="self-center text-2xl sm:text-3xl lg:text-4xl text-white font-semibold whitespace-nowrap pt-4 aclonica-regular">LearnMap</span>
            </a>
            <button data-collapse-toggle="navbar-solid-bg" type="button"
                class="inline-flex text-white items-center p-2 w-10 h-10 justify-center text-sm rounded-lg md:hidden focus:outline-none focus:ring-2 focus:ring-gray-200 "
                aria-controls="navbar-solid-bg" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
                <ul
                    class="flex flex-col items-center font-medium mt-4 rounded-lg bg-white md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent">

                    <li class="">
                        <a href="{{ route('user.home') }}"
                            class="{{ request()->is('/') ? 'bg-[#EBFEA1] md:bg-transparent  md:text-white md:underline' : 'text-gray-900' }} block py-2 px-3 md:p-0 rounded hover:bg-[#EBFEA1] md:hover:bg-transparent md:border-0 md:hover:text-white poppins-extrabold text-sm ">
                            Beranda
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('user.kursus') }}"
                            class="{{ request()->is('kursus', 'kursus/*/detail', 'kursus/*/rute') ? 'bg-[#EBFEA1] md:bg-transparent md:text-white md:underline' : 'text-gray-900' }} block py-2 px-3 md:p-0 rounded hover:bg-[#EBFEA1] md:hover:bg-transparent md:border-0 md:hover:text-white poppins-extrabold text-sm ">
                            Kursus
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('user.peta') }}"
                            class="{{ request()->is('peta') ? 'bg-[#EBFEA1] md:bg-transparent md:text-white md:underline' : 'text-gray-900' }} block py-2 px-3 md:p-0 rounded hover:bg-[#EBFEA1] md:hover:bg-transparent md:border-0 md:hover:text-white poppins-extrabold text-sm ">
                            Peta
                        </a>
                    </li>
                    @if (Auth::check())
                        <li>
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                                data-dropdown-placement="bottom">
                                <span class="sr-only">Open user menu</span>
                                <!-- Menggunakan foto default dari Google jika tidak ada foto di profil pengguna -->
                                <img class="w-8 h-8 rounded-full"
                                    src="{{ Auth::user()->avatar ?: 'https://www.gravatar.com/avatar/' . md5(strtolower(trim(Auth::user()->email))) }}?d=identicon"
                                    alt="user photo">
                            </button>
                        </li>

                        <!-- Dropdown menu -->
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                            id="user-dropdown">
                            <div class="px-4 py-3">
                                <span
                                    class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
                                <span
                                    class="block text-sm text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                            </div>
                            <ul class="py-2" aria-labelledby="user-menu-button">
                                @if (Auth::user() && Auth::user()->role === 'admin')
                                    <li>
                                        <a href="{{ route('admin.home') }}">
                                            <button type="submit"
                                                class="block w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white text-left">Dashboard</button>
                                        </a>
                                    </li>
                                @endif
                                <li>
                                    <a href="{{ route('password.edit') }}">
                                        <button type="submit"
                                            class="block w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white text-left">Setting</button>
                                    </a>
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="block w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white text-left">Sign
                                            out</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('login') }}"
                            class="{{ request()->is('peta') ? 'bg-[#EBFEA1] text-gray-800' : 'bg-white text-gray-900' }}
                           block py-2 px-3 rounded-2xl border-2 border-gray-300 hover:bg-[#EBFEA1]
                           hover:text-gray-800 hover:border-gray-500 transition-all duration-200 md:inline-block
                           poppins-extrabold text-sm">
                            Login
                        </a>
                    @endif

                </ul>
            </div>
        </div>
    </nav>
</div>
