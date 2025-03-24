<x-layout>
    <div class="bg-gray-100">

        <!-- Hero Section -->
        <div class="relative">
            <!-- Gambar -->
            <img alt="LearnMap Hero Image" class="w-full object-cover" src="{{ asset('img/bg-home.jpg') }}" />

            <!-- Overlay Teks -->
            <div class="absolute inset-0 flex items-center justify-center pl-8">
                <div class="text-white">
                    <div>
                        <h1 class="text-9xl font-bold mb-4 text-center barlow-condensed-semibold">
                            PARE EDUCATION <br> ENGLISH LANGUAGE
                        </h1>
                        <!-- <p class="text-lg mb-6">
                            Belajar bahasa Inggris dengan metode menarik dan akses mudah di LearnMap.
                        </p> -->
                    </div>
                    <div class="flex justify-center">

                        <a class=" text-white px-6 py-3 rounded-md bg-gradient-to-tr from-[#60BC9D] to-[#12372A]" href="{{route('user.kursus')}}">
                            Jelajahi
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- About Section -->


        <!-- Popular Courses Section -->
        <div class="container mx-auto px-4 py-12">
            <div class=" py-12">
                <div class="flex ">
                    <div class="space-y-4">
                        <h2 class="text-5xl barlow-condensed-semibold text-green-800 font-bold ">
                            TENTANG KAMI
                        </h2>
                        <h2 class="text-start poppins-regular mb-12 text-xl text-gray-600">

                            LearnMap adalah sebuah aplikasi website Sistem Informasi Geografis (SIG) yang dirancang khusus
                            untuk memudahkan Anda menemukan tempat bimbingan belajar bahasa Inggris terbaik di Kecamatan Pare, 
                            Kabupaten Kediri. Kami menyediakan berbagai pilihan kursus berkualitas tinggi dengan tutor berpengalaman, 
                            metode pembelajaran yang interaktif dan menarik, serta akses yang mudah dan cepat melalui platform digital 
                            kami. Dengan LearnMap, Anda dapat menjelajahi informasi lengkap tentang lokasi, program, dan fasilitas 
                            bimbingan belajar, sehingga membantu Anda meningkatkan keterampilan bahasa Inggris secara efektif dan 
                            mewujudkan mimpi Anda untuk menguasai bahasa internasional ini dengan lebih percaya diri.
                        </h2>
                        <div class="flex ">

                            <a class="poppins-regular bg-gradient-to-tr from-[#60BC9D] to-[#12372A] text-white px-6 py-3 rounded-md"
                                href="">
                                Pelajari Lebih Lanjut
                            </a>
                        </div>
                    </div>
                    <img alt="About LearnMap" class="w-auto h-128 object-contain "
                        src="{{ asset('img/tentang kami2.jpg') }}" />
                </div>
            </div>

            <!-- PETA -->
            <div id="" class="container px-4 mt-10 relative z-[1] ">
                <div class="mb-4 flex justify-between">
                    <!-- Section Title -->
                    <div>
                        <p class="text-5xl font-bold text-start mb-4 barlow-condensed-semibold text-green-800">PERSEBARAN KURSUS</p>
                        <h5 class="text-start poppins-regular mb-12 text-xl text-gray-600">Berikut adalah persebaran seluruh wisata saat ini
                        </h5>
                        <div class="p-20 " id="map"></div>
                    </div>
                </div>


                <style>
                    #map {
                        width: 100%;
                        height: 400px;
                        /* Bisa disesuaikan */
                        border-radius: 10px;
                    }
                </style>
                <!-- LEAFLET JS -->
                <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
                    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        // Pastikan elemen "map" ada di dalam HTML
                        var map = L.map('map').setView([51.505, -0.09], 13);

                        // Tambahkan tile layer dari OpenStreetMap
                        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                        }).addTo(map);

                        // Tambahkan marker
                        L.marker([51.5, -0.09]).addTo(map)
                            .bindPopup('<b>Ini Popup</b><br>Anda bisa menyesuaikan teks di sini.')
                            .openPopup();
                    });
                </script>


                <h2 class="text-5xl font-bold text-start mb-4 barlow-condensed-semibold text-green-800">
                    KURSUS POPULER
                </h2>
                <p class="text-start poppins-regular mb-12 text-xl text-gray-600">
                    Pilih kursus yang sesuai dengan kebutuhan Anda
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @if ($landingpage->isNotEmpty())
                        @foreach ($landingpage as $landingpage)
                            <div
                                class="bg-white rounded-lg shadow-md overflow-hidden transition ease-in-out delay-0 hover:-translate-y-1 hover:scale-100 duration-300">
                                <a href="#">
                                    <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $landingpage->img) }}"
                                        alt="{{ $landingpage->nama_kursus }}" />
                                </a>
                                <div class="p-4">
                                    <h3 class="text-xl font-semibold poppins-bold uppercase text-green-800">
                                        {{ $landingpage->nama_kursus }}
                                    </h3>
                                    <p class="mt-2 text-gray-700 poppins-regular text-gray-600">
                                        {{ Str::words($landingpage->deskripsi, 20, '...') }}
                                    </p>
                                    <a class="poppins-regular mt-4 inline-block bg-gradient-to-tr from-[#60BC9D] to-[#12372A] text-white px-4 py-2 rounded-md"
                                        href="/kursus/{{ $landingpage->id }}/detail">
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div
                            class="poppins-regular text-graycol-span-3 py-10 bg-[#EBFEA1] poppins-extrabold flex items-center justify-center p-2">
                            <p>Tidak Tersedia Kursus</p>
                        </div>
                    @endif
                </div>
            </div>


        </div>
</x-layout>