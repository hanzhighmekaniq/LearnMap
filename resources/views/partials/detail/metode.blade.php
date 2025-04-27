<div class="w-full mb-10 border p-10">
    <p class="poppins-semibold text-2xl text-black ">
        Metode Pembelajaran
    </p>
    <p class="poppins-semibold pb-4">{{ $data->nama_kursus }}</p>

    <p class="pl-4 poppins-regular text-lg text-black" id="metode-text">
        {!! htmlspecialchars_decode(Str::limit(strip_tags($data->metode, '<br><p><strong><em>'), 2000, '...')) !!}
    </p>

    @if (strlen(strip_tags($data->metode)) > 2000)
        <button id="toggle-metode" class="pl-4 text-blue-500 hover:underline poppins-medium text-sm mt-2">
            Lihat Selengkapnya
        </button>
    @endif
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const metodeText = document.getElementById("metode-text");
            const toggleButton = document.getElementById("toggle-metode");

            if (toggleButton && metodeText) {
                const fullText = `{!! addslashes($data->metode) !!}`;
                const shortText = `{!! addslashes(
                    htmlspecialchars_decode(Str::limit(strip_tags($data->metode, '<br><p><strong><em>'), 2000, '...')),
                ) !!}`;
                let expanded = false;

                toggleButton.addEventListener("click", function() {
                    if (expanded) {
                        metodeText.innerHTML = shortText;
                        toggleButton.textContent = "Lihat Selengkapnya";
                    } else {
                        metodeText.innerHTML = fullText;
                        toggleButton.textContent = "Sembunyikan";
                    }
                    expanded = !expanded;
                });
            }
        });
    </script>
</div>
