<x-adminlayout>
    <div class="container">
        <div class="py-10 px-4">
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
                <div class="space-y-4">

                    <!-- Nama Kursus -->
                    <div class="grid gap-6 md:grid-cols-3">
                        <div>

                            <label for="nama_kursus" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                Kursus</label>
                            <input type="text" id="nama_kursus"
                                value="{{ old('nama_kursus', $dataKursus->nama_kursus) }}" name="nama_kursus"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Kampung Inggris LC - Language Center" required />
                        </div>
                        <div>
                            <label for="countries"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                                Popular</label>
                            <select id="countries" name="popular"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>{{ $dataKursus->popular }}</option>
                                @if ($dataKursus->popular === 'popular')
                                    <option value="Tidak">Tidak</option>
                                @else
                                    <option value="popular">Popular</option>
                                @endif
                            </select>
                        </div>
                        <div>
                            <label for="kategori_id" class="block mb-2 text-sm font-medium text-gray-900">Pilih
                                Kategori</label>
                            <select id="kategori_id" name="kategori_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <!-- Opsi default untuk memastikan dropdown tidak kosong -->
                                <option value="" disabled>Pilih Kategori</option>
                                @foreach ($kategori as $kategoris)
                                    <option value="{{ $kategoris->id }}"
                                        {{ old('kategori_id', $dataKursus->kategori_id) == $kategoris->id ? 'selected' : '' }}>
                                        {{ $kategoris->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" rows="4"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="KAMPUNG INGGRIS LC – LANGUAGE CENTER Adalah . . . ." required>{{ old('deskripsi', $dataKursus->deskripsi) }}</textarea>
                    </div>




                    <div class="grid md:grid-cols-2 gap-4">

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
                            <label for="longitude"
                                class="block mb-2 text-sm font-medium text-gray-900">Longitude</label>
                            <input type="text" id="longitude" value="{{ old('longitude', $dataKursus->longitude) }}"
                                name="longitude"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Longitude" />
                        </div>
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
                    <div>
                        <label for="latitude" class="block mb-2 text-sm font-medium text-gray-900">Upload
                            Gambar</label>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="grid grid-cols-1 gap-4">
                                <div>
                                    <label for="file_input"
                                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                    class="font-semibold">Click to
                                                    upload Single</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF
                                            </p>
                                            <input id="file_input" type="file" name="img" class="hidden"
                                                onchange="previewImage(event)" />
                                        </div>
                                    </label>
                                    <div class="pt-2">
                                        <button data-modal-target="file-upload-modal"
                                            data-modal-toggle="file-upload-modal"
                                            class="block w-full text-white bg-[#4F7F81] hover:bg-[#3F6A6B] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm py-3 text-center"
                                            type="button">
                                            Detail
                                        </button>
                                    </div>
                                </div>

                                <!-- Preview image -->
                                <div id="image_preview_single" class="hidden border p-4">
                                    <div class="flex justify-center">
                                        <img id="image_preview_single_img"
                                            src="{{ old('img', asset('storage/' . $dataKursus->img)) }}"
                                            alt="Image Preview" class="aspect-video h-40 object-contain" />
                                    </div>
                                </div>
                            </div>

                            <!-- Input File Multiple -->
                            <div class="grid grid-cols-1 gap-4">
                                <div>
                                    <label for="multiple_files"
                                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                    class="font-semibold">Click to
                                                    upload Multi</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF
                                            </p>
                                            <input id="multiple_files" type="file" name="img_konten[]" multiple
                                                onchange="previewMultipleImages(event)" class="hidden" />
                                        </div>
                                    </label>
                                    <div class="pt-2">
                                        <button data-modal-target="multiple-files-modal"
                                            data-modal-toggle="multiple-files-modal"
                                            class="block w-full text-white bg-[#4F7F81] hover:bg-[#3F6A6B] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm py-3 text-center"
                                            type="button">
                                            Detail
                                        </button>
                                    </div>
                                </div>

                                <!-- Multiple Images Preview -->
                                <div id="image_preview_multiple" class="hidden p-4 flex justify-center border">
                                    <div id="multiple_images_preview"
                                        class="aspect-video h-40 object-contain overflow-x-auto flex gap-4">
                                        @if (!empty($dataKursus->img_konten))
                                            @foreach (json_decode($dataKursus->img_konten, true) as $image)
                                                <img src="{{ asset('storage/' . $image) }}"
                                                    class="object-cover h-40 w-auto px-5 flex-shrink-0"
                                                    alt="Gambar">
                                            @endforeach
                                        @else
                                            <p>Tidak ada gambar yang tersedia.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- File Upload Modal -->
                        <div id="file-upload-modal" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div
                                class="relative w-full max-w-2xl max-h-full  rounded-lg p-4 justify-center items-center">
                                @if ($dataKursus->img)
                                    <img src="{{ asset('storage/' . $dataKursus->img) }}"
                                        class="object-contain max-h-48 mx-auto" alt="Gambar">
                                @else
                                    <p>Tidak ada gambar yang tersedia.</p>
                                @endif
                            </div>
                        </div>

                        <!-- Multiple Files Modal -->
                        <div id="multiple-files-modal" tabindex="-1" aria-hidden="true"
                            class="hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full px-4">
                            <div
                                class="relative overflow-x-auto p-4 w-full max-w-2xl max-h-full  rounded-lg">
                                <div class="flex items-center justify-center">
                                    <!-- Flex container to arrange images horizontally -->
                                    @if (!empty($dataKursus->img_konten))
                                        @foreach (json_decode($dataKursus->img_konten, true) as $image)
                                            <img src="{{ asset('storage/' . $image) }}"
                                                class="object-contain h-32 w-auto px-5 flex-shrink-0" alt="Gambar">
                                        @endforeach
                                    @else
                                        <p>Tidak ada gambar yang tersedia.</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <script>
                            // Preview single image
                            function previewImage(event) {
                                const file = event.target.files[0];
                                const reader = new FileReader();

                                reader.onload = function() {
                                    const image = document.getElementById('image_preview_single_img');
                                    image.src = reader.result;
                                    document.getElementById('image_preview_single').classList.remove('hidden');
                                }
                                if (file) {
                                    reader.readAsDataURL(file);
                                }
                            }

                            // Preview multiple images
                            function previewMultipleImages(event) {
                                const files = event.target.files;
                                const previewContainer = document.getElementById('multiple_images_preview');
                                previewContainer.innerHTML = ''; // Clear previous previews

                                Array.from(files).forEach(file => {
                                    const reader = new FileReader();

                                    reader.onload = function() {
                                        const img = document.createElement('img');
                                        img.src = reader.result;
                                        previewContainer.appendChild(img);
                                    }

                                    if (file) {
                                        reader.readAsDataURL(file);
                                    }
                                });
                                document.getElementById('image_preview_multiple').classList.remove('hidden');
                            }
                        </script>
                    </div>

                    <div class="space-y-4">

                        <button type="submit"
                            class="text-white bg-[#4F7F81] hover:bg-[#3F6A6B] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>

                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 mt-4">
                                <strong>Oops! Ada beberapa kesalahan:</strong>
                                <ul class="mt-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>


            </form>
        </div>
    </div>

    @push('script')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
    @endpush
</x-adminlayout>
