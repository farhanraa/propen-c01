<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class departemen extends Model
{
    //
    public $table = 'departemen';
    public $timestamps = false;

    public function employee(){
    	return $this->belongsTo('App\departemen', 'id_departemen');
    }
}
