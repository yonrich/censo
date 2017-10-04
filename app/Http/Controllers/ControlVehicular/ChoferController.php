<?php

namespace App\Http\Controllers\ControlVehicular;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Chofer;
Use App\Empleado;
Use App\ModPuesto;
use DB;

class ChoferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chofers = Chofer::where('status',1)->get();
        return view('catalogo-vehiculos.C_chofer.index',compact('chofers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $puestos= ModPuesto::pluck('descripcion','descripcion');
        return view('catalogo-vehiculos.C_chofer.create',compact('puestos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chofer = new Chofer();
        $chofer->empleado = $request->empleado;
        $chofer->puesto = $request->puesto;
        $chofer->status = 1;
        $chofer->save();

        return redirect()->route('Chofer.index')->with('success','Chofer registrado correctamente');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $puestos= ModPuesto::pluck('descripcion','descripcion');
        return view('catalogo-vehiculos.C_chofer.edit',compact('puestos'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $chofer = Chofer::where('id',$request->id)->first();
        $chofer->empleado = $request->empleado;
        $chofer->puesto = $request->puesto;
        $chofer->save();
        return redirect()->route('Chofer.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id){ 
        $chofer = Chofer::find($id);
        $chofer->status = 0;
        $chofer->save();
        return redirect()->route('Chofer.index')->with('danger','El Conductor ha sido Eliminado');
    }


   
    public function autocomplete(Request $request){
        //dd($request);
        $term = $request->term;
        $results = array();    
        $queries = Empleado::where('nombre', 'LIKE', '%'.$term.'%')
                ->orWhere('Apaterno', 'LIKE', '%'.$term.'%')->get();
               
        return response()->json($queries);
        
    }
}
