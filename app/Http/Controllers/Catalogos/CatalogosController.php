<?php

namespace App\Http\Controllers\Catalogos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatalogosController extends Controller
{
    public function index(){
    	return view('catalogos.index');
    }
}
