<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\Tag;
use Livewire\Component;

class ItemsGuest extends Component
{
    public $items;

    public $tags;

    public function mount()
    {
        $this->items = Item::approved()->get();
        $this->tags = Tag::all();
    }

    public function render()
    {
        return view('livewire.items-guest');
    }

    public function filter($tagId = null)
    {
        if ($tagId == null) {
            $this->items = Item::approved()->get();

            return;
        }

        $this->items = Tag::find($tagId)->items()->approved()->get();
    }
}
