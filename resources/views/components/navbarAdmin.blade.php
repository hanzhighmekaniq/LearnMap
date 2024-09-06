<div class="bg-[#4F7F81]">
    <nav class="border-gray-200 container bg-[#4F7F81] ">
        <div class="max-w-screen-2xl  flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center">
                <img src="{{ asset('img/Rectangle 65.png') }}" class="h-14 object-cover w-14 lg:mw-20 lg:h-20" alt="Flowbite Logo" />
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
                    class="flex flex-col font-medium mt-4 rounded-lg bg-white md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent">

                    <li class="">
                        <a href="{{ route('admin.home') }}"
                            class="{{ request()->is('admin/dashboard') ? 'bg-[#EBFEA1] md:bg-transparent  md:text-white md:underline' : 'text-gray-900' }} block py-2 px-3 md:p-0 rounded hover:bg-[#EBFEA1] md:hover:bg-transparent md:border-0 md:hover:text-white poppins-extrabold text-sm ">
                            Dashboard
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('admin.dataKursus') }}"
                            class="{{ request()->is('admin/data-kursus','admin/tambahdata') ? 'bg-[#EBFEA1] md:bg-transparent md:text-white md:underline' : 'text-gray-900' }} block py-2 px-3 md:p-0 rounded hover:bg-[#EBFEA1] md:hover:bg-transparent md:border-0 md:hover:text-white poppins-extrabold text-sm ">
                            Data Kursus
                        </a>
                    </li>
                    <li class="">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                        <button type="submit"
                            class="{{ request()->is('peta') ? 'bg-[#EBFEA1] md:bg-transparent md:text-white md:underline' : 'text-gray-900' }} block py-2 px-3 md:p-0 rounded hover:bg-[#EBFEA1] text-red-800 md:hover:bg-transparent md:border-0 md:hover:text-white poppins-extrabold text-sm ">
                            Keluar
                        </button>
                    </form>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</div>
