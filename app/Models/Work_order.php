<?php

namespace App\Models;

use Awobaz\Compoships\Compoships;
use Illuminate\Database\Connection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work_order extends Model
{
    use HasFactory;
    use Compoships;

    protected $connection = 'mysql_fsc';    

    protected $table = 'work_order';    

    protected $primaryKey = 'rowid';

    public $timestamps = false;

    // Relacion inversa  uno a muchos
    public function part(){
        return $this->belongsTo(Part::class,'part_id','id')->withDefault([
            'name' => 'No encontro relacion con part'
        ]);
        
    }
    // Relacion uno a muchos inversa
    public function newsreports(){
        return $this->hasMany(Newsreport::class,['base_id'],['base_id','lot_id','split_id','sub_id']  );
    }
}
