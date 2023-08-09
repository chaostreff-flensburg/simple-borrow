<x-layout>
    <article class="prose min-w-full">
        <hgroup>
            <h1>{{ $item->name }}</h1>
            @if ($item->borrow_state === 0)
                <small class="badge badge-success">
                    Status: verfügbar
                </small>
            @else
                <small class="badge badge-error">
                    Status: ausgeliehen bis {{ $item->transactions->last()->return_date->format('d.m.Y') }}
                </small>
            @endif
            @include('partials.item.require-training-badge')
        </hgroup>
        @if ( $item->image )
            <img class="mx-auto object-cover rounded-l" width="500" height="500" src="{{ asset('storage/' . $item->image) }}">
        @endif
        @if ($item->description)
            <p class="mb-8">{{ $item->description }}</p>
        @endif
        @if ($item->included)
            <p class="mb-8">{{ $item->included }}</p>
        @endif
        @if ($item->manual_link)
            <a class="btn btn-primary" href="{{ $item->manual_link }}" target="_blank" role="button">Anleitung</a>
        @endif
        <hr>
        <a class="btn btn-success" href="{{ route('item.transaction', $item->id) }}" role="button">{{ $item->borrow_state === 0 ? 'Ausleihen' : 'Zurückgeben' }}</a>
        @if ($item->borrow_state === App\Models\Item::STATE_BORROWED)
            <a class="btn btn-error" href="{{ route('item.extend', $item->id) }}" role="button">Verlängern</a>
        @endif
        <div class="collapse collapse-arrow bg-base-200 mt-8">
            <input type="radio" name="my-accordion-2" />
            <div class="collapse-title text-xl font-medium">
                Verlauf
            </div>
            <div class="collapse-content">
                <div class="overflow-x-auto">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Aktion</th>
                          <th>Datum</th>
                          <th>Name</th>
                          <th>Notiz</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($item->transactions->sortByDesc('created_at')->take(20) as $transaction)
                            <tr>
                                <td>{{ $transaction->transaction_type === 0 ? 'Zurückgegeben' : 'Ausgeliehen' }}</td>
                                <td>{{ $transaction->created_at->format('d.m.Y') }}</td>
                                <td>{{ $transaction->name }}</td>
                                <td>{{ $transaction->note }}</td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
            </div>
        </div>
        <a class="block mt-8 text-xs" href="{{ route('item.print', $item->id) }}">Label drucken</a>
    </article>
</x-layout>
