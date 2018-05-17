<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JatahCuti extends Model
{
  public $table = 'jatah_cuti';
  public $timestamps = false;
  public $primaryKey = 'id';

  public function jenisCuti(){
    return $this->belongsTo('App\JenisCuti' , 'id_jenis');
  }
}
