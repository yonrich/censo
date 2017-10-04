<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModSolicitud extends Model
{
    protected $table = 'solicitud';
    protected $fillable = ['id','id_empl', 'tipo', 'procesador', 'memoria', 'DD','monitor','obs','status'];
    public $timestamps = false;
}
