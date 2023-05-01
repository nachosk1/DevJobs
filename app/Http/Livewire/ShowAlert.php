<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowAlert extends Component
{
    public $message; 

    public function render()
    {
        return view('livewire.show-alert');
    }
}
