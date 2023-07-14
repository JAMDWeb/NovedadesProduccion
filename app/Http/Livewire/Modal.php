<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Modal extends Component
{

    public $openModal = false;

  

    public function render()
    {

        return view('livewire.modal');
    }

    

}
