<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Overtime extends Model
{
    //
    public $table = 'overtime';
    public $timestamps = false;

    public function employee(){

    	//ngedifine hubungan antara lembur sama employee
    	return $this->belongsTo('App\Employee' ,'nik_employee');
    }
  
}
