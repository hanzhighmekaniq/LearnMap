<div class="w-full  mb-10 border p-10 grid grid-cols-1 lg:grid-cols-2 gap-4">
    <!-- Bagian Map - Order pertama di mobile, kedua di lg -->
    <div class="">
        <!-- <a href="/kursus/{{ $data->id }}/rute" target="_blank"> -->
        <div class="aspect-[5/3] min-h-[300px]" id="map">

        </div>
        <!-- </a> -->
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
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
            <button id="toggle-lokasi" class="pl-4 text-blue-500 hover:underline poppins-medium text-sm mt-2">
                Lihat Selengkapnya
            </button>
        @endif

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const lokasiText = document.getElementById("lokasi-text");
                const toggleButton = document.getElementById("toggle-lokasi");

                if (lokasiText && toggleButton) {
                    const fullText = `{!! addslashes($data->lokasi) !!}`;
                    const shortText = `{!! addslashes(
    htmlspecialchars_decode(Str::limit(strip_tags($data->lokasi, '<br><p><strong><em>'), 2000, '...')),
) !!}`;
                    let expanded = false;

                    toggleButton.addEventListener("click", function () {
                        lokasiText.innerHTML = expanded ? shortText : fullText;
                        toggleButton.textContent = expanded ? "Lihat Selengkapnya" : "Sembunyikan";
                        expanded = !expanded;
                    });
                }
            });
        </script>
    </div>
</div>