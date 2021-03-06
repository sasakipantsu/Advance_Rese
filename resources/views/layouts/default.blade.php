<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <title>@yield('title')</title>
    @livewireStyles
</head>
<body class="bg-gray-100">
    @yield('content')
    <script src="{{ mix('js/_ajaxfavorite.js') }}"></script>
    <script src="{{ mix('js/output.js') }}"></script>
    @livewireScripts
</body>
</html>
