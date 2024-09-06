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
                <p class="text-black poppins-semibold">
                    Kursus Populer
                </p>
                <a href="/kursus" class="py-1 px-4 rounded-full bg-white ">
                    Lihat Semua Kursus
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 m-auto justify-center items-center">
                @foreach ($landingpage as $landingpage)
                    <div class="max-w-max bg-white border border-gray-200 rounded-lg shadow ">
                        <a href="#">
                            <img class="rounded-lg m-auto flex justify-center items-center w-full max-h-64 object-cover"
                                src="{{ asset('storage/' . $landingpage->img) }}" alt="" />
                        </a>
                        <div class="p-5">
                            <a href="#">
                                <h5
                                    class="mb-2 text-2xl poppins-regular font-extrabold  tracking-tight text-gray-900  ">
                                    {{ $landingpage->nama_kursus }}</h5>
                            </a>
                            <p class="mb-3 font-normal poppins-regular text-gray-700">
                                {{ Str::words($landingpage->deskripsi, 30, '...') }}
                            </p>



                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="w-4 h-4 text-gray-300 me-1 " aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <p class="ms-1 text-sm text-gray-500 ">4.95</p>
                                <p class="ms-1 text-sm text-gray-500 ">out of</p>
                                <p class="ms-1 text-sm text-gray-500 ">5</p>
                            </div>
                            <div class="flex justify-end">
                                <a href="/kursus/{{ $landingpage->id }}/detail"
                                    class="inline-flex items-center px-6 font-extrabold py-2 text-sm text-center ring-2 text-black ring-black  hover:text-white hover:bg-[#4F7F81] hover:ring-[#4F7F81] rounded-full  focus:ring-4 focus:outline-none focus:ring-blue-300 -700 ue-800">
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



            </div>
        </div>
    </div>
    <div class="container py-10">
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
    <div class="container">
        <p class="py-4 pl-2">Ulasan</p>
        <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 pb-10">
            <div class="rounded-xl border-black border-[1px] p-4 ">
                <img src="{{ asset('img/petik.png') }}" alt="">
                <p class="">
                    Peta interaktifnya sangat membantu!
                </p>
                <p class="">
                    Salma
                </p>
            </div>
            <div class="rounded-xl border-black border-[1px] p-4 ">
                <img src="{{ asset('img/petik.png') }}" alt="">
                <p class="">
                    Peta interaktifnya sangat membantu!
                </p>
                <p class="">
                    Salma
                </p>
            </div>
        </div>
    </div>
</x-layout>
