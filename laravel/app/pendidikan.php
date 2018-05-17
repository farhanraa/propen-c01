<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pendidikan extends Model
{
    //
    public $table = 'pendidikan';
    public $timestamps = false;
    public $primaryKey = 'id';

    public function employee(){
    	return $this->belongsTo('App\Employee', 'nik_employee');
    }
}
