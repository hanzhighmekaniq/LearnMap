<x-layout>
    <div class="py-10 bg-white container">
        <div class="bg-[#EBFEA1] poppins-extrabold m-auto flex items-center justify-center p-2">
            <p>Halaman ini berisi tentang kursus di Pare! </p>
        </div>
    </div>
    
    <div class="container">
        <div class="flex justify-end py-4">
            <div class="flex space-x-2">
                <div class="flex">
                    <div class="relative w-full">
                        <input type="search" id="search-dropdown"
                            class="block pr-12 p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Pencarian Nama Kursus"/>
                        <div class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-[#4F7F81] rounded-e-lg border border-[#4F7F81]">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Search</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="kursus-container" class="pb-20 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 m-auto justify-center items-center">
            @foreach ($data_kursus as $kursus)
                <div class="shadow-2xl transition ease-in-out delay-75 hover:-translate-y-1 hover:scale-105 duration-300 bg-white border border-gray-300 rounded-lg kursus-item">
                    <a href="#">
                        <img class="rounded-lg m-auto w-full max-h-64 object-cover"
                            src="{{ asset('storage/' . $kursus->img) }}" alt="{{ $kursus->nama_kursus }}" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl poppins-regular font-extrabold tracking-tight text-gray-900 nama-kursus">
                                {{ $kursus->nama_kursus }}
                            </h5>
                        </a>
                        <p class="mb-3 font-normal poppins-regular text-gray-700">
                            {{ Str::limit($kursus->deskripsi, 200, '...') }}

                        </p>
                        <div class="flex justify-end mt-8">
                            <a href="/kursus/{{ $kursus->id }}/detail"
                                class="inline-flex items-center px-6 py-2 text-sm font-extrabold text-black ring-2 ring-black hover:text-white hover:bg-[#4F7F81] hover:ring-[#4F7F81] rounded-full focus:ring-4 focus:outline-none">
                                Lihat
                                <svg class="w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        // Ambil elemen input dan container kursus
        const searchInput = document.getElementById('search-dropdown');
        const kursusContainer = document.getElementById('kursus-container');
        const kursusItems = document.querySelectorAll('.kursus-item');

        // Event listener untuk input pencarian
        searchInput.addEventListener('input', function() {
            const searchTerm = searchInput.value.toLowerCase();

            // Loop melalui setiap item kursus
            kursusItems.forEach(function(item) {
                const namaKursus = item.querySelector('.nama-kursus').textContent.toLowerCase();

                // Cek apakah nama kursus mengandung teks pencarian
                if (namaKursus.includes(searchTerm)) {
                    item.style.display = 'block'; // Tampilkan jika cocok
                } else {
                    item.style.display = 'none'; // Sembunyikan jika tidak cocok
                }
            });
        });
    </script>
</x-layout>
