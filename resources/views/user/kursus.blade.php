<x-layout>
    <div class="py-10 bg-white container">
        <div class="bg-[#EBFEA1] poppins-extrabold m-auto flex items-center justify-center p-2">
            <p>Halaman ini berisi tentang kursus di Pare! </p>
        </div>
    </div>

    <div class="container pb-20">
        <div class="flex justify-end space-x-2 py-4">
            <form method="GET" action="{{ route('user.kursus') }}" class="flex space-x-2">
                <!-- Dropdown Kategori -->
                <select name="kategori" onchange="this.form.submit()"
                    class="p-2 border border-gray-300 rounded-md text-gray-700 text-sm">
                    <option value="">Semua Kategori</option>
                    @foreach ($kategori as $item)
                        <option value="{{ $item->id }}" {{ request('kategori') == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_kategori }}
                        </option>
                    @endforeach
                </select>

                <!-- Search Input -->
                <div class="relative">
                    <input type="text" name="search" id="search-dropdown"
                        class="pr-14 pl-4 p-2.5 w-full text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-md"
                        placeholder="Pencarian Nama Kursus" value="{{ request('search') }}" />
                    <button type="submit"
                        class="absolute top-0 end-0 px-4 h-full text-sm font-medium text-white bg-[#4F7F81] rounded-e-lg">
                        🔍
                    </button>
                </div>
            </form>
        </div>

        {{ $data_kursus->links() }}

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 justify-center py-4 items-center gap-4 !important">
            @foreach ($data_kursus as $kursus)
                <div class="kursus-item max-w-xl h-ful mx-auto shadow-2xl rounded-lg ">
                    <div>
                        <div>
                            <img class=" flex justify-center items-center w-full h-64 object-cover"
                                src="{{ asset('storage/' . $kursus->img) }}" alt="" />
                        </div>
                        <div class="p-5 h-44">
                            <div>
                                <h5
                                    class="nama-kursus mb-2 text-xl poppins-regular font-extrabold tracking-tight text-gray-900">
                                    {{ $kursus->nama_kursus }}
                                </h5>
                                <h5
                                    class="nama-kursus mb-2 text-sm poppins-regular font-extrabold tracking-tight text-gray-900">
                                    {{ optional($kursus->kategoris)->nama_kategori ?? 'Kategori tidak tersedia' }}
                                </h5>
                            </div>
                            <p class="mb-3 font-normal text-sm poppins-regular text-gray-700">
                                {{ Str::words($kursus->deskripsi, 30, '...') }}
                            </p>
                        </div>
                    </div>
                    <div class="flex items-end justify-end rounded-b-lg">
                        <div class="my-4 mr-4">
                            <a href="/kursus/{{ $kursus->id }}/detail"
                                class="inline-flex items-center px-6 py-2 text-sm font-extrabold text-slate-700 ring-1 ring-slate-500 rounded-full hover:text-white hover:bg-[#4F7F81] hover:ring-[#4F7F81] focus:ring-4 focus:outline-none focus:ring-blue-300">
                                Lihat
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $data_kursus->links() }}


    </div>

    {{-- <script>
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
    </script> --}}
</x-layout>
