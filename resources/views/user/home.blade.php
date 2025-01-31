<x-layout>
    <div class="container">

        <div class="py-10 bg-white ">
            <div class="bg-[#EBFEA1] poppins-extrabold m-auto flex items-center justify-center p-2">
                <p>Holaa, Selamat Datang Di LearnMap</p>
            </div>
        </div>

    </div>
    <div class="flex m-auto justify-center items-center responsive-container">
        <img src="{{ asset('img/Rectangle 227.png') }}" class="w-full h-full" alt="">
    </div>
    <div class="pt-8 bg-[#86A7A8]  ">
        <div class="container pb-20">

            <div class="flex justify-between items-center pb-4 ">
                <p class="text-black poppins-semibold text-xl">
                    Kursus Populer
                </p>
                <a href="/kursus" class="py-1 px-4 rounded-full bg-white font-bold text-lg ">
                    Lihat Semua Kursus
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-1 xl:grid-cols-3 gap-8 m-auto justify-center items-center">
                @if ($landingpage->isNotEmpty())
                    @foreach ($landingpage as $landingpage)
                        <div
                            class="w-full h-full bg-white border border-gray-200 rounded-lg transition ease-in-out delay-0 hover:-translate-y-1 hover:scale-100  duration-300">
                            <div class="">
                                <a href="#">
                                    <img class="rounded-lg m-auto flex justify-center items-center w-full h-72 object-cover"
                                        src="{{ asset('storage/' . $landingpage->img) }}" alt="" />
                                </a>
                                <div class="p-5 h-44">
                                    <a href="#">
                                        <h5
                                            class="mb-2 text-2xl poppins-regular font-extrabold  tracking-tight text-gray-900  ">
                                            {{ $landingpage->nama_kursus }}</h5>
                                    </a>
                                    <p class="mb-3 font-normal poppins-regular text-gray-700">
                                        {{ Str::words($landingpage->deskripsi, 30, '...') }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-end justify-end bg-white rounded-b-lg ">
                                <div class="mb-4 mr-4 ">
                                    <a href="/kursus/{{ $landingpage->id }}/detail"
                                        class="inline-flex items-center px-6 py-2 text-sm font-extrabold text-black ring-2 ring-black rounded-full hover:text-white hover:bg-[#4F7F81] hover:ring-[#4F7F81] focus:ring-4 focus:outline-none focus:ring-blue-300">
                                        Lihat
                                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg>
                                    </a>
                                </div>
                            </div>

                        </div>
                    @endforeach
                @else
                    <div class="py-10 flex col-span-3">
                        <div class="bg-[#EBFEA1] w-full poppins-extrabold m-auto flex items-center justify-center p-2">
                            <p>Tidak Tersedia Kursus</p>
                        </div>
                    </div>
                @endif





            </div>
        </div>
    </div>
    <div class="container py-16">
        <p class="text-xl poppins-semibold  ">Tentang Kami</p>
        <div class="grid xl:grid-cols-2 grid-cols-1  ">
            <div class="text-xl poppins-semibold">
                <p class="py-4">
                    Tingkatkan Kemampuan Bahasa Inggris Anda dengan LearnMap!
                </p>
                <p>
                    Selamat datang di LearnMap, aplikasi website Sistem Informasi Geografis bimbingan belajar bahasa
                    Inggris di Kecamatan Pare, yang didirikan dengan semangat memberdayakan individu melalui
                    pengetahuan. Kami menyediakan berbagai kursus berkualitas tinggi, metode belajar menarik, dan
                    akses mudah untuk membantu Anda meningkatkan keterampilan dan mencapai mimpi. Mulailah
                    perjalanan Anda untuk menguasai bahasa Inggris
                </p>
            </div>
            <div class="flex items-center justify-center">
                <img src="{{ asset('img/imgcewe.png') }}" alt="">
            </div>
        </div>
    </div>

</x-layout>
