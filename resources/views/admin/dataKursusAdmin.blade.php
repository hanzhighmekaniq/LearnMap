<x-adminlayout>

    <div class="container">
        <div class="py-10">

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Nama Kursus</th>
                            <th scope="col" class="px-6 py-3">Deskripsi</th>
                            <th scope="col" class="px-6 py-3">Gambar</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $index => $course)
                            <tr class="odd:bg-white even:bg-gray-50">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $index + 1 }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $course->nama_kursus }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $course->deskripsi }}
                                </td>
                                <td class="px-6 py-4">
                                    <img src="{{ asset('storage/' . $course->img) }}" class="w-72 h-auto object-cover"
                                        alt="">
                                </td>
                                <td class="px-6 py-4 flex space-x-2">
                                    <form action="#" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus?');">
                                        @csrf
                                        @method('Edit')
                                        <button type="submit"
                                            class="font-medium text-white hover:underline py-2 px-4 bg-[#4F7F81] rounded-xl">Edit</button>
                                    </form>
                                    <form action="{{ route('delete', ['id' => $course->id]) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="font-medium text-white hover:underline py-2 px-4 bg-[#4F7F81] rounded-xl">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>

</x-adminlayout>
