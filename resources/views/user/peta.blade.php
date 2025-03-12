<x-layout>
    <style>
        #map1 {
            max-width: 100%;
        }
    </style>
    <div class="container flex flex-col">
        <div class="py-10 bg-white">
            <div class="bg-[#EBFEA1] poppins-extrabold m-auto flex items-center justify-center p-2">
                <p>Halaman ini berisi tentang kursus di Pare!</p>
            </div>
        </div>
        <div class="pb-10">
            <!-- Peta Leaflet -->
            <div id="map1"
                class="w-full h-56 sm:h-64 md:h-96 lg:h-[500px] xl:h-[650px] max-w-4xl rounded-lg shadow-lg"></div>
        </div>
    </div>

    <!-- Leaflet CSS dan JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <!-- Flowbite JS -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi peta dengan koordinat dan tingkat zoom
            const map = L.map('map1').setView([-7.7517397, 112.1780461],
                15); // Gunakan 'map1' untuk ID peta yang sesuai

            // Tambahkan lapisan ubin dari OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Menambahkan marker secara dinamis dengan data dari Blade
            @foreach ($latilongti as $latilongti)
                L.marker([{{ $latilongti->latitude }}, {{ $latilongti->longitude }}])
                    .addTo(map)
                    .bindPopup(
                        '<div class="h-auto w-full">' +
                        '<img src="{{ asset('storage/' . $latilongti->img) }}" alt="" class="w-full h-20 object-contain">' +
                        '</div>' +
                        '<p>' +
                        '{{ $latilongti->nama_kursus }} <br>' +

                        '<a href="/kursus/{{ $latilongti->id }}/detail">Selengkapnya</a>'
                    )
                    .openPopup();
            @endforeach


        });
    </script>
</x-layout>
