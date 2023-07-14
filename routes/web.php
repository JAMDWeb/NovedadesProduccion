<?php


use App\Http\Livewire\UiLivewire;
use App\Http\Livewire\Shownewsreport;
use App\Models\Newsreport;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    // Route::get('/livewire_dashboard', function () {
    //     return view('livewire_dashboard');
    // })->name('livewire_dashboard');

    Route::post('/dashboard', function (Request $request) {

        // $request->validate([
        //     "name"       => 'required',
        //     "site"       => 'required',
        //     "correo"     => 'required|email',
        //     "password"   => 'required',
        //     "cp"         => 'required',
        //     "edad"       => 'required|numeric',
        //     "comentario" => 'required',
        //     "sexo"       => 'required',
        //     "pais"       => 'required',
        //     "parts"      => 'required'
        // ]);

        return $request->all() ;
        // return view('dashboard');
    })->name('dashboard.store');
  
    Route::get('/livewire_dashboard', Shownewsreport::class )->name('livewire_dashboard'); // usando el componente como controlador 

    // Route::get('/exportformat', [ExportController::class, 'exportformat'])->name('exportformat');
    // Route::get('/export', [ExportController::class, 'export'])->name('export');

    Route::get('/form_livewire', UiLivewire::class )->name('form_livewire'); // usando el componente como controlador 
    
    Route::get('/livewire_alpine', function () {
        return view('livewire.alpine');
    })->name('livewire_alpine');

    Route::get('prueba', function(){

        //********************************/
        // Relaciones Newsreports con User
        //********************************/
        //https://codersfree.com/courses-status/laravel-eloquent-avanzado/consulta-a-relaciones
        //  $user = User::find(2);
        //  return $user->newsreports()->Where('part_id','RMSM-1778-SCSC55V-1080-256')
        //             ->where("base_id", "163215")
        //             ->where("date_inform", "2023-05-08 09:22:56",)
        //             ->get();
        // Trae solo los usiarios que tienen cargadas novedades
        // AHora trae los usarios que tienen una cantidad de novedades cargadas
        // $user = User::has('newsreports','>',55)->get();
        // return $user;
        // $user = User::whereHas('newsreports',function($query){
        //         $query->Where('observacion','like','%pasado por robot%') ;            
        //         })->get();
        // return $user;

        // $newsreports = Newsreport::find(1);
        // return $newsreports->user->name;
        
        //********************************/
        // Relaciones Word_order con Part
        //********************************/
        // $part = Part::find(14);
        // return $part->work_orders;
        // $work_order = Work_order::find(8);
        // Return $work_order->part->description;

         //********************************/
        // Relaciones Newsreports con Work_order
        //********************************/
        // $work_order = Work_order::find(1757);
        // return $work_order->newsreports;
        // $newsreports = Newsreport::find(2);
        // return $newsreports->work_order->part->id;

        // $newsreports = Newsreport::all();
        // return $newsreports;
    });
    
});
