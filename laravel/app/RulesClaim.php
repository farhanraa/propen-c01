<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RulesClaim extends Model
{
    //
    public $table = 'peraturan_klaim';
    public $timestamps = false;
    // public $primaryKey = 'kode';
    // public $incrementing = false;

    public function claimOfEmployee(){
    	return $this->hasOne('App\ClaimOfEmployee', 'id_klaim');
    }

    public function rulesOfCostClaim(){
    	return $this->belongsTo('App\RulesOfCostClaim', 'id_klaim');
    }

    public function dataClaim(){
    	return $this->hasMany('App\DataClaim', 'id_klaim');
    }

}
