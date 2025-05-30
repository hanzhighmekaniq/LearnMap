<x-layout>
    <div class="bg-gray-100">

        <!-- Hero Section -->
        <div class="relative">
            <!-- Gambar -->
            <img alt="LearnMap Hero Image"
                class="h-[420px] sm:h-[450px] md:h-[480px] lg:h-[545px] xl:h-[645px] 2xl:h-[945px] brightness-100 w-full object-cover "
                src="{{ asset('img/bg-home.jpg') }}">
            <!-- Overlay Teks -->
            <div
                class="absolute inset-0 flex items-center justify-center mb-14 sm:mb-14 md:mb-20 lg:mb-32 xl:mb-44 2xl:mb-72">
                <div class="text-white">
                    <div>
                        <h1 class="  text-green-600 text-5xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl 2xl:text-9xl
           font-bold text-center barlow-condensed-semibold drop-shadow-lg"
                            style="text-shadow: 2px 2px 4px white;">
                            PARE EDUCATION <br> ENGLISH LANGUAGE
                        </h1>

                        <p
                            class="px-4 container text-xs sm:text-sm md:text-md lg:text-base xl:text-xl 2xl:text-2xl text-center text-green-700 font-weight-bold poppins-bold mb-2  xl:mb-6 barlow-condensed-semibold drop-shadow-lg">
                            Belajar bahasa Inggris dengan metode menarik dan akses mudah di LearnMap.
                        </p>
                    </div>
                    <div class="flex justify-center">
                        <a class="text-white text-xs sm:text-xs md:text-base xl:text-2xl uppercase barlow-condensed-semibold px-4 py-1 xl:px-8 xl:py-2 rounded-md xl:rounded-xl bg-gradient-to-tr from-[#60BC9D] to-[#12372A]"
                            href="{{ route('user.kursus') }}">
                            Jelajahi
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <!-- About Section -->


        <!-- Popular Courses Section -->
        <div class="container px-4 space-y-8 lg:space-y-12 2xl:space-y-20 py-10 xl:py-16">
            {{-- Tentang Kami --}}
            <div class="">
                <div class="flex ">
                    <div class="">
                        <h2
                            class="text-2xl lg:text-3xl 2xl:text-5xl barlow-condensed-semibold text-green-800 font-bold mb-1">
                            TENTANG KAMI
                        </h2>
                        <h2
                            class="text-start poppins-regular text-xs lg:text-base 2xl:text-xl text-gray-600 mb-2 lg:mb-6">

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
                    {{-- <img alt="About LearnMap" class="w-auto h-128 object-contain "
                        src="{{ asset('img/img/tentang kami.jpg') }}" /> --}}
                </div>
            </div>

            <!-- PETA -->
            <div id="" class=" relative z-[1] ">
                <div class=" flex justify-between">
                    <!-- Section Title -->
                    <div class="w-full ">
                        <p
                            class="text-2xl lg:text-3xl 2xl:text-5xl font-bold text-start barlow-condensed-semibold text-green-800">
                            PERSEBARAN KURSUS</p>
                        <h5 class="text-start poppins-regular mb-4 text-xs lg:text-base 2xl:text-xl text-gray-600">
                            Berikut adalah persebaran
                            seluruh wisata saat ini
                        </h5>
                        <div class="aspect-[5/3] lg:aspect-[5/2]" id="map"></div>
                    </div>
                </div>



                <!-- LEAFLET JS -->
                <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
                    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const mapElement = document.getElementById('map');
                        if (!mapElement) {
                            console.warn("Element dengan ID 'map' tidak ditemukan.");
                            return;
                        }

                        // Tentukan zoom level berdasarkan ukuran layar
                        let zoomLevel = 15; // default
                        const width = window.innerWidth;

                        if (width < 640) { // sm
                            zoomLevel = 13;
                        } else if (width < 768) { // md
                            zoomLevel = 13.5;
                        } else if (width < 1024) { // lg
                            zoomLevel = 14;
                        } else if (width < 1280) { // xl
                            zoomLevel = 14.5;
                        } else { // 2xl dan ke atas
                            zoomLevel = 15;
                        }

                        // Inisialisasi Leaflet map
                        const map = L.map('map').setView([-7.7560717, 112.1823541], zoomLevel);

                        // Tambahkan tile layer
                        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                        }).addTo(map);

                        // Tambahkan marker dari database jika ada data
                        @if ($peta->isNotEmpty())
                            @foreach ($peta as $latlong)
                                L.marker([{{ $latlong->latitude }}, {{ $latlong->longitude }}]).addTo(map)
                                    .bindPopup(`
                                            <b>{{ addslashes($latlong->nama_kursus) }}</b> <br>
                                            <img class="w-32 h-20 object-cover" src="{{ asset('storage/' . $latlong->img) }}" alt="{{ addslashes($latlong->nama_kursus) }}" /> <br>
                                            <a href="{{ url('/kursus/' . $latlong->id . '/detail') }}" class="text-blue-500 underline">Selengkapnya</a>
                                        `);
                            @endforeach
                        @else
                            // Jika tidak ada data, tambahkan titik default
                            L.marker([-7.7560717, 112.1823541]).addTo(map)
                                .bindPopup('<b>Default Marker: Pusat Kota Pare</b>');
                        @endif

                        // Pastikan peta menyesuaikan ukuran container
                        setTimeout(() => {
                            map.invalidateSize();
                        }, 500);
                    });
                </script>






            </div>
            {{-- Kursus Populer --}}
            <div>

                <h2
                    class="text-2xl lg:text-3xl 2xl:text-5xl font-bold text-start barlow-condensed-semibold text-green-800">
                    KURSUS POPULER
                </h2>
                <p class="text-start poppins-regular mb-4 text-xs lg:text-base 2xl:text-xl text-gray-600">
                    Pilih kursus yang sesuai dengan kebutuhan Anda
                </p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @if ($landingpage->isNotEmpty())
                        @foreach ($landingpage as $landingpage)
                            <div
                                class="bg-white rounded-lg shadow-md overflow-hidden transition ease-in-out delay-0 hover:-translate-y-1 hover:scale-100 duration-300 h-full flex flex-col">
                                <a href="#">
                                    <img class="w-full h-48 object-cover"
                                        src="{{ asset('storage/' . $landingpage->img) }}"
                                        alt="{{ $landingpage->nama_kursus }}" />
                                </a>
                                <div class="p-4 flex flex-col flex-grow ">
                                    <h3
                                        class="text-base lg:text-lg 2xl:text-xl font-semibold poppins-bold uppercase text-green-800">
                                        {{ $landingpage->nama_kursus }}
                                    </h3>
                                    <p
                                        class="pb-8 text-xs lg:text-sm 2xl:text-base text-gray-700 poppins-regular flex-grow">
                                        {{ Str::words($landingpage->deskripsi, 20, '...') }}
                                    </p>
                                    <a class="poppins-regular mt-auto inline-block bg-gradient-to-tr from-[#60BC9D] to-[#12372A] text-white  py-2 lg:py-3 rounded-md text-center text-sm lg:text-base"
                                        href="/kursus/{{ $landingpage->id }}/detail">
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div
                            class="col-span-3 py-10 bg-[#EBFEA1] poppins-extrabold flex items-center justify-center p-2">
                            <p>Tidak Tersedia Kursus</p>
                        </div>
                    @endif
                </div>


            </div>
        </div>
</x-layout>
