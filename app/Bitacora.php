<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $table = 'bitacora';
    protected $fillable = ['vehiculo','placas', 'conductor','Hsalida','Hentrada','homeotraje','homeotrajeFinal','destino','vigilante','obs','obs2','gato',
    						'refaccion','señalamiento','herramientas','extintor','cables','licencia',
    						'tarjeton','verificacion','poliza'];
    public $timestamps = false;
}
