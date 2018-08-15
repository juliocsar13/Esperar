<!DOCTYPE html>
    <head>

    <!-- Basic Page Needs
    ================================================== -->
    <title>Escapar.me ~ Las mejores reviews de los mejores lugares.</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/colors/main.css') }}" id="colors">

    @yield('og-facebook')

    @yield('css')

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KQ242ZB');</script>
    <!-- End Google Tag Manager -->


    </head>

    <body>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KQ242ZB" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        <div id="wrapper">
            @include('frontend.layouts.partials.header')

            @yield('content')
        </div>

        <!-- Scripts
        ================================================== -->
        <script type="text/javascript" src="{{ asset('frontend/scripts/jquery-2.2.0.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/scripts/mmenu.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/scripts/chosen.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/scripts/slick.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/scripts/rangeslider.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/scripts/magnific-popup.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/scripts/waypoints.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/scripts/counterup.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/scripts/jquery-ui.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/scripts/tooltips.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/scripts/custom.js') }}"></script>
        @yield('js')

    </body>
</html>
