<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
 

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/layouts/sidebar.js') }}" defer></script>
    <script src="{{ asset('js/switch.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
    <link href="{{ asset('css/layouts/sidebar.css') }}" rel="stylesheet">

    <!-- CHARTJS SCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div id="app">
        @auth
            @include('layouts.partials.navbar')
        @endauth
        <main>
            @auth
                @include('layouts.partials.sidebar')
            @endauth
            @yield('content')
        </main>
    </div>
</body>

</html>
