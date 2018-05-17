<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class keluargaOrangTua extends Model
{
    //
    public $table = 'keluarga_orang_tua';
    public $timestamps = false;
    public $primaryKey = 'id';

    public function employee(){
    	return $this->belongsTo('App\Employee', 'nik_employee');
    }
}
