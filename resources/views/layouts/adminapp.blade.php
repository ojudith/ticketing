<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Judy Ticketing Platform') }}</title>

    <!-- Scripts -->
    <script src="{{ secure_asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/font-awesome.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('inc.adminnav')     
        <main>
            @yield('content')
        </main>
        {{-- @include('inc.footer') --}}
    </div>
</body>
</html>
