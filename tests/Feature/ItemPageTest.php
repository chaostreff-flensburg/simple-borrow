<?php

namespace Tests\Feature;

use App\Models\Item;
use App\Models\Transaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ItemPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_see_item_page(): void
    {
        $this->seed();

        $item = Item::find(1);

        $response = $this->withHeaders([
            'Authorization' => 'Basic '.base64_encode('user@example.com:password'),
        ])->get('/items/1');

        $response->assertSee($item->name);
    }
}
