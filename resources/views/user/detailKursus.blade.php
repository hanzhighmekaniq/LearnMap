<x-layout>
    <div class="py-10 bg-white ">
        <div class="bg-[#EBFEA1] container poppins-extrabold m-auto flex items-center justify-center p-2">
            <p>Halaman ini berisi tentang kursus di Pare! </p>
        </div>
    </div>

    <div class="container flex justify-end items-center pb-16">
        <div id="default-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
                <div class="relative h-48 sm:h-[250px] md:h-[350px] lg:h-[450px] xl:h-[500px] 2xl:h-[600px] overflow-hidden rounded-lg">
                    @foreach ($imageNames as $index => $imageName)
                        <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                            <img src="{{ asset('storage/' . $imageName) }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                    @endforeach

                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                    @for ($i = 0; $i < count($imageNames); $i++)
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="{{ $i === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $i + 1 }}" data-carousel-slide-to="{{ $i }}"></button>
                    @endfor   
                </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30  group-hover:bg-white/50  group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                    <svg class="w-4 h-4 text-white  rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>

            </button>
            <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30  group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white  group-focus:outline-none">
                    <svg class="w-4 h-4 text-white  rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </div>
    <div class="container">
        <p class="poppins-medium text-3xl text-black py-4">Kampung Inggris LC - Language Center </p>
        <button class="poppins-regular py-2 px-4 bg-[#4F7F81] text-white rounded-xl text-xl shadow-xl">Rute
            Terdekat</button>
        <p class="text-black text-2xl py-4 poppins-semibold">Deskripsi</p>
        <p class="poppins-regular text-black text-2xl pb-2 max-w-7xl">
            {{ $data->deskripsi }}
        </p>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-20 py-14">
            
            <div class="max-w-max space-y-2">
                <p class="poppins-semibold text-2xl text-black underline">
                    Paket
                </p>
                <h1 class="popins-reguler text-2xl text-black">
                    {!! $data->paket !!}
                </h1>
            </div>
            <div class="max-w-max space-y-2">
                <p class="poppins-semibold text-2xl text-black underline">
                    Metode Pembelajaran
                </p>
                <h1 class="popins-reguler text-2xl text-black">
                    {!! $data->metode !!}
                </h1>
                <p class="poppins-semibold text-2xl text-black pt-6 underline">
                    Fasilitas
                </p>
                <h1 class="popins-reguler text-2xl text-black">
                    {!! $data->fasilitas !!}
                </h1>
            </div>
            <div class="max-w-max space-y-2">
                <p class="poppins-semibold text-2xl text-black underline">
                    Lokasi
                </p>
                <h1 class="popins-reguler text-2xl text-black">
                    {!! $data->lokasi !!}
                </h1>
            </div>
        </div>
        
    </div>

</x-layout>
