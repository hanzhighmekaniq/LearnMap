<x-adminlayout>

    <div class="lg:px-10">
        <div class="py-10 px-4 md:px-0">


            <div class="flex justify-end items-center pb-4 ">
                <a class="bg-gradient-to-tr from-[#60BC9D] to-[#12372A] py-2 px-4 rounded-xl shadow-md shadow-gray-600 hover:bg-[#3F6A6B] text-white text-5x1 poppins-regular"
                    href="{{ route('admin.create') }}">Tambah Data</a>
            </div>
            <div class="flex justify-end items-center pb-4 ">
                <form class="max-w-lg w-full" method="GET" action="{{ route('admin.dataKursus') }}">
                    <div class="flex">
                        <select name="role" id="role"
                            class="shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100">
                            <option value="" {{ request('role') == '' ? 'selected' : '' }}>All Categories</option>
                            @foreach ($kategoriList as $kategori)
                                <option value="{{ $kategori->nama_kategori }}"
                                    {{ request('role') == $kategori->nama_kategori ? 'selected' : '' }}>
                                    {{ $kategori->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                        <div class="relative w-full">
                            <input type="search" name="search" value="{{ request('search') }}"
                                class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Search kursus..." />
                            <button type="submit"
                                class="absolute top-0 end-0 p-2.5 h-full text-white bg-gradient-to-tr from-[#60BC9D] to-[#12372A] rounded-e-lg border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                                <span class="sr-only">Search</span>
                            </button>
                        </div>
                    </div>
                </form>

            </div>
            {{ $courses->links() }}
            <div class="relative overflow-x-auto sm:rounded-lg">
                <table class="w-full text-sm text-gray-700 shadow-md border border-gray-300 rounded-lg overflow-hidden">
                    <thead class="text-xs uppercase bg-gray-100 border-b border-gray-300">
                        <tr>
                            <th scope="col" class="py-3 px-4 text-end border-r border-gray-300">No</th>
                            <th scope="col" class="py-3 px-4 text-end border-r border-gray-300">Nama Kursus</th>
                            <th scope="col" class="py-3 px-4 text-end border-r border-gray-300">Kategori</th>
                            {{-- <th scope="col" class="py-3 px-4 text-end border-r border-gray-300">Paket</th>
                            <th scope="col" class="py-3 px-4 text-end border-r border-gray-300">Metode</th>
                            <th scope="col" class="py-3 px-4 text-end border-r border-gray-300">Lokasi</th> --}}
                            <th scope="col" class="py-3 px-4 text-end border-r border-gray-300">Fasilitas</th>
                            <th scope="col" class="py-3 px-4 text-end border-r border-gray-300">Latitude-Longitude
                            </th>
                            <th scope="col" class="py-3 px-4 text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300">
                        @foreach ($courses as $index => $course)
                            <tr
                                class="odd:bg-white even:bg-gray-50 hover:bg-gray-200 transition border-b border-gray-300">
                                <th scope="row"
                                    class="px-4 py-4 text-end poppins-regular text-gray-900 whitespace-nowrap border-r border-gray-300">
                                    {{ ($courses->currentPage() - 1) * $courses->perPage() + $loop->iteration }}
                                </th>
                                <td class="py-4 text-end px-4 border-r border-gray-300">
                                    <div class="flex justify-end flex-row gap-3 items-center">
                                        <div class="form-control flex-1">
                                            <span class="text-sm uppercase font-semibold">
                                                {{ $course->nama_kursus }}
                                            </span>
                                            @php
                                                $words = explode(' ', Str::limit($course->deskripsi, 200, '...'));
                                                $firstPart = implode(' ', array_slice($words, 0, 15)); // Ambil 15 kata pertama
                                                $secondPart = implode(' ', array_slice($words, 15)); // Sisanya
                                            @endphp

                                            <span
                                                class="text-xs text-gray-400 break-words whitespace-normal leading-tight max-w-xs sm:max-w-sm md:max-w-md">
                                                <br> {{ $firstPart }} <br> {{ $secondPart }}
                                            </span>


                                        </div>
                                        <div
                                            class="sm:w-14 lg:w-24 2xl:w-32 sm:h-14 lg:h-24 2xl:h-32 rounded-md overflow-hidden border border-gray-300">
                                            <img src="{{ asset('storage/' . $course->img) }}"
                                                class="aspect-square shadow-md shadow-gray-500 object-cover"
                                                alt="">
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 text-end px-4 border-r border-gray-300">
                                    <div class="flex flex-col justify-center text-end poppins-regular">
                                        <span class="mb-2">
                                            {{ $course->kategoris ? $course->kategoris->nama_kategori : 'Kategori tidak tersedia' }}
                                        </span>
                                    </div>
                                </td>
                                {{-- <td class="py-4 text-end px-4 border-r border-gray-300">{!! Str::limit($course->paket, 50, '...') !!}</td>
                                <td class="py-4 text-end px-4 border-r border-gray-300">{!! Str::limit($course->metode, 50, '...') !!}</td>
                                <td class="py-4 text-end px-4 border-r border-gray-300">{!! Str::limit($course->lokasi, 50, '...') !!}</td> --}}
                                <td class="py-4 text-end px-4 border-r border-gray-300 uppercase">
    @php
        $fasilitasArray = json_decode($course->fasilitas, true);
        if (is_array($fasilitasArray) && !empty($fasilitasArray)) {
            $fasilitasText = implode(', ', $fasilitasArray);
        } else {
            $fasilitasText = '-';
        }
    @endphp
    {!! Str::limit($fasilitasText, 50, '...') !!}
</td>


                                <td class="py-4 text-end px-4 border-r border-gray-300">
                                    {{ $course->latitude }},{{ $course->longitude }}</td>
                                <td class="py-4 text-end px-4">
                                    <div class="flex justify-end items-center space-x-1 md:space-x-2">
                                        <!-- Detail Button with Icon -->
                                        <button data-modal-target="modal-detail{{ $course->id }}"
                                            data-modal-toggle="modal-detail{{ $course->id }}"
                                            class="font-extrabold text-xs shadow-md hover:bg-blue-600 text-white py-2 px-2 bg-blue-500 rounded-lg transition">
                                            <i class="fas fa-info-circle text-xs"></i>
                                        </button>
                                        <!-- Edit Button with Icon -->
                                        <a href="/admin/{{ $course->id }}/edit-kursus"
                                            class="font-extrabold text-xs shadow-md hover:bg-yellow-600 text-white py-2 px-2 bg-yellow-500 rounded-lg transition">
                                            <i class="fas fa-edit text-xs"></i>
                                        </a>
                                        <!-- Delete Button with Icon -->
                                        <button data-modal-target="popup-modal-{{ $course->id }}"
                                            data-modal-toggle="popup-modal-{{ $course->id }}"
                                            class="font-extrabold text-xs shadow-md hover:bg-red-600 text-white py-2 px-2 bg-red-500 rounded-lg transition">
                                            <i class="fas fa-trash-alt text-xs"></i>
                                        </button>
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
                                <h3 class="text-black mb-5 text-lg poppins-regular  ">
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
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 poppins-regular rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-start">
                                    Hapus
                                </button>
                                <button type="button"
                                    class="py-2.5 px-5 ms-3 text-sm poppins-regular text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-gray-800 focus:z-10 focus:ring-4 focus:ring-gray-100 "
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
                <div class="relative rounded-lg shadow  bg-[#4F7F81]">
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
