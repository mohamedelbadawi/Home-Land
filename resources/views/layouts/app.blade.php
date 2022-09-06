<!DOCTYPE html>
<html lang="en">

<head>
    <title>Homeland &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="{{ asset('assets/front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/mediaelementplayer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/fl-bigmug-line.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/front/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}">
    @livewireStyles

</head>

<body>

    @include('layouts.partials.app_nav')






    @yield('content')








    @include('layouts.partials.app_footer')


    <script src="{{ asset('assets/front/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/front/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/mediaelement-and-player.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/aos.js') }}"></script>

    <script src="{{ asset('assets/front/js/main.js') }}"></script>
    @livewireScripts


</body>

</html>
