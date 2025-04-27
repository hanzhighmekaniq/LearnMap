<x-layout>
    {{-- @include('partials.detail.lokasi') --}}

    <!--@if (session('error'))-->
    <!--    <div-->
    <!--        class="fixed top-32 left-1/2 transform -translate-x-1/2 bg-red-500 text-white px-6 py-3 rounded-md shadow-lg z-[1000]">-->
    <!--        {{ session('error') }}-->
    <!--    </div>-->
    <!--@endif-->
    <!--@error('rating')-->
    <!--    <div-->
    <!--        class="fixed top-32 left-1/2 transform -translate-x-1/2 bg-red-500 text-white px-6 py-3 rounded-md shadow-lg z-[1000]">-->
    <!--        {{ $message }}-->
    <!--    </div>-->
    <!--@enderror-->

    <div class="flex justify-center items-center p-4 pt-20 md:pt-4">
        <div class="h-auto w-full relative">
            <img src="{{ asset('storage/' . $data->img) }}" alt=""
                class="aspect-[4/3] lg:aspect-[655px] 2xl:h-[895px] w-full object-cover brightness-75 rounded-2xl">
            <figcaption class="container w-full">
                <div
                    class="absolute container bottom-4 lg:bottom-12 left-1/2 transform -translate-x-1/2 space-y-10 text-center px-4">

                    <!-- Judul -->
                    <p class="poppins-bold text-start text-4xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl 2xl:text-8xl text-green-800 pr-16 w-3/4 xl:w-1/2"
                        style="text-shadow: 2px 2px 4px white;">
                        {{ $data->nama_kursus }}
                    </p>

                    <!-- Tab buttons with full width and scroll -->
                    <div class="w-full overflow-x-auto h-auto">
                        <div class="grid grid-cols-4 h-auto gap-4 lg:gap-20 min-w-[640px] sm:min-w-0 w-full p-4"
                            id="tab-buttons">
                            <button data-target="overview"
                                class="tab-btn w-full px-4 py-2 poppins-regular border-white border-2 rounded-3xl bg-white/10 backdrop-blur text-white text-xs sm:text-sm md:text-base">
                                Deskripsi
                            </button>
                            <button data-target="paket"
                                class="tab-btn w-full px-4 py-2 poppins-regular border-white border-2 rounded-3xl bg-white/10 backdrop-blur text-white text-xs sm:text-sm md:text-base">
                                Paket
                            </button>
                            <button data-target="metode"
                                class="tab-btn w-full px-4 py-2 poppins-regular border-white border-2 rounded-3xl bg-white/10 backdrop-blur text-white text-xs sm:text-sm md:text-base">
                                Metode
                            </button>
                            <button data-target="lokasi"
                                class="tab-btn w-full px-4 py-2 poppins-regular border-white border-2 rounded-3xl bg-white/10 backdrop-blur text-white text-xs sm:text-sm md:text-base">
                                Lokasi
                            </button>
                        </div>
                    </div>


                </div>
            </figcaption>
        </div>
    </div>

    <div class="container px-0 lg:px-4">
        <!-- Tab Overview -->
        <div id="overview" class="tab-content block transition-all duration-300">

            @include('partials.detail.deskripsi')
        </div>

        <!-- Tab Paket -->
        <div id="paket" class="tab-content hidden transition-all duration-300">

            @include('partials.detail.paket')
        </div>

        <!-- Tab Metode -->
        <div id="metode" class="tab-content hidden transition-all duration-300">

            @include('partials.detail.metode')
        </div>

        <!-- Tab Lokasi -->
        <div id="lokasi" class="tab-content hidden transition-all duration-300">

            <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
            <link rel="stylesheet" href="node_modules/leaflet/dist/leaflet.css">

            <div class="p-4 border mb-10">
                <div id="map-id" class="h-96 lg:h-[500px]"></div>


                <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

                <script>
                    // Fungsi untuk menginisialisasi peta jika belum ada
                    let myMap;

                    function initializeMap() {
                        if (!myMap) {
                            myMap = L.map('map-id').setView([{{ $data->latitude }}, {{ $data->longitude }}], 13); // Posisi awal map

                            // Tile Layer dari OpenStreetMap
                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: ''
                            }).addTo(myMap);

                            // Icon Marker Custom
                            const customIcon = L.icon({
                                iconUrl: 'https://cdn-icons-png.flaticon.com/512/684/684908.png',
                                iconSize: [38, 38],
                                iconAnchor: [19, 38],
                                popupAnchor: [0, -35]
                            });

                            // Tambahkan Marker di lokasi Yogyakarta
                            const marker = L.marker([{{ $data->latitude }}, {{ $data->longitude }}], {
                                icon: customIcon
                            }).addTo(myMap);
                            marker.bindPopup(`
                            <b>{{ $data->nama_kursus }}</b><br>
                            {{ $data->kategoris->nama_kategori }}<br>
                            <a href="/kursus/{{ $data->id }}/rute" target="_blank">Lihat Rute</a>
                        `);
                        } else {
                            // Jika peta sudah ada, refresh ukuran peta
                            myMap.invalidateSize();
                        }
                    }

                    // Inisialisasi atau refresh peta saat tab lokasi dibuka
                    document.addEventListener('DOMContentLoaded', function() {
                        const buttons = document.querySelectorAll('.tab-btn');
                        const contents = document.querySelectorAll('.tab-content');

                        // Fungsi untuk menampilkan tab yang aktif
                        function activateTab(targetId) {
                            contents.forEach(content => {
                                content.classList.add('hidden');
                                content.classList.remove('block');
                            });


                            buttons.forEach(btn => {
                                btn.classList.remove('bg-gradient-to-tr', 'from-[#60BC9D]', 'to-[#12372A]',
                                    'ring-white', 'scale-105');
                                btn.classList.add('bg-white/10', 'backdrop-blur');
                            });

                            const targetContent = document.getElementById(targetId);
                            if (targetContent) {
                                targetContent.classList.remove('hidden');
                                targetContent.classList.add('block');
                            }


                            const activeButton = document.querySelector(`.tab-btn[data-target="${targetId}"]`);
                            if (activeButton) {
                                activeButton.classList.remove('bg-white/10', 'backdrop-blur');
                                activeButton.classList.add('bg-gradient-to-tr', 'from-[#60BC9D]', 'to-[#12372A]', 'ring-white',
                                    'scale-105');
                            }

                            // Inisialisasi atau refresh map jika tab "lokasi" dibuka
                            if (targetId === 'lokasi') {
                                setTimeout(() => {
                                    initializeMap(); // Pastikan peta diinisialisasi atau disegarkan
                                }, 300); // Delay supaya tab ditampilkan dulu
                            }
                        }

                        // Default tab
                        activateTab('overview');

                        // Event listener untuk setiap tombol tab
                        buttons.forEach(button => {
                            button.addEventListener('click', function() {
                                const target = this.getAttribute('data-target');
                                activateTab(target);
                            });
                        });
                    });
                </script>
                <div class="p-4">
                    <p class="poppins-semibold text-2xl text-black">
                        Lokasi
                    </p>
                    <div class="flex justify-start mb-4 mt-2">
                        <a href="/kursus/{{ $data->id }}/rute" target="_blank"
                            class="inline-flex items-center gap-2 px-5 py-2 text-white bg-gradient-to-tr from-[#60BC9D] to-[#12372A] hover:brightness-110 transition-all duration-200 rounded-full shadow-md poppins-medium text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 20l-5.447-2.724A2 2 0 013 15.382V8.618a2 2 0 01.553-1.382L9 4m6 16l5.447-2.724A2 2 0 0021 15.382V8.618a2 2 0 00-.553-1.382L15 4M9 4v16m6-16v16" />
                            </svg>
                            Lihat Rute
                        </a>
                    </div>
                    <p class="poppins-semibold pb-4">{{ $data->nama_kursus }}</p>
                    <p class="pl-4 poppins-regular text-lg text-black" id="lokasi-text">
                        {!! htmlspecialchars_decode(Str::limit(strip_tags($data->lokasi, '<br><p><strong><em>'), 2000, '...')) !!}
                    </p>
                    @if (strlen(strip_tags($data->lokasi)) > 2000)
                        <button id="toggle-lokasi"
                            class="pl-4 text-blue-500 hover:underline poppins-medium text-sm mt-2">
                            Lihat Selengkapnya
                        </button>
                    @endif
                </div>
                {{-- @include('partials.detail.lokasi') --}}
            </div>
        </div>
    </div>



</x-layout>
