<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\UserRol;
use App\Roles;
use Auth;
use DB;
use App\Censo;
use App\Estado;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function gmaps()
    {
        $estados= Estado::pluck('nombre','id_edo');
        $censos = Censo::all();
        $datos = Censo::select(DB::raw('perdida, COALESCE(count(perdida),0) as conteo'))
                        ->groupBy("perdida")
                        ->get();
        $datosg = null;
        $perdidas = ["PERDIDA TOTAL","DAÑO PARCIAL (HABITABLE)","DAÑO PARCIAL (NO HABITABLE)"];

        foreach ($perdidas as $key => $perdida) {
            $conteo = 0;
            foreach ($datos as $dato) {
                if($perdida == $dato->perdida && $dato->conteo > $conteo){
                    $conteo = $dato->conteo;
                }
            }
            $datosg[$key]=$conteo;
        }
        return view('gmaps',compact('censos', 'estados','datosg'));
    }

    public function gmapsgral()
    {
        $censos = Censo::all();
        return view('gmapsgral',compact('censos'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $rolId = UserRol::select('role_id')->where('user_id',$userId)->first();
        $rolId = $rolId->role_id;
        $roles = Roles::where('id',$rolId)->first();
        Session::push('roles', $roles);
        return view('home');
     }

    public function menu(){                
        $userId = Auth::user()->id;
        $rolId = UserRol::select('role_id')->where('user_id',$userId)->first();
        $rolId = $rolId->role_id;
        $roles = Roles::where('id',$rolId)->first();
        Session::push('roles', $roles);
        return view('home');
    }
}
