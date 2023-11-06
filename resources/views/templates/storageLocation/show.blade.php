<x-layout>
    <article class="prose min-w-full">
        <hgroup>
            <h1>{{ $storageLocation->name }}</h1>
        </hgroup>
        @if ($storageLocation->description)
            <h2 class="mb-4">Beschreibung</h2>
            <p class="mb-8">{{ $storageLocation->description }}</p>
        @endif
        @if ($storageLocation->looseInventory)
            <h2 class="mb-4">Loses Inventar</h2>
            <p class="mb-8">{{ $storageLocation->looseInventory }}</p>
        @endif
        @if ($storageLocation->items)
            <h2 class="mb-4">Enthaltene Items</h2>
            <div class="overflow-x-auto">
                <table class="table table-zebra">
                    <thead>
                        <tr>
                        <th>Name</th>
                        <th>Beschreibung</th>
                        <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($storageLocation->items as $item)
                            <tr>
                                <th><a href="{{ route('item.show', ['item' => $item]) }}">{{ $item->name }}</a></th>
                                <td>{{ Str::limit($item->description, 50) }}</td>
                                <td>
                                    @include('partials.item.availability-badge')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        <hr>
        <a class="block mt-8 text-xs" href="{{ route('storageLocation.print', $storageLocation) }}">Label drucken</a>
    </article>
</x-layout>
