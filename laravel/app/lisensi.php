<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lisensi extends Model
{
    //
    public $table = 'lisensi';
    public $timestamps = false;
    public $primaryKey = 'id';

    public function employee(){
    	return $this->belongsTo('App\Employee', 'id_employee');
    }
}
