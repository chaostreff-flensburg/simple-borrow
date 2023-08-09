<x-layout>
    <article class="prose min-w-full">
        <h1>{{ $item->transactions->last()?->transaction_type === App\Models\Transaction::BORROW ? 'Zurückgeben' : 'Ausleihen' }}: {{ $item->name }}</h1>
        <form action="{{ route('transaction.create') }}" method="post">
            @csrf
            @method('POST')
            <input type="hidden" name="item_id" value="{{ $item->id }}">
            <input type="hidden" name="transaction_type" value="{{ $item->transactions->last()?->transaction_type === App\Models\Transaction::BORROW ? App\Models\Transaction::RETURN : App\Models\Transaction::BORROW }}">
            @if ($item->transactions->last()?->transaction_type === App\Models\Transaction::RETURN || $item->transactions->last()?->transaction_type === null)
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
            <button class="btn btn-success" type="submit">{{ $item->transactions->last()?->transaction_type === App\Models\Transaction::BORROW ? 'Zurückgeben' : 'Ausleihen' }}</button>
        </form>
    </article>
</x-layout>
