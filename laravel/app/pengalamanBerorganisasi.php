<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengalamanBerorganisasi extends Model
{
    //
	public $table = 'pengalaman_berorganisasi';
    public $timestamps = false;
    public $primaryKey = 'id';

    public function employee(){
    	return $this->belongsTo('App\Employee', 'nik_employee');
    }
}
