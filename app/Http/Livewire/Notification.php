<?php

namespace App\Http\Livewire;

use Livewire\Component;
use WireUi\Traits\Actions;

class Notification extends Component
{
    use Actions;


    public function open(){

        // $this->notification([
        //     'title' => 'Notificacon con Livewire',
        //     'description' => 'Esto es una notificacion con Livewire',
        //     'icon' => 'info',
        // ]);
        
        /* Otra forma de abrir la notificacion seria */
        // $this->notification()->success( /* error, info */
        //     $title = "Notificacon con Livewire",
        //     $description = 'Esto es una notificacion con Livewire',
        // );
        
        $this->notification()->confirm([
            'title' => 'Usted esta seguro!',
            'description' => 'Esto es una notificacion con confirmacion de acción en Livewire',
            'icon' => 'question',
            'accept' =>[
                'label' => 'Aceptar',
                'method' => 'save',
                'params' => 'prueba' /* Pasando paramentro al method */
            ],
            'reject' =>[
                'label' => 'Cancelar'
            ],

        ]);
        

    }

    public function save($params){
        $this->notification([
            'title' => 'Exito !',
            'description' => 'El usuario a aceotado la notificación en forma satisfactoria',
            'icon' => 'success'
        ]);
    }

    public function render()
    {
        
    
        return view('livewire.notification');
    }
}
