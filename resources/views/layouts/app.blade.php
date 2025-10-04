<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('./css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/style.css') }}">
</head>
<body>
    <div id="app">
        
        @include('navbar')

        <main>
            @yield('content')
        </main>

        @include('footer')
        
    </div>

    <script src="{{ asset('./js/jquery-3.7.1.js') }}"></script>
    <script src="{{ asset('./js/bootstrap.bundle.min.js') }}"></script>
     <script src="{{ asset('./js/swiper-bundle.min.js') }}"></script>
     <script src="{{ asset('./js/all.min.js') }}"></script>
     <script src="{{ asset('./js/mega-menu.js') }}"></script>
     <script src="{{ asset('./js/swiper.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js?hl=fa" async defer></script>

    @yield('script')

    @include('sweetalert::alert')

</body>
</html>
