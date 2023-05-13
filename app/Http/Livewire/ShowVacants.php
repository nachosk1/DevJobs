<?php

namespace App\Http\Livewire;

use App\Models\Vacant;
use Livewire\Component;

class ShowVacants extends Component
{
    public function render()
    {
        $vacants = Vacant::where('user_id', auth()->user()->id)->paginate(10);
        return view('livewire.show-vacants', [
            'vacants' => $vacants
        ]);
    }
}
