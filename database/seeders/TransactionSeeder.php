<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\Item;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Item::all() as $item) {
            Transaction::factory()->count(10)->create([
                'item_id' => $item->id,
            ]);
        }
    }
}
