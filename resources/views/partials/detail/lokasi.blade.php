

<div class="w-full mb-10 border p-10 grid grid-cols-1 lg:grid-cols-2 gap-4">
    <div class="">
        <p class="poppins-semibold text-2xl text-black">
            Lokasi
        </p>
        <div class="flex justify-start mb-4 mt-2">
            <a href="/kursus/{{ $data->id }}/rute" target="_blank"
                class="inline-flex items-center gap-2 px-5 py-2 text-white bg-gradient-to-tr from-[#60BC9D] to-[#12372A] hover:brightness-110 transition-all duration-200 rounded-full shadow-md poppins-medium text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 20l-5.447-2.724A2 2 0 013 15.382V8.618a2 2 0 01.553-1.382L9 4m6 16l5.447-2.724A2 2 0 0021 15.382V8.618a2 2 0 00-.553-1.382L15 4M9 4v16m6-16v16" />
                </svg>
                Lihat Rute
            </a>
        </div>
        <p class="poppins-semibold pb-4">{{ $data->nama_kursus }}</p>
        <p class="pl-4 poppins-regular text-lg text-black" id="lokasi-text">
            {!! htmlspecialchars_decode(Str::limit(strip_tags($data->lokasi, '<br><p><strong><em>'), 2000, '...')) !!}
        </p>
        @if (strlen(strip_tags($data->lokasi)) > 2000)
            <button id="toggle-lokasi" class="pl-4 text-blue-500 hover:underline poppins-medium text-sm mt-2">
                Lihat Selengkapnya
            </button>
        @endif
    </div>
</div>
