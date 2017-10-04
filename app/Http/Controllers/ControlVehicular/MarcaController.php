<?php

namespace App\Http\Controllers\ControlVehicular;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Marca;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marca::where('status',1)->get();
        return view("catalogo-vehiculos.Marca.index",compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas= Marca::pluck('marca','marca');
        $submarca= Marca::pluck('submarca','submarca');
        return view("catalogo-vehiculos.Marca.create",compact('marcas','submarca'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $marca = new Marca();
        $marca->marca = $request->marca;
        $marca->submarca = $request->submarca;
        $marca->status = 1;
        $marca->save();

        return redirect()->route('Marca.index')->with('success','Marca creada correctamente');
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

        $marca= Marca::where('id',$id)->first();
        $marcas= Marca::pluck('marca','marca');
        $submarca= Marca::pluck('submarca','submarca');
        return view("catalogo-vehiculos.Marca.edit",compact('marca','marcas','submarca'));

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
        $marca= Marca::where('id',$request->id)->first();
        $marca->marca = $request->marca;
        $marca->submarca = $request->submarca;
        $marca->save();

        return redirect()->route('Marca.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){ 
        $marca = Marca::find($id);
        $marca->status = 0;
        $marca->save();
        return redirect()->route('Marca.index')->with('Danger','La Marca ha sido Eliminada');
     }

    public function buscar_marca(Request $request){
        $dato=$request->input("dato_buscado");
        $marcas=Marca::where('submarca',$dato)->get();
        return view("catalogo-vehiculos.Marca.index",compact('marcas'));
    }

}
