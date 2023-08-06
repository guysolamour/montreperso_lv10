<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        {{-- Required meta tags --}}
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="fr">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @yield('seo')
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap Icons-->
        <link href="{{ asset('/vendor/template/assets/css/bootstrap-icons.css') }}" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="{{ asset('/vendor/template/assets/css/merriweathergfonts.css') }}" rel="stylesheet" />
        <link href="{{ asset('/vendor/template/assets/css/merriweathergfontitalic.css') }}" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="{{ asset('/vendor/template/assets/css/simpleLightbox.css') }}" rel="stylesheet" />
        {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" /> --}}
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="{{ asset('/vendor/template/assets/css/bootstrap5.css') }}">
        <link href=" {{ asset('/vendor/template/assets/css/styles.css')}}" rel="stylesheet" />


        {{-- Flashy --}}
        <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700' rel='stylesheet'>
        <style>
            .progress { position:relative; width:100%; }
            .bar { background-color: #b5076f; width:0%; height:20px; }
            .percent { position:absolute; display:inline-block; left:50%; color: #040608;}
        </style>
        @stack('css')


    </head>
    <body id="page-top">
        {{-- @include('front.partials._header') --}}



        @yield('content')

        @include('front.partials._footer')

        <script src="{{ asset('js/vendor/jquery.min.js') }}"></script>
        <!-- Bootstrap core JS-->
        <script src="{{ asset('/vendor/template/assets/js/bootstrap.bundle.min.js') }}"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> --}}
        <!-- SimpleLightbox plugin JS-->
        <script src="{{ asset('/vendor/template/assets/js/simpleLightbox.min.js') }}"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script> --}}
        <!-- Core theme JS-->
        <script src="{{ asset('/vendor/template/assets/js/scripts.js') }}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="{{ asset('/vendor/template/assets/js/sb-forms-latest.js') }}"></script>
        {{-- <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script> --}}


        <!-- Bootstrap core JS-->
        {{-- <script src="{{ asset('/vendor/template/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('/vendor/template/assets/js/bootstrap5.js') }}"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="{{ asset('/vendor/template/assets/js/simpleLightbox.js') }}"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('/vendor/template/assets/js/scripts.js') }}" ></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script  src="{{ asset('/vendor/template/assets/js/sbForm.js') }}"></script> --}}


        @stack('js')
        @flashy()

        @include('cookie-consent::index')
    </body>
</html>
