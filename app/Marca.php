<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = 'marca';
    protected $fillable = ['id','marca', 'submarca','status'];
    public $timestamps = false;
}
