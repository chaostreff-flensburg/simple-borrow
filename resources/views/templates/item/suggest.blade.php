<x-layout>
    <article class="prose min-w-full">
        <h1>{{ __('Suggest a new item') }}</h1>
        <form method="post" action="{{ route('item.storeSuggestion') }}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-control mb-8">
                <label class="label" for="name">
                    <span class="label-text">{{ __('Name') }}*</span>
                </label>
                <input type="text" name="name" id="name" class="input input-bordered" placeholder="Säge" required>
                @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-control mb-8">
                <label class="label" for="description">
                    <span class="label-text">{{ __('Description') }}*</span>
                </label>
                <textarea name="description" id="description" class="textarea textarea-bordered h-24" placeholder="Eine Säge für Holz…" required></textarea>
                @error('description')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-control mb-8">
                <label class="label" for="image">
                    <span class="label-text">{{ __('Image') }}*</span>
                </label>
                <input type="file" name="image" id="image" class="file-input file-input-bordered" ept="image/png, image/jpeg" required>
                @error('image')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-control mb-8">
                <label class="label" for="manual">
                    <span class="label-text">{{ __('Manual Link') }}</span>
                </label>
                <input type="text" name="manual" id="manual" class="input input-bordered" placeholder="https://example.com/manual.pdf">
                @error('manual')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <input class="btn btn-success" type="submit">
        </form>
    </article>
</x-layout>
