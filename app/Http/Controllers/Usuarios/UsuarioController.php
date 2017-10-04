<?php

namespace App\Http\Controllers\Usuarios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Empleado;
use App\Roles;
use DB;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::where('status',1)->get();
        return view("usuarios.index",compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = Empleado::where('status',1)->get();
        $roles = Roles::pluck('slug','id');
        return view("usuarios.create",compact('usuarios','roles'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = new User();
        $usuario->name = $request->id_empl;
        $usuario->email = $request->correo;
        $usuario->password = bcrypt($request->password);
        $usuario->status = 1;
        $usuario->remember_token = $request->_token;
        $usuario->save();
        $usuario->roles()->attach($request->rol);
        return redirect()->route('usuarios.index')->with('success','Usuario creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $usuario = User::where('id',$id)->first();
        $usuario->status = 0;
        $usuario->save();
        return redirect()->route('usuarios.index')->with('success','Usuario eliminado correctamente');
    }



    public function buscarEmail($userId)
    {
        $email = Empleado::select('correo')->where('id',$userId)->first();
         return $email;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $usuarios = User::where('id',$id)->first();
        $roles = Roles::pluck('slug','id'); 
        return view("usuarios.edit",compact('usuarios','roles'));
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
       /* $usuario =  User::where('id',$request->id)->first();
        $usuario->roles()->sync($request->rol);
        return redirect()->route('usuarios.index')->with('success','Usuario modificado correctamente');*/
        
        $usuario =  User::where('id',$request->id)->first();
        $usuario->name = $request->id_empl;
        $usuario->email = $request->correo;
        $usuario->password = bcrypt($request->password);
        $usuario->remember_token = $request->_token;
        $usuario->roles()->attach($request->rol);
        $usuario->save();


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::where('id',$id)->first();
        $usuario->status = 0;
        $usuario->save();
        return redirect()->route('usuarios.index')->with('Danger','Usuario eliminado correctamente');
    }

     public function autocomplete(Request $request){
        
        $term = $request->term;
        $results = array();    
        $queries = Empleado::
                    where('nombre', 'LIKE', '%'.$term.'%')
                ->orWhere('Apaterno', 'LIKE', '%'.$term.'%')->get();

        return response()->json($queries);
        
    }
}
