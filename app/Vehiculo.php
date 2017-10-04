<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = 'vehiculos';
    protected $fillable = ['vehiculo', 'marca', 'submarca','modelo','serie','placas','num_eco','seguro', 'conductor', 'estatus', 'tipo_auto', 'localidad', 'status'];
    public $timestamps = false;

	public function lugar(){
    	return $this->belongsTo('App\localidad','localidad');
    }

    public function chofer(){

    	return $this->belongsTo('App\Empleado','conductor');
    }

}
