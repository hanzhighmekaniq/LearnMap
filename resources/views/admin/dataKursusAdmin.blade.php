<x-adminlayout>

    <div class="container">
        <div class="py-10 px-4 md:px-0">


            <div class="flex justify-end items-center pb-4 ">
                <a class="bg-[#4F7F81] py-2 px-4 rounded-xl shadow-md shadow-gray-600 hover:bg-[#3F6A6B] text-white text-xs font-bold"
                    href="{{ route('admin.create') }}">Tambah Data</a>
            </div>

            {{ $courses->links() }}
            <div class="relative overflow-x-auto sm:rounded-lg">
                <table class="w-full text-sm text-right rtl:text-right shadow-gray-600 text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase shadow-gray-600 bg-gray-50">
                        <tr>
                            <th scope="col" class=" py-3 px-4 text-end">No</th>
                            <th scope="col" class=" py-3 px-4 text-end">Nama Kursus</th>
                            <th scope="col" class=" py-3 px-4 text-end">Kategori</th>
                            <th scope="col" class=" py-3 px-4 text-end">Paket</th>
                            <th scope="col" class=" py-3 px-4 text-end">Metode</th>
                            <th scope="col" class=" py-3 px-4 text-end">Fasilitas</th>
                            <th scope="col" class=" py-3 px-4 text-end">Lokasi</th>
                            <th scope="col" class=" py-3 px-4 text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="shadow-gray-600">
                        @foreach ($courses as $index => $course)
                            <tr class="odd:bg-white even:bg-gray-50 shadow-gray-600 ">
                                <th scope="row" class="px-4 py-4 text-end font-medium text-gray-900 whitespace-nowrap">
                                    {{ ($courses->currentPage() - 1) * $courses->perPage() + $loop->iteration }}
                                </th>
                                <td class=" py-4 text-end px-4">
                                    <div class="flex justify-end flex-row gap-3 items-center w-full h-full">
                                        <div class="form-control flex-1">
                                            <span class="text-sm uppercase font-semibold">
                                                {{ $course->nama_kursus }}
                                            </span>
                                            <span class="text-xs text-gray-400 line-clamp-2">
                                                {{ Str::limit($course->deskripsi, 200, '...') }}
                                            </span>
                                        </div>
                                        <div class="w-8 h-8 rounded-md overflow-hidden">
                                            <img src="{{ asset('storage/' . $course->img) }}"
                                                class="aspect-square shadow-md shadow-gray-500 object-cover" alt="">
                                        </div>
                                    </div>
                                </td>
                                <td class=" py-4 text-end px-4">
                                    <div class="flex flex-col justify-center text-end">
                                        <span class="mb-2">
                                            {{ $course->kategoris ? $course->kategoris->nama_kategori : 'Kategori tidak tersedia' }}
                                        </span>
                                        <span>{{ $course->popular }}</span>
                                    </div>
                                </td>
                                <td class=" py-4 text-end items-center px-4">
                                    <div> {!! Str::limit($course->paket, 50, '...') !!}</div>
                                </td>
                                <td class=" py-4 text-end items-center px-4">
                                    <div> {!! Str::limit($course->metode, 50, '...') !!}</div>
                                </td>
                                <td class=" py-4 text-end items-center px-4">
                                    <div> {!! Str::limit($course->fasilitas, 50, '...') !!}</div>
                                </td>
                                <td class=" py-4 text-end items-center px-4">
                                    <div> {!! Str::limit($course->lokasi, 50, '...') !!}</div>
                                </td>
                                <td class=" py-4 text-end items-center px-4">
                                    <div class="flex justify-end items-center space-x-1 md:space-x-2">
                                        <!-- Detail Button with Icon -->
                                        <div>
                                            <button data-modal-target="modal-detail{{ $course->id }}"
                                                data-modal-toggle="modal-detail{{ $course->id }}"
                                                class="font-extrabold text-xs shadow-md shadow-gray-600 hover:bg-[#3F6A6B] text-white py-2 px-2 bg-[#4F7F81] rounded-lg h-fit">
                                                <i class="fas fa-info-circle text-xs"></i> <!-- Icon Detail -->
                                            </button>
                                        </div>
                                        <!-- Edit Button with Icon -->
                                        <div>
                                            <a href="/admin/{{ $course->id }}/edit-kursus"
                                                class="font-extrabold text-xs shadow-md shadow-gray-600 hover:bg-[#3F6A6B] text-white py-2 px-2 bg-[#4F7F81] rounded-lg h-fit">
                                                <i class="fas fa-edit text-xs"></i> <!-- Icon Edit -->
                                            </a>
                                        </div>
                                        <!-- Delete Button with Icon -->
                                        <div>
                                            <button data-modal-target="popup-modal-{{ $course->id }}"
                                                data-modal-toggle="popup-modal-{{ $course->id }}"
                                                class="font-extrabold text-xs shadow-md shadow-gray-600 hover:bg-[#3F6A6B] text-white py-2 px-2 bg-[#4F7F81] rounded-lg h-fit">
                                                <i class="fas fa-trash-alt text-xs"></i> <!-- Icon Delete -->
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            @foreach ($courses as $course)
                <!-- Modal Konfirmasi -->
                <div id="popup-modal-{{ $course->id }}" tabindex="-1"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow ">
                            <button type="button"
                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                                data-modal-hide="popup-modal-{{ $course->id }}">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-4 md:p-5 text-start">
                                <svg class="text-[#4F7F81] mx-auto mb-4  w-12 h-12 " aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <h3 class="text-black mb-5 text-lg font-normal  ">
                                    Apakah Anda yakin ingin menghapus kursus ini?</h3>
                                <!-- Form Hapus -->
                                <form id="delete-form-{{ $course->id }}"
                                    action="{{ route('delete', ['id' => $course->id]) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button type="button"
                                    onclick="document.getElementById('delete-form-{{ $course->id }}').submit()"
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-start">
                                    Hapus
                                </button>
                                <button type="button"
                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-gray-800 focus:z-10 focus:ring-4 focus:ring-gray-100 "
                                    data-modal-hide="popup-modal-{{ $course->id }}">Tidak,
                                    Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    document.querySelectorAll('[data-modal-toggle]').forEach(button => {
                        button.addEventListener('click', () => {
                            const targetId = button.getAttribute('data-modal-target');
                            document.getElementById(targetId).classList.remove('hidden');
                        });
                    });

                    document.querySelectorAll('[data-modal-hide]').forEach(button => {
                        button.addEventListener('click', () => {
                            const targetId = button.getAttribute('data-modal-hide');
                            document.getElementById(targetId).classList.add('hidden');
                        });
                    });
                });
            </script>
            <div class="py-4">

                {{ $courses->links() }}
            </div>
        </div>
    </div>


   
    <!-- Main modal -->

    @foreach ($courses as $course)
        <!-- Modal Detail Gambar untuk setiap course -->
        <div id="modal-detail{{ $course->id }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto fixed top-0 right-0 left-0 z-50  justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full  max-w-2xl xl:max-w-5xl max-h-full">
                <!-- Modal content -->
                <div class="relative rounded-lg shadow dark:bg-gray-700 bg-[#4F7F81]">
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <div class="">
                            @if (!empty($course->imageNames))
                                @foreach ($course->imageNames as $img_konten)
                                    <div class=" my-4    rounded-md">
                                        <img src="{{ asset('storage/' . $img_konten) }}" class="w-full h-auto "
                                            alt="Image">
                                    </div>
                                @endforeach
                            @else
                                <p>Tidak ada gambar yang tersedia.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</x-adminlayout>
