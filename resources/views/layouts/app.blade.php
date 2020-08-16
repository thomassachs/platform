<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nightmode.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vertical-responsive-menu.min.css') }}" rel="stylesheet"> --}}

    <!-- Stylesheets -->
	{{-- <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,500' rel='stylesheet'> --}}
	<link href='{{ asset('vendor/unicons-2.0.1/css/unicons.css') }}' rel='stylesheet'>
	<link href="{{ asset('css/vertical-responsive-menu.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
	<link href="{{ asset('css/night-mode.css') }}" rel="stylesheet">

	<!-- Vendor Stylesheets -->
	<link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/OwlCarousel/assets/owl.carousel.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/OwlCarousel/assets/owl.theme.default.min.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/semantic/semantic.min.css') }}">

</head>
<body>

    @if (!\Request::is('login') && !\Request::is('register') && !\Request::is('password/reset'))
        @include('inc.navbar')
    @endif

    @if (\Request::is('instructor/*') || \Request::is('instructor'))
        @include('inc.instructorSidebar')
    @elseif(\Request::is('login') || \Request::is('register') || \Request::is('password/reset'))

    @else
        @include('inc.userSidebar')
    @endif

    @yield('content')


    <main class="mt-5">
        @yield('instructorContent')
    </main>

    <main class="mt-5">
        @yield('adminContent')
    </main>




    <script src="{{ asset('js/vertical-responsive-menu.min.js') }}"></script>
	<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
	<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('vendor/OwlCarousel/owl.carousel.js') }}"></script>
	<script src="{{ asset('vendor/semantic/semantic.min.js') }}"></script>
	<script src="{{ asset('js/custom.js') }}"></script>
	<script src="{{ asset('js/night-mode.js') }}"></script>
</body>
</html>
