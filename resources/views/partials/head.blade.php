<!-- Flowbite CSS dan JS -->


<!-- CSS Aplikasi -->
@vite(['resources/css/app.css', 'resources/js/app.js'])

<!-- Viewport untuk Responsif -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Leaflet CSS dan JS -->
<script src="https://cdn.jsdelivr.net/npm/leaflet@1.8.0/dist/leaflet.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.8.0/dist/leaflet.min.css">
<!-- Leaflet Geocoder Plugin -->
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

<!-- Flowbite JS -->
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/font.css') }}">

@stack('script')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

<!-- link font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">


</style>
