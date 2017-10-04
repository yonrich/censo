<?php

namespace App\Http\Controllers\Usuarios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Censo;
use App\Estudio;
use App\Estado;
use App\Persona;
use App\Empleado;
Use App\ModPuesto;
Use App\Munidad;
Use App\TipoUsuario;
use DB;

class CensoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $censos = Censo::all();
        return view('censos.index',compact('censos'));
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
        $estados= Estado::pluck('nombre','id_edo');
        $option= ['1' => 'Si', '0' => 'No'];

        return view('censos.create',compact('Unidad','puestos','nivel','estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $censo = new Censo();
        $censo->folio = $request->folio;
        $censo->perdida = $request->perdida;
        $censo->fecha_visita = $request->fecha_visita;
        $censo->nombre = $request->nombre;
        $censo->apellido_paterno = $request->apellido_paterno;
        $censo->apellido_materno = $request->apellido_materno;
        $censo->estado = $request->estado;
        $censo->municipio = $request->municipio;
        $censo->localidad = $request->localidad;
        $censo->direccion = $request->direccion;
        $censo->agencia = $request->agencia;
        $censo->referencia1 = $request->referencia1;
        $censo->referencia2 = $request->referencia2;
        $censo->telefono_fijo = $request->telefono_fijo;
        $censo->telefono_movil = $request->telefono_movil;
        $censo->habitantes = $request->habitantes;
        $censo->pisos = $request->pisos;
        $censo->fecha_incidencia = $request->fecha_incidencia;
        $censo->nombre_encuestador = $request->nombre_encuestador;
        $censo->apellido1_encuestador = $request->apellido1_encuestador;
        $censo->apellido2_encuestador = $request->apellido2_encuestador;
        $censo->lat = $request->lat;
        $censo->lng = $request->lng;
        $censo->status = 1;
        $censo->save();

        return redirect()->route('censos.index')->with('success','Censo registrado correctamente');
    }

    public function show($id)
    {
        //
    }

        public function edit($id)
    {
        $censos = Censo::where('id',$id)->first();
        $Unidad= Munidad::pluck('descripcion','id');        
        $puestos= ModPuesto::pluck('descripcion','id');
        $nivel= TipoUsuario::pluck('descripcion','id');
        $estados= Estado::pluck('nombre','id_edo');
        return view('censos.edit',compact('Unidad','puestos','nivel', 'censos','estados'));
    }

    
    public function update(Request $request)
    {
        //dd($request);
        $censo = Censo::where('id',$request->id)->first();
        $censo->folio = $request->folio;
        $censo->perdida = $request->perdida;
        $censo->fecha_visita = $request->fecha_visita;
        $censo->nombre = $request->nombre;
        $censo->apellido_paterno = $request->apellido_paterno;
        $censo->apellido_materno = $request->apellido_materno;
        $censo->estado = $request->estado;
        $censo->municipio = $request->municipio;
        $censo->localidad = $request->localidad;
        $censo->direccion = $request->direccion;
        $censo->referencia1 = $request->referencia1;
        $censo->referencia2 = $request->referencia2;
        $censo->telefono_fijo = $request->telefono_fijo;
        $censo->telefono_movil = $request->telefono_movil;
        $censo->habitantes = $request->habitantes;
        $censo->pisos = $request->pisos;
        $censo->fecha_incidencia = $request->fecha_incidencia;
        $censo->nombre_encuestador = $request->nombre_encuestador;
        $censo->apellido1_encuestador = $request->apellido1_encuestador;
        $censo->apellido2_encuestador = $request->apellido2_encuestador;
        $censo->lat = $request->lat;
        $censo->lng = $request->lng;
        $censo->save();
        return redirect()->route('censos.index');
    }

   
    public function destroy($id){ 
        $censo = Censo::find($id);
        $censo->status = 0;
        $censo->save();
        return redirect()->route('censos.index')->with('Danger','El registro ha sido eliminado');
        
     }


    public function buscar_empleado(Request $request){
        
    }

    public function censoEstadoMunicipio($id_edo, $id_municipio){
        $censos = Censo::where("estado", "=", $id_edo)->where("municipio", "=", $id_municipio)->get();
        $datos = Censo::select(DB::raw('perdida, COALESCE(count(perdida),0) as conteo'))
                        ->where("estado", "=", $id_edo)
                        ->where("municipio", "=", $id_municipio)
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
        return response()->json(['data' => $censos,'grafica'=>$datosg], 200);
    }

    public function censoEstadoMunicipioLocalidad($id_edo, $id_municipio, $id_localidad){
        $censos=Censo::where("estado", "=", $id_edo)->where("municipio", "=", $id_municipio)->where('localidad','=',$id_localidad)->get();
        $datos = Censo::select(DB::raw('perdida, COALESCE(count(perdida),0) as conteo'))
                        ->where("estado", "=", $id_edo)
                        ->where("municipio", "=", $id_municipio)
                        ->where("localidad","=",$id_localidad)
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
        return response()->json(['data' => $censos,'grafica'=>$datosg], 200);
    }

    public function censoPerdida($id_edo, $id_municipio, $id_localidad,$perdida){
        $censos=Censo::where("estado", "=", $id_edo)->where("municipio", "=", $id_municipio)->where('localidad','=',$id_localidad)->where('perdida','=',$perdida)->get();
        $datos = Censo::select(DB::raw('perdida, COALESCE(count(perdida),0) as conteo'))
                        ->where("estado", "=", $id_edo)
                        ->where("municipio", "=", $id_municipio)
                        ->where("localidad","=",$id_localidad)
                        ->where("perdida","=",$perdida)
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
        return response()->json(['data' => $censos,'grafica'=>$datosg], 200);
    }


}
