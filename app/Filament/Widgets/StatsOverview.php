<?php

namespace App\Filament\Widgets;

use App\Models\Item;
use App\Models\Tag;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Unapproved items', Item::where('approved', false)->count()),
            Stat::make('Total Items', Item::count()),
            Stat::make('Total Tags', Tag::count()),
        ];
    }
}
