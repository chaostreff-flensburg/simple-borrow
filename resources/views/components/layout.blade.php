<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ausleihsystem</title>
        @vite('resources/css/app.css')
    </head>
    @include('partials.header')
    <body>
        <main class="container my-8 mx-auto">
            {{ $slot }}
        </main>
    </body>
    @include('partials.footer')
</html>
