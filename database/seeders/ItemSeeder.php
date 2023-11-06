<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\StorageLocation;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (StorageLocation::all() as $storageLocation) {
            $storageLocation->items()->saveMany(Item::factory()->count(3)->make());
        }

        foreach (Item::all() as $item) {
            $item->tags()->attach(Tag::all()->random(3));
        }
    }
}
