<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jodit@3.8.13/build/jodit.min.css">
<script src="https://cdn.jsdelivr.net/npm/jodit@3.8.13/build/jodit.min.js"></script>

<x-adminlayout>

    <div class="container">
        <div class="py-10">

            <div class="pb-4 flex">

                <a class="px-4 flex text-white text-lg justify-center items-center py-2 rounded-xl bg-[#4F7F81]" href=""><svg
                        class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 5H1m0 0 4 4M1 5l4-4" />
                    </svg></a>

            </div>

            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <!-- Nama Kursus -->
                    <div>
                        <label for="nama_kursus" class="block mb-2 text-sm font-medium text-gray-900 ">Nama
                            Kursus</label>
                        <input type="text" id="nama_kursus" name="nama_kursus"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            placeholder="Nama Kursus" required />
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium  text-gray-900 " for="file_input">Upload
                            file</label>
                        <input
                            class=" block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 "
                            id="file_input" type="file" >
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 " for="multiple_files">
                            Deskripsi</label>
                        <input type="text" id="first_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Deskripsi" required />
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 " for="multiple_files">Upload
                            multiple files</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 "
                            id="multiple_files" type="file" multiple>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 " for="multiple_files">
                            Latitude</label>
                        <input type="text" id="first_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Latitude" required />
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 " for="multiple_files">
                            Latitude</label>
                        <input type="text" id="first_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Latitude" required />
                    </div>
                    <div>
                        <label for="deskprisi" class="block mb-2 text-sm font-medium text-gray-900">Paket</label>
                        <textarea id="deskprisi" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Write your thoughts here..."></textarea>

                    </div>
                    <div>
                        <label for="deskprisi" class="block mb-2 text-sm font-medium text-gray-900">Metode</label>
                        <textarea id="deskprisi" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Write your thoughts here..."></textarea>

                    </div>
                    <div>
                        <label for="deskprisi" class="block mb-2 text-sm font-medium text-gray-900">Fasilitas</label>
                        <textarea id="deskprisi" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Write your thoughts here..."></textarea>

                    </div>
                    <div>
                        <label for="deskprisi" class="block mb-2 text-sm font-medium text-gray-900">Lokasi</label>
                        <textarea id="deskprisi" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Write your thoughts here..."></textarea>

                    </div>
                    <div>
                        <label for="deskripsi"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" class="bg-gray-50 border border-gray-300 rounded-lg"></textarea>
                    </div>

                    <script>
                        tinymce.init({
                            selector: '#deskripsi',
                            plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table paste code help wordcount',
                            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
                            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
                        });
                    </script>

                </div>

                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Submit</button>
            </form>

        </div>
    </div>
    <script>
        var editor = new Jodit('#deskripsi  ', {
            height: 300,
            // Other configurations
        });
    </script>
</x-adminlayout>
