<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('partials.font')
    @include('partials.head')
</head>

<body>
<div class="flex justify-center absolute top-36 w-full">
    <div class="w-auto mx-auto" style="z-index: 9999;">
        @if (session('success'))
            <div id="success-notification" class="p-4 max-w-[400px] w-auto text-center text-sm text-green-700 bg-green-100 rounded-lg shadow-lg opacity-0 animate-slideIn">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div id="error-notification" class="p-4 max-w-[400px] w-auto text-center text-sm text-red-700 bg-red-100 rounded-lg shadow-lg opacity-0 animate-slideIn">
                {{ session('error') }}
            </div>
        @endif
    </div>
</div>

<style>
    @keyframes slideIn {
        0% {
            transform: translateY(50px);
            opacity: 0;
        }
        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .animate-slideIn {
        animation: slideIn 0.5s ease-out forwards;
    }
</style>

<script>
    // Fungsi untuk menghapus notifikasi setelah 5 detik
    setTimeout(function() {
        const successNotif = document.getElementById('success-notification');
        const errorNotif = document.getElementById('error-notification');
        
        if (successNotif) {
            successNotif.style.transition = 'opacity 0.5s ease-out';
            successNotif.style.opacity = '0';
            setTimeout(function() {
                successNotif.remove();
            }, 500); // Menghapus elemen setelah transisi selesai
        }

        if (errorNotif) {
            errorNotif.style.transition = 'opacity 0.5s ease-out';
            errorNotif.style.opacity = '0';
            setTimeout(function() {
                errorNotif.remove();
            }, 500); // Menghapus elemen setelah transisi selesai
        }
    }, 5000); // Waktu 5 detik untuk muncul dan menghilang
</script>


<style>
    @keyframes slideIn {
        0% {
            transform: translateY(50px);
            opacity: 0;
        }
        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .animate-slideIn {
        animation: slideIn 0.5s ease-out forwards;
    }
</style>

<script>
    // Fungsi untuk menghapus notifikasi setelah 5 detik
    setTimeout(function() {
        const successNotif = document.getElementById('success-notification');
        const errorNotif = document.getElementById('error-notification');
        
        if (successNotif) {
            successNotif.style.transition = 'opacity 0.5s ease-out';
            successNotif.style.opacity = '0';
            setTimeout(function() {
                successNotif.remove();
            }, 500); // Menghapus elemen setelah transisi selesai
        }

        if (errorNotif) {
            errorNotif.style.transition = 'opacity 0.5s ease-out';
            errorNotif.style.opacity = '0';
            setTimeout(function() {
                errorNotif.remove();
            }, 500); // Menghapus elemen setelah transisi selesai
        }
    }, 5000); // Waktu 5 detik untuk muncul dan menghilang
</script>




    @include('components.navbar') <!-- Navbar harus di body! -->

    {{ $slot }}

    @include('components.footer')

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>

</html>
