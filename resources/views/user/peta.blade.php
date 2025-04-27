<x-layout>
    <style>
        #map1 {
            max-width: 100%;
        }
    </style><!-- Leaflet CSS dan JS -->

    <div class="container py-14 px-4">
        <div class="py-10 lg:py-16 2xl:py-20">
            <!-- Peta Leaflet -->
            <div id="map1"
                class="w-full h-56 sm:h-64 md:h-96 lg:h-[500px] xl:h-[650px] max-w-4xl rounded-lg shadow-lg"></div>
        </div>
        <div class="">
            <h2 class="text-2xl lg:text-3xl 2xl:text-5xl barlow-condensed-semibold text-green-800 font-bold mb-1">
                PETA LEARN-MAP
            </h2>
            <h2 class="text-start poppins-regular text-xs lg:text-base 2xl:text-xl text-gray-600 mb-2 lg:mb-6">

                LearnMap adalah sebuah aplikasi website Sistem Informasi Geografis (SIG) yang dirancang
                khusus
                untuk memudahkan Anda menemukan tempat bimbingan belajar bahasa Inggris terbaik di Kecamatan
                Pare,
                Kabupaten Kediri. Kami menyediakan berbagai pilihan kursus berkualitas tinggi dengan tutor
                berpengalaman,
                metode pembelajaran yang interaktif dan menarik, serta akses yang mudah dan cepat melalui
                platform digital
                kami. Dengan LearnMap, Anda dapat menjelajahi informasi lengkap tentang lokasi, program, dan
                fasilitas
                bimbingan belajar, sehingga membantu Anda meningkatkan keterampilan bahasa Inggris secara
                efektif dan
                mewujudkan mimpi Anda untuk menguasai bahasa internasional ini dengan lebih percaya diri.
            </h2>
            <div class="flex">

                <a class="text-xs lg:text-sm 2xl:text-lg poppins-regular bg-gradient-to-tr from-[#60BC9D] to-[#12372A] text-white px-4 py-2 2xl:px-6 2xl:py-3 rounded-md"
                    href="">
                    Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Pastikan elemen "map1" ada sebelum inisialisasi
            var mapElement = document.getElementById('map1');
            if (!mapElement) {
                console.warn("Elemen dengan ID 'map1' tidak ditemukan.");
                return;
            }

            // Inisialisasi Leaflet Map
            const map = L.map('map1').setView([-7.7560717, 112.1823541], 15);

            // Tambahkan tile layer dari OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: ''
            }).addTo(map);

            // Tambahkan marker dari data Blade
            @foreach ($latilongti as $data)
                L.marker([{{ $data->latitude }}, {{ $data->longitude }}]).addTo(map)
                    .bindPopup(`
                        <div class="h-auto w-full">
                            <img src="{{ asset('storage/' . $data->img) }}" alt="{{ addslashes($data->nama_kursus) }}" class="w-full h-20 object-contain">
                        </div>
                        <p>
                            <b>{{ addslashes($data->nama_kursus) }}</b> <br>
                            <a href="{{ url('/kursus/' . $data->id . '/detail') }}" class="text-blue-500 underline">Selengkapnya</a>
                        </p>
                    `);
            @endforeach
        });
    </script>

</x-layout>
