<div class="bg-[#4F7F81]">
    <nav class="border-gray-200 container bg-[#4F7F81]">
        <div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ route('admin.home') }}" class="flex items-center">
                <img src="{{ asset('img/Rectangle 65.png') }}" class="h-14 object-cover w-14 lg:mw-20 lg:h-20"
                    alt="Flowbite Logo" />
                <span
                    class="self-center text-2xl sm:text-3xl lg:text-4xl text-white font-semibold whitespace-nowrap pt-4 aclonica-regular">
                    LearnMap
                </span>
            </a>
            <button data-collapse-toggle="navbar-solid-bg" type="button"
                class="inline-flex text-white items-center p-2 w-10 h-10 justify-center text-sm rounded-lg md:hidden focus:outline-none focus:ring-2 focus:ring-gray-200"
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
                            class="{{ request()->is('admin/dashboard') ? 'bg-[#EBFEA1] md:bg-transparent md:text-white md:underline' : 'text-gray-900' }} block py-2 px-3 md:p-0  hover:bg-[#EBFEA1] rounded-lg md:hover:bg-transparent md:border-0 md:hover:text-white poppins-extrabold text-sm">
                            Dashboard
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('admin.dataKursus') }}"
                            class="{{ request()->is('admin/data-kursus', 'admin/create-data', 'admin/*/edit-kursus') ? 'bg-[#EBFEA1] md:bg-transparent md:text-white md:underline' : 'text-gray-900' }} block py-2 px-3 md:p-0  hover:bg-[#EBFEA1] md:hover:bg-transparent md:border-0 md:hover:text-white poppins-extrabold text-sm">
                            Data Kursus
                        </a>
                    </li>
                    <li class="">
                        <div
                            class="text-gray-900 block py-2 px-3 md:p-0 rounded-lg hover:bg-[#EBFEA1] md:hover:bg-transparent md:border-0 md:hover:text-white poppins-extrabold text-sm">
                            <button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal">
                                Keluar
                            </button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
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
