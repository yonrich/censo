<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mdepa extends Model
{
    protected $table = 'departamento';
    protected $fillable = ['id','codigo','descripcion','status'];
    public $timestamps = false;
}
