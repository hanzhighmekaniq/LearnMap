<div class="">

</div>

<link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
@vite('resources/css/app.css')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
@stack('script')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>


<div id="map" class="w-full h-full object-cover">
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inisialisasi peta
        var map = L.map('map').setView([-7.7523414, 112.1700522], 13);

        // Menambahkan tile layer dari OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        }).addTo(map);

        // Variabel untuk menyimpan marker lokasi pengguna
        var userMarker;
        if (L.Browser.ielt9) {
            alert('Upgrade your browser, dude!');
        }
        // Cek jika browser mendukung geolocation
        if (navigator.geolocation) {
            // Menemukan lokasi awal pengguna
            map.locate({
                setView: true,
                maxZoom: 16.5
            });

            // Mengatur fungsi callback ketika lokasi ditemukan
            map.on('locationfound', function(e) {
                if (userMarker) {
                    userMarker.setLatLng(e.latlng);
                } else {
                    // Tambahkan marker untuk lokasi pengguna jika belum ada
                    userMarker = L.marker(e.latlng, {
                            interactive: false
                        }).addTo(map)
                        .bindPopup("Lokasi Anda")
                        .openPopup();
                }
                // Pindahkan peta ke lokasi pengguna dengan smooth pan
                map.panTo(e.latlng);

                // Tambahkan marker untuk lokasi tujuan
                var latLng2 = L.latLng({{ $ruteTerdekat->latitude }}, {{ $ruteTerdekat->longitude }});
                L.marker(latLng2, {
                        interactive: false
                    }).addTo(map)
                    .bindPopup("{{ $ruteTerdekat->nama_kursus }}")
                    .openPopup();

                // Tambahkan kontrol routing
                L.Routing.control({
                    waypoints: [e.latlng, latLng2],
                    routeWhileDragging: false, // Nonaktifkan drag
                    collapsible: true, // Kontrol tetap bisa diperlihatkan tapi tidak bisa diubah
                    createMarker: function() {
                        return null;
                    } // Tidak membuat marker tambahan
                }).addTo(map);
            });

            L.Control.CustomControl = L.Control.extend({
                onAdd: function(map) {
                    var div = L.DomUtil.create('div', 'custom-control');
                    div.innerHTML = '<p class="p-4" >Kontrol Kustom</p>';
                    return div;
                },
                onRemove: function(map) {
                    // nothing to do here
                }
            });
            L.control.customControl = function(opts) {
                return new L.Control.CustomControl(opts);
            }
            L.control.customControl({
                position: 'topleft'
            }).addTo(map);
            // Tangani error jika geolocation tidak tersedia
            map.on('locationerror', function(e) {
                console.error("Geolocation error: " + e.message);
                // Informasikan pengguna jika terjadi kesalahan
                L.popup()
                    .setLatLng([-7.7523414, 112.1700522])
                    .setContent("Unable to retrieve your location.")
                    .openOn(map);
            });

        } else {
            // Informasikan pengguna jika geolocation tidak didukung
            L.popup()
                .setLatLng([-7.7523414, 112.1700522])
                .setContent("Geolocation is not supported by this browser.")
                .openOn(map);
        }
    });
</script>

</div>
