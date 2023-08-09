<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

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
