<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estado extends Model
{
   protected $table = 'estados';
    protected $fillable = ['id_edo','nombre', 'abreviacion','clave_capital','nombre_capital'];
    public $timestamps = false;

    public function getNombreAttribute(){
	    return strtoupper($this->attributes['nombre']);
	}

	public function municipios(){
    	return $this->hasMany('App\municipio');
    }

}
