<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisCuti extends Model
{
  public $table = 'jenis_cuti';
  public $timestamps = false;
  public $primaryKey = 'id_jenis';

  public function cuti(){
    return $this->hasMany('App\Cuti' , 'id_jenis');
  }

  public function jatahCuti(){
    return $this->hasMany('App\JatahCuti' , 'id_jenis');
  }
}
