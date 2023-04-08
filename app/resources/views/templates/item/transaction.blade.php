<x-layout>
    <h1>{{ $item->borrow_state === 0 ? 'Ausleihen' : 'Zurückgeben' }}</h1>

    <p>Wann bringst du der/die/das {{ $item->name }} zurück?</p>

    <form action="{{ route('transaction.create') }}" method="post">
        @csrf
        @method('POST')
        <input type="hidden" name="item_id" value="{{ $item->id }}">
        <input type="hidden" name="transaction_type" value="{{ $item->borrow_state === 0 ? 1 : 0 }}">
        @if ($item->borrow_state === 0)
            <input type="date" name="return_date" required>
        @else
            <label for="note">Hinterlasse eine Notz fall etwas kaputt/fehlt oder z.b. Verbrauchsmaterial gekauft werden muss.</label>
            <input type="textarea" name="note" id="note">
        @endif
        <button type="submit">{{ $item->borrow_state === 0 ? 'Ausleihen' : 'Zurückgeben' }}</button>
    </form>
</x-layout>
