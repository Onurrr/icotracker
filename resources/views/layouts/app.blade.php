<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('layouts.header')

        @yield('content')
<div class="container">
    <footer>
        <p>© 2017 {{ config('app.name', 'Laravel') }}</p>
      </footer>
</div>
    </div>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
