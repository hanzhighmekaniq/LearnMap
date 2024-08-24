
@include('components.navbar')
@include('partials.head')
@include('partials.font')
<body>
  {{ $slot }}
</body>
@include('components.footer')