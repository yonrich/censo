<?php

namespace App\Http\Controllers\Solicitud;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ModSolicitud;
use App\Empleado;
use DB;



class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitudes = ModSolicitud::where('status',1)->get();
        return view('Solicitud.index',compact('solicitudes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleado= Empleado::pluck('nombre','id');
        return view('Solicitud.create',compact('empleado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $solicitud = new ModSolicitud();
        $solicitud->id_empl = $request->id_empl;
        $solicitud->tipo = $request->tipo;
        $solicitud->procesador = $request->procesador;
        $solicitud->memoria = $request->memoria;
        $solicitud->DD = $request->DD;
        $solicitud->monitor = $request->monitor;
        $solicitud->status = 1;
        $solicitud->save();

        return redirect()->route('solicitud.index')->with('success','La Solicitud ha sido registrado correctamente');
    }

    public function show($id)
    {
        //
    }

        public function edit($id)
    {
         $solicitudes = ModSolicitud::where('status',1)->get();
        return view('Solicitud.edit',compact('empleado'));
    }

    
    public function update(Request $request)
    {
        $solicitud = ModSolicitud::where('id',$request->id)->first();
        $solicitud->id_empl = $request->id_empl;
        $solicitud->tipo = $request->tipo;
        $solicitud->procesador = $request->procesador;
        $solicitud->memoria = $request->memoria;
        $solicitud->DD = $request->DD;
        $solicitud->monitor = $request->monitor;
        $solicitud->save();
        return redirect()->route('solicitud.index');
    }

   
    public function destroy($id){ 
        $solicitud = ModSolicitud::find($id);
        $solicitud->status = 0;
        $solicitud->save();
        return redirect()->route('solicitud.index')->with('Danger','La Solicitud ha sido Eliminado');
     }

    public function autocomplete(Request $request){
        //dd($request);
        $term = $request->term;
        $results = array();    
        $queries = Empleado:://select('id',DB::raw('Concat(nombre," ",Apaterno) value'))
                    where('nombre', 'LIKE', '%'.$term.'%')
                ->orWhere('Apaterno', 'LIKE', '%'.$term.'%')->get();
               // ->take(5)->get();
    
        /*foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->nombre.' '.$query->Apaterno ];
        }*/
        //return Response::json($results); 
        return response()->json($queries);
        
    }
}

