<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;900&display=swap" rel="stylesheet">
    <lin rel="stylesheet" href="fonts/vendor/font-awesome/fontawesome-webfont.woff">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <meta name="total-cart-price" content="{{route('cart.total') }}">
</head>
<body>
        
        <main class="">
            <div class="header-main" >
                @include('front.header')
                @include('front.navbar')
            </div>
            @yield('breadcrups')
            @yield('content')
        </main>
        @include('front.modal')
</body>
</html>
