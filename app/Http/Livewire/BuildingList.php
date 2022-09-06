<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BuildingList extends Component
{
    protected $buildings = [];
    public function mount($buildings)
    {
        $this->buildings = $buildings;
    }
    public function render()
    {
        return view('livewire.building-list', ['buildings' => $this->buildings]);
    }
}
