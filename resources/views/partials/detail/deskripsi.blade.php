<div class="grid lg:grid-cols-2 gap-10 pb-10 px-4 md:px-0 border">
    <div class=" p-4 space-y-4 lg:pr-28">
        <div class="">
            <!-- <div class="flex justify-start mb-4 mt-2">
                <a href="/kursus/{{ $data->id }}/rute" target="_blank"
                    class="inline-flex items-center gap-2 px-5 py-2 text-white bg-gradient-to-tr from-[#60BC9D] to-[#12372A] hover:brightness-110 transition-all duration-200 rounded-full shadow-md poppins-medium text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 20l-5.447-2.724A2 2 0 013 15.382V8.618a2 2 0 01.553-1.382L9 4m6 16l5.447-2.724A2 2 0 0021 15.382V8.618a2 2 0 00-.553-1.382L15 4M9 4v16m6-16v16" />
                    </svg>
                    Lihat Rute
                </a>
            </div> -->

            <p class="font-bold pb-2">
                {{ $data->nama_kursus }}
            </p>
            <h1 class="poppins-reguler text-xl">{{ $data->deskripsi }}</h1>
        </div>
        <div>
            <p class="poppins-semibold text-2xl">Fasilitas</p>
            @if (!empty($data->fasilitas) && is_array($data->fasilitas))
                <div class="pl-2 poppins-reguler text-xl space-y-1">
                    @foreach ($data->fasilitas as $item)
                        <p>* {{ $item }}</p>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 italic">Tidak ada data fasilitas.</p>
            @endif
        </div>



    </div>
    <div class="p-4 space-y-2">
        @if (!empty($imageNames) && is_array($imageNames) && count($imageNames) > 0)
            {{-- Gambar utama di atas --}}
            <div>
                <img src="{{ asset('storage/' . $imageNames[0]) }}" alt="Gambar Utama"
                    class="w-full h-[320px] object-cover rounded-lg shadow-lg cursor-pointer" onclick="openModal()">
            </div>

            @if (count($imageNames) > 1)
                <div class="grid grid-cols-12 gap-2 mt-2">
                    {{-- Gambar kiri --}}
                    <div class="col-span-7">
                        <img src="{{ asset('storage/' . $imageNames[1]) }}" alt="Gambar Detail 1"
                            class="w-full h-80 object-cover rounded-lg cursor-pointer" onclick="openModal()">
                    </div>

                    {{-- Gambar kanan --}}
                    <div class="col-span-5 relative">
                        @if (count($imageNames) > 2)
                            <img src="{{ asset('storage/' . $imageNames[2]) }}" alt="Gambar Detail 2"
                                class="w-full h-80 object-cover rounded-lg cursor-pointer" onclick="openModal()">

                            {{-- Tombol +n jika lebih dari 3 gambar --}}
                            @if (count($imageNames) > 3)
                                <button data-modal-toggle="imageModal"
                                    class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white text-lg font-bold rounded-lg cursor-pointer">
                                    +{{ count($imageNames) - 3 }}
                                </button>
                            @endif

                        @endif
                    </div>
                </div>
            @endif

            {{-- Modal untuk menampilkan semua gambar --}}
            <div id="imageModal" tabindex="-1" aria-hidden="true"
                class="fixed inset-0 hidden z-[999] overflow-y-auto overflow-x-hidden bg-black bg-opacity-80 flex items-center justify-center">
                <div class="relative p-4 w-full max-w-6xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow">

                        <!-- Close button di pojok kanan atas -->
                        <button type="button"
                            class="absolute top-2 right-2 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center z-50"
                            onclick="toggleModal('imageModal')">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7L1 13" />
                            </svg>
                            <span class="sr-only">Tutup modal</span>
                        </button>

                        <div class="grid grid-cols-1 gap-4 p-6 overflow-y-auto max-h-[80vh]">
                            @foreach ($imageNames as $image)
                                <img src="{{ asset('storage/' . $image) }}" alt="Gambar Detail"
                                    class="w-full h-auto object-contain rounded-lg shadow-md">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


            <script>
                // Toggle modal visibility
                function toggleModal(id) {
                    const modal = document.getElementById(id);
                    modal.classList.toggle('hidden');
                }

                // Klik di luar modal content = close
                window.addEventListener('click', function(event) {
                    const modal = document.getElementById('imageModal');
                    if (!modal.classList.contains('hidden') && event.target === modal) {
                        modal.classList.add('hidden');
                    }
                });

                // Untuk tombol dengan data-modal-toggle
                document.querySelectorAll('[data-modal-toggle]').forEach(button => {
                    button.addEventListener('click', () => {
                        const targetId = button.getAttribute('data-modal-toggle');
                        toggleModal(targetId);
                    });
                });
            </script>
        @else
            <p class="text-gray-500 italic text-center">Tidak ada gambar yang tersedia.</p>
        @endif

    </div>
