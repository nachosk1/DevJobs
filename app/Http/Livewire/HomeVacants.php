<?php

namespace App\Http\Livewire;

use App\Models\Vacant;
use Livewire\Component;

class HomeVacants extends Component
{
    public $termine;
    public $category;
    public $salary;

    // con esto escucha el evento desde otro Controlador
    protected $listeners = ['searchVacant' => 'search'];

    public function search($termine, $category, $salary){
        $this->termine = $termine;
        $this->category = $category;
        $this->salary = $salary;
    }

    public function render()
    {
        //$vacants = Vacant::all();
        //este when se ejecuta cuando alla un termine, entonces se ejecuta el function pasandole como parametro $query donde este tiene la info
        $vacants = Vacant::when($this->termine, function($query){
            $query->where('title', 'LIKE', "%". $this->termine . "%");
        })
        ->when($this->termine, function($query){ // lo siguiente, or where hace que si en el titulo no encuentra nada va hacer busqueda de este buscandor
            $query->orWhere('company', 'LIKE', "%". $this->termine . "%");
        })
        ->when($this->category, function($query){
            $query->where('category_id', $this->category);
        })
        ->when($this->salary, function($query){
            $query->where('salary_id', $this->salary);
        })
        ->get();

        return view('livewire.home-vacants', [
            'vacants' => $vacants
        ]);
    }
}
