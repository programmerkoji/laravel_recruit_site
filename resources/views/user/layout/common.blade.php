<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta name="description" content="Web制作専門の求人サイト。Webで活躍できる人材になりたいというあなたの想いを応援します。">
    <meta name="robots" content="noindex">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">

    <script src="https://kit.fontawesome.com/77a829ded7.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- header -->
    @include('user.include.header')

    @yield('content')

    <!-- footer -->
    @include('user.include.footer')

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    @yield('script')
</body>
</html>
