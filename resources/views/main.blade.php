<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{ url(mix('frontend/css/app.css')) }}">
    </head>
    <body>

        @yield('body')

        <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
        <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('frontend/js/awesome.min.js') }}"></script>
        <script src="{{ url(mix('frontend/js/app.js')) }}"></script>
    </body>
</html>