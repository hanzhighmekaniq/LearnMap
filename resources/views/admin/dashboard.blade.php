<x-adminlayout>
    <div class="w-full pt-4 pb-6 px-4">
        <div class="flex flex-col rounded-2xl overflow-hidden bg-white">
            <!-- Bagian atas menampilkan satu gambar secara acak -->
            <div class="relative">
                <div class="flex m-auto justify-center items-center responsive-container">
                    <img src="{{ asset('img/bg-home.jpg') }}" class="w-full h-full" alt="">
                </div>
            </div>

            <!-- Bagian bawah menampilkan maksimal 6 gambar secara acak -->
            <div class="py-2">
                <div class="grid grid-cols-3 lg:grid-cols-6 gap-2 justify-center items-center">
                    @if ($randomLandingPages->isNotEmpty())
                        @foreach ($randomLandingPages as $page)
                            <div
                                class="relative group rounded-lg overflow-hidden shadow-md transition-transform transform hover:scale-105">
                                <img src="{{ asset('storage/' . $page->img) }}"
                                    class="object-cover w-full h-24 lg:h-56" alt="">
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                    <p class="text-white text-lg font-semibold">{{ $page->nama_kursus }}</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="py-10 flex justify-center items-center col-span-6">
                            <div
                                class="bg-[#EBFEA1] w-full poppins-extrabold m-auto flex items-center justify-center p-2">
                                <p>Tidak Tersedia Kursus</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-adminlayout>
