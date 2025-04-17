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

    <div class="flex justify-center items-center p-4 pt-20 md:pt-4">
        <div class="h-auto w-full relative ">
            <img src="{{ asset('storage/' . $data->img) }}" alt=""
                class="aspect-[4/3] lg:aspect-[655px] 2xl:h-[895px] w-full object-cover brightness-75  rounded-2xl">
            <figcaption class="container w-full">

                <div
                    class="absolute container bottom-4 lg:bottom-12 left-1/2 transform -translate-x-1/2 space-y-10 text-center px-4">
                    <p class="poppins-bold text-start text-4xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl 2xl:text-8xl text-green-800 pr-16 w-3/4 xl:w-1/2"
                        style="text-shadow: 2px 2px 4px white;">
                        {{ $data->nama_kursus }}
                    </p>


                    <div class="flex justify-between w-full text-white text-[10px] lg:text-sm" id="tab-buttons">
                        <button data-target="overview"
                            class="tab-btn px-8 py-1.5 sm:px-12 md:px-16 sm:py-2 2xl:px-20 xl:py-3 poppins-regular border-white border-2 rounded-3xl bg-white/10 backdrop-blur">Deskripsi</button>
                        <button data-target="paket"
                            class="tab-btn px-8 py-1.5 sm:px-12 md:px-16 sm:py-2 2xl:px-20 xl:py-3 poppins-regular border-white border-2 rounded-3xl bg-white/10 backdrop-blur">Paket</button>
                        <button data-target="metode"
                            class="tab-btn px-8 py-1.5 sm:px-12 md:px-16 sm:py-2 2xl:px-20 xl:py-3 poppins-regular border-white border-2 rounded-3xl bg-white/10 backdrop-blur">Metode</button>
                        <button data-target="lokasi"
                            class="tab-btn px-8 py-1.5 sm:px-12 md:px-16 sm:py-2 2xl:px-20 xl:py-3 poppins-regular border-white border-2 rounded-3xl bg-white/10 backdrop-blur">Lokasi</button>
                    </div>


                </div>
            </figcaption>
        </div>
    </div>
    <div class="container px-0 lg:px-4">
        <div id="overview" class="tab-content">
            @include('partials.detail.deskripsi')
        </div>
        <div id="paket" class="tab-content hidden">
            @include('partials.detail.paket')
        </div>
        <div id="metode" class="tab-content hidden">
            @include('partials.detail.metode')
        </div>
        <div id="lokasi" class="tab-content hidden">
            @include('partials.detail.lokasi')
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const buttons = document.querySelectorAll('.tab-btn');
                const contents = document.querySelectorAll('.tab-content');

                function activateTab(targetId) {
                    // Sembunyikan semua konten
                    contents.forEach(content => content.classList.add('hidden'));

                    // Reset semua tombol
                    buttons.forEach(btn => {
                        btn.classList.remove('bg-gradient-to-tr', 'from-[#60BC9D]', 'to-[#12372A]',
                            'ring-white', 'scale-105');
                        btn.classList.add('bg-white/10', 'backdrop-blur');
                    });

                    // Tampilkan konten sesuai target
                    const targetContent = document.getElementById(targetId);
                    if (targetContent) targetContent.classList.remove('hidden');

                    // Aktifkan tombol terkait
                    const activeButton = document.querySelector(`.tab-btn[data-target="${targetId}"]`);
                    if (activeButton) {
                        activeButton.classList.remove('bg-white/10', 'backdrop-blur');
                        activeButton.classList.add('bg-gradient-to-tr', 'from-[#60BC9D]', 'to-[#12372A]',
                            'ring-white', 'scale-105');
                    }
                }

                // Default tab
                activateTab('overview');

                // Tambahkan event ke semua tombol
                buttons.forEach(button => {
                    button.addEventListener('click', function() {
                        const target = this.getAttribute('data-target');
                        activateTab(target);
                    });
                });
            });
        </script>


    </div>
    {{-- @include('partials.detail.deskripsi') --}}
</x-layout>
