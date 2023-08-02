<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $item->name }} Drucken</title>
    @vite('resources/css/app.css')
</head>
<body class="absolute w-[62mm] hyphens-auto">
    <h1 class="text-lg">Chaostreff Flensburg</h1>
    <h2 class="text-xl">{{ $item->name }}</h2>
    <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl={{ $item->getAutoLoginLink() }}&choe=UTF-8" alt="barcode" />
    <p>{{ route('item.show', $item->id) }}</p>
    <strong>
        Item Id: {{ $item->id }}
    </strong>

    <p class="mt-16 print:hidden">Zum drucken mit dem Label Drucker in max 62mm breite drucken. Einfach diese Seite drucken.</p>
</body>
</html>
