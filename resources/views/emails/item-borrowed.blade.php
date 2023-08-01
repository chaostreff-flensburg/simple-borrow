Hallo, {{ $item->transactions->last()->name }}
du hast {{ $item->name }} ausgeliehen.
Bitte gib es bis zum {{ $item->transactions->last()->return_date->format('d.m.Y') }} zurück.

Vielen Dank!
Dein Chaostreff Flensburg

{{ $calendarLink }}
