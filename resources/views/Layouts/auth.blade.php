<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Authentication')</title>
    @vite('resources/css/app.css')
    @yield('css')
</head>
<body>
    @yield('auth_content')
</body>
</html>
