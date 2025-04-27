<div class="w-full mb-10 border p-10">
    <p class="poppins-semibold font-semibold text-2xl text-black ">
        Paket
    </p>
    <p class="poppins-semibold pb-4">{{ $data->nama_kursus }}</p>
    <p class="pl-4 poppins-regular text-lg text-black" id="paket-text">
        {!! htmlspecialchars_decode(Str::limit(strip_tags($data->paket, '<br><p><strong><em>'), 2000, '...')) !!}
    </p>
    @if (strlen(strip_tags($data->paket)) > 2000)
        <button id="toggle-paket" class="pl-4 text-blue-500 hover:underline poppins-medium text-sm mt-2">
            Lihat Selengkapnya
        </button>
    @endif
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const paketText = document.getElementById("paket-text");
        const toggleButton = document.getElementById("toggle-paket");

        if (toggleButton && paketText) {
            const fullText = `{!! addslashes($data->paket) !!}`;
            const shortText = `{!! addslashes(htmlspecialchars_decode(Str::limit(strip_tags($data->paket, '<br><p><strong><em>'), 2000, '...'))) !!}`;
            let expanded = false;

            toggleButton.addEventListener("click", function() {
                if (expanded) {
                    paketText.innerHTML = shortText;
                    toggleButton.textContent = "Lihat Selengkapnya";
                } else {
                    paketText.innerHTML = fullText;
                    toggleButton.textContent = "Sembunyikan";
                }
                expanded = !expanded;
            });
        }
    });
</script>
