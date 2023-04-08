<x-layout>
    @foreach ($items as $item)
        <article>
            <hgroup>
                <h5>
                    <a href="/items/{{ $item->id }}">{{ $item->name }}</a>
                </h5>
                <small>
                    @if ($item->borrow_state === 0)
                        Status: verfügbar
                    @else
                        Status: ausgeliehen
                    @endif
                </small>
            </hgroup>
        </article>
    @endforeach
    <a href="{{ route('item.create') }}" role="button">Create</a>
</x-layout>
