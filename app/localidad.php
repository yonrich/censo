<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class localidad extends Model
{
    protected $table = 'localidades';
    protected $fillable = ['id_localidad','id_edo','id_municipio', 'nombre','tipo'];
    public $timestamps = false;

    public function getNombreAttribute(){
	    return strtoupper($this->attributes['nombre']);
	}

    public function municipio(){
    	return $this->belongsTo('App\Model\municipio','id_municipio');
    }

    public function vehiculos(){
    	return $this->hasMany('App\Model\vehiculos');
    }
}
