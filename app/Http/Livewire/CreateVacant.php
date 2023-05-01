<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Salary;
use Livewire\Component;

class CreateVacant extends Component
{

    public $title;
    public $salary;
    public $category;
    public $company;
    public $last_date;
    public $description;
    public $image;
    

    protected $rules = [
        'title' => 'required|string|',
        'salary' => 'required',
        'category' => 'required',
        'company' => 'required',
        'last_date' => 'required',
        'description' => 'required',
        'image' => 'required',
    ];

    public function createVacant(){
        $data = $this->validate();
    }

    public function render() {
        //Consultar DB
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.create-vacant', [
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }
}
