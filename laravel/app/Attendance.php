<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    //
    public $table = 'attendance';
    public $timestamps = false;

    public function employee(){

    	//ngedifine hubungan antara izin sama employee
    	return $this->belongsTo('App\Employee' ,'nik_employee');
    }
}
