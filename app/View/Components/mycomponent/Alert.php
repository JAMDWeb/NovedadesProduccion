<?php

namespace App\View\Components\mycomponent;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;


class Alert extends Component
{

    //Propiedades del controlador

    public $clases;
    // protected $type;

    /**
     * Create a new component instance.
     */
    // Recibir un attributo de la vista 
    public function __construct($type = 'success')
    {
        // $icon = ' <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
        //                     <path strokeLinecap="round" strokeLinejoin="round" 
        //                     d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
        //                 </svg> ';
        switch ($type) {
            case 'success':
                // $title = 'Exito !:';
                $this->clases = 'bg-green-100 border border-green-400 text-green-700';
                break;
            case 'error':
                // $title = 'Error !:';
                $this->clases = 'bg-red-100 border border-red-400 text-red-700';
                break;
            case 'warning':
                // $title = 'Advertencia !:';
                $this->clases = 'bg-orange-100 border border-orange-400 text-orange-700';
                break;
            case 'info':
                // $title = 'Información !:';
                $this->clases = 'bg-red-100 border border-red-400 text-red-700';
                break;

            default:
                // $title = 'Atencion !:';
                $this->clases = 'bg-blue-100 border border-blue-400 text-blue-700';
                break;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components..mycomponent.alert');
    }
}
