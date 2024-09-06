<x-adminlayout>
    <style>
        /* Set the height of the map */
        #map {
            /* Height will be controlled by Tailwind CSS classes */
            max-width: 100%;
        }
    </style>
    <div class="container">
        <div class="py-10 bg-white">
            <div class="bg-[#EBFEA1] poppins-extrabold m-auto flex items-center justify-center p-2">
                <p>Halaman ini berisi Rute menuju ke MANA</p>
            </div>
        </div>
        <div class="pb-10">
            <!-- Apply Tailwind CSS classes for responsive width and height -->
            <div id="map"
                class="w-full h-56 sm:h-64 md:h-96 lg:h-[500px] xl:h-[650px] max-w-4xl rounded-lg shadow-lg"></div>

            <!-- Leaflet JS -->
            <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
            <script>
                // Initialize the map with default center and zoom level
                const map = L.map('map').setView([-7.7523414, 112.1700522], 15); // Latitude and Longitude

                // Add a tile layer from OpenStreetMap
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                // Array to hold markers data from the database
                const markers = [
                        {
                            coords: [,],
                            popupText: '#',
                        },
                ];
                // Add markers to the map
                markers.forEach(marker => {
                    L.marker(marker.coords).addTo(map)
                        .bindPopup(marker.popupText);
                });

                // Function to handle the successful retrieval of the user's location
                function onLocationFound(e) {
                    // Create a custom icon for the user's location
                    const userIcon = L.icon({
                        iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-icon-red.png', // Red marker icon
                        iconSize: [25, 41], // Size of the icon
                        iconAnchor: [12, 41], // Point of the icon which will correspond to marker's location
                        popupAnchor: [1, -34], // Point from which the popup should open relative to the iconAnchor
                    });

                    // Add a marker for the user's location with the custom red icon
                    const userMarker = L.marker(e.latlng, {
                        icon: userIcon
                    }).addTo(map);
                    userMarker.bindPopup("You are here").openPopup();

                    // Center the map on the user's location
                    map.setView(e.latlng, 15);
                }

                // Function to handle the error in retrieving the user's location
                function onLocationError(e) {
                    alert("Unable to retrieve your location.");
                }

                // Request the user's location
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(onLocationFound, onLocationError);
                } else {
                    alert("Geolocation is not supported by this browser.");
                }
            </script>
        </div>
    </div>
</x-adminlayout>
