<p>Hallo {{ $item->transactions->last()->name }},<br>
du hast {{ $item->name }} ausgeliehen.<br>
Bitte gib es bis zum {{ $item->transactions->last()->return_date->format('d.m.Y') }} zurück.</p>

<p>Vielen Dank!<br>
Dein Chaostreff Flensburg</p>

<a href="{{ $calendarLink->google() }}">Google Link</a>
