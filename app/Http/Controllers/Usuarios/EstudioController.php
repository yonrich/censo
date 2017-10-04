<?php

namespace App\Http\Controllers\Usuarios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Censo;
use App\Estudio;
use App\Persona;
use App\Empleado;
Use App\ModPuesto;
Use App\Munidad;
Use App\TipoUsuario;


class EstudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudios = Estudio::where('status',1)->get();
        return view('estudios.index',compact('estudios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)

    {
       
        $censo = Censo::findOrFail($id);
       
     
        $Unidad= Munidad::pluck('descripcion','codigo');        
        $puestos= ModPuesto::pluck('descripcion','codigo');
        $nivel= TipoUsuario::pluck('descripcion','codigo');
        $option= ['1' => 'Si', '0' => 'No'];
        return view('estudios.create',compact('Unidad','puestos','nivel', 'option', 'censo'));
    }

        public function createEstudio($id)

    {
       
        $censo = Censo::findOrFail($id);
        $Unidad= Munidad::pluck('descripcion','codigo');        
        $puestos= ModPuesto::pluck('descripcion','codigo');
        $nivel= TipoUsuario::pluck('descripcion','codigo');
        $option= ['1' => 'Si', '0' => 'No'];
        return view('estudios.create',compact('Unidad','puestos','nivel', 'option', 'censo'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $estudio = new Estudio();
        $estudio->foliodom = $request->foliodom;
        $estudio->plantas = $request->plantas;
        $estudio->no_recamaras = $request->no_recamaras;
        $estudio->no_banos = $request->no_banos;
        $estudio->cocina = $request->cocina;
        $estudio->sala = $request->sala;
        $estudio->comedor = $request->comedor;
        $estudio->muro = $request->muro;
        $estudio->techo = $request->techo;
        $estudio->piso = $request->piso;
        $estudio->agua = $request->agua;
        $estudio->drenaje = $request->drenaje;
        $estudio->bano = $request->bano;
        $estudio->energia = $request->energia;
        $estudio->habitantes = $request->habitantes;
        $estudio->clasificacion = $request->clasificacion;
        $estudio->columnas = $request->columnas;
        $estudio->muros = $request->muros;
        $estudio->trabes = $request->trabes;
        $estudio->techumbres = $request->techumbres;
        $estudio->puertas = $request->puertas;
        $estudio->pisos = $request->pisos;
        $estudio->techumbresa = $request->techumbresa;
        $estudio->murosa = $request->murosa;
        $estudio->mamposteria = $request->mamposteria;
        $estudio->pintura = $request->pintura;
        $estudio->puertasa = $request->puertasa;
        $estudio->ventanas = $request->ventanas;
        $estudio->superficie = $request->superficie;
        $estudio->construida = $request->construida;
        $estudio->afectacion = $request->afectacion;
        $estudio->demolida = $request->demolida;
        $estudio->demolida_tipo = $request->demolida_tipo;
        $estudio->limpia = $request->limpia;
        $estudio->limpia_tipo = $request->limpia_tipo;
        $estudio->escombros = $request->escombros;
        $estudio->escombros_tipo = $request->escombros_tipo;
        $estudio->total_escombros = $request->total_escombros;
        $estudio->escombros_deposito = $request->escombros_deposito;
        $estudio->brigadista = $request->brigadista;
        $estudio->censo_id = $request->censo_id;
        $estudio->imagen_a = $request->imagen_a;
        $estudio->imagen_b = $request->imagen_b;
        $estudio->imagen_c = $request->imagen_c;


        $estudio->status = 1;
        $estudio->save();
        $censo = Censo::findOrFail($request->censo_id);
        $censo->status=2;

        $censo->lat = $request->lat;
        $censo->lng = $request->lng;

        $censo->save();

        return redirect()->route('censos.index')->with('success','Identificación de Daños Agregados');
    }

    public function show($id)
    {
        //
    }

        public function edit($id)

    {
          $censo = Censo::findOrFail($id);
          $mensaje="";
     
         if($censo->status==2){
             $censos = Censo::all();
               $mensaje="Este registro ya cuenta con un estudio capturado"; 
               \Session::flash("message", $mensaje) ; 
                    return view('censos.index',compact('message','censos'));

        }else{
                    return view('estudios.create',compact('Unidad','puestos','nivel', 'option', 'censo'));

            }
        
    }

    
    public function update(Request $request)
    {
        
    }

   
    public function destroy($id){ 
        
        
     }


     public function guardarImagen(Request $request)
    {
        $estudio = Estudio::where('id',$request->id)->first();
        $estudio->imagen_a = $request->imagen_a;
        
        $estudio->save();

        $file = $request->file('imagen_a');
        
        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();

        //Guardamos en el modelo

 
        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('local')->put($nombre,  \File::get($file));
        
    }

  

    

}