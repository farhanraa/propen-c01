<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cabang extends Model
{
    //
    public $table = 'cabang';
    public $timestamps = false;

    public function employee(){
    	return $this->belongsTo('App\Employee', 'id');
    }
}
