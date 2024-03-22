New item suggested!

Titel: {{ $item->name }}
Beschreibung: {{ $item->description }}

<a href="{{ config('app.url') . '/admin/items/' . $item->id . '/edit' }}">{{ __('Direct link') }}</a>
