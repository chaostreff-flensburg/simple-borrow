<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;

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
            $this->items = Item::where('name', 'like', '%'.$this->term.'%')
                ->with('tags')
                ->get();
        } else {
            $this->items = Item::with('tags')->get();
        }

        return view('livewire.index-items');
    }
}
