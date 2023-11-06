@props([
    'name' => '',
    'id' => '',
    'autoLoginLink' => '',
    'url' => '',
])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $name }} Drucken</title>
    @vite('resources/css/app.css')
</head>
<body class="absolute w-[62mm] hyphens-auto">
    <h1 class="text-lg">C3FL Inventar</h1>
    <h2 class="text-xl">{{ $name }}</h2>
    <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl={{ $autoLoginLink }}&choe=UTF-8" alt="barcode" />
    <p>{{ $url }}</p>
    <strong>
        Id: {{ $id }}
    </strong>

    <p class="mt-16 print:hidden">Zum drucken mit dem Label Drucker in max 62mm breite drucken. Einfach diese Seite drucken.</p>
</body>
</html>
