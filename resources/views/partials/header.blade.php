<header>
    <div class="navbar bg-base-100">
        <div class="flex-1">
            <a href="{{ route('home') }}" class="btn btn-ghost text-xl">{{ config('app.name') }}</a>
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal px-1">
                <li><a href="{{ route('item.index') }}">{{ __('Borrow items') }}</a></li>
                <li><a href="{{ route('storageLocation.index') }}">{{ __('Storage Locations') }}</a></li>
            </ul>
        </div>
    </div>
</header>
