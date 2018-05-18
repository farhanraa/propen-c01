<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class absensi extends Model
{
    //
    public $table = 'absensi';
    public $timestamps = false;

    public function employee(){
    	return $this->belongsTo('App\Employee', 'id');
    }
}
