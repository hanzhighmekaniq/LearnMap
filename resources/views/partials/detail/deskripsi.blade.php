<div class="container">





    <div class="grid grid-cols-2">


        <div>
            <div class="text-black poppins-medium font-semibold pb-2 text-2xl pt-4 poppins-semibold">
                <p>Deskripsi</p>
            </div>
            <div>
                <p class="poppins-regular text-black text-lg pb-2" id="deskripsi-text">
                    {{ Str::limit($data->deskripsi, 500, '...') }}
                </p>
                @if (strlen($data->deskripsi) > 500)
                    <button id="toggle-deskripsi" class="text-blue-500 hover:underline poppins-medium text-sm mt-2">
                        Lihat Selengkapnya
                    </button>
                @endif
            </div>
        </div>
        <div>

        </div>
    </div>
    {{-- Bagian Fasilitas --}}
    <div class="w-auto xl:max-w-max space-y-4">
        <p class="poppins-semibold font-semibold text-2xl text-black underline">
            Fasilitas
        </p>
        <p class="pl-4 poppins-regular text-lg text-black" id="fasilitas-text">
            {!! htmlspecialchars_decode(Str::limit(strip_tags($data->fasilitas, '<br><p><strong><em>'), 250, '...')) !!}
        </p>
        @if (strlen(strip_tags($data->fasilitas)) > 250)
            <button id="toggle-fasilitas" class="pl-4 text-blue-500 hover:underline poppins-medium text-sm mt-2">
                Lihat Selengkapnya
            </button>
        @endif
    </div>


</div>
