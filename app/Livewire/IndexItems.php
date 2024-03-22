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
        $this->items = Item::approved()->get();
    }

    public function render()
    {

        if ($this->term) {
            $this->items = Item::approved()
                ->where('name', 'like', '%'.$this->term.'%')
                ->with('tags')
                ->get();
        }

        return view('livewire.index-items');
    }
}
