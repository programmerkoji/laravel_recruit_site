<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://kit.fontawesome.com/77a829ded7.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- header -->
    @include('user.include.header')

    <main>
        @yield('user.index')
    </main>

    <!-- footer -->
    @include('user.include.footer')

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
