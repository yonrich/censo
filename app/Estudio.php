<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Estudio extends Model
{
    protected $table = 'estudios';
    protected $fillable = ['foliodom',
                           'plantas',
                           'no_recamaras',
                           'no_banos',
                           'cocina',
                           'sala',
                           'comedor', 
              					   'muro', 
              					   'techo', 
              					   'piso', 
              					   'agua', 
              					   'drenaje', 
              					   'bano', 
              					   'energia', 
              					   'habitantes',
              					   'clasificacion', 
              					   'columnas',
                           'trabes',
                           'muros',
                           'techumbres', 
    					             'puertas',
                           'pisos',
                           'techumbresa',
                           'murosa',
    					             'mamposteria',
                           'pintura',
                           'puertasa',
                           'ventanas',
                           'superficie',
                           'construida', 
              					   'afectacion', 
              					   'demolida', 
              					   'demolida_tipo', 
              					   'limpia', 
              					   'limpia_tipo', 
              					   'escombros', 
              					   'escombros_tipo', 
              					   'total_escombros',
                           'escombros_deposito',
                           'brigadista',
                           'censo_id',
                           'imagen_a',
                           'imagen_b',
                           'imagen_c'];
    public $timestamps = false;

     public function estudio(){
        return $this->belongsTo('App\censo','censo_id');
    }

    

    }

    

