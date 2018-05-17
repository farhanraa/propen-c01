<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class surat extends Model
{
    //
    public $table = 'surat';
    public $timestamps = false;
    public $primaryKey = 'id';

    public function employee(){
    	return $this->belongsTo('App\Employee', 'nik_employee');
    }
}
