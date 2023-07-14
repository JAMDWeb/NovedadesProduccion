<?php
//********************************* */
// No se utiliza mas
//********************************* */
namespace App\Http\Livewire;

use App\Models\Newsreport;
use Carbon\Carbon;
use Livewire\Component;

class EditNewsreport extends Component
{
    //Propiedades del componente
    public $open = false;
    public $news ;
    // public $base_id_ok;
        
    protected $rules = [ // Reglas de validacion para las propiedades declaradas y que estan sincronizadas con create-newsreport.blade.php
        // https://laravel.com/docs/9.x/validation#rule-date-format
        'news.date_inform'       => 'required|date',
        'news.base_id'           => 'required|max:6',
        'news.lot_id'            => 'required|max:1',
        'news.part_id'           => 'required',
        'news.observacion'       => 'required',
        'news.mfg_name'          => 'nullable',
        'news.product_code'      => 'nullable', 
        'news.base_id_nc'        => 'nullable',
        'news.motivo_nc'         => 'nullable',
        // 'news.turno'             => 'nullable',
        // 'news.estado'            => 'nullable',
        'news.base_id_ok'        => 'nullable',
        'news.sort'              => 'required',
        'news.user_id'           => 'required',

    ];

    public function mount(Newsreport $news){
        $this->news = $news;
     
        
    }

    public function save()
    {
        // $this->base_id_ok = 1; // Si encontro la OT es True
        
        $this->validate();

        $this->news->save();
         
        $this->reset(['open']);// limpiar los campos del formulario 

        // No actualizan
        // $this->emitTo('show-news-reports', 'render'); // Generar un evento en particular para ser escuchado por un componente especifico
        // $this->emitSelf('render');

        // Este grupo si actualizan
        $this->emitUp('render');
         // $this->emit('render'); // Generar un evento en particular para ser escuchado

        $this->emit('alert', "Se actualizo registro"); // usar un mensaje de alerta de sweetalert2
       
    }

    
    public function render()
    {
        // $fecha_news = Carbon::parse(now());
        // $news.date_inform = $fecha_news->format('Y-m-d');
        return view('livewire.edit-newsreport');
    }
}
