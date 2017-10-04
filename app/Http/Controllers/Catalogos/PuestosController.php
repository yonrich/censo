<?php

namespace App\Http\Controllers\Catalogos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ModPuesto;

class PuestosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puestos = ModPuesto::where('status',1)->get();
        return view('catalogos.Tpuestos.index',compact('puestos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogos.Tpuestos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $puesto = new ModPuesto();
        $puesto->codigo = $request->codigo;
        $puesto->descripcion = $request->descripcion;
        $puesto->status = 1;
        $puesto->save();

        return redirect()->route('Rpuestos.index')->with('success','Puesto registrado correctamente');
   
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
        $puestos = ModPuesto::where('id',$id)->first();
        $codigo= ModPuesto::pluck('codigo','codigo');
        $descripcion= ModPuesto::pluck('descripcion','descripcion');
        return view("catalogos.Tpuestos.edit",compact('puestos','codigo','descripcion'));
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
        $puesto = ModPuesto::where('id',$request->id)->first();
        $puesto->codigo = $request->codigo;
        $puesto->descripcion = $request->descripcion;
        $puesto->save();
        return redirect()->route('Rpuestos.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){ 
        $puesto = ModPuesto::find($id);
        $puesto->status = 0;
        $puesto->save();
        return redirect()->route('Rpuestos.index')->with('Danger','El Puesto ha sido Eliminada');
     }



    public function buscar_puesto(Request $request){
        $dato=$request->input("dato_buscado");
        $puestos=ModPuesto::where('codigo',$dato)->get();
        return view('catalogos.Tpuestos.index',compact('puestos'));
    }
}
