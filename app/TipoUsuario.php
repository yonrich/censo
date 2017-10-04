<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    protected $table = 'nivel';
    protected $fillable = ['codigo','descripcion','status'];
    public $timestamps = false;
}
