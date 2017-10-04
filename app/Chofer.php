<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chofer extends Model
{

    protected $table = 'chofer';
    protected $fillable = ['id','empleado','puesto','status'];
    public $timestamps = false;

    public function empleado(){
    	return $this->belongsTo('App\Model\Empleado', 'empleado');
    }
}
