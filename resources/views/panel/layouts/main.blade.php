<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('panel/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('panel/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('panel/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('panel/css/style.css') }}">
</head>

<body>

    <div class="container-fluid">
        <div class="row flex-nowrap">

            @include('panel.layouts.sidebar')

            @yield('main')

        </div>
    </div>


    <script src="{{ asset('panel/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('panel/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('panel/js/all.min.js') }}"></script>
    <script src="{{ asset('panel/js/select2.min.js') }}"></script>
    <script src="{{ asset('panel/js/ckeditor/ckeditor.js') }}"></script>


    @include('sweetalert::alert')

    @yield('script')

</body>

</html>
