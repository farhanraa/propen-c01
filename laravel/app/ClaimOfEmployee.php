<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClaimOfEmployee extends Model
{
    //

    public $table = 'klaim_karyawan';

    public $timestamps = false;

    public function employee(){

    	//ngedifine hubungan antara izin sama employee
    	return $this->belongsTo('App\Employee', 'id_employee');
    }

    public function rulesClaim(){
    	return $this->belongsTo('App\RulesClaim', 'id_klaim');
    }
}
