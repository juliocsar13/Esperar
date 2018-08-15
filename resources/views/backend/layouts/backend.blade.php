<!DOCTYPE html>
<head>

<!-- Basic Page Needs
================================================== -->
<title> @yield('title') </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/colors/main.css') }}" id="colors">

@yield('css')

</head>

<body>

<!-- Wrapper -->
<div id="wrapper">

    @include('backend.layouts.partials.header')


    <!-- Dashboard -->
    <div id="dashboard">

        @include('backend.layouts.partials.sidebar')


        <!-- Content
        ================================================== -->
        <div class="dashboard-content">

            @yield('content')

        </div>
        <!-- Content / End -->


    </div>
    <!-- Dashboard / End -->


</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
<script type="text/javascript" src="{{ asset('backend/scripts/jquery-2.2.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/scripts/mmenu.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/scripts/chosen.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/scripts/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/scripts/rangeslider.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/scripts/magnific-popup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/scripts/waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/scripts/counterup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/scripts/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/scripts/tooltips.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/scripts/custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/scripts/main.js') }}"></script>

    @yield('js')
</body>
</html>