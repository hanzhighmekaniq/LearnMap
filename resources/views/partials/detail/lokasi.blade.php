<div class="w-full  mb-10 border p-10 grid grid-cols-1 lg:grid-cols-2 gap-4">
    <!-- Bagian Map - Order pertama di mobile, kedua di lg -->
    <div class="">
        <div class="aspect-[5/3] min-h-[300px]" id="map"></div>
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const mapElement = document.getElementById('map');
                if (!mapElement) {
                    console.warn("Element dengan ID 'map' tidak ditemukan.");
                    return;
                }

                const map = L.map('map').setView(
                    [{{ $data->latitude ?? '-7.7560717' }}, {{ $data->longitude ?? '112.1823541' }}],
                    15
                );

                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                @if (!empty($data->latitude) && !empty($data->longitude))
                    L.marker([{{ $data->latitude }}, {{ $data->longitude }}]).addTo(map)
                        .bindPopup(`
                            <b>{{ addslashes($data->nama_kursus) }}</b><br>
                            <img class="w-32 h-20 object-cover" src="{{ asset('storage/' . $data->img) }}" alt="{{ addslashes($data->nama_kursus) }}" /><br>
                            <a href="{{ url('/kursus/' . $data->id . '/detail') }}" class="text-blue-500 underline">Selengkapnya</a>
                        `);
                @else
                    L.marker([-7.7560717, 112.1823541]).addTo(map)
                        .bindPopup('<b>Default Marker: Pusat Kota Pare</b>');
                @endif

                // Gunakan whenReady untuk pastikan map siap
                map.whenReady(() => {
                    setTimeout(() => {
                        map.invalidateSize();
                    }, 300); // Lebih responsif
                });
            });
        </script>
    </div>


    <!-- Bagian Lokasi - Order kedua di mobile, pertama di lg -->
    <div class="">
        <p class="poppins-semibold text-2xl text-black ">
            Lokasi
        </p>
        <p class="poppins-semibold pb-4">{{ $data->nama_kursus }}</p>
        <p class="pl-4 poppins-regular text-lg text-black" id="lokasi-text">
            {!! htmlspecialchars_decode(Str::limit(strip_tags($data->lokasi, '<br><p><strong><em>'), 250, '...')) !!}
        </p>
        @if (strlen(strip_tags($data->lokasi)) > 250)
            <button id="toggle-lokasi" class="pl-4 text-blue-500 hover:underline poppins-medium text-sm mt-2">
                Lihat Selengkapnya
            </button>
        @endif

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const lokasiText = document.getElementById("lokasi-text");
                const toggleButton = document.getElementById("toggle-lokasi");

                if (lokasiText && toggleButton) {
                    const fullText = `{!! addslashes($data->lokasi) !!}`;
                    const shortText = `{!! addslashes(
                        htmlspecialchars_decode(Str::limit(strip_tags($data->lokasi, '<br><p><strong><em>'), 250, '...')),
                    ) !!}`;
                    let expanded = false;

                    toggleButton.addEventListener("click", function() {
                        lokasiText.innerHTML = expanded ? shortText : fullText;
                        toggleButton.textContent = expanded ? "Lihat Selengkapnya" : "Sembunyikan";
                        expanded = !expanded;
                    });
                }
            });
        </script>
    </div>
</div>
