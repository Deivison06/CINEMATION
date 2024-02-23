<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>CINEMATION</title>
</head>
<body >
  <div class="w-full h-auto min-h-screen flex flex-col">
    {{-- Header Section --}}
    @include('component.header')
    {{-- Banner section --}}
    @include('component.banner')
    {{-- Top 10 Movies  section--}}
    @include('component.topTenMovies')
     {{-- Top 10 TV Shows  section--}}
     @include('component.topTenShows')
     {{-- footer  section--}}
     @include('component.footer')
  </div>


</body>
</html>