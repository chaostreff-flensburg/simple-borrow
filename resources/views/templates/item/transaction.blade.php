<x-layout>
    <article class="prose min-w-full">
        <h1>{{ $item->borrow_state === App\Models\Item::STATE_AVAILABLE ? 'Ausleihen' : 'Zurückgeben' }}: {{ $item->name }}</h1>
        <form action="{{ route('transaction.create') }}" method="post">
            @csrf
            @method('POST')
            <input type="hidden" name="item_id" value="{{ $item->id }}">
            <input type="hidden" name="transaction_type" value="{{ $item->borrow_state === 0 ? 1 : 0 }}">
            @if ($item->borrow_state === 0)
                <section class="mb-4">
                    <label class="block" for="return_date">Rückgabedatum</label>
                    <input class="input input-bordered w-full max-w-xs" type="date" name="return_date" id="return_date" required>
                </section>
                <section class="mb-4">
                    <label class="block" for="return_date">Name</label>
                    <input class="input input-bordered w-full max-w-xs" type="text" name="name" id="name" required>
                </section>
                <section class="mb-4">
                    <label class="block" for="return_date">E-Mail-Adresse</label>
                    <input class="input input-bordered w-full max-w-xs" type="email" name="email" id="email" required>
                </section>
            @endif
            <p for="note">Hinterlasse eine Notz fall etwas kaputt/fehlt oder z.b. Verbrauchsmaterial gekauft werden muss.</p>
            <div class="form-control mb-8">
                <label class="label" for="note">
                    <span class="label-text">Notiz</span>
                </label>
                <textarea name="note" id="note" class="textarea textarea-bordered h-24" placeholder="Wir brauchen neue Sägeblätter…"></textarea>
            </div>
            <button class="btn btn-success" type="submit">{{ $item->borrow_state === 0 ? 'Ausleihen' : 'Zurückgeben' }}</button>
        </form>
    </article>
</x-layout>
