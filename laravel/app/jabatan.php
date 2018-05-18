<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jabatan extends Model
{
    //
   	public $table = 'jabatan_karyawan';
    public $timestamps = false;

    public function employee(){
    	return $this->belongsTo('App\jabatan_karyawan', 'id');
    }
}
