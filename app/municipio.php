<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class municipio extends Model
{
    protected $table = 'municipios';

    protected $primaryKey = 'id_edo,id_municipio';

    protected $fillable = ['id_municipio','id_edo', 'nombre','id_cab','nombre_cabecera'];
    public $timestamps = false;

    public function getNombreAttribute(){
	    return strtoupper($this->attributes['nombre']);
	}

	public function getNombreCabeceraAttribute(){
	    return strtoupper($this->attributes['nombre_cabecera']);
	}

    public function estado(){
    	return $this->belongsTo('App\estados','id_edo','id_edo');
    }

    public function localidad(){
    	return $this->hasMany('App\localidad');
    }
}
