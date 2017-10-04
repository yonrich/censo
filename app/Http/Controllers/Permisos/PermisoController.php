<?php

namespace App\Http\Controllers\Permisos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permisos;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permisos = Permisos::where('status',1)->get();
        return view("permisos.index",compact('permisos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("permisos.create");  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permiso = new Permisos();
        $permiso->name = $request->nombre;
        $permiso->slug = $request->slug;
        $permiso->description = $request->descripcion;
        $permiso->status = 1;
        $permiso->save();
        return redirect()->route('permisos.index')->with('success','Permiso creado correctamente');
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
        $permiso = Permisos::where('id',$id)->first();
        return view("permisos.edit",compact('permiso'));
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
        $permiso = Permisos::where('id',$request->id)->first();
        $permiso->name = $request->name;
        $permiso->slug = $request->slug;
        $permiso->description = $request->description;
        $permiso->status = 1;
        $permiso->save();
        return redirect()->route('permisos.index')->with('success','Permiso modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permiso = Permisos::where('id',$id)->first();
        $permiso->status = 0;
        $permiso->save();
        return redirect()->route('permisos.index')->with('success','Permiso eliminado correctamente');
    }
}
