<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    //
    public $table = 'golongan';
    public $timestamps = false;

    public function rulesOfClaim(){
    	return $this->hasOne('App\RulesOfCostClaim', 'kode_golongan');
    }
}
