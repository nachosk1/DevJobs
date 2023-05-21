<?php

namespace App\Http\Livewire;

use App\Models\Salary;
use App\Models\Vacant;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Validator;

class CreateVacant extends Component
{

    public $title;
    public $salary;
    public $category;
    public $company;
    public $last_date;
    public $description;
    public $image;

    use WithFileUploads;



    protected $rules = [
        'title' => 'required|string|',
        'salary' => 'required',
        'category' => 'required',
        'company' => 'required',
        'last_date' => 'required',
        'description' => 'required',
        'image' => 'required|image|max:1024',
    ];


    public function createVacant()
    {
        $messages = [
            'title.required' => "El campo titulo es requerido",
            'salary.required' => "El campo salario es requerido",
            'category.required' => "El campo categoria es requerido",
            'company.required' => "El campo campañia es requerido",
            'last_date.required' => "El campo fecha es requerido",
            'description.required' => "El campo descripción es requerido",
            'image.required' => "El campo imagen es requerido",
        ];

        // CAMBIAR EL TEXTO EN INGLES A ESPAÑOL
        $validator = Validator::make($this->all(), $this->rules, $messages);
        if ($validator->fails()) {
            $this->resetErrorBag();
            foreach ($validator->errors()->messages() as $field => $messages) {
                foreach ($messages as $message) {
                    $this->addError($field, $message);
                }
            }

            return;
        }

        $data = $this->validate();

        // almacenar imagen
        $image = $this->image->store('public/vacants');
        $name_image = str_replace('public/vacants/', '', $image);   //str_replace lo que hace es busca el public/vacants/, lo remplaza con nada en este caso y lo tiene que buscar con la variable $image
        //dd($name_image);

        // Crear la Vacante
        Vacant::create([
            'title' => $data['title'],
            'salary_id' => $data['salary'],
            'category_id' => $data['category'],
            'company' => $data['company'],
            'last_date' => $data['last_date'],
            'description' => $data['description'],
            'image' => $name_image,
            'user_id' => auth()->user()->id,
        ]);

        // Crear un mensaje
        session()->flash('message', 'La Vacante se publicó correctamente');
        // Rediccionar al usuario
        return redirect()->route('vacants.index');
    }

    public function render()
    {
        //Consultar DB
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.create-vacant', [
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }
}
