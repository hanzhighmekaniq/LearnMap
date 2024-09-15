<x-adminlayout>
    <div class="w-full pt-10 pb-6 px-6">
        <div class="flex flex-col rounded-2xl overflow-hidden bg-white">
            <!-- Bagian atas menampilkan satu gambar secara acak -->
            <div class="relative">
                @if ($randomLandingPage)
                    @if ($randomLandingPage->img)
                        <div class="relative group">
                            <img src="{{ asset('storage/' . $randomLandingPage->img) }}"
                                class="object-cover w-full max-h-[600px] rounded-2xl" alt="Gambar">
                            <div
                                class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <p class="text-white text-lg font-semibold">{{ $randomLandingPage->nama_kursus }}</p>
                            </div>
                        </div>
                    @else
                        <div class="flex items-center justify-center h-[600px] bg-gray-200 rounded-t-2xl">
                            <p class="text-gray-600">Tidak ada gambar yang tersedia.</p>
                        </div>
                    @endif
                @else
                    <div class="py-10 flex col-span-3">
                        <div class="bg-[#EBFEA1] w-full poppins-extrabold m-auto flex items-center justify-center p-2">
                            <p>Tidak Tersedia Kursus</p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Bagian bawah menampilkan maksimal 6 gambar secara acak -->
            <div class="py-4">
                <div class="grid grid-cols-5 gap-4">
                    @if ($randomLandingPages->isNotEmpty())
                        @foreach ($randomLandingPages as $page)
                            <div
                                class="relative group rounded-lg overflow-hidden shadow-md transition-transform transform hover:scale-105">
                                <img src="{{ asset('storage/' . $page->img) }}" class="object-cover w-full h-full"
                                    alt="">
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                    <p class="text-white text-lg font-semibold">{{ $page->nama_kursus }}</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="py-10 flex col-span-2 sm:col-span-3 md:col-span-4 lg:col-span-5">
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
