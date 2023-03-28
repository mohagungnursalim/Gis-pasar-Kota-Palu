<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MapLocation extends Component
{

    public $lat,$long;
    public $test = "value test";

    public function render()
    {
        return view('livewire.map-location');
    }
}
