<header>
    <div class="navbar bg-base-100">
        <div class="flex-1">
            <a class="btn btn-ghost text-xl">{{ config('app.name') }}</a>
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal px-1">
                <li><a href="{{ route('item.index') }}">{{ __('Items') }}</a></li>
                <li><a href="{{ route('storageLocation.index') }}">{{ __('Storagelocations') }}</a></li>
            </ul>
        </div>
    </div>
</header>
