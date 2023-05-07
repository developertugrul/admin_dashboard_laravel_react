<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Dashboard</title>

    @viteReactRefresh
    @vite('resources/js/app.jsx')

    <meta name="robots" content="noindex, nofollow">
</head>
<body>
<div id="app"></div>
</body>
</html>
