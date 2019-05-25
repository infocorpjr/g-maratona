<!DOCTYPE html>
<html class="no-js">
<head>
    <!-- Meta tag's -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Títuto -->
    <title>ADMIN - {{ env('APP_NAME') }}</title>
    <!-- Estilos -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
@include('cms.partials.navbar')
<!-- Content -->
@yield('content')
<!-- Footer -->
@include('cms.partials.footer')
<!-- Scripts -->
<script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>