<div>
    <section class="pb-4 mb-4 border-b-2 border-solid">
        <input type="text" placeholder="Suche" class="input input-bordered w-full max-w-xs" wire:model.live.debounce.300ms="term" />
    </section>
    @foreach ($items as $item)
        <div class="card card-side bg-base-100 shadow-xl mb-4">
            @if ( $item->image )
                <img class="object-cover rounded-l" loading="lazy" width="200" height="200" src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}">
            @endif
            <div class="card-body">
                <h2 class="card-title"><a href="/items/{{ $item->id }}">{{ $item->name }}</a></h2>
                <p>{{ $item->description }}</p>
                @include('partials.item.availability-badge')
                @include('partials.item.require-training-badge')
                <div class="card-actions justify-between items-end">
                    <div>
                        @foreach ($item->tags as $tag)
                            @include('partials.badges.default', ['title' => $tag->title])
                        @endforeach
                    </div>
                    <a href="/items/{{ $item->id }}" class="btn btn-primary">Details</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
