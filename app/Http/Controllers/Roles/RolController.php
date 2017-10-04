<?php

namespace App\Http\Controllers\Roles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Roles;
use App\Permisos;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Roles::all();
        return view('roles.index',compact('roles'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $rol = Roles::where('id',$id)->first();
        $permisos = Permisos::pluck('name','id');
        return view('roles.edit',compact('rol','permisos'));
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
        $rol = Roles::where('id',$request->id)->first();
        foreach ($rol->permisos as $permiso){
            if ($permiso->id == $request->permiso) {
                //dd("No paso");
                return redirect()->route('roles.edit',$request->id)->with('success','El permiso ya habia sido asignado');
            }
        }
        $rol->permisos()->attach($request->permiso);
        return redirect()->route('roles.edit',$request->id)->with('success','El permiso se asigno correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminarPermisoRol(Request $request)
    {   
        $rol = Roles::where('id',$request->idrol)->first();
        $rol->permisos()->detach($request->idpermiso);
        return redirect()->route('roles.edit',$request->idrol)->with('success','El permiso se borro correctamente');
    }
}
