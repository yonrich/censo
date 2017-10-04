<?php

namespace App\Http\Controllers\ControlVehicular;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Polizas;

class PolizaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polizas = Polizas::where('status',1)->get();
        return view("catalogo-vehiculos.POLIZA.index",compact('polizas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogo-vehiculos.POLIZA.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $poliza = new Polizas();
        $poliza->Aseguradora = $request->Aseguradora;
        $poliza->Poliza = $request->Poliza;
        $poliza->Inciso = $request->Inciso;
        $poliza->status = 1;
        $poliza->save();

        return redirect()->route('Polizas.index')->with('success','La Poliza fue creada correctamente');
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
        $polizas = Polizas::where('status',1)->get();
        return view('catalogo-vehiculos.POLIZA.edit',compact('polizas'));
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

        $poliza = Polizas::where('id',$request->id)->first();
        $poliza->Aseguradora = $request->Aseguradora;
        $poliza->Poliza = $request->Poliza;
        $poliza->Inciso = $request->Inciso;
        $poliza->save();

        return redirect()->route('Polizas.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){ 
        $poliza = Polizas::find($id);
        $poliza->status = 0;
        $poliza->save();
        return redirect()->route('Polizas.index')->with('Danger','La Poliza ha sido Eliminada');
     }

   
}
