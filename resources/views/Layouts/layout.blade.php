<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'University Management System')</title>
    @vite('resources/css/app.css')
    @yield('css')
</head>
<body>
    <main class="p-10">
        @yield('content')
    </main>
    @yield('js')
</body>
</html>