</div>


<div class="grid grid-cols-1 lg:grid-cols-6 gap-6 py-16 px-4">
    <!-- LEFT / Reviews -->
    <div class="lg:col-span-4 space-y-6">
        <!-- RATING OVERVIEW -->
        <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
            <div class="grid grid-cols-1 lg:grid-cols-2 lg:flex-row justify-between items-start lg:items-center gap-4">
                <div class="flex items-center flex-wrap">
                    @for ($i = 1; $i <= 5; $i++)
                        <svg class="w-5 h-5 {{ $i <= round($averageRating) ? 'text-yellow-400' : 'text-gray-300' }}"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                    @endfor
                    <span class="ml-4 text-sm text-gray-700">Rata-rata: <strong>{{ round($averageRating, 1) }}</strong>
                        / 5</span>
                    <span class="ml-4 text-sm text-gray-500">(Total: {{ $totalRatings }} ulasan)</span>
                </div>
                <!-- Pagination -->
                <div class="w-full">
                    {{ $ulasan->links() }}
                </div>
            </div>
        </div>

        <!-- REVIEW CARDS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
            @foreach ($ulasan as $review)
                <div class="bg-white rounded-lg shadow p-4">
                    <div class="flex items-center mb-2">
                        <img src="/img/profil.png" alt="User Avatar" class="w-10 h-10 rounded-full mr-3">
                        <div>
                            <p class="text-sm font-semibold text-gray-800">{{ $review->user->name ?? 'Anonim' }}</p>
                            <p class="text-xs text-gray-500">{{ $review->created_at->diffForHumans() }}</p>
                        </div>
                    </div>

                    <div class="flex mb-2">
                        @for ($i = 1; $i <= 5; $i++)
                            <svg class="w-4 h-4 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                        @endfor
                    </div>

                    <p id="comment-text-{{ $review->id }}" class="text-gray-700 text-sm">
                        @if (strlen($review->comment) > 100)
                            {{ Str::limit($review->comment, 100) }}
                            <button class="text-blue-600 underline ml-2 text-xs" data-id="{{ $review->id }}"
                                data-full="{{ e($review->comment) }}" onclick="showFullComment(this)">
                                Lihat Selengkapnya
                            </button>
                        @else
                            {{ $review->comment }}
                        @endif
                    </p>
                </div>
            @endforeach
        </div>
    </div>

    <!-- RIGHT / FORM -->
    <div class="lg:col-span-2 space-y-6">
        @auth
            <form action="{{ route('storeUlasan') }}" method="POST"
                class="bg-white rounded-lg shadow p-6 border border-gray-200">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="kursus_id" value="{{ $data->id }}">

                <textarea name="comment" rows="4"
                    class="w-full text-sm border border-gray-300 rounded-md p-3 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Tulis ulasan Anda..." required></textarea>

                <div class="flex items-center justify-between mt-4">
                    <div class="flex space-x-1" id="rating-stars">
                        @for ($i = 1; $i <= 5; $i++)
                            <svg data-index="{{ $i }}"
                                class="w-6 h-6 text-gray-300 cursor-pointer transition-colors duration-200"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                        @endfor
                        <input type="hidden" name="rating" id="rating-input" value="0">
                    </div>

                    <script>
                        const stars = document.querySelectorAll('#rating-stars svg');
                        const ratingInput = document.getElementById('rating-input');

                        stars.forEach((star, index) => {
                            star.addEventListener('click', () => {
                                const rating = index + 1;
                                ratingInput.value = rating;

                                stars.forEach((s, i) => {
                                    s.classList.toggle('text-yellow-400', i < rating);
                                    s.classList.toggle('text-gray-300', i >= rating);
                                });
                            });
                        });
                    </script>


                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-700 transition">
                        Kirim Ulasan
                    </button>
                </div>
            </form>
        @endauth

        @guest
            <p class="text-sm text-gray-500">
                Anda harus <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-semibold">login</a>
                untuk memberi ulasan.
            </p>
        @endguest

        <p class="text-xs text-gray-400">
            Pastikan ulasan Anda sesuai dengan <a href="#" class="text-blue-500 underline">pedoman
                komunitas</a>.
        </p>
    </div>
</div>

<!-- JS for expanding comment -->
<script>
    function showFullComment(button) {
        const id = button.getAttribute('data-id');
        const fullText = button.getAttribute('data-full');
        const el = document.getElementById('comment-text-' + id);
        el.innerHTML = fullText.replace(/\n/g, "<br>");
    }
</script>
