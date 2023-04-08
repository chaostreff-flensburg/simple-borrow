<x-layout>
    <hgroup>
        <h1>{{ $item->name }}</h1>
        <small>
            @if ($item->borrow_state === 0)
                Status: verfügbar
            @else
                Status: ausgeliehen
            @endif
        </small>
    </hgroup>
    <p>{{ $item->description }}</p>
    <section>
        <a href="{{ route('item.transaction', $item->id) }}" role="button">{{ $item->borrow_state === 0 ? 'Ausleihen' : 'Zurückgeben' }}</a>
    </section>
    <details>
        <summary>Verlauf</summary>
        <ul>
            @foreach ($transactions as $transaction)
                <li>
                    <p>{{ $transaction->transaction_type === 0 ? 'Zurückgegeben' : 'Ausgeliehen' }} am {{ $transaction->created_at->format('d.m.Y') }}</p>
                    @if ($transaction->note)
                        <small>Notiz</small>
                        <blockquote>{{ $transaction->note }}</blockquote>
                    @endif
                </li>
            @endforeach
        </ul>
    </details>
    <details>
        <summary>Danger</summary>
        <section>
            <a href="/items/{{ $item->id }}/edit" role="button">Bearbeiten</a>
        </section>
        <form method="POST" action="/items/{{ $item->id }}">
            @csrf
            @method('DELETE')
            <button type="submit" role="button">Löschen</button>
        </form>
    </details>
</x-layout>
