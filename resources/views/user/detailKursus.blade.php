<x-layout>
    <div class="py-10 bg-white ">
        <div class="bg-[#EBFEA1] container poppins-extrabold m-auto flex items-center justify-center p-2">
            <p>Halaman ini berisi tentang kursus di Pare! </p>
        </div>
    </div>

    <div class="container flex justify-center items-center pb-16">

        <section id="gambarutama">
            <div class="h-auto w-full   ">
                <img src=" {{ asset('storage/' . $data->img) }}" alt="" class="h-auto w-full">
            </div>

        </section>

        {{-- <div id="default-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 md:h-96 overflow-hidden rounded-lg">
                @if (!empty($imageNames) && count($imageNames) > 0)
                    @foreach ($imageNames as $index => $img_konten)
                        <div class="{{ $index === 0 ? 'block' : 'hidden' }} duration-1000 ease-in-out"
                            data-carousel-item>
                            <img src="{{ asset('storage/' . $img_konten) }}" class="w-full h-auto object-contain"
                                alt="Image {{ $index + 1 }}">
                        </div>
                    @endforeach
                @else
                    <div class="block duration-1000 ease-in-out" data-carousel-item>
                        <img src="https://via.placeholder.com/600x400" class="w-full h-auto object-contain"
                            alt="No image available">
                    </div>
                @endif
            </div>

            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                @if (!empty($imageNames) && count($imageNames) > 0)
                    @for ($i = 0; $i < count($imageNames); $i++)
                        <button type="button"
                            class="w-3 h-3 rounded-full {{ $i === 0 ? 'bg-blue-500' : 'bg-gray-300' }}"
                            aria-current="{{ $i === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $i + 1 }}"
                            data-carousel-slide-to="{{ $i }}"></button>
                    @endfor
                @else
                    <button type="button" class="w-3 h-3 rounded-full bg-gray-300" aria-current="true"
                        aria-label="No slides available"></button>
                @endif
            </div>

            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                    <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
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
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                    <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div> --}}
    </div>

    <div class="container">
        <p class="poppins-medium text-3xl xl:text-4xl text-black pb-4">Kampung Inggris LC - Language Center </p>
        <a href="/kursus/{{ $data->id }}/rute" target="_blank"
            class="poppins-regular py-2 px-4 bg-[#4F7F81] text-white rounded-xl text-xl shadow-xl">Rute Terdekat</a>
        <button data-modal-target="default-modal-detail-gambar" data-modal-toggle="default-modal-detail-gambar"
            class="poppins-regular py-2 px-4 bg-[#4F7F81] text-white rounded-xl text-xl shadow-xl">Detail</button>


        <!-- Main modal -->
        <div id="default-modal-detail-gambar" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl xl:max-w-3xl 2xl:max-w-4xl max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="p-4 md:p-5 space-y-4">
                        <div class="relative  overflow-hidden rounded-lg gap-4 space-y-4 ">
                            @if (!empty($imageNames) && count($imageNames) > 0)
                                @foreach ($imageNames as $index => $img_konten)
                                    <div class="border border-slate-300 rounded-md p-4">
                                        <img src="{{ asset('storage/' . $img_konten) }}"
                                            class="w-full h-auto object-contain" alt="Image {{ $index + 1 }}">
                                    </div>
                                @endforeach
                            @else
                                <div class="block duration-1000 ease-in-out" data-carousel-item>
                                    <img src="https://via.placeholder.com/600x400" class="w-full h-auto object-contain"
                                        alt="No image available">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <p class="text-black text-2xl pt-10 xl:pt-16 poppins-semibold">Deskripsi</p>
        <p class="poppins-regular text-black text-2xl pb-2 max-w-7xl">
            {{ $data->deskripsi }}
        </p>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 lg:gap-20 py-10">
            <div class="w-auto  xl:max-w-max space-y-2">
                <p class="poppins-semibold text-2xl text-black underline">
                    Paket
                </p>
                <h1 class="popins-reguler text-2xl text-black">
                    {!! $data->paket !!}
                </h1>
            </div>
            <div class="w-auto xl:max-w-max space-y-2">
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
            <div class="w-auto xl:max-w-max space-y-2">
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
