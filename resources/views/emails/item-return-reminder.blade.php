<p>Hallo {{ $item->transactions->last()->name }},<br>
du hast {{ $item->name }} ausgeliehen.<br>
Bitte denk dran es bis zum {{ $item->transactions->last()->return_date->format('d.m.Y') }} zurück zu bringen.</p>

<p>Vielen Dank!<br>
Dein Chaostreff Flensburg</p>
