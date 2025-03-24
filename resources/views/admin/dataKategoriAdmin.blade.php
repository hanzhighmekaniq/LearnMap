<x-adminlayout>

    <div class="container">
        <div class="py-10 md:px-0 px-4">

            
            <div class="flex justify-end items-center pb-4 ">
                <button data-modal-target="default-modal-tambah-kategori"
                    data-modal-toggle="default-modal-tambah-kategori"
                    class="bg-gradient-to-tr from-[#60BC9D] to-[#12372A] py-2 px-4 rounded-xl shadow-md shadow-gray-600 hover:bg-[#3F6A6B] text-white text-5x1 poppins-regular"
                    href="{{ route('kategori.create') }}">Tambah Data</button>
            </div>
            {{ $kategori->links() }}

            <div class="relative overflow-x-auto sm:rounded-lg poppins-regular">
                <table class="w-full text-sm text-end rtl:text-right shadow-gray-600 text-gray-500">
                    <thead class="text-8x1 text-gray-700 uppercase shadow-gray-600 bg-gray-50 pb-4">
                        <tr>
                            <th scope="col" class=" py-3 text-end">No</th>
                            <!-- Menambahkan text-end untuk penataan -->
                            <th scope="col" class=" py-3 text-end">Nama Kategori</th>
                            <!-- Menambahkan text-end untuk penataan -->
                            <th scope="col" class=" py-3 text-end">Aksi</th>
                            <!-- Menambahkan text-end untuk penataan -->
                        </tr>
                    </thead>
                    <tbody class="shadow-gray-600">
                        @foreach ($kategori as $index => $kategoris)
                            <tr class="odd:bg-white even:bg-gray-50 shadow-gray-600 ">
                                <th scope="row" class=" py-4 font-medium text-gray-900 text-end">
                                    <!-- Menambahkan text-end untuk penataan -->
                                    <p class="m-auto space-x-2 flex justify-end">
                                        {{ ($kategori->currentPage() - 1) * $kategori->perPage() + $index + 1 }}
                                    </p>
                                </th>
                                <td class=" py-4 text-end">
                                    {{ $kategoris->nama_kategori }}
                                </td>
                                <td class=" py-4 text-end">
                                    <!-- Menambahkan text-end untuk penataan -->
                                    <div class="flex justify-end space-x-4"> <!-- Menyusun ikon sejajar -->
                                        <!-- Tombol Edit -->
                                        <button data-modal-target="default-modal-edit-kategori{{ $kategoris->id }}"
                                            data-modal-toggle="default-modal-edit-kategori{{ $kategoris->id }}"
                                            class="font-extrabold text-xs shadow-md shadow-gray-600 hover:bg-[#3F6A6B] text-white py-2 px-2 bg-gradient-to-tr from-[#60BC9D] to-[#12372A] rounded-lg h-fit">
                                            <i class="fas fa-edit text-xs"></i> <!-- Icon Edit -->
                                        </button>

                                        <!-- Tombol Hapus -->
                                        <button data-modal-target="default-modal-delete-kategori{{ $kategoris->id }}"
                                            data-modal-toggle="default-modal-delete-kategori{{ $kategoris->id }}"
                                            class="font-extrabold text-xs shadow-md shadow-gray-600 hover:bg-[#3F6A6B] text-white py-2 px-2 bg-gradient-to-tr from-[#60BC9D] to-[#12372A] rounded-lg h-fit">
                                            <i class="fas fa-trash text-xs"></i> <!-- Icon Hapus -->
                                        </button>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="py-4">

                {{ $kategori->links() }}

            </div>
        </div>
    </div>
    <!-- Modal Tambah Kategoris -->
    <div id="default-modal-tambah-kategori" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl poppins-regular text-green-800 dark:text-white">
                        Tambahkan Kategori
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="default-modal-tambah-kategori">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form action="{{ route('kategori.store') }}" method="POST">
                    @csrf
                    <div class="p-4 items-center">
                        <label for="nama_kategori" class="block text-gray-700 poppins-regular mb-1">Kategori</label>
                        <input type="text" id="nama_kategori" name="nama_kategori"
                            class="w-full px-3 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Masukkan Kategori" required required autocomplete="off">

                    </div>
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="submit"
                            class="text-white bg-gradient-to-tr from-[#60BC9D] to-[#12372A] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm poppins-regular px-5 py-2.5 text-end dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Tambah
                        </button>
                        <button data-modal-hide="default-modal-tambah-kategori" type="button"
                            class="py-2.5 px-5 ms-3 text-sm poppins-regular text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-green-800 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal EDIT Kategori -->
    @foreach ($kategori as $kategoris)
        <div id="default-modal-edit-kategori{{ $kategoris->id }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl poppins-regular text-gray-900 dark:text-white">
                            Edit Kategori
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="default-modal-edit-kategori{{ $kategoris->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <form id="edit-kategori-form" method="POST"
                        action="{{ route('kategori.update', $kategoris->id) }}">
                        @csrf <!-- Token CSRF -->
                        @method('PUT') <!-- Menggunakan metode PUT -->
                        <input hidden value="{{ $kategoris->id }}" type="text" id="edit-idkategori"
                            name="id" required>

                        <div class="px-4 pb-4 items-center">
                            <label for="detail_kategori"
                                class="block mt-4 text-gray-700 poppins-regular mb-1">Kategori</label>
                            <input type="text" id="edit-namaKategori" name="nama_kategori"
                                value="{{ $kategoris->nama_kategori }}"
                                class="w-full px-3 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                                placeholder="Masukkan Kategori" required required required autocomplete="off">
                        </div>
                        <div
                            class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 poppins-regular rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Update
                            </button>
                            <button data-modal-hiden="default-modal-edit-kategori{{ $kategoris->id }}" type="button"
                                class="py-2.5 px-5 ms-3 text-sm poppins-regular text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    {{-- Modal DELETE Kategori --}}
    @foreach ($kategori as $kategoris)
        <div id="default-modal-delete-kategori{{ $kategoris->id }}" tabindex="-1"
            class="hidden fixed inset-0 z-50  items-center justify-center bg-black bg-opacity-50">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" data-modal-hide="default-modal-delete-kategori{{ $kategoris->id }}"
                        class="absolute top-3 right-3 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        id="close-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg poppins-regular text-gray-500 dark:text-gray-400">Anda yakin ingin
                            menghapus?</h3>
                        <div class="flex justify-center">
                            <form id="edit-kategori-form" method="POST"
                                action="{{ route('kategori.destroy', $kategoris->id) }}">
                                @csrf <!-- Token CSRF -->
                                @method('DELETE') <!-- Menggunakan metode DELETE -->
                                <button type="submit"
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm poppins-regular inline-flex items-center px-5 py-2.5 text-center">
                                    Ya, Saya Yakin
                                </button>
                            </form>

                            <button type="button"
                                id="cancel-logout"data-modal-hide="default-modal-delete-kategori{{ $kategoris->id }}"
                                class="py-2.5 px-5 ms-3 text-sm poppins-regular text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                Tidak, Batal
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</x-adminlayout>
