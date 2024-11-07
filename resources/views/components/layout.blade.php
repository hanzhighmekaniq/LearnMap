<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @include('components.navbar')
    @include('partials.font')

</head>

<body>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    {{ $slot }}
</body>

@include('components.footer')

</html>
