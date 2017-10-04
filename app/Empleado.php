<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';
    protected $fillable = ['numeroE','nombre', 'Apaterno','Amaterno','correo','curp','nivel','cod_puesto','puesto','unidad'];
    public $timestamps = false;

    public function puesto_empleado(){
    	return $this->belongsTo('App\ModPuesto','cod_puesto');
    }
    
	public function vehiculos(){
    	return $this->hasMany('App\Model\vehiculos');
    }

	public function choferes(){
	return $this->belongsTo('App\Mo\Chofer', 'numeroE');
	}

}
