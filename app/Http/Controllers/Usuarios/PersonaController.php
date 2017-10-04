<?php

namespace App\Http\Controllers\Usuarios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Persona;
use App\Empleado;
Use App\ModPuesto;
Use App\Munidad;
Use App\TipoUsuario;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::where('status',1)->get();
        return view('personas.index',compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Unidad= Munidad::pluck('descripcion','codigo');        
        $puestos= ModPuesto::pluck('descripcion','codigo');
        $nivel= TipoUsuario::pluck('descripcion','codigo');
        $option= ['1' => 'Si', '0' => 'No'];
        return view('personas.create',compact('Unidad','puestos','nivel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $persona = new Persona();
        $persona->nombre = $request->nombre;
        $persona->apellido_paterno = $request->apellido_paterno;
        $persona->apellido_materno = $request->apellido_materno;
        $persona->rfc = $request->rfc;
        $persona->curp = $request->curp;
        $persona->calle = $request->calle;
        $persona->num_exterior = $request->num_exterior;
        $persona->num_interior = $request->num_interior;
        $persona->colonia = $request->colonia;
        $persona->codigo_postal = $request->codigo_postal;
        $persona->delegacion_municipio = $request->delegacion_municipio;
        $persona->localidad = $request->localidad;
        $persona->estado_civil = $request->estado_civil;
        $persona->sexo = $request->sexo;
        $persona->nacionalidad = $request->nacionalidad;
        $persona->telefono_fijo = $request->telefono_fijo;
        $persona->telefono_movil = $request->telefono_movil;
        $persona->escolaridad = $request->escolaridad;
        $persona->status = 1;
        $persona->save();

        return redirect()->route('personas.index')->with('success','Persona registrada correctamente');
    }

    public function show($id)
    {
        //
    }

        public function edit($id)
    {
        
    }

    
    public function update(Request $request)
    {
      
        
    }

   
    public function destroy($id){ 
        
     }


    public function buscar_empleado(Request $request){
        
    }
}
