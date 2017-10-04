<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Munidad extends Model
{
    protected $table = 'unidad';
    protected $fillable = ['id','codigo','descripcion','status'];
    public $timestamps = false;
}
