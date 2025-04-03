<x-layout>
    @if (session('error'))
        <div
            class="fixed top-5 left-1/2 transform -translate-x-1/2 bg-red-500 text-white px-6 py-3 rounded-md shadow-lg z-50">
            {{ session('error') }}
        </div>
    @endif
    @error('rating')
        <div
            class="fixed top-5 left-1/2 transform -translate-x-1/2 bg-red-500 text-white px-6 py-3 rounded-md shadow-lg z-50">
            {{ $message }}
        </div>
    @enderror

    <div class="flex justify-center items-center p-4">
        <div class="h-auto w-full relative ">
            <img src="{{ asset('storage/' . $data->img) }}" alt=""
                class="aspect-[4/2] w-full object-cover rounded-2xl">
            <figcaption class="container w-full">

                <div class="absolute container bottom-12 left-1/2 transform -translate-x-1/2 space-y-10 text-center">
                    <p class="poppins-bold text-start text-6xl xl:text-8xl text-white pr-16 w-1/2">
                        {{ $data->nama_kursus }}
                    </p>
                    <div class="flex justify-start space-x-4">
                        <a href="/kursus/{{ $data->id }}/rute" target="_blank"
                            class="poppins-medium py-3 px-8 bg-[#4F7F81] text-white rounded-xl text-sm shadow-xl">Rute
                            Terdekat</a>
                        <button data-modal-target="default-modal-detail-gambar"
                            data-modal-toggle="default-modal-detail-gambar"
                            class="poppins-medium py-3 px-8 bg-[#4F7F81] text-white rounded-xl text-sm shadow-xl">Foto
                            Detail</button>
                    </div>
                    <div class="flex justify-between w-full text-white">
                        <button
                            class="px-20 py-3 poppins-regular bg-gradient-to-tr from-[#60BC9D] to-[#12372A] rounded-3xl">Deskripsi</button>
                        <button
                            class="px-20 py-3 poppins-regular bg-gradient-to-tr from-[#60BC9D] to-[#12372A] rounded-3xl">Paket</button>
                        <button
                            class="px-20 py-3 poppins-regular bg-gradient-to-tr from-[#60BC9D] to-[#12372A] rounded-3xl">Metode</button>
                        <button
                            class="px-20 py-3 poppins-regular bg-gradient-to-tr from-[#60BC9D] to-[#12372A] rounded-3xl">Fasilitas</button>
                        <button
                            class="px-20 py-3 poppins-regular bg-gradient-to-tr from-[#60BC9D] to-[#12372A] rounded-3xl">Lokasi</button>
                    </div>
                </div>
            </figcaption>
        </div>
    </div>

    @include('partials.detail.deskripsi')
</x-layout>
