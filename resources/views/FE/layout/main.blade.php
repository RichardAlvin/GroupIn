<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="dicoding:email" content="richardalvinpratama8@gmail.com">
    <title>GroupIn</title>

    <link rel="stylesheet" href="/css/fe/topbar.css">
    <link rel="stylesheet" href="/css/fe/main.css">
    <link rel="stylesheet" href="/css/fe/footer.css">
    <!-- App favicon -->
    <link rel="shortcut icon" href="/img/logo.png">

    <!-- CSS Libraries -->
    @yield('title')
    @yield('thirdparty_css')
</head>
    @include('FE.layout.topbar')
    @yield('container')
    @include('FE.layout.footer')

    <!-- JS Libraies -->
    @yield('thirdparty_js')
    <script src="/js/fe/topbar.js"></script>
</body>
</html>