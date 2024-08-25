<x-adminlayout>

    <div class="container">
        <div class="py-10">


            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Kursus
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Deskripsi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Gambar
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="odd:bg-white even:bg-gray-50 ">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                1
                            </th>
                            <td class="px-6 py-4">
                                Kampung Inggris LC - Language Center
                            </td>
                            <td class="px-6 py-4">
                                Jl. Langkat No.88, Singgahan, Pelem, Kec. Pare, Kabupaten Kediri, Jawa Timur 64213
                                0858-5611-1118
                                Instagram:
                                @kampunginggrislc
                            </td>
                            <td class="px-6 py-4">
                                <img src="{{ asset('img/Rectangle 294.png') }}" class="w-72 h-auto object-cover" alt="">
                            </td>
                            <td class="px-6 py-4 flex space-x-2">
                                <a href="#"
                                    class="font-medium text-white  hover:underline py-2 px-4 bg-[#4F7F81] rounded-xl">Edit</a>
                                <a href="#"
                                    class="font-medium text-white hover:underline py-2 px-4 bg-[#4F7F81] rounded-xl">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</x-adminlayout>
