<x-layout>
    <form method="POST" action="/items/{{ $item->id }}">
        @csrf
        @method('PATCH')
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $item->name }}" />
        <label for="description">Description</label>
        <input type="text" name="description" id="description" value="{{ $item->description }}" />
        <button type="submit">Update</button>
    </form>
</x-layout>
