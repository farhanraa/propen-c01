<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kontakDarurat extends Model
{
    //
	public $table = 'kontak_darurat';
    public $timestamps = false;
    public $primaryKey = 'id';

    public function employee(){
    	return $this->belongsTo('App\Employee', 'id_employee');
    }
}
