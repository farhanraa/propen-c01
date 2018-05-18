<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JatahCuti extends Model
{
  public $table = 'jatah_cuti';
  public $timestamps = false;
  public $primaryKey = 'id';


  public function employee(){
    	return $this->belongsTo('App\Employee', 'id_employee');
    }

  public function jenisCuti(){
    return $this->belongsTo('App\JenisCuti' , 'id_jenis');
  }
}
