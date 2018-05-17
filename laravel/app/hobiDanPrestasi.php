<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hobiDanPrestasi extends Model
{
    //
    public $table = 'hobi_dan_prestasi';
    public $timestamps = false;
    public $primaryKey = 'id';

    public function employee(){
    	return $this->belongsTo('App\Employee', 'nik_employee');
    }
}
