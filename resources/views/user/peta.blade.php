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
            const map = L.map('map1').setView([-8.1675862,113.68492], 13); // Gunakan 'map1' untuk ID peta yang sesuai

            // Tambahkan lapisan ubin dari OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Menambahkan marker secara dinamis dengan data dari Blade
            @foreach ($latilongti as $latilongti)
                L.marker([{{ $latilongti->latitude }}, {{ $latilongti->longitude }}])
                    .addTo(map)
                    .bindPopup('<a href="/kursus/{{ $latilongti->id }}/detail"><b>{{ $latilongti->nama_kursus }}</b><br>Location: {{ $latilongti->latitude }}, {{ $latilongti->longitude }}')
                    .openPopup();
            @endforeach
        });
    </script>
</x-layout>




{{-- <x-layout>
    <style>
        #map {
            height: 400px;
            /* Tinggi default */
            max-width: 100%;
        }
    </style>
    <div class="container flex">
        <div class="py-10 bg-white">
            <div class="bg-[#EBFEA1] poppins-extrabold m-auto flex items-center justify-center p-2">
                <p>Halaman ini berisi tentang kursus di Pare!</p>
            </div>
        </div>
        <div class="pb-10">
            <div id="map"
                class="w-full h-56 sm:h-64 md:h-96 lg:h-[500px] xl:h-[650px] max-w-4xl rounded-lg shadow-lg"></div>
        </div>
    </div>

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        const map = L.map('map').setView([-7.7523414, 112.1700522], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        const markers = [
            @foreach ($latilongti as $latilongti)
                {
                    // coords: [{{ $latilongti->latitude }}, {{ $latilongti->longitude }}],
                    // popupText: '{{ $latilongti->nama_kursus }}',
                    // href: '{{ route('admin.dataKursus') }}'


                    coords: [-8.1537943,113.7333205],
                    popupText: 'anjai',
                    href: '#'
                },
            @endforeach
        ];

        markers.forEach(marker => {
            L.marker(marker.coords).addTo(map).bindPopup(marker.popupText);
        });

        function onLocationFound(e) {
            const userIcon = L.icon({
                iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-icon-red.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34]
            });

            const userMarker = L.marker(e.latlng, {
                icon: userIcon
            }).addTo(map);
            userMarker.bindPopup("You are here").openPopup();

            map.setView(e.latlng, 15);
        }

        function onLocationError(e) {
            alert("Unable to retrieve your location.");
        }

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(onLocationFound, onLocationError);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    </script>
</x-layout> --}}
