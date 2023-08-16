<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ausleihsystem</title>
        @vite('resources/css/app.css')
        @livewireStyles
    </head>
    @include('partials.header')
    <body>
        <main class="w-11/12 my-8 mx-auto md:container">
            {{ $slot }}
        </main>
        @livewireScripts
    </body>
    @include('partials.footer')
</html>
