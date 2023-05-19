<?php

namespace App\Http\Livewire;

use App\Models\Vacant;
use App\Notifications\NewCandidate;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostulateVacant extends Component
{
    use WithFileUploads;
    public $cv;
    public $vacant;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacant $vacant){
        $this->vacant = $vacant;
    }

    public function postulate(){
        $data= $this->validate();

        // Almacenar Cv en el disco duro
        $cv = $this->cv->store('public/cv');
        $data['cv'] = str_replace('public/cv/', '', $cv);

        // Crear la vacante
        $this->vacant->candidates()->create([
            'user_id' => auth()->user()->id,
            'cv' => $data['cv']
        ]);

        // Crear notificaion y enviar el email
        $this->vacant->recruiter->notify(new NewCandidate($this->vacant->id, $this->vacant->title, auth()->user()->id));

        // Mostrar el usuario un mensaje de ok
        session()->flash('message', 'Se envió correctamente tu información, mucha suerte');
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.postulate-vacant');
    }
}
