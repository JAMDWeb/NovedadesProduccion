<?php

namespace App\Models;


use App\Models\Scopes\ResourceIdMecScope;
use App\Models\Scopes\ResourceIdTTScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;

    protected $connection = 'mysql_fsc';    

    protected $table = 'operation';    

    protected $primaryKey = 'rowid';

    public $timestamps = false;


     /**
     * The attributes that are mass assignable. utilizando metodo create() p update()
     * se declara los campos que SI se pueden actualizar con estos metodos
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'workorder_base_id',
    //     'schedule_id',
    //     'workorder_type',       
    //     'workorder_lot_id' ,
    //     'workorder_split_id' ,
    //     'workorder_sub_id',
    //     'sequence_no',
    //     'resource_id',
    //     'unit_assigned' ,
    //     'start_date' ,
    //     'could_start_date',
    //     'finish_date' ,
    //     'could_finish_date',
    //     'isdeterminant',
    //     'direction' ,
    //     'delay_reason' ,
    //     'user_start_date' ,
    //     'user_finish_date' ,
    //     'sched_resource_id' ,
    //     'is_concurrent' ,
    //     'group_resource_id' ,
    //     'org_resource_id' ,
    //     'act_min_move_qty' ,
    //     'setup_hours' ,
    //     'run_hours' ,
    //     'problem_code' ,      

    // ];
    
     /**
     * The attributes that are not mass assignable.
     * utilizar cuando sean muchos los que se pueden actualizar en forma masiva utilizando metodo create() p update()
     * se declara los campos que no se pueden actualizar con estos metodos
     * @var array<int, string>
     */
    protected $guarded = [ ]; // 

    // protected static function booted()
    // {
    //     static::addGlobalScope(new ResourceIdTTScope);
    // }

    public function scopeResIdMec($query){
        $query->where('resource_id','like','M-%');

    }
    public function scopeResIdTt($query){
        $query->where('resource_id','like','TT%')
             ->orWhere('resource_id','like','HORNO%');

    }

    public function scopeResIdReb($query){
        $query->where('resource_id','like','FREBA%')
             ->orWhere('resource_id','like','F-ROBOT%');

    }

    public function scopeResId($query, $res_id){
        $query->where('resource_id', $res_id);
             

    }
}
