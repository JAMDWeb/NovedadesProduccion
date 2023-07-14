<?php

namespace App\Http\Livewire;

use App\Models\Newsreport;
use App\Models\Work_order;
use Carbon\Carbon;
use Livewire\Component;


class CreateNewsreport extends Component
{

    // para utilizar el modal en el componente
    // Hay que sincronizar este componente con el valor 
    /* ++++++++++++++++++++++++++ */
    // Propiedades del componente 
    /* ++++++++++++++++++++++++++ */


    public $open = false;
    public $open_clonar = false;
    public $selectedNews;
    public $clonar = [];


    public $date_inform, $base_id, $split_id, $sub_id, $title,
        $lot_id, $base_id_ok, $part_id, $part_description,
        $mfg_name, $product_code, $base_id_nc, $fecha_news,
        $motivo_nc, $turno, $estado, $observacion, $sort, $user_id;


    
    // Propiedad se encargara de escuchar los eventos definidos y definir elmetodo que se ejecute
    protected $listeners = [
        'cloneIdNews'
        
    ]; // Escuchar el evento generado por el componente crea datos para refrescar la vista

    protected $rules = [ // Reglas de validacion para las propiedades declaradas y que estan sincronizadas con create-newsreport.blade.php
        'date_inform'       => 'required|date',
        'base_id'           => 'required|max:10|exists:App\Models\Work_order,base_id',
        'lot_id'            => 'required|max:1',
        'part_id'           => 'required',
        'observacion'       => 'required',

    ];
    // Validacion en tiempo real
    public function updated($propertyName)
    { // Se activa cuando se hallan modificado alguna de las propiedades 
        $this->validateOnly($propertyName);
        // if ($propertyName <> "open") {
        // //     $work_order = Work_order::where('base_id', $this->base_id)->get();
            //  dd($propertyName);
        // //     $this->part_id = $work_order->part->id;
        // //     // $this->part_id = Part::class
        // //     // dd($propertyName);
        //   }
    }

    public function save()
    {
        // dd($this);

        $this->validate();

        // $this->base_id_ok = 1; // Si encontro la OT es True
        // $this->mfg_name = "Cliente Prueba"; // Hay que buscarlo en la base FSC tabla part
        // $this->product_code = "Producto Prueba"; // Hay que buscarlo en la base FSC tabla part

        // $this->sort = Newsreport::count() + 1;
        //$this->user_id = auth()->user()->id;
        // dd($this);
        Newsreport::create([
            'date_inform'       => $this->date_inform,
            'base_id'           => $this->base_id,
            'lot_id'            => $this->lot_id,
            'split_id'          => $this->split_id,
            'sub_id'            => $this->sub_id,  
            'base_id_ok'        => $this->base_id_ok,
            'part_id'           => $this->part_id,
            'base_id_nc'        => $this->base_id_nc,
            'motivo_nc'         => $this->motivo_nc,
            'observacion'       => $this->observacion,
            'mfg_name'          => $this->mfg_name,
            'product_code'      => $this->product_code,
            // Se estan actualizando en el observer
            'turno'             => $this->turno,
            'estado'            => $this->estado,
            // 'sort'              => $this->sort,
            // 'user_id'           => $this->user_id
        ]);

        

        $this->reset([ // limpiar los campos del formulario 
            'open',
            'date_inform',
            'base_id',            
            'lot_id',
            'split_id',
            'sub_id'  ,
            'base_id_ok',
            'part_id',
            'mfg_name',
            'product_code',
            'base_id_nc',
            'motivo_nc',
            'turno',
            'estado',
            'observacion',
            'sort',
            'user_id',
            'clonar',
        ]);

        // Emitir un evento, dentro de evento se pondra el nombre del evento que se debera escuchar
        $this->emitUp('render');

        $this->emit('alert', "Se genero registro"); // usar un mensaje de alerta de sweetalert2
        $this->emitUp('deselectedNews');

    }

    public function exit_modal()
    {        

        $this->reset([ // limpiar los campos del formulario 
            'open',
            'date_inform',
            'base_id',
            'lot_id',
            'split_id',
            'sub_id' ,            
            'base_id_ok',
            'part_id',
            'mfg_name',
            'product_code',
            'base_id_nc',
            'motivo_nc',
            'turno',
            'estado',
            'observacion',
            'sort',
            'user_id',
            'clonar',
        ]);
        
        $this->open = false;
        $this->open_clonar = false;
  
        $this->emitUp('deselectedNews');
        
    }

    public function render()
    {
                  
        $fecha_news = Carbon::parse(now());
        $this->date_inform = $fecha_news->format('Y-m-d');
        return view('livewire.create-newsreport');
    }


    public function add_part_id($base_id){

        $work_order = Work_order::where('base_id',$base_id)->first();
   

        if ($work_order){
            $this->base_id_ok       = 1; // Si encontro la OT es True
            $this->lot_id           = $work_order->lot_id ;
            $this->split_id         = $work_order->split_id;
            $this->sub_id           = $work_order->sub_id  ;
            $this->part_id          = $work_order->part->id;
            $this->part_description = $work_order->part->description;
            $this->mfg_name         = $work_order->part->mfg_name; // Hay que buscarlo en la base FSC tabla part
            $this->product_code     = $work_order->part->product_code; // Hay que buscarlo en la base FSC tabla part
          
        } else {
            # code...
        }
        
       
    }

    public function cloneIdNews($value){
        $this->clonar = $value;

        $this->base_id = $this->clonar['base_id'];
        $this->lot_id =  $this->clonar['lot_id'];       
        $this->split_id = $this->clonar['split_id'];
        $this->sub_id =  $this->clonar['sub_id'];       
        $this->base_id_ok =  $this->clonar['base_id_ok'];
        $this->part_id  =  $this->clonar['part_id'];
        $this->mfg_name  =  $this->clonar['mfg_name'];
        $this->product_code =  $this->clonar['product_code'];
        $this->base_id_nc = $this->clonar ['base_id_nc'];
        $this->motivo_nc = $this->clonar ['motivo_nc'];
        $this->observacion = $this->clonar['observacion'];
        $this->part_description = "Falta agregar";
   
    }

    public function check_nc($nc){
      
            
               
    }
}




