<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;

class ApiSubmarcaController extends Controller
{
    public function buscarSubmarca($marca){
        $submarcas = Marca::where('marca','like',$marca)->get();
        return $submarcas;
    } 
}
