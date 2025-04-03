<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'public/css/font.css'])
    @include('components.navbar')
    @include('partials.font')
    @include('partials.head')

</head>

<body>
    @if (session('success'))
        <div
            class="fixed top-4 left-1/2 transform -translate-x-1/2 p-4 text-sm text-green-700 bg-green-100 rounded-lg shadow-lg z-50">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div
            class="fixed top-4 left-1/2 transform -translate-x-1/2 p-4 text-sm text-red-700 bg-red-100 rounded-lg shadow-lg z-50">
            {{ session('error') }}
        </div>
    @endif



    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    {{ $slot }}
</body>

@include('components.footer')

</html>
