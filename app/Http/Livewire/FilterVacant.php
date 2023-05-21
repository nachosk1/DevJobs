<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Salary;
use Livewire\Component;

class FilterVacant extends Component
{
    public $termine;
    public $category;
    public $salary;

    public function readDataSearch(){
        $this->emit('searchVacant', $this->termine, $this->category, $this->salary);
    }

    public function render()
    {
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.filter-vacant', [
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }
}
