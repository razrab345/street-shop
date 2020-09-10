<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Интернет-магазин Street-Shop</title>
  <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
  @include('header')
  <div class="content">
  @yield('content')
  @yield('content-home')
    </div>
</body>
</html>