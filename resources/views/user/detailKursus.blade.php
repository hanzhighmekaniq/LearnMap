<x-layout>
    {{-- @include('partials.detail.lokasi') --}}

    @if (session('error'))
        <div
            class="fixed top-5 left-1/2 transform -translate-x-1/2 bg-red-500 text-white px-6 py-3 rounded-md shadow-lg z-50">
            {{ session('error') }}
        </div>
    @endif
    @error('rating')
        <div
            class="fixed top-5 left-1/2 transform -translate-x-1/2 bg-red-500 text-white px-6 py-3 rounded-md shadow-lg z-50">
            {{ $message }}
        </div>
    @enderror

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
        <div id="overview"
            class="tab-content relative opacity-100 pointer-events-auto visible transition-all duration-300">
            @include('partials.detail.deskripsi')
        </div>

        <!-- Tab Paket -->
        <div id="paket"
            class="tab-content absolute opacity-0 pointer-events-none invisible transition-all duration-300">
            @include('partials.detail.paket')
        </div>

        <!-- Tab Metode -->
        <div id="metode"
            class="tab-content absolute opacity-0 pointer-events-none invisible transition-all duration-300">
            @include('partials.detail.metode')
        </div>

        <!-- Tab Lokasi -->
        <div id="lokasi"
            class="tab-content absolute opacity-0 pointer-events-none invisible transition-all duration-300">
            <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
            <link rel="stylesheet" href="node_modules/leaflet/dist/leaflet.css">

            <div class="p-4">
                <div id="map-id" class="h-96 lg:h-[500px]" ></div>
            </div>

            <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

            <script>
                // Fungsi untuk menginisialisasi peta jika belum ada
                let myMap;

                function initializeMap() {
                    if (!myMap) {
                        myMap = L.map('map-id').setView([-7.7956, 110.3695], 13); // Posisi awal map

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
                        const marker = L.marker([-7.7956, 110.3695], {
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
                            content.classList.add('invisible', 'opacity-0', 'absolute', 'pointer-events-none');
                            content.classList.remove('relative', 'opacity-100', 'pointer-events-auto', 'visible');
                        });

                        buttons.forEach(btn => {
                            btn.classList.remove('bg-gradient-to-tr', 'from-[#60BC9D]', 'to-[#12372A]',
                                'ring-white', 'scale-105');
                            btn.classList.add('bg-white/10', 'backdrop-blur');
                        });

                        const targetContent = document.getElementById(targetId);
                        if (targetContent) {
                            targetContent.classList.remove('invisible', 'opacity-0', 'absolute', 'pointer-events-none');
                            targetContent.classList.add('relative', 'opacity-100', 'pointer-events-auto', 'visible');
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

            @include('partials.detail.lokasi')
        </div>
    </div>




</x-layout>
