<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kemampuanBahasa extends Model
{
    //
    public $table = 'kemampuan_bahasa';
    public $timestamps = false;
    public $primaryKey = 'id';

    public function employee(){
    	return $this->belongsTo('App\Employee', 'nik_employee');
    }
}
