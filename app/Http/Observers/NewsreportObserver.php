<?php

namespace App\Observers;

use App\Models\Newsreport;

class NewsreportObserver
{
    //Crear un metodo que haga referencia a accion que se ejecute
    // asigna el valor de orden en sort
    // eventos terminados en 'ing' se ejecuta antes que se cree un nuevo registro
    public function creating(Newsreport $news)
    {
        // $news->mfg_name = $news->part->mfg_name; // Hay que buscarlo en la base FSC tabla part
        // $news->product_code = $news->part->product_code; // Hay que buscarlo en la base FSC tabla part
        // $news->product_code = "Producto Prueba"; // Hay que buscarlo en la base FSC tabla part
        $news->turno = "A definir uso";
        $news->estado = "A definir uso" ;
        $news->sort = Newsreport::max('sort')+ 1;
        $news->user_id = auth()->user()->id;

       
    }

    
    
}
