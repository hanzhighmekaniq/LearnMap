<x-adminlayout>
    <div class="container">
        <div class="py-10">
            <div class="pb-4 flex">
                <a class="px-4 flex text-white text-lg justify-center items-center py-2 rounded-xl bg-[#4F7F81]"
                    href="{{ route('admin.dataKursus') }}">
                    <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 5H1m0 0 4 4M1 5l4-4" />
                    </svg>
                </a>
            </div>
            <form action="{{ route('admin.update', $dataKursus->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Add this if you are updating an existing resource -->
                <div class="grid gap-6 mb-6 md:grid-cols-2">

                    <!-- Nama Kursus -->
                    <div>
                        <label for="nama_kursus" class="block mb-2 text-sm font-medium text-gray-900">Nama
                            Kursus</label>
                        <input type="text" id="nama_kursus"
                            value="{{ old('nama_kursus', $dataKursus->nama_kursus) }}" name="nama_kursus"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Kampung Inggris LC - Language Center" required />
                    </div>

                    <!-- File Upload -->
                    <div>
                        <label for="file_input" class="block mb-2 text-sm font-medium text-gray-900">Upload File</label>
                        <div class="flex items-center">
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                                id="file_input" type="file" name="img">
                            <div class="ml-2">
                                <!-- Modal toggle -->
                                <button data-modal-target="file-upload-modal" data-modal-toggle="file-upload-modal"
                                    class="block w-20 text-white bg-[#4F7F81] hover:bg-[#3F6A6B] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm py-3 text-center"
                                    type="button">
                                    Detail
                                </button>

                                <!-- File Upload Modal -->
                                <div id="file-upload-modal" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div
                                        class="relative w-full max-w-2xl max-h-full bg-white rounded-lg shadow-lg py-10 px-10 justify-center items-center">
                                        @if ($dataKursus->img)
                                            <img src="{{ asset('storage/' . $dataKursus->img) }}" class="object-cover "
                                                alt="Gambar">
                                        @else
                                            <p>Tidak ada gambar yang tersedia.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                        <input type="text" id="deskripsi" value="{{ old('deskripsi', $dataKursus->deskripsi) }}"
                            name="deskripsi"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="KAMPUNG INGGRIS LC – LANGUAGE CENTER Adalah . . . ." required />
                    </div>

                    <!-- Multiple File Upload -->
                    <div>
                        <label for="multiple_files" class="block mb-2 text-sm font-medium text-gray-900">Upload Multiple
                            Files</label>
                        <div class="flex items-center">
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                                id="multiple_files" type="file" name="img_konten[]" multiple>
                            <div class="ml-2">
                                <!-- Modal toggle -->
                                <button data-modal-target="multiple-files-modal"
                                    data-modal-toggle="multiple-files-modal"
                                    class="block w-20 text-white bg-[#4F7F81] hover:bg-[#3F6A6B] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm py-3 text-center"
                                    type="button">
                                    Detail
                                </button>

                                <!-- Multiple Files Modal -->
                                <div id="multiple-files-modal" tabindex="-1" aria-hidden="true"
                                    class="hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div
                                        class="relative overflow-x-auto py-10 w-full max-w-2xl max-h-full bg-white rounded-lg shadow-lg">
                                        <div class="flex space-x-4">
                                            <!-- Flex container to arrange images horizontally -->
                                            @if (!empty($dataKursus->img_konten))
                                                @foreach (json_decode($dataKursus->img_konten, true) as $image)
                                                    <img src="{{ asset('storage/' . $image) }}"
                                                        class="object-cover h-64 w-auto px-5 flex-shrink-0 " alt="Gambar">
                                                @endforeach
                                            @else
                                                <p>Tidak ada gambar yang tersedia.</p>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Latitude -->
                    <div>
                        <label for="latitude" class="block mb-2 text-sm font-medium text-gray-900">Latitude</label>
                        <input type="text" id="latitude" value="{{ old('latitude', $dataKursus->latitude) }}"
                            name="latitude"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Latitude" required />
                    </div>

                    <!-- Longitude -->
                    <div>
                        <label for="longitude" class="block mb-2 text-sm font-medium text-gray-900">Longitude</label>
                        <input type="text" id="longitude" value="{{ old('longitude', $dataKursus->longitude) }}"
                            name="longitude"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Longitude" />
                    </div>

                    <!-- Paket -->
                    <div>
                        <label for="paket" class="block mb-2 text-sm font-medium text-gray-900">Paket</label>
                        <input id="paket" name="paket" type="hidden"
                            value="{{ old('paket', $dataKursus->paket) }}" />
                        <trix-editor input="paket"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Write your thoughts here..."></trix-editor>
                    </div>

                    <!-- Metode -->
                    <div>
                        <label for="metode" class="block mb-2 text-sm font-medium text-gray-900">Metode</label>
                        <input id="metode" name="metode" type="hidden"
                            value="{{ old('metode', $dataKursus->metode) }}" />
                        <trix-editor input="metode"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Write your thoughts here..."></trix-editor>
                    </div>

                    <!-- Fasilitas -->
                    <div>
                        <label for="fasilitas" class="block mb-2 text-sm font-medium text-gray-900">Fasilitas</label>
                        <input id="fasilitas" name="fasilitas" type="hidden"
                            value="{{ old('fasilitas', $dataKursus->fasilitas) }}" />
                        <trix-editor input="fasilitas"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Write your thoughts here..."></trix-editor>
                    </div>

                    <!-- Lokasi -->
                    <div>
                        <label for="lokasi" class="block mb-2 text-sm font-medium text-gray-900">Lokasi</label>
                        <input id="lokasi" name="lokasi" type="hidden"
                            value="{{ old('lokasi', $dataKursus->lokasi) }}" />
                        <trix-editor input="lokasi"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Write your thoughts here..."></trix-editor>
                    </div>
                </div>
                <button type="submit"
                    class="text-white bg-[#4F7F81] hover:bg-[#3F6A6B] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
            </form>
        </div>
    </div>

    @push('script')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
    @endpush
</x-adminlayout>
