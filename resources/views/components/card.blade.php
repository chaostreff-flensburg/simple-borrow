@props([
    'name' => '',
    'image' => null,
    'description' => '',
    'tags' => [],
])

<div class="card bg-base-100 shadow-xl mb-4">
    @if ($image)
        <img class="object-cover rounded-l" loading="lazy" width="200" height="200" src="{{ asset('storage/' . $image) }}" alt="{{ $name }}">
    @endif
    <div class="card-body">
        <h2 class="card-title">{{ $name }}</h2>
        <p>{{ $description }}</p>
        <div>
            @foreach ($tags as $tag)
                @include('partials.badges.default', ['title' => $tag->title])
            @endforeach
        </div>
    </div>
</div>
