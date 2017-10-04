<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    protected $table = 'towns';
    protected $filable = ['name', 'state_id'];
}
