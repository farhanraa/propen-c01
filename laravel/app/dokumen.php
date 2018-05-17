<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dokumen extends Model
{
    //
    public $table = 'dokumen';
    public $timestamps = false;
    public $primaryKey = 'id';

    public function employee(){
    	return $this->belongsTo('App\Employee', 'id_employee');
    }
}
