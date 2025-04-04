<!DOCTYPE html>
<html lang="en">

<head>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    {{-- <script src="../path/to/flowbite/dist/flowbite.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/flowbite@3.0.0/dist/flowbite.min.js"></script> --}}
    @include('partials.head')
    @vite(['resources/css/app.css', 'resources/js/app.js', 'public/css/font.css'])
    @include('partials.font')
    @include('partials.notification')
</head>

<body>

    @include('components.navbarAdmin')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg  mt-14">
            {{ $slot }}
        </div>
    </div>


</body>

</html>
