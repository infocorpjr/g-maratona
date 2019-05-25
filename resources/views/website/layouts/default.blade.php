<!DOCTYPE html>
<html class="no-js">
<head>
    <!-- Meta tag's -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- SEO -->
@include('partials.seo')

<!-- Títuto -->
    <title>PRH Faet</title>
    <!-- Estilos -->
    <link rel="stylesheet" href="{{ asset('css/default.css') }}">
</head>
<body>
@include('site.header')
<!-- Content -->
@yield('content')
<!-- Footer -->
@include('site.footer')
<!-- Scripts -->
<script src="{{ asset('js/default.js') }}"></script>
</body>
</html>