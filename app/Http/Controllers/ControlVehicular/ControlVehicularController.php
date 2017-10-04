<?php

namespace App\Http\Controllers\ControlVehicular;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use Excel;
use App\Vehiculo;
use App\Marca;
Use App\ModPuesto;
Use App\Munidad;
Use App\Empleado;
Use App\estado;
Use App\municipio;
Use App\localidad;
Use App\Chofer;


class ControlVehicularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos = Vehiculo::where('status',1)->get();
        return view("control-vehicular.index",compact('vehiculos'));
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
        $conductor= Chofer::pluck('empleado','empleado');
        $localidad=Munidad::pluck('descripcion', 'descripcion');
        return view("control-vehicular.create",compact('marcas','submarca', 'conductor','localidad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $vehiculo = new Vehiculo();
        $vehiculo->vehiculo = $request->vehiculo;
        $vehiculo->marca = $request->marca;
        $vehiculo->submarca = $request->submarca;
        $vehiculo->modelo = $request->modelo;
        $vehiculo->serie = $request->serie;
        $vehiculo->placas = $request->placas;
        $vehiculo->num_eco = $request->num_eco;
        $vehiculo->seguro = $request->seguro;
        $vehiculo->conductor = $request->conductor;
        $vehiculo->tipo = $request->estatus;
        $vehiculo->tipo_auto = $request->tipo_auto;
        $vehiculo->localidad = $request->localidad;
        $vehiculo->status = 1;
        $vehiculo->save();

        return redirect()->route('control-vehicular.index');
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
        $vehiculo = Vehiculo::where('id',$id)->first();
        $marcas= Marca::pluck('marca','marca');
        $submarca= Marca::pluck('submarca','submarca');
        $conductor= Chofer::pluck('empleado','empleado');
        $localidad=Munidad::pluck('descripcion', 'descripcion');
        return view("control-vehicular.edit",compact('vehiculo','marcas','submarca', 'localidad'));
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
        $vehiculo = Vehiculo::where('id',$request->id)->first();
        $vehiculo->vehiculo = $request->vehiculo;
        $vehiculo->marca = $request->marca;
        $vehiculo->submarca = $request->submarca;
        $vehiculo->modelo = $request->modelo;
        $vehiculo->serie = $request->serie;
        $vehiculo->placas = $request->placas;
        $vehiculo->num_eco = $request->num_eco;
        $vehiculo->seguro = $request->seguro;
        $vehiculo->tipo = $request->estatus;
        $vehiculo->save();
        return redirect()->route('control-vehicular.index');
    }

    public function asignarauto($id)
    {
        $vehiculo = Vehiculo::find($id);
        $conductor= Chofer::pluck('empleado','empleado');
         $localidad=Munidad::pluck('descripcion', 'descripcion');
        return view('control-vehicular.asignar',compact('vehiculo', 'conductor', 'localidad'));
    }
    public function saveAsignacion(Request $request){
        $vehiculo = Vehiculo::find($request->id);
        $vehiculo->conductor = $request->conductor;
        $vehiculo->tipo_auto = $request->disponibilidad;
        $vehiculo->localidad = $request->localidad;
        $vehiculo->save();
        return redirect()->route('control-vehicular.index');
    }    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd("Hola mundo");
        $vehiculo = Vehiculo::where('id',$id)->first();
        $vehiculo->status = 0;
        $vehiculo->save();

        return redirect()->route('control-vehicular.index');
    }

    public function downloadExcel(Request $request, $type)
    {
        $data = Vehiculo::all();
            return Excel::create('export_empleados', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }   
    

    
}
