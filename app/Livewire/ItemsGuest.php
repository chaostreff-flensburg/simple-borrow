<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Item;
use App\Models\Tag;

class ItemsGuest extends Component
{
    public $items;
    public $tags;

    public function mount()
    {
        $this->items = Item::all();
        $this->tags = Tag::all();
    }

    public function render()
    {
        return view('livewire.items-guest');
    }

    public function filter($tagId = null)
    {
        if ($tagId == null) {
            $this->items = Item::all();
            return;
        }

        $this->items = Tag::find($tagId)->items;
    }
}
