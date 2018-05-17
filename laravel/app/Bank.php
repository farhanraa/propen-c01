<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    //
	public $table = 'bank';
    public $timestamps = false;
    
    public function employee(){
    	return $this->belongsTo('App\Employee', 'id_employee');
    }
}
