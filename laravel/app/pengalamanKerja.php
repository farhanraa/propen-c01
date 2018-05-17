<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengalamanKerja extends Model
{
    //
    public $table = 'pengalaman_kerja';
    public $timestamps = false;
    public $primaryKey = 'id';

    public function employee(){
    	return $this->belongsTo('App\Employee', 'nik_employee');
    }
}
