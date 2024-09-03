<!DOCTYPE html>
<html lang="en">
<head>
  @include('components.navbar')
  @include('partials.head')
  @include('partials.font')

</head>
<body>
  {{ $slot }}
</body>

@include('components.footer')
</html>


