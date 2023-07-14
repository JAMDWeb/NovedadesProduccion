<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    protected $connection = 'mysql_fsc';    

    protected $table = 'part';    

    protected $primaryKey = 'rowid';

    public $timestamps = false;

    // Relacion de uno a muchos
    public function work_orders(){
        return $this->hasMany(Work_order::class,'id','id')->withDefault([
            'name' => 'No encontro relacion con part'
        ]);
        
    }

}
