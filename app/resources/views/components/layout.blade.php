<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ausleihsystem</title>
        <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.*/css/pico.min.css">
    </head>
    @include('partials.header')
    <body>
        <main class="container">
            {{ $slot }}
        </main>
    </body>
    @include('partials.footer')
</html>
