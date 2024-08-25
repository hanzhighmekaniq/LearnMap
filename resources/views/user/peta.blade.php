<x-layout>
    <style>
        /* Set the height of the map */
        #map {
            height: 500px;
            /* Adjust the height as needed */
            max-width: 100%;
        }
    </style>
    <div class="container">
        <div class="py-10 bg-white">
            <div class="bg-[#EBFEA1] poppins-extrabold m-auto flex items-center justify-center p-2">
                <p>Halaman ini berisi tentang kursus di Pare!</p>
            </div>
        </div>
        <div class="pb-10">
            <div id="map" class="w-full max-w-4xl rounded-lg shadow-lg"></div>

            <!-- Leaflet JS -->
            <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
            <script>
                // Initialize the map
                const map = L.map('map').setView([-7.7530273, 112.1816449], 15); // Latitude and Longitude

                // Add a tile layer (OpenStreetMap)
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                // Manually add markers with fixed coordinates
                const markers = [{
                        coords: [-7.7530273, 112.1816449],
                        popupText: 'Kampung Inggris LC'
                    },
                    {
                        coords: [-7.7529288, 112.1838178],
                        popupText: 'OKE'
                    },
                    {
                        coords: [-7.7540000, 112.1800000],
                        popupText: 'Lokasi Baru 1'
                    },
                    {
                        coords: [-7.7510000, 112.1850000],
                        popupText: 'Lokasi Baru 2'
                    }
                ];

                markers.forEach(marker => {
                    L.marker(marker.coords).addTo(map)
                        .bindPopup(marker.popupText);
                });
            </script>
        </div>
    </div>
</x-layout>
