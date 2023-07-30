<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> @yield('title') | Administration</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="robots" content="noindex,nofollow,noarchive" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('vendor/themekit/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('vendor/themekit/plugins/fontawesome-free/css/all.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('vendor/themekit/plugins/icon-kit/dist/css/iconkit.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/themekit/plugins/ionicons/dist/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/themekit/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/themekit/plugins/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/themekit/plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/themekit/plugins/weather-icons/css/weather-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/themekit/plugins/c3/c3.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('vendor/themekit/plugins/owl.carousel/dist/assets/owl.carousel.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('vendor/themekit/plugins/owl.carousel/dist/assets/owl.theme.default.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('vendor/themekit/dist/css/theme.min.css') }}">
    <script src="{{ asset('vendor/themekit/js/modernizr-2.8.3.min.js') }}"></script>

    <link href="{{ asset('css/vendor/fontawesome.css') }}" rel="stylesheet" media="all">

    <link href="{{ asset('css/vendor/sweetalert.css') }}" rel="stylesheet">

    @stack('css')
</head>

<body>
  <!--[if lt IE 8]>
            <p class="browserupgrade">Vous utilisez une version <strong>obsolète</strong> de votre navigateur. Merci <a href="http://browsehappy.com/">de mettre à jour votre navigateur</a> pour améliorer l'expérience utilisateur.</p>
        <![endif]-->

    <div class="wrapper">
       @include('back.partials._header')

        <div class="page-wrap">
            @include('back.partials._sidebar')

            @yield('content')
           @include('back.partials._footer')

        </div>
    </div>




    <script src="{{ asset('vendor/themekit/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('vendor/themekit/plugins/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/themekit/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/themekit/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('vendor/themekit/plugins/screenfull/dist/screenfull.js') }}"></script>

    <script src="{{ asset('vendor/themekit/plugins/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('vendor/themekit/plugins/moment/moment.js') }}"></script>
    <script src="{{ asset('vendor/themekit/plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('vendor/themekit/plugins/d3/dist/d3.min.js') }}"></script>
    <script src="{{ asset('vendor/themekit/plugins/c3/c3.min.js') }}"></script>
    <script src="{{ asset('vendor/themekit/js/tables.js') }}"></script>
    <script src="{{ asset('vendor/themekit/js/widgets.js') }}"></script>
    <script src="{{ asset('vendor/themekit/js/charts.js') }}"></script>
    <script src="{{ asset('vendor/themekit/dist/js/theme.min.js') }}"></script>
    <script src="{{ asset('js/vendor/axios.js') }}"></script>
    <script src="{{ asset('js/vendor/helpers.js') }}"></script>
    <script defer src="{{ asset('js/vendor/alpine.js') }}"></script>
    <script src="{{ asset('js/vendor/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/vendor/larails-alert.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    @stack('js')
    @flashy()
</body>

</html>
