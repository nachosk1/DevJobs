<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowVacant extends Component
{
    public $vacant;
    
    public function render()
    {
        return view('livewire.show-vacant');
    }
}
