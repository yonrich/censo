<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Censo extends Model
{
    protected $table = 'censos';
    protected $fillable = ['folio',
                           'perdida', 
    					   'fecha_visita', 
    					   'nombre', 
    					   'apellido_paterno', 
    					   'apellido_materno', 
    					   'estado', 
    					   'municipio', 
    					   'localidad', 
    					   'direccion',
                           'agencia',
    					   'referencia1', 
    					   'referencia2', 
    					   'telefono_fijo', 
    					   'telefono_movil', 
    					   'habitantes', 
    					   'pisos', 
    					   'fecha_incidencia', 
    					   'nombre_encuestador', 
    					   'apellido1_encuestador', 
    					   'apellido2_encuestador', 
    					   'lat', 
    					   'lng'];
    public $timestamps = false;

    public function setFechaVisitaAttribute($fechaVisita){
        $fechaVisita = Carbon::parse($fechaVisita)->format('Y-m-d');
        $this->attributes['fecha_visita'] = $fechaVisita;
    }

    public function getFechaVisitaAttribute(){
        $fechaVisita = Carbon::parse($this->attributes['fecha_visita'])->format('d-m-Y');
        return $fechaVisita;
    }

    public function setFechaIncidenciaAttribute($fechaIncidencia){
        $fechaIncidencia = Carbon::parse($fechaIncidencia)->format('Y-m-d');
        $this->attributes['fecha_incidencia'] = $fechaIncidencia;
    }

    public function getFechaIncidenciaAttribute(){
        $fechaIncidencia = Carbon::parse($this->attributes['fecha_incidencia'])->format('d-m-Y');
        return $fechaIncidencia;
    }

    public function edo(){
        return $this->belongsTo('App\estado','estado','id_edo');
    }

    public function mun(){
        return $this->belongsTo('App\municipio','municipio','id_municipio')->where('id_edo','=',$this->attributes['estado']);
    }

    public function loc(){
        return $this->belongsTo('App\localidad','localidad','id_localidad')->where('id_edo','=',$this->attributes['estado'])->where('id_municipio','=',$this->attributes['municipio']);
    }

}


