<?php

declare(strict_types=1);

namespace App\Helpers;

use App\Models\Item;
use Illuminate\Database\Eloquent\Collection;

class ItemHelper
{
    public static function getAllItemsWichShouldBeReturnedInXDays(int $days = 2): Collection
    {
        return Item::whereHas('transactions', function ($query) use ($days) {
            $query->where('return_date', '!=', null)
                ->where('return_date', '<=', now()->addDays($days))
                ->where('return_date', '>=', now())
                ->where('transaction_type', '=', 1)
                ->where('email', '!=', null);
        })->get();
    }

    public static function getAllItemsWichAreOverDue(): Collection
    {
        return Item::whereHas('transactions', function ($query) {
            $query->where('return_date', '!=', null)
                ->where('return_date', '<', now()->addDays(3))
                ->where('transaction_type', '=', 1)
                ->where('email', '!=', null);
        })->get();
    }
}
