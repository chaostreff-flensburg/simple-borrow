<x-layout>
    <form method="POST" action="/items">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name" />
        <label for="description">Description</label>
        <input type="text" name="description" id="description" />
        <button type="submit">Create</button>
    </form>
</x-layout>
