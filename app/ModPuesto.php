<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModPuesto extends Model
{
    protected $table = 'Puesto';
    protected $fillable = ['codigo','descripcion','status'];
    public $timestamps = false;
}
