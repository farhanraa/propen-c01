<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mutasi extends Model
{
    //
    public $table = 'mutasi';
    public $timestamps = false;
    public $primaryKey = 'id';

    public function employee(){
    	return $this->belongsTo('App\Employee', 'nik_employee');
    }
}
