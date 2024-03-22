<?php

namespace App\Livewire;

use App\Models\StorageLocation;
use Livewire\Component;

class StorageLocations extends Component
{
    public $storageLocations;

    public $term = '';

    public function mount()
    {
        $this->storageLocations = StorageLocation::all();
    }

    public function render()
    {

        if ($this->term) {
            $this->storageLocations = StorageLocation::where('name', 'like', '%'.$this->term.'%')
                ->get();
        } else {
            $this->storageLocations = StorageLocation::all();
        }

        return view('livewire.storage-locations');
    }
}
