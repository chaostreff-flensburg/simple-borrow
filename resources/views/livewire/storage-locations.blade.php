<div>
    <section class="pb-4 mb-4 border-b-2 border-solid">
        <input type="text" placeholder="Suche" class="input input-bordered w-full max-w-xs" wire:model.live.debounce.300ms="term" />
    </section>
    @foreach ($storageLocations as $storageLocation)
        <div class="card card-side bg-base-100 shadow-xl mb-4">
            <div class="card-body">
                <h2 class="card-title"><a href="/items/{{ $storageLocation->id }}">{{ $storageLocation->name }}</a></h2>
                <p>{{ $storageLocation->description }}</p>
                <div class="card-actions justify-between items-end">
                    <a href="/items/{{ $storageLocation->id }}" class="btn btn-primary">Details</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
