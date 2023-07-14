<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Work_order_sched extends Model
{
    use HasFactory;

    // https://codersfree.com/courses-status/laravel-eloquent-avanzado/convenciones-eloquent
    // 3. Convenciones de Eloquent para una mejor práctica
    protected $connection = 'mysql_fsc';    

    protected $table = 'work_order_sched';    

    protected $primaryKey = 'rowid';

    public $timestamps = false;

    

}
