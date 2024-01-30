<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="dicoding:email" content="richardalvinpratama8@gmail.com">
    <title>Groupin - AdminPanel</title>

    <link rel="stylesheet" href="/css/cms/topbar.css">
    <link rel="stylesheet" href="/css/cms/sidebar.css">
    <link rel="stylesheet" href="/css/cms/main.css">
    <link rel="stylesheet" href="/css/cms/table.css">
    <!-- App favicon -->
    <link rel="shortcut icon" href="/img/logo.png">

    <!-- CSS Libraries -->
    @yield('title')
    @yield('thirdparty_css')
</head>
    @include('CMS.layout.topbar')
    @include('CMS.layout.sidebar')
    @yield('container')

    <!-- JS Libraies -->
    @yield('thirdparty_js')
    <script src="/js/cms/sidebar.js"></script>
</body>
</html>