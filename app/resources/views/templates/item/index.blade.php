<x-layout>
    @foreach ($items as $item)
        <div class="card card-side bg-base-100 shadow-xl mb-4">
            @if ( $item->image )
                <img class="object-cover rounded-l" width="200" height="200" src="{{ asset('storage/' . $item->image) }}">
            @endif
            <div class="card-body">
                <h2 class="card-title"><a href="/items/{{ $item->id }}">{{ $item->name }}</a></h2>
                <p>{{ $item->description }}</p>
                @if ($item->borrow_state === 0)
                    <small class="badge badge-success">
                        Status: verfügbar
                    </small>
                @else
                    <small class="badge badge-error">
                        Status: ausgeliehen bis {{ $item->transactions->last()->return_date->format('d.m.Y') }}
                    </small>
                @endif
                <div class="card-actions justify-end">
                    <a href="/items/{{ $item->id }}" class="btn btn-primary">Details</a>
                </div>
            </div>
        </div>
    @endforeach
</x-layout>
