<?php

namespace App\Http\Controllers\Catalogos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TipoUsuario;

class TipoUsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tusuarios = TipoUsuario::where('status',1)->get();
        return view('catalogos.TipoUsuarios.index',compact('tusuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogos.TipoUsuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipo = new TipoUsuario();
        $tipo->codigo = $request->codigo;
        $tipo->descripcion = $request->descripcion;
        $tipo->status = 1;
        $tipo->save();

        return redirect()->route('tipoUsuarios.index')->with('success','Tipo de Usuario registrado correctamente');
   
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
        $tusuarios = TipoUsuario::where('id',$id)->first();
        $codigo= TipoUsuario::pluck('codigo','codigo');
        $descripcion= TipoUsuario::pluck('descripcion','descripcion');
        return view("catalogos.TipoUsuarios.edit",compact('tusuarios','codigo','descripcion'));
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
        $tipo = TipoUsuario::where('id',$request->id)->first();
        $tipo->codigo = $request->codigo;
        $tipo->descripcion = $request->descripcion;
        $tipo->save();
        return redirect()->route('tipoUsuarios.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){ 
        $tipo = TipoUsuario::find($id);
        $tipo->status = 0;
        $tipo->save();
        return redirect()->route('tipoUsuarios.index')->with('Danger','El Nivel ha sido Eliminada');
     }

    public function buscar_tipo(Request $request){
        $dato=$request->input("dato_buscado");
        $tusuarios=TipoUsuario::where('id',$dato)->get();
        return view('catalogos.TipoUsuarios.index',compact('tipo'));
    }
}
