<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::factory()->count(10)->create();

        foreach (Item::all() as $item) {
            $item->tags()->attach(Tag::all()->random(3));
        }
    }
}
