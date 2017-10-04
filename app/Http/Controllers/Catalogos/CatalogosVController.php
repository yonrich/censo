<?php

namespace App\Http\Controllers\Catalogos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatalogosVController extends Controller
{
    public function index(){
    	return view('catalogo-vehiculos.index');
    }
}
