<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Item;

class IndexItems extends Component
{
    public $items;

    public $term = '';

    public function mount()
    {
        $this->items = Item::all();
    }

    public function render()
    {

        if ($this->term) {
            $this->items = Item::where('name', 'like', '%' . $this->term . '%')->get();
        } else {
            $this->items = Item::all();
        }

        return view('livewire.index-items');
    }
}
