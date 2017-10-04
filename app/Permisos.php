<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permisos extends Model
{
    protected $table = 'permissions';
    protected $fillable = ['name', 'slug', 'description','model'];
    public $timestamps = false;

    public function roles(){
    	return $this->belongsToMany('App\Roles','permission_role','role_id','permission_id');
    }
}
