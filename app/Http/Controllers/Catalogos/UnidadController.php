<?php

namespace App\Http\Controllers\Catalogos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Munidad;

class UnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidades = Munidad::where('status',1)->get();
        return view('catalogos.Cunidad.index',compact('unidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogos.Cunidad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unidad = new Munidad();
        $unidad->codigo = $request->codigo;
        $unidad->descripcion = $request->descripcion;
        $unidad->status = 1;
        $unidad->save();

        return redirect()->route('Unidad.index')->with('success','Unidad registrada correctamente');
   
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
        $unidades = Munidad::where('id',$id)->first();
        $codigo= Munidad::pluck('codigo','codigo');
        $descripcion= Munidad::pluck('descripcion','descripcion');
        return view("catalogos.Cunidad.edit",compact('unidades','codigo','descripcion'));
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
        $unidad = Munidad::where('id',$request->id)->first();
        $unidad->codigo = $request->codigo;
        $unidad->descripcion = $request->descripcion;
        $unidad->save();
        return redirect()->route('Unidad.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unidad = Munidad::find($id);
        $unidad->status = 0;
        $unidad->save();
        return redirect()->route('Unidad.index')->with('Danger','El Puesto ha sido Eliminada');
    }

    public function buscar_unidad(Request $request){
        $dato=$request->input("dato_buscado");
        $unidades=Munidad::where('codigo',$dato)->get();
        return view('catalogos.Cunidad.index',compact('unidades'));
    }
}
