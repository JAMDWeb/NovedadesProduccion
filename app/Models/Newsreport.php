<?php

namespace App\Models;

use Awobaz\Compoships\Compoships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsreport extends Model
{
    use HasFactory;
    use Compoships;

    protected $connection = 'mysql';

    // // Asignacion masiva : permitir su uso
    protected $fillable = [
        'date_inform',
        'base_id',
        'lot_id',
        'split_id',
        'sub_id'  ,
        'base_id_ok' ,  
        'part_id',
        'mfg_name',
        'product_code',
        'base_id_nc',
        'motivo_nc',
        'turno',
        'estado',
        'observacion',
        'sort'  ,
        'user_id'
    ];

    // protected $hidden = [
    //     'id', 'created_at', 'updated_at'
    // ];

    // protected $guarded = [ 'id', 'created_at', 'updated_at'];

    // Relacion uno a muchos inversa
    public function user()
    {
        return $this->belongsTo(User::class,'id');
    }

    // relacion muchos a uno  Inversa 
    public function work_order(){

        return $this->belongsTo(Work_order::class,['base_id','lot_id','split_id','sub_id'],['base_id','lot_id','split_id','sub_id'] );
    }

    
}
