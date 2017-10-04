<?php

namespace App\Http\Controllers\Catalogos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mdepa;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depas = Mdepa::where('status',1)->get();
        return view('catalogos.Cdepartamentos.index',compact('depas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogos.Cdepartamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $depa = new Mdepa();
        $depa->codigo = $request->codigo;
        $depa->descripcion = $request->descripcion;
        $depa->status = 1;
        $depa->save();

        return redirect()->route('Departamentos.index')->with('success','Departamento registrado correctamente');
   
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
        $depas = Mdepa::where('id',$id)->first();
        $codigo= Mdepa::pluck('codigo','codigo');
        $descripcion= Mdepa::pluck('descripcion','descripcion');
        return view("catalogos.Cdepartamentos.edit",compact('depas','codigo','descripcion'));
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
        $depa = Mdepa::where('id',$request->id)->first();
        $depa->codigo = $request->codigo;
        $depa->descripcion = $request->descripcion;
        $depa->save();
        return redirect()->route('Departamentos.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){ 
        $depa = Mdepa::find($id);
        $depa->status = 0;
        $depa->save();
        return redirect()->route('Departamentos.index')->with('Danger','El Departamento ha sido Eliminada');
     }


    public function buscar_depa(Request $request){
        $dato=$request->input("dato_buscado");
        $depas=Mdepa::where('codigo',$dato)->get();
        return view('catalogos.Cdepartamentos.index',compact('depas'));
    }
}
