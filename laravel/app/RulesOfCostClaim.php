<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RulesOfCostClaim extends Model
{
    //
    public $table = 'peraturan_pengeluaran_claim';
    public $timestamps = false;

    public function golongan(){
    	return $this->belongsTo('App\Golongan', 'kode_golongan');
    }

    public function rulesClaim(){
    	return $this->hasMany('App\RulesClaim', 'id_rules_cost');
    }
}
