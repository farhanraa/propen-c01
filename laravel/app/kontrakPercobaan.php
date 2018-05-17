<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kontrakPercobaan extends Model
{
    //
    public $table = 'kontrak_percobaan';
    public $timestamps = false;
    public $primaryKey = 'id';

    public function employee(){
    	return $this->belongsTo('App\Employee', 'nik_employee');
    }
}
