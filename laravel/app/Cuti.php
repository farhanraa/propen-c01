<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
  public $table = 'cuti';
  public $timestamps = false;

  //public $primaryKey = 'id';


  public function employee(){
    return $this->belongsTo('App\Employee' , 'nik_employee');
  }

  public function jenisCuti(){
    return $this->belongsTo('App\JenisCuti' , 'id_jenis');
  }
}
