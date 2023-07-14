<?php

namespace App\Http\Livewire;

use App\Exports\NewsExport;
use App\Exports\NewsExportFormat;
use Livewire\Component;
use App\Models\Newsreport;
use App\Models\Work_order;
use Carbon\Carbon;
use Livewire\Livewire;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Shownewsreport extends Component
{
    use WithPagination; // La paginacion se realiza en forma dinamica

    // Propiedades declaradas
    public $searchBaseId = '';
    public $searchpartid = '';
    public $searchdateinform = '', $fecha_news;
    public $cant = '10';
    public $readyToLoad = false;

    public $news, $work;
    public $fecha_Ymd, $part_id, $part_description,  $base_id_nc = false;

    // Valores iniciales de ordenamiento
    public $sort =  'date_inform';
    public $direction = 'desc';

    // Modal del edit
    public $open_edit = false;

    //Propiedades para select checkbox multiples 
    public $selectedNews = []; // array de id selecionados
    public $selectAll = false;
    public $bulkDisabled = true; // Seleccion en cantidad
    public $clonarId;

    // Propiedad se encargara de escuchar los eventos definidos y definir elmetodo que se ejecute
    protected $listeners = [
        'render',
        'delete',
        'deselectedNews'


    ]; // Escuchar el evento generado por el componente crea datos para refrescar la vista

    protected $queryString = [
        'cant' => ['except' => '10'],
        'searchBaseId' => ['except' => ''],
        'searchpartid' => ['except' => ''],
        'searchdateinform' => ['except' => ''],
        'sort' => ['except' => 'date_inform'],
        'direction' => ['except' => 'desc']

    ];

    protected $rules = [ // Reglas de validacion para las propiedades declaradas y que estan sincronizadas con create-newsreport.blade.php
        // https://laravel.com/docs/9.x/validation#rule-date-format
        'news.date_inform'       => 'required|date',
        'news.base_id'           => 'required|max:6|exists:App\Models\Work_order,base_id',
        'news.lot_id'            => 'required|max:1',
        'news.part_id'           => 'required',
        'news.observacion'       => 'required',
        'news.mfg_name'          => 'nullable',
        'news.product_code'      => 'nullable',
        'news.base_id_nc'        => 'nullable',
        'news.motivo_nc'         => 'nullable',
        'news.turno'             => 'nullable',
        'news.estado'            => 'nullable',
        'news.base_id_ok'        => 'nullable',
        'news.sort'              => 'required',
        'news.user_id'           => 'required',

    ];




    // este metodo se va ejecutar cada ves que se modifique una propìedades declaradas : updating
    public function updatingSearchBaseId()
    { // Ahora si queremos que se modifique para una propìedad espesificade: searchbaseid
        $this->resetPage();
    }
    public function updatingSearchpartid()
    { // Ahora si queremos que se modifique para una propìedad espesificade: searchpartid
        $this->resetPage();
    }
    public function updatingSearchdateinform()
    { // Ahora si queremos que se modifique para una propìedad espesificade: searchpartid
        $this->resetPage();
    }

  
    public function render()
    {
        // $news_calidad = Newsreport::all();
        // dd($news_calidad);
        $this->bulkDisabled = count($this->selectedNews) < 1;
        // dd($this->readyToLoad);
        if ($this->readyToLoad) {
            $news_calidad = Newsreport::where('base_id', 'like', '%' . $this->searchBaseId . '%')
                ->Where('part_id', 'like', '%' . $this->searchpartid . '%')
                ->Where('date_inform', 'like', '%' . $this->searchdateinform . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant); // coleccion de datos paginada
            // ->get();
        } else {
            $news_calidad = [];
        }

    //    $news_calidad = Newsreport::all();
        // dd($news_calidad);
     
        return view('livewire.show-news-reports', compact('news_calidad'));
    }

    public function loadNews()
    {
        $this->readyToLoad = true;
    }

    public function order($sort)
    {

        if ($this->sort == $sort) {

            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    public function edit(Newsreport $news)
    {

        $this->news  = $news;
        // dd($this->news);
        // $work  =  Work_order::find([$this->news->base_id,1,0,0]);
        $this->work  =  Work_order::where('base_id', $this->news->base_id)->first();

        $fecha_Ymd = Carbon::parse($this->news->date_inform);
        $this->news->date_inform = $fecha_Ymd->format('Y-m-d');
        $this->base_id_nc = $this->news->base_id_nc;

        // dd($this->work->part->id);
        $this->part_id = $this->work->part->id;
        $this->part_description = $this->work->part->description;
        $this->open_edit = true;
    }

    public function update()
    {
        // $this->base_id_ok = 1; // Si encontro la OT es True

        $this->validate();

        $this->news->save();

        $this->reset(['open_edit']); // limpiar los campos del formulario 

        $this->emit('alert', "Se actualizo registro"); // usar un mensaje de alerta de sweetalert2

    }

    public function delete(Newsreport $news)
    {
        $news->delete();
    }

    public function deleteSelected()
    {
        Newsreport::query()
            ->whereIn('id', $this->selectedNews)
            ->delete();
        $this->selectedNews = [];
        $this->selectAll = false;
    }

    public function deselectedNews()
    {
        
        $this->selectedNews = [];
        
    }

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedNews = Newsreport::pluck('id');
        } else {
            $this->selectedNews = [];
        }
    }

    public function check_nc($nc)
    {
       
        if ($this->base_id_nc == false) {
            $this->news->motivo_nc = "";

        }
        $this->news->base_id_nc = $this->base_id_nc;
    }
    
}
