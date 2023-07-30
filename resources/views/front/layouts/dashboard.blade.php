<!doctype html>
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

    <!-- FONTS and ICONS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500"
        rel="stylesheet" />
    <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />


    <!-- PLUGINS CSS STYLE -->
    <link href="{{ asset('vendor/sleek/assets/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />



    <!-- No Extra plugin used -->



    <link href="{{ asset('vendor/sleek/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />



    <link href="{{ asset('vendor/sleek/assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />



    <link href="{{ asset('vendor/sleek/assets/plugins/toastr/toastr.min.css') }}" rel="stylesheet" />



    <!-- SLEEK CSS -->
    <link id="sleek-css" rel="stylesheet" href="{{ asset('vendor/sleek/assets/css/sleek.css') }}" />

    <!-- FAVICON -->
    <link href="vendor/sleek/assets/img/favicon.png" rel="shortcut icon" />
    <link rel="stylesheet" href="{{ asset('css/vendor/fontawesome.css') }}">


    <!--
        HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
    -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    <script src="{{ asset('vendor/sleek/assets/plugins/nprogress/nprogress.js') }}"></script>
    @stack('css')
</head>

<body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">
    <script>
        NProgress.configure({ showSpinner: false });
            NProgress.start();
    </script>
    <div id="toaster"></div>


    <div class="wrapper">
        @include('front.dashboard.partials._sidebar')
        <div class="page-wrapper">
            @include('front.dashboard.partials._header')

            <div class="content-wrapper">
                @yield('content')

                @include('front.dashboard.partials._footer')
            </div>
        </div>


        <script src="{{ asset('vendor/sleek/assets/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/sleek/assets/plugins/slimscrollbar/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('vendor/sleek/assets/plugins/jekyll-search.min.js') }}"></script>

        <script src="{{ asset('vendor/sleek/assets/plugins/charts/Chart.min.js') }}"></script>

        <script src="{{ asset('vendor/sleek/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
        <script src="{{ asset('vendor/sleek/assets/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>

        <script src="{{ asset('vendor/sleek/assets/plugins/daterangepicker/moment.min.js') }}"></script>
        <script src="{{ asset('vendor/sleek/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
        <script>
            jQuery(document).ready(function() {
                    jQuery('input[name="dateRange"]').daterangepicker({
                        autoUpdateInput: false,
                        singleDatePicker: true,
                        locale: {
                            cancelLabel: 'Clear'
                        }
                    });
                    jQuery('input[name="dateRange"]').on('apply.daterangepicker', function (ev, picker) {
                        jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
                    });
                    jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function (ev, picker) {
                        jQuery(this).val('');
                    });
                });
        </script>

        <script src="{{ asset('vendor/sleek/assets/plugins/toastr/toastr.min.js') }}"></script>
        <script src="{{ asset('vendor/sleek/assets/js/sleek.bundle.js') }}"></script>


        <script src="{{ asset('js/vendor/helpers.js') }}"></script>

        {{-- <script src="{{ asset('js/vendor/fontawesome.js') }}"></script> --}}
        @stack('js')
        @flashy()

        @include('cookie-consent::index')

        {{-- add livenews extension here --}}
</body>

</html>
