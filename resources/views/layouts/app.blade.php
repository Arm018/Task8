<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/color.css">
    <link rel="stylesheet" href="/css/icons.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div id="wrapper">
    <!-- Compare Properties Widget / End -->
    @include('profile.layouts.right_sidebar')
    <!-- Header Container
    ================================================== -->
    @include('layouts.header')

    @yield('content')
    <!-- FOOTER -->

    <div id="backtotop"><a href="#"></a></div>
</div>


<script type="text/javascript" src="/scripts/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="/scripts/custom.js"></script>
<script type="text/javascript" src="/scripts/jquery-migrate-3.1.0.min.js"></script>
<script type="text/javascript" src="/scripts/chosen.min.js"></script>
<script type="text/javascript" src="/scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="/scripts/owl.carousel.min.js"></script>
<script type="text/javascript" src="/scripts/rangeSlider.js"></script>
<script type="text/javascript" src="/scripts/sticky-kit.min.js"></script>
<script type="text/javascript" src="/scripts/slick.min.js"></script>
<script type="text/javascript" src="/scripts/masonry.min.js"></script>
<script type="text/javascript" src="/scripts/mmenu.min.js"></script>
<script type="text/javascript" src="/scripts/tooltips.min.js"></script>
</body>
</html>
