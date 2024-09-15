<x-adminlayout>

    <div class="container">
        <div class="py-10">

            <div class="flex justify-end items-center pb-4 ">
                <a class="bg-[#4F7F81] py-2 px-4 rounded-xl shadow-md shadow-gray-600 hover:bg-[#3F6A6B] text-white font-bold"
                    href="{{ route('admin.create') }}">Tambah Data</a>
            </div>
            <div class="relative overflow-x-auto sm:rounded-lg">

                <table class="w-full text-sm text-left rtl:text-right shadow-md shadow-gray-600  text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase shadow-md shadow-gray-600 bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Nama Kursus</th>
                            <th scope="col" class="px-6 py-3">Deskripsi</th>
                            <th scope="col" class="px-6 py-3">Gambar</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="shadow-md shadow-gray-600">
                        @foreach ($courses as $index => $course)
                            <tr class="odd:bg-white even:bg-gray-50 shadow-md shadow-gray-600">
                                <th scope="row"
                                    class="justify-center items-center  px6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    <p class="m-auto space-x-2 flex justify-center">
                                        {{ $index + 1 }}
                                    </p>
                                </th>
                                <td class="px-6 py-4 m-auto">
                                    {{ $course->nama_kursus }}
                                </td>
                                <td class="px-6 py-4 m-auto">
                                    {{ $course->deskripsi }}
                                </td>
                                <td class="px-6 py-4 m-auto">
                                    <img src="{{ asset('storage/' . $course->img) }}"
                                        class="w-72 h-14 shadow-md shadow-gray-500 object-cover" alt="">
                                </td>
                                <td class="justify-center items-center  px6 py-4">
                                    <div class="m-auto space-x-2 flex justify-center">

                                        <a href="/admin/{{ $course->id }}/edit-kursus"
                                            class="font-medium shadow-md shadow-gray-600 hover:bg-[#3F6A6B] text-white py-2 px-4 bg-[#4F7F81] rounded-xl">
                                            Edit
                                        </a>
                                        <!-- Tombol DELETE -->
                                        <button data-modal-target="popup-modal-{{ $course->id }}"
                                            data-modal-toggle="popup-modal-{{ $course->id }}"
                                            class="font-medium shadow-md shadow-gray-600 hover:bg-[#3F6A6B] text-white py-2 px-4 bg-[#4F7F81] rounded-xl"
                                            type="button">
                                            Hapus
                                        </button>
                                    </div>
                                    <!-- Modal Konfirmasi -->
                                    <div id="popup-modal-{{ $course->id }}" tabindex="-1"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <div class="relative bg-white rounded-lg shadow ">
                                                <button type="button"
                                                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                                                    data-modal-hide="popup-modal-{{ $course->id }}">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-4 md:p-5 text-center">
                                                    <svg class="text-[#4F7F81] mx-auto mb-4  w-12 h-12 "
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                    <h3 class="text-black mb-5 text-lg font-normal  ">
                                                        Apakah Anda yakin ingin menghapus kursus ini?</h3>
                                                    <!-- Form Hapus -->
                                                    <form id="delete-form-{{ $course->id }}"
                                                        action="{{ route('delete', ['id' => $course->id]) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <button type="button"
                                                        onclick="document.getElementById('delete-form-{{ $course->id }}').submit()"
                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
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

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    @if (session('success'))
        <div id="notification"
            class="fixed top-4 left-1/2 transform -translate-x-1/2 bg-green-50 text-green-800 border border-green-300 rounded-lg p-4 z-20">
            <div class="flex items-center">
                <svg class="flex-shrink-0 w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        </div>
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const notification = document.getElementById('notification');
            if (notification) {
                setTimeout(() => {
                    notification.classList.add('hidden');
                }, 5000); // 5000 milliseconds = 5 seconds
            }
        });
    </script>


</x-adminlayout>
