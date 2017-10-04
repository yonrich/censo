<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Polizas extends Model
{
       protected $table = 'poliza';
    protected $fillable = ['id','Aseguradora','Poliza', 'Inciso', 'status'];
    public $timestamps = false;
}
