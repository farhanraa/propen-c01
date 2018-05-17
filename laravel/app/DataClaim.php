<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataClaim extends Model
{
    //
    public $table = 'data_klaim';
    public $timestamps = false;

    public function employee(){

    	//ngedifine hubungan antara izin sama employee
    	return $this->belongsTo('App\Employee' ,'id_employee');
    }

    public function rulesClaim(){
    	return $this->belongsTo('App\RulesClaim', 'id_klaim');
    }
}
