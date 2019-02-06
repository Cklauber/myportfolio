<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Title -->
    <title>Clauber Oliveira @yield('title')</title>

    <!--Favicon -->
    <link rel="shortcut icon" href="/img/logo.png">        
</head>
<body>
    <div id="app" class="public-view">
        @include('partials.public.header')
        <main class="bd-main main-content">
            @yield('content')
        </main>
        @include('partials.public.footer')
    </div>
</body>
</html>