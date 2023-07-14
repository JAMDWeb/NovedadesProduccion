<?php

namespace App\Http\Livewire;

use Livewire\Component;
use WireUi\Traits\Actions;
class Dialog extends Component
{
    use Actions;

    public function openDialog(){
        $this->dialog()->confirm([
            'title' => 'Notificacion tipo Dialogo',
            'description' => 'Esto es una notificacion de Dialogo en Livewire',
            'icon' => 'success',
            'accept' => [
                'label' => "Si acepto",
                'method' => "save",
                'params' => "si",
                'color' => 'green'

            ],
            'reject' => [
                'label' => 'No acepto',
                'method' => 'cancel',
                'params' => 'no',
                'color' => 'red'

            ]                
            
        ]);
    }

    public function save($param){
        dd($param);
    }
    public function cancel($param){
        dd($param);
    }
    public function render()
    {
        return view('livewire.dialog');
    }
}
