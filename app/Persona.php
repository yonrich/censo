<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';
    protected $fillable = ['nombre', 'apellido_paterno','apellido_materno','rfc','curp','calle','num_exterior','num_interior','colonia', 'codigo_postal', 'delegacion_municipio', 'localidad', 'estado_civil', 'sexo', 'nacionalidad', 'telefono_fijo', 'telefono_movil', 'escolaridad'];
    public $timestamps = false;

   

}
