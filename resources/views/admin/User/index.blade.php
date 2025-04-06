<x-adminlayout>
    <div class="px-10">
        <div class="py-10 md:px-0 px-4">


            <div class="flex justify-end items-center pb-4 ">
                <button data-modal-target="default-modal-tambah-users" data-modal-toggle="default-modal-tambah-users"
                    class="bg-gradient-to-tr from-[#60BC9D] to-[#12372A] py-2 px-4 rounded-md shadow-md shadow-gray-600 hover:bg-[#3F6A6B] text-white text-5x1 poppins-regular"
                    href="{{ route('kategori.create') }}">Tambah Data</button>
            </div>
            <div class="flex justify-end items-center pb-4 w-full">
                <form class="max-w-lg w-full" method="GET" action="{{ route('user.index') }}">
                    <div class="flex">
                        <select name="role" id="role"
                            class="shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100">
                            <option value="" selected>All Roles</option>
                            <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>User</option>
                            <option value="pengunjung" {{ request('role') == 'pengunjung' ? 'selected' : '' }}>
                                Pengunjung</option>
                        </select>
                        <div class="relative w-full">
                            <input type="search" name="search" value="{{ request('search') }}"
                                class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Search users..." />
                            <button type="submit"
                                class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-gradient-to-tr from-[#60BC9D] to-[#12372A] rounded-e-lg border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                                <span class="sr-only">Search</span>
                            </button>
                        </div>
                    </div>
                </form>


            </div>

            {{ $user->links() }}

            <div class="relative overflow-x-auto sm:rounded-lg">
                <table class="w-full text-sm text-gray-700 shadow-md border border-gray-300 rounded-lg overflow-hidden">
                    <thead class="text-xs uppercase bg-gray-100 border-b border-gray-300">
                        <tr>
                            <th scope="col" class="py-3 px-4 text-end border-r border-gray-300">No</th>
                            <th scope="col" class="py-3 px-4 text-end border-r border-gray-300">Nama</th>
                            <th scope="col" class="py-3 px-4 text-end border-r border-gray-300">Email</th>
                            <th scope="col" class="py-3 px-4 text-end border-r border-gray-300">Role</th>
                            <th scope="col" class="py-3 px-4 text-end border-r border-gray-300">Terdaftar</th>
                            <th scope="col" class="py-3 px-4 text-end border-r border-gray-300">Diperbarui</th>
                            <th scope="col" class="py-3 px-4 text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300">
                        @foreach ($user as $no => $index)
                            <tr class="odd:bg-white even:bg-gray-50 hover:bg-gray-200 transition">
                                <th scope="row"
                                    class="py-4 px-4 font-medium text-gray-900 text-end border-r border-gray-300">
                                    {{ ($user->currentPage() - 1) * $user->perPage() + $no + 1 }}
                                </th>
                                <td class="py-4 px-4 text-end border-r border-gray-300">
                                    {{ $index->name }}
                                </td>
                                <td class="py-4 px-4 text-end border-r border-gray-300">
                                    {{ $index->email }}
                                </td>
                                <td class="py-4 px-4 text-end border-r border-gray-300">
                                    {{ $index->role }}
                                </td>
                                <td class="py-4 px-4 text-end border-r border-gray-300">
                                    {{ $index->created_at }}
                                </td>
                                <td class="py-4 px-4 text-end border-r border-gray-300">
                                    {{ $index->updated_at }}
                                </td>
                                <td class="py-4 px-4 text-end">
                                    <div class="flex justify-end space-x-2">
                                        <!-- Tombol Edit -->
                                        <button data-modal-target="modal-edit-users-{{ $index->id }}"
                                            data-modal-toggle="modal-edit-users-{{ $index->id }}"
                                            class="font-extrabold text-xs shadow-md hover:bg-green-700 text-white py-2 px-2 bg-green-600 rounded-lg transition">
                                            <i class="fas fa-edit text-xs"></i>
                                        </button>

                                        <!-- Tombol Hapus -->
                                        <button data-modal-target="modal-delete-user-{{ $index->id }}"
                                            data-modal-toggle="modal-delete-user-{{ $index->id }}"
                                            class="font-extrabold text-xs shadow-md hover:bg-red-700 text-white py-2 px-2 bg-red-600 rounded-lg transition">
                                            <i class="fas fa-trash text-xs"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

            <div class="py-4">

                {{ $user->links() }}

            </div>
        </div>
    </div>
    <!-- Modal Tambah Kategoris -->
    <div id="default-modal-tambah-users" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <div class="relative bg-white rounded-lg shadow ">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                    <h3 class="text-xl font-semibold text-gray-900 ">
                        Tambah User
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                        data-modal-hide="default-modal-tambah-users">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="p-4 items-center">
                        <label for="name" class="block text-gray-700 font-bold mb-1">Nama</label>
                        <input type="text" id="name" name="name"
                            class="w-full px-3 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Masukkan Nama" required autocomplete="off">
                    </div>

                    <div class="p-4 items-center">
                        <label for="email" class="block text-gray-700 font-bold mb-1">Email</label>
                        <input type="email" id="email" name="email"
                            class="w-full px-3 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Masukkan Email" required autocomplete="off">
                    </div>
                    <div class="p-4 items-center">
                        <label for="Username" class="block text-gray-700 font-bold mb-1">Username</label>
                        <input type="Username" id="Username" name="username"
                            class="w-full px-3 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Masukkan Username" required autocomplete="off">
                    </div>

                    <div class="p-4 items-center">
                        <label for="password" class="block text-gray-700 font-bold mb-1">Password</label>
                        <input type="password" id="password" name="password"
                            class="w-full px-3 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Masukkan Password" required autocomplete="off">
                    </div>

                    <div class="p-4 items-center">
                        <label for="verif_password" class="block text-gray-700 font-bold mb-1">Verifikasi
                            Password</label>
                        <input type="password" id="verif_password" name="verif_password"
                            class="w-full px-3 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Masukkan Ulang Password" required autocomplete="off">
                    </div>

                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b ">
                        <button type="submit"
                            class="bg-gradient-to-tr from-[#60BC9D] to-[#12372A] py-2 px-4 rounded-md shadow-md shadow-gray-600 hover:bg-[#3F6A6B] text-white text-5x1 poppins-regular">
                            Tambah
                        </button>
                        <button type="button" onclick="history.back();"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700">
                            Batal
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- Modal EDIT Kategori -->
    @foreach ($user as $index)
        <div id="modal-edit-users-{{ $index->id }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-lg shadow ">
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                        <h3 class="text-xl font-semibold text-gray-900 ">
                            Edit User
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                            data-modal-hide="modal-edit-users-{{ $index->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <form id="edit-user-form" method="POST" action="{{ route('user.update', $index->id) }}">
                        @csrf <!-- Token CSRF -->
                        @method('PUT') <!-- Menggunakan metode PUT -->
                        <input hidden value="{{ $index->id }}" type="text" id="edit-idkategori" name="id" required>

                        <div class="px-4 pb-4 items-center">
                            <label for="Name" class="block mt-4 text-gray-700 font-bold mb-1">Nama</label>
                            <input type="text" id="edit-nama" name="name" value="{{ $index->name }}"
                                class="w-full px-3 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                                placeholder="Masukkan user" required required required autocomplete="off">
                        </div>
                        <div class="px-4 pb-4 items-center">
                            <label for="email" class="block mt-4 text-gray-700 font-bold mb-1">Email</label>
                            <input type="text" id="edit-nama" name="email" value="{{ $index->email }}"
                                class="w-full px-3 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                                placeholder="Masukkan user" required required required autocomplete="off">
                        </div>

                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b ">
                            <button type="submit"
                                class="bg-gradient-to-tr from-[#60BC9D] to-[#12372A] py-2 px-4 rounded-md shadow-md shadow-gray-600 hover:bg-[#3F6A6B] text-white text-5x1 poppins-regular">
                                Update
                            </button>
                            <button data-modal-hiden="modal-edit-users-{{ $index->id }}" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 ">
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    {{-- Modal DELETE Kategori --}}
    @foreach ($user as $index)
        <div id="modal-delete-user-{{ $index->id }}" data-modal-backdrop="static" tabindex="-1"
            class="hidden fixed inset-0 z-50  items-center justify-center bg-black bg-opacity-50">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow ">
                    <button type="button" data-modal-hide="modal-delete-user-{{ $index->id }}"
                        class="absolute top-3 right-3 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center "
                        id="close-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 " aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 ">Anda yakin ingin
                            menghapus?</h3>
                        <div class="flex justify-center">
                            <form id="delete-user" method="POST" action="{{ route('user.destroy', $index->id) }}">
                                @csrf <!-- Token CSRF -->
                                @method('DELETE') <!-- Menggunakan metode DELETE -->
                                <button type="submit"
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300  font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                    Ya, Saya Yakin
                                </button>
                            </form>

                            <button type="button" id="cancel-logout" data-modal-hide="modal-delete-user-{{ $index->id }}"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-4 focus:ring-gray-100 ">
                                Tidak, Batal
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-adminlayout>