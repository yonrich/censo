<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';
    protected $fillable = ['name', 'slug', 'description','level'];
    public $timestamps = false;

    public function users(){
    	return $this->belongsToMany('App\User','role_user','role_id','user_id');
    }

    public function permisos(){
    	return $this->belongsToMany('App\Permisos','permission_role','role_id','permission_id');
    }
}
