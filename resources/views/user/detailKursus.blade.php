<x-layout>
    @if (session('error'))
        <div
            class="fixed top-5 left-1/2 transform -translate-x-1/2 bg-red-500 text-white px-6 py-3 rounded-md shadow-lg z-50">
            {{ session('error') }}
        </div>
    @endif
    @error('rating')
        <div
            class="fixed top-5 left-1/2 transform -translate-x-1/2 bg-red-500 text-white px-6 py-3 rounded-md shadow-lg z-50">
            {{ $message }}
        </div>
    @enderror

    <div class="flex justify-center items-center pb-16 p-4">
        <div class="h-auto w-full relative">
            <img src="{{ asset('storage/' . $data->img) }}" alt="" class="aspect-[4/2] w-full object-cover rounded-2xl">
            <figcaption class="container w-full">

                <div class="absolute container bottom-8 left-1/2 transform -translate-x-1/2 space-y-10 text-center">
                    <p class="poppins-bold text-start text-6xl xl:text-8xl text-white pr-16 w-1/2">
                        {{ $data->nama_kursus }}
                    </p>

                    <div class="flex justify-start space-x-4">
                        <a href="/kursus/{{ $data->id }}/rute" target="_blank"
                            class="poppins-medium py-3 px-8 bg-[#4F7F81] text-white rounded-xl text-sm shadow-xl">Rute
                            Terdekat</a>
                        <button data-modal-target="default-modal-detail-gambar"
                            data-modal-toggle="default-modal-detail-gambar"
                            class="poppins-medium py-3 px-8 bg-[#4F7F81] text-white rounded-xl text-sm shadow-xl">Foto
                            Detail</button>
                    </div>
                    <div class="flex justify-between w-full text-white">
                        <button class="px-20 py-3 poppins-regular bg-gradient-to-tr from-[#60BC9D] to-[#12372A] rounded-3xl">Deskripsi</button>
                        <button class="px-20 py-3 poppins-regular bg-gradient-to-tr from-[#60BC9D] to-[#12372A] rounded-3xl">Paket</button>
                        <button class="px-20 py-3 poppins-regular bg-gradient-to-tr from-[#60BC9D] to-[#12372A] rounded-3xl">Metode</button>
                        <button class="px-20 py-3 poppins-regular bg-gradient-to-tr from-[#60BC9D] to-[#12372A] rounded-3xl">Fasilitas</button>
                        <button class="px-20 py-3 poppins-regular bg-gradient-to-tr from-[#60BC9D] to-[#12372A] rounded-3xl">Lokasi</button>
                    </div>
                </div>
        </div>
    </div>
    </div>

    <div class="container">

        <p class="poppins-medium font-semibold text-sm xl:text-xl text-black pb-4">
            ({{ optional($data->kategoris)->nama_kategori ?? 'Kategori tidak tersedia' }}
            )</p>



        <!-- Main modal -->
        <div id="default-modal-detail-gambar" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl xl:max-w-3xl 2xl:max-w-4xl max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="p-4 md:p-5 space-y-4">
                        <div class="relative  overflow-hidden rounded-lg gap-4 space-y-4 ">
                            @if (!empty($imageNames) && count($imageNames) > 0)
                                @foreach ($imageNames as $index => $img_konten)
                                    <div class="border border-slate-300 rounded-md p-4">
                                        <img src="{{ asset('storage/' . $img_konten) }}" class="w-full h-auto object-contain"
                                            alt="Image {{ $index + 1 }}">
                                    </div>
                                @endforeach
                            @else
                                <div class="block duration-1000 ease-in-out" data-carousel-item>
                                    <img src="https://via.placeholder.com/600x400" class="w-full h-auto object-contain"
                                        alt="No image available">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="text-black poppins-medium font-semibold pb-2 text-2xl pt-4 poppins-semibold">
            <p>Deskripsi</p>
        </div>
        <div>
            <p class="poppins-regular text-black text-lg pb-2" id="deskripsi-text">
                {{ Str::limit($data->deskripsi, 500, '...') }}
            </p>
            @if (strlen($data->deskripsi) > 500)
                <button id="toggle-deskripsi" class="text-blue-500 hover:underline poppins-medium text-sm mt-2">
                    Lihat Selengkapnya
                </button>
            @endif
        </div>

        <div class="grid grid-cols-1 gap-4 py-10">
            {{-- Bagian Paket --}}
            <div class="w-auto xl:max-w-max space-y-4">
                <p class="poppins-semibold font-semibold text-2xl text-black underline">
                    Paket
                </p>
                <p class="pl-4 poppins-regular text-lg text-black" id="paket-text">
                    {!! htmlspecialchars_decode(Str::limit(strip_tags($data->paket, '<br><p><strong><em>'), 250, '...')) !!}
                </p>
                @if (strlen(strip_tags($data->paket)) > 200)
                    <button id="toggle-paket" class="pl-4 text-blue-500 hover:underline poppins-medium text-sm mt-2">
                        Lihat Selengkapnya
                    </button>
                @endif
            </div>


            {{-- Bagian Metode Pembelajaran --}}
            <div class="w-auto xl:max-w-max space-y-4">
                <p class="poppins-semibold text-2xl text-black underline">
                    Metode Pembelajaran
                </p>
                <p class="pl-4 poppins-regular text-lg text-black" id="metode-text">
                    {!! htmlspecialchars_decode(Str::limit(strip_tags($data->metode, '<br><p><strong><em>'), 250, '...')) !!}
                </p>
                @if (strlen(strip_tags($data->metode)) > 250)
                    <button id="toggle-metode" class="pl-4 text-blue-500 hover:underline poppins-medium text-sm mt-2">
                        Lihat Selengkapnya
                    </button>
                @endif
            </div>

            {{-- Bagian Fasilitas --}}
            <div class="w-auto xl:max-w-max space-y-4">
                <p class="poppins-semibold font-semibold text-2xl text-black underline">
                    Fasilitas
                </p>
                <p class="pl-4 poppins-regular text-lg text-black" id="fasilitas-text">
                    {!! htmlspecialchars_decode(Str::limit(strip_tags($data->fasilitas, '<br><p><strong><em>'), 250, '...')) !!}
                </p>
                @if (strlen(strip_tags($data->fasilitas)) > 250)
                    <button id="toggle-fasilitas" class="pl-4 text-blue-500 hover:underline poppins-medium text-sm mt-2">
                        Lihat Selengkapnya
                    </button>
                @endif
            </div>


            {{-- Bagian Lokasi --}}
            <div class="w-auto xl:max-w-max space-y-4">
                <p class="poppins-semibold font-semibold text-2xl text-black underline">
                    Lokasi
                </p>
                <p class="pl-4 poppins-regular text-lg text-black" id="lokasi-text">
                    {!! htmlspecialchars_decode(Str::limit(strip_tags($data->lokasi, '<br><p><strong><em>'), 250, '...')) !!}
                </p>
                @if (strlen(strip_tags($data->lokasi)) > 250)
                    <button id="toggle-lokasi" class="pl-4 text-blue-500 hover:underline poppins-medium text-sm mt-2">
                        Lihat Selengkapnya
                    </button>
                @endif
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Fungsi reusable untuk mengatur toggle teks
                function toggleText(elementId, buttonId, fullText) {
                    const textElement = document.getElementById(elementId);
                    const toggleButton = document.getElementById(buttonId);

                    if (toggleButton) {
                        const shortText = textElement.innerHTML; // Teks pendek yang sudah dirender
                        toggleButton.addEventListener('click', function () {
                            if (textElement.innerHTML === shortText) {
                                // Tampilkan teks penuh
                                textElement.innerHTML = fullText;
                                toggleButton.innerText = 'Tampilkan Lebih Sedikit';
                            } else {
                                // Kembalikan ke teks pendek
                                textElement.innerHTML = shortText;
                                toggleButton.innerText = 'Lihat Selengkapnya';
                            }
                        });
                    }
                }

                // Terapkan fungsi ke setiap bagian
                toggleText('paket-text', 'toggle-paket', @json($data->paket));
                toggleText('metode-text', 'toggle-metode', @json($data->metode));
                toggleText('fasilitas-text', 'toggle-fasilitas', @json($data->fasilitas));
                toggleText('lokasi-text', 'toggle-lokasi', @json($data->lokasi));
                toggleText('deskripsi-text', 'toggle-deskripsi', @json($data->deskripsi));
            });
        </script>
        <div class="grid grid-cols-6 gap-4 py-20 ">
            <!-- Left Column: Comment Form -->
            <!-- Right Column: Ratings and Reviews -->
            <div class="col-span-4 ">
                <!-- Ratings Section -->
                <div class="bg-gray-50">
                    <div class=" flex justify-between items-center">
                        <div class="flex w-full items-center">
                            <div class="flex items-center">
                                @for ($i = 1; $i <= 5; $i++)
                                    <svg class="w-5 h-5 {{ $i <= round($averageRating) ? 'text-yellow-400' : 'text-gray-300' }}"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                @endfor
                                <span class="text-sm pl-4">Rata-rata: {{ round($averageRating, 1) }} / 5</span>
                            </div>
                            <div class=" md:ml-4">
                                <p class="poppins-medium poppins-regular text-sm xl:text-xl text-black">
                                    (Total: {{ $totalRatings }} ulasan)
                                </p>
                            </div>
                        </div>

                        <div class="w-full">

                            {{ $ulasan->links() }}
                        </div>

                    </div>
                    <!-- Reviews Section -->
                </div>
                <div class="grid md:grid-cols-3 gap-4 items-center justify-end rtl">
                    @foreach ($ulasan as $review)
                        <div class="mb-6 mt-4 p-4 bg-white rounded-lg shadow-xl">
                            <!-- Reviewer Info -->
                            <div class="flex items-center mb-3">
                                <img src="/img/profil.png" alt="User Avatar" class="w-10 h-10 rounded-full mr-4">
                                <div>
                                    <h4 class="font-bold text-gray-800">{{ $review->user->name ?? 'Anonim' }}</h4>
                                    <p class="text-sm text-gray-500">
                                        {{ $review->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </div>

                            <!-- Reviewer Rating -->
                            <div class="flex items-center mb-2">
                                @for ($i = 1; $i <= 5; $i++)
                                    <svg class="w-5 h-5 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                @endfor
                            </div>

                            <!-- Review Comment -->
                            <p class="text-gray-700">{{ $review->comment }}</p>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination Links -->

            </div>
            <div class="col-span-2">
                @auth
                    <form action="{{ route('storeUlasan') }}" method="POST">
                        @csrf
                        <div class="max-w-xl mb-4 border border-gray-200 rounded-lg bg-gray-50">
                            <!-- Comment Input -->
                            <div class="hidden">
                                <input name="user_id" value="{{ Auth::user()->id }}" type="text">
                                <input name="kursus_id" value="{{ $data->id }}" type="text">
                            </div>
                            <div class="px-4 py-2 bg-white rounded-t-lg">
                                <label for="comment" class="sr-only">Your comment</label>
                                <textarea id="comment" name="comment" rows="4"
                                    class="w-full px-0 text-sm text-gray-900 bg-white border-0 focus:ring-0 placeholder-gray-400"
                                    placeholder="Write a comment..." required></textarea>
                            </div>
                            <!-- Rating Stars and Submit Button -->
                            <div class="flex items-center justify-between px-3 py-2 border-t border-gray-200">
                                <!-- Rating Stars -->
                                <div class="flex items-center space-x-2" id="rating-stars">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <label class="cursor-pointer">
                                            <input type="radio" name="rating" value="{{ $i }}" class="hidden" />
                                            <svg class="w-6 h-6 text-gray-300 hover:text-yellow-400 transition-colors duration-200"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                <path
                                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                            </svg>
                                        </label>
                                    @endfor

                                </div>

                                <script>
                                    // JavaScript for managing star ratings
                                    const starsContainer = document.getElementById('rating-stars');
                                    const stars = starsContainer.querySelectorAll('svg');
                                    const inputs = starsContainer.querySelectorAll('input[type="radio"]');

                                    stars.forEach((star, index) => {
                                        star.addEventListener('click', () => {
                                            // Set all previous stars to active
                                            stars.forEach((s, i) => {
                                                if (i <= index) {
                                                    s.classList.add('text-yellow-400');
                                                    s.classList.remove('text-gray-300');
                                                } else {
                                                    s.classList.add('text-gray-300');
                                                    s.classList.remove('text-yellow-400');
                                                }
                                            });

                                            // Set the corresponding radio input
                                            inputs[index].checked = true;
                                        });
                                    });
                                </script>

                                <!-- Submit Button -->
                                <button type="submit"
                                    class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-blue-800">
                                    Post Comment
                                </button>
                            </div>
                        </div>
                    </form>
                @endauth

                @guest
                    <p class="text-sm poppins-regular text-gray-500">
                        Anda harus <a href="{{ route('login') }}" class="text-green-800 poppins-semibold hover:underline">login</a> untuk
                        memberikan ulasan.
                    </p>
                @endguest



                <!-- Community Guidelines -->
                <p class="ms-auto text-xs poppins-regular text-gray-500">
                    Remember, contributions to this topic should follow our
                    <a href="#" class="text-green-800 poppins-semibold hover:underline">Community Guidelines</a>.
                </p>
            </div>


        </div>
    </div>
</x-layout>