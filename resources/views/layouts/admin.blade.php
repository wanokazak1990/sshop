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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
        
        <main class="">
            <div class="btn-group">
                <a class="btn btn-danger" href="{{route('categories.index')}}">Разделы товаров</a>
                <a class="btn btn-danger" href="{{route('banners.index')}}">Банеры</a>
                <a class="btn btn-danger" href="{{route('products.index')}}">Продукты</a>
            </div>
            <div class="container">

            @yield('content')

            </div>
        </main>

        @include('admin.modal.modal')

</body>
</html>
