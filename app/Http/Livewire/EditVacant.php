<?php

namespace App\Http\Livewire;

use App\Models\Salary;
use App\Models\Vacant;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class EditVacant extends Component
{
    public $vacant_id;
    public $title;
    public $salary;
    public $category;
    public $company;
    public $last_date;
    public $description;
    public $image;
    public $image_new;

    use WithFileUploads;

    protected $rules = [
        'title' => 'required|string|',
        'salary' => 'required',
        'category' => 'required',
        'company' => 'required',
        'last_date' => 'required',
        'description' => 'required',
        'image_new' => 'nullable|image|max:1024' // nullable este campo puede ir vacio, pero si viene una nueva imagen sea de formato imagen y con capacidad de 1024
    ];

    public function mount(Vacant $vacant){
        $this->vacant_id = $vacant->id;   //ESto no va a funcionar
        $this->title = $vacant->title;
        $this->salary = $vacant->salary_id;
        $this->category = $vacant->category_id;
        $this->company = $vacant->company;
        $this->last_date = Carbon::parse($vacant->last_date)->format('Y-m-d');
        $this->image = $vacant->image;
        $this->description = $vacant->description;
    }

    public function render(){
        //Consultar DB
        $salaries = Salary::all();
        $categories = Category::all();
        
        return view('livewire.edit-vacant',[
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }

    public function editVacant(){
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

        // Si hay una nueva imagen
        if($this->image_new){
            $image = $this->image_new->store('public/vacants');
            $data['image'] = str_replace('public/vacants/', '', $image);
        }
        // Encontrar la vacante a editar 
        $vacant = Vacant::find($this->vacant_id);

        // Asignar los valores         || importante saber que el $vacant->XXXX es lo que viene la base de datos
        $vacant->title = $data['title'];
        $vacant->salary_id = $data['salary'];
        $vacant->category_id = $data['category'];
        $vacant->company = $data['company'];
        $vacant->last_date = $data['last_date'];
        $vacant->description = $data['description'];
        $vacant->image = $data['image'] ?? $vacant->image;

        // Guardar la vacante
        $vacant->save();

        // Redireccionar
        session()->flash("message", "La vacante se actualizo correctamente");

        return redirect()->route('vacants.index');

    }
}
