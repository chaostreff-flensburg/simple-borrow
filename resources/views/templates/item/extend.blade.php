<x-layout>
    <article class="prose min-w-full">
        <h1>Verlängere: {{ $item->name }}</h1>
        <form action="{{ route('transaction.extend') }}" method="post">
            @csrf
            @method('POST')
            <input type="hidden" name="item_id" value="{{ $item->id }}">
            <section class="mb-4">
                <label class="block" for="return_date">Verlängern bis:</label>
                <input class="input input-bordered w-full max-w-xs" type="date" name="return_date" id="return_date" required>
            </section>
            <button class="btn btn-success" type="submit">Verlängern</button>
        </form>
    </article>
</x-layout>
