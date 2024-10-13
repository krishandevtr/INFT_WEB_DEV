<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $heading }}</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
</head>
<body>
<nav>
    <x-nav-link href="/">Home</x-nav-link>
    <x-nav-link href="/about">About</x-nav-link>
    <x-nav-link href="/contact">Contact</x-nav-link>
</nav>
<main>
    {{ $slot }}
</main>
</body>
</html>
