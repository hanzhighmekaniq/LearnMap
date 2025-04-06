<div class="grid lg:grid-cols-2 gap-10 pb-10 px-4 md:px-0">
    <div class=" space-y-4 lg:pr-28">
        <div class="">
            <div class="flex justify-start mb-4 mt-2">
                <a href="/kursus/{{ $data->id }}/rute" target="_blank"
                    class="inline-flex items-center gap-2 px-5 py-2 text-white bg-gradient-to-tr from-[#60BC9D] to-[#12372A] hover:brightness-110 transition-all duration-200 rounded-full shadow-md poppins-medium text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 20l-5.447-2.724A2 2 0 013 15.382V8.618a2 2 0 01.553-1.382L9 4m6 16l5.447-2.724A2 2 0 0021 15.382V8.618a2 2 0 00-.553-1.382L15 4M9 4v16m6-16v16" />
                    </svg>
                    Lihat Rute
                </a>
            </div>

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
    <div class=" space-y-2">
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
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7L1 13" />
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
                window.addEventListener('click', function (event) {
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
        <div class="grid lg:grid-cols-3 w-full gap-4 items-center justify-start lg:justify-end rtl">
            @foreach ($ulasan as $review)
                <div class="mb-6 mt-4 p-4 bg-white rounded-lg shadow-xl w-full">
                    <!-- Reviewer Info -->
                    <div class="flex items-center mb-3 w-full">
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

                    <p id="comment-text-{{ $review->id }}" class="text-gray-700">
                        @if (strlen($review->comment) > 100)
                            {{ Str::limit($review->comment, 100) }}
                            <button class="text-blue-600 underline ml-2" data-id="{{ $review->id }}"
                                data-full="{{ e($review->comment) }}" onclick="showFullComment(this)">
                                Lihat Selengkapnya
                            </button>
                        @else
                            {{ $review->comment }}
                        @endif
                    </p>


                    <script>
                        function showFullComment(button) {
                            const id = button.getAttribute('data-id');
                            const fullText = button.getAttribute('data-full');
                            const el = document.getElementById('comment-text-' + id);
                            el.innerHTML = fullText.replace(/\n/g, "<br>");
                        }
                    </script>



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
                Anda harus <a href="{{ route('login') }}" class="text-green-800 poppins-semibold hover:underline">login</a>
                untuk
                memberikan ulasan.
            </p>
        @endguest



        <!-- Community Guidelines -->
        <p class="ms-auto text-xs poppins-regular text-gray-500">
            Remember, contributions to this topic should follow our
            <a href="#" class="text-green-800 poppins-semibold hover:underline">Community
                Guidelines</a>.
        </p>
    </div>


</div>