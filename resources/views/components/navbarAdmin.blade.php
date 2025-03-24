<div class="flex justify-center relative">
    <nav class="z-50 container bg-white text-white rounded-full fixed top-4 p-2 flex items-center justify-between shadow-lg w-full max-w-4xl mx-auto">
        <!-- Logo dan Nama Aplikasi -->
        <a href="{{ route('user.home') }}" class="flex items-center">
            <img src="{{ asset('img/Rectangle 65.png') }}" class="h-10 w-10" alt="Logo LearnMap" />
            <span class="ml-2 text-2xl font-semibold text-black">LearnMap</span>
        </a>

        <!-- Menu Navigasi -->
        <ul class="flex space-x-8 text-lg poppins-regular">
            <li>
                <a href="{{ route('admin.home') }}" class="text-black hover:text-green-600 ">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('kategori.index') }}" class="text-black hover:text-green-600">
                    Kategori
                </a>
            </li>
            <li>
                <a href="{{ route('admin.dataKursus') }}" class="text-black hover:text-green-600">
                    Data Kursus
                </a>
            </li>
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
                        <li>
                            <a href="{{ route('admin.home') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                        </li>
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

<!-- Modal Konfirmasi -->
<div id="popup-modal" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <button type="button"
                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-[#3F6A6B] w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-5 text-lg font-normal text-black">
                    Apakah Anda yakin ingin keluar?
                </h3>
                <div class="flex justify-center">
                    <form id="logout-form" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="text-white bg-[#4F7F81] hover:bg-[#3F6A6B] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Ya, Keluar
                        </button>
                    </form>
                    <button type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-[#3F6A6B] focus:z-10 focus:ring-4 focus:ring-gray-100"
                        data-modal-hide="popup-modal">
                        Tidak, Batal
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('[data-modal-toggle]').forEach(button => {
            button.addEventListener('click', () => {
                const targetId = button.getAttribute('data-modal-target');
                document.getElementById(targetId).classList.remove('hidden');
            });
        });

        document.querySelectorAll('[data-modal-hide]').forEach(button => {
            button.addEventListener('click', () => {
                const targetId = button.getAttribute('data-modal-hide');
                document.getElementById(targetId).classList.add('hidden');
            });
        });
    });
</script>