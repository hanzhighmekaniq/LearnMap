<x-adminlayout>
    <div class="container">
        <div class="py-10 px-4">
            <div class="pb-4 flex">
                <a class="px-4 flex text-white text-lg justify-center shadow-md shadow-gray-600 items-center py-2 rounded-xl bg-[#4F7F81]"
                    href="{{ route('admin.dataKursus') }}"><svg class="w-5 h-5 text-white " aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 5H1m0 0 4 4M1 5l4-4" />
                    </svg></a>
            </div>
            <form id="my-form" action="{{ route('kursus.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-4">
                    <!-- Nama Kursus -->
                    <div class="grid gap-6 md:grid-cols-3">
                        <div>
                            <label for="nama_kursus" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                Kursus</label>
                            <input type="text" id="nama_kursus" name="nama_kursus"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Kampung Inggris LC - Language Center" value="{{ old('nama_kursus') }}"
                                required />
                        </div>

                        <div class="hidden">
                            <label for="popular" class="block mb-2 text-sm font-medium text-gray-900">Pilih
                                Popular</label>
                            <select id="popular" name="popular"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="Tidak" {{ old('popular') == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                <option value="Popular" {{ old('popular') == 'Popular' ? 'selected' : '' }}>Popular
                                </option>
                            </select>
                        </div>
                        <div>
                            <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900">Pilih
                                Kategori</label>
                            <select id="popular" name="kategori_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">Pilih Kategori</option> <!-- Tambahkan opsi default -->
                                @foreach ($kategori as $kategoris)
                                    <option value="{{ $kategoris->id }}"
                                        {{ old('kategori_id') == $kategoris->id ? 'selected' : '' }}>
                                        {{ $kategoris->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Input File Single -->
                    <div>
                        <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Deskripsi
                        </label>
                        <textarea id="deskripsi" name="deskripsi" rows="4"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:text-gray-400 dark:border-gray-600 dark:placeholder-gray-400"
                            placeholder="KAMPUNG INGGRIS LC – LANGUAGE CENTER Adalah . . . ." required>{{ old('deskripsi') }}</textarea>
                    </div>
                    <div class="flex justify-between w-full gap-4">

                        <div class="w-full">
                            <label for="latitude" class="block mb-2 text-sm font-medium text-gray-900">Latitude</label>
                            <input type="text" id="latitude" name="latitude" pattern="-?\d*\.?\d+"
                                title="Latitude can include numbers, a dot (.) for decimal, and a minus (-) for negative values."
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Latitude" value="{{ old('latitude') }}" required />
                        </div>

                        <!-- Longitude -->
                        <div class="w-full">
                            <label for="longitude"
                                class="block mb-2 text-sm font-medium text-gray-900">Longitude</label>
                            <input type="text" id="longitude" name="longitude" pattern="-?\d*\.?\d+"
                                title="Longitude can include numbers, a dot (.) for decimal, and a minus (-) for negative values."
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Longitude" value="{{ old('longitude') }}" />
                        </div>
                    </div>




                    <!-- Latitude -->

                    <!-- Paket -->
                    <div>
                        <label for="paket" class="block mb-2 text-sm font-medium text-gray-900">Paket</label>
                        <input id="paket" name="paket" type="hidden" value="{{ old('paket') }}" />
                        <trix-editor input="paket"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Write your thoughts here..."></trix-editor>
                    </div>

                    <!-- Metode -->
                    <div>
                        <label for="metode" class="block mb-2 text-sm font-medium text-gray-900">Metode</label>
                        <input id="metode" name="metode" type="hidden" value="{{ old('metode') }}" />
                        <trix-editor input="metode"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Write your thoughts here..."></trix-editor>
                    </div>

                    <!-- Fasilitas -->
                    <div>
                        <label for="fasilitas" class="block mb-2 text-sm font-medium text-gray-900">Fasilitas</label>
                        <input id="fasilitas" name="fasilitas" type="hidden" value="{{ old('fasilitas') }}" />
                        <trix-editor input="fasilitas"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Write your thoughts here..."></trix-editor>
                    </div>

                    <!-- Lokasi -->
                    <div>
                        <label for="lokasi" class="block mb-2 text-sm font-medium text-gray-900">Lokasi</label>
                        <input id="lokasi" name="lokasi" type="hidden" value="{{ old('lokasi') }}" />
                        <trix-editor input="lokasi"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Write your thoughts here..."></trix-editor>
                    </div>
                    <div>
                        <label for="latitude" class="block mb-2 text-sm font-medium text-gray-900">Uplaud
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
                                                    class="font-semibold">Click to upload Single</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF
                                            </p>
                                            <input id="file_input" type="file" name="img" class="hidden"
                                                onchange="previewImage(event)" />
                                        </div>
                                    </label>
                                </div>

                                <!-- Preview image -->
                                <div id="image_preview_single" class="hidden border p-4">
                                    <div class="flex justify-center">
                                        <img id="image_preview_single_img" src="" alt="Image Preview"
                                            class="aspect-video h-40 object-contain" />
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
                                                    class="font-semibold">Click to upload Multi</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF
                                            </p>
                                            <input id="multiple_files" type="file" name="img_konten[]" multiple
                                                onchange="previewMultipleImages(event)" class="hidden" />
                                        </div>
                                    </label>
                                </div>
                                <!-- Multiple Images Preview -->
                                <div id="image_preview_multiple" class="hidden p-4 flex justify-center border">
                                    <div id="multiple_images_preview"
                                        class=" aspect-video h-40 object-contain overflow-x-auto flex gap-4">
                                    </div>
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

                    <div>
                        <button type="button" data-modal-target="popup-modal-tambah"
                            data-modal-toggle="popup-modal-tambah"
                            class="shadow-md shadow-gray-600 text-white bg-[#4F7F81] hover:bg-[#3F6A6B] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                            Submit
                        </button>
                    </div>
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                            role="alert">
                            <strong class="font-bold">Error:</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </form>

            <!-- Modal Konfirmasi -->
            <div id="popup-modal-tambah" tabindex="-1"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow ">
                        <button type="button"
                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                            data-modal-hide="popup-modal-tambah">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-[#3F6A6B] w-12 h-12 " aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-black">
                                Apakah Anda yakin ingin menambah kursus?
                            </h3>

                            <button id="confirm-submit"
                                class="text-white bg-[#4F7F81] hover:bg-[#3F6A6B] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                Ya, Kirim
                            </button>
                            <button type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-[#3F6A6B] focus:z-10 focus:ring-4 focus:ring-gray-100 "
                                data-modal-hide="popup-modal-tambah">Tidak, Batal</button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    // Show modal
                    document.querySelectorAll('[data-modal-toggle]').forEach(button => {
                        button.addEventListener('click', () => {
                            const targetId = button.getAttribute('data-modal-target');
                            document.getElementById(targetId).classList.remove('hidden');
                        });
                    });

                    // Hide modal
                    document.querySelectorAll('[data-modal-hide]').forEach(button => {
                        button.addEventListener('click', () => {
                            const targetId = button.getAttribute('data-modal-hide');
                            document.getElementById(targetId).classList.add('hidden');
                        });
                    });

                    // Handle form submission
                    document.getElementById('confirm-submit').addEventListener('click', () => {
                        document.getElementById('my-form').submit();
                    });
                });
            </script>
        </div>
    </div>
    @push('script')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
    @endpush
</x-adminlayout>
