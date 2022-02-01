<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/favorite.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <title>@yield('title')</title>
    @livewireStyles
</head>
<body class="bg-gray-100">
    @yield('content')
    @livewireScripts
    <script src="{{ mix('js/_ajaxfavorite.js') }}"></script>
</body>
{{-- <script src="{{ mix('js/mobile-menu-button.js') }}"></script> --}}
</html>
