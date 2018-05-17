<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sertifikat extends Model
{
    //
    public $table = 'sertifikat';
    public $timestamps = false;
    public $primaryKey = 'id';

    public function employee(){
    	return $this->belongsTo('App\Employee', 'nik_employee');
    }
}
