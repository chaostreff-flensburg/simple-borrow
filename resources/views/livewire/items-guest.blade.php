<div>
    <section class="pb-4 mb-4 border-b-2 border-solid">
            <button class="badge badge-outline" wire:click="filter" >{{ __('All') }} {{ $items->count() }}</button>
            @foreach ($tags as $tag)
                <button class="badge badge-outline" wire:click="filter({{ $tag->id }})" >{{ $tag->title }} ({{ $tag->items->count() }})</button>
            @endforeach
    </section>
    <section class="grid gap-2 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($items as $item)
            <x-card :name="$item->name" :image="$item->image" :description="$item->description" :tags="$item->tags"/>
        @endforeach
    </section>
</div>
