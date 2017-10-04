<?php

namespace App\Http\Controllers\ControlVehicular;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Vehiculo;
use App\Bitacora;
use App\Empleado;
use App\Marca;
use App\Chofer;
use Mail;
use Yajra\Datatables\Facades\Datatables;

class BitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bitacoras = Bitacora::where('Hentrada',null)->where('homeotrajeFinal',null)->where('obs2','')->where('folio',null)->where('documento_folio',null)->get();
        return view("bitacora.index",compact('bitacoras'));
    }

    public function get_datatable(){
        $bitacoras = Bitacora::select('id','vehiculo','conductor','Hsalida','Hentrada','homeotraje','homeotrajeFinal')
                    ->where('Hentrada',null)->where('homeotrajeFinal',null)->where('obs2','')->where('folio',null)->where('documento_folio',null)->get();

        return Datatables::of($bitacoras)
               ->addColumn('action', function (Bitacora $bitacora) {
                return $bitacora->id;
            })
                ->make(0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleados= Chofer::pluck('empleado','empleado');
        $vehiculos = Vehiculo::pluck('submarca','submarca');
        $option= ['1' => 'Si', '0' => 'No'];
        return view("bitacora.create",compact('vehiculos','option','empleados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $bitacora = new Bitacora();
        $bitacora->vehiculo = $request->vehiculo;
        $bitacora->placas = $request->placas;
        $bitacora->conductor = $request->conductor;
        $bitacora->Hsalida = $request->Hsalida;
        $bitacora->homeotraje = $request->homeotraje;
        $bitacora->destino = $request->destino;
        $bitacora->vigilante = $request->vigilante;
        $bitacora->obs = $request->obs;
        $bitacora->gato = $request->gato;
        $bitacora->refaccion = $request->refaccion;
        $bitacora->señalamiento = $request->señalamiento;
        $bitacora->herramientas = $request->herramientas;
        $bitacora->verificacion = $request->verificacion;
        $bitacora->extintor = $request->extintor;
        $bitacora->cables = $request->cables;
        $bitacora->licencia = $request->licencia;
        $bitacora->tarjeton = $request->tarjeton;
        $bitacora->poliza = $request->poliza;
        $bitacora->Hentrada = null;
        $bitacora->homeotrajeFinal = null;
        $bitacora->folio = null;
        $bitacora->documento_folio = null;
        $bitacora->obs2 = "";
        $bitacora->status = 1;
        $bitacora->save();

        return redirect()->route('bitacora.index')->with('success','Bitacora creada correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function historial(){
        $bitacoras = [];
        return view('bitacora.historial', compact('bitacoras'));
    }

    public function buscarHistorial(Request $request){
        //dd($request);
        $bitacoras = Bitacora::whereBetween('Hsalida', [$request->fechaIncial, $request->fechaFinal])->get();
        return view('bitacora.historial', compact('bitacoras'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bitacora = Bitacora::where('id',$id)->first();
        $option= ['1' => 'Si', '0' => 'No'];
        return view('bitacora.edit',compact('bitacora','option'));
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
        //dd($request);
        $bitacora = Bitacora::where('id',$request->id)->first();
        $bitacora->Hentrada = $request->Hentrada;
        $bitacora->homeotrajeFinal = $request->homeotrajeFinal;
        $bitacora->obs2 =$request->obs2;
        $bitacora->save();
        return redirect()->route('bitacora.index')->with('success','Registro de entrada correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){ 
        $bitacora = Bitacora::find($id);
        $bitacora->status = 0;
        $bitacora->save();
        return redirect()->route('bitacora.index')->with('success','La Bitacora ha sido Eliminada');
     }

    public function guardarFolio(Request $request)
    {
        $vehiculo = Bitacora::where('id',$request->id)->first();
        $vehiculo->folio =  $request->folio;
        $vehiculo->documento_folio = $request->documento;
        $vehiculo->save();

        $file = $request->file('documento');
 
        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();

        //Guardamos en el modelo

 
        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('local')->put($nombre,  \File::get($file));
        return redirect()->route('bitacora.index')->with('success','Folio asginado correctamente y correo enviado');;
    }

    public function mandarCorreo(Request $request){
        //Mandamos email de prueba
        Mail::send('emails.contact', $request->all(), function($msj){
            $msj->subject('Correo de Prueba');
            $msj->to('prueba123@yopmail.com');
        });
        return redirect()->route('bitacora.index')->with('success','Correo enviado exitoso');;
    }

    public function buscar_bitacora(Request $request){
        $dato=$request->input("dato_buscado");
        $bitacoras=Bitacora::where('conductor',$dato)->get();
        return view("bitacora.index",compact('bitacoras'));
    }

    public function detalle($id){
        $bitacora = Bitacora::find($id);
        return view('bitacora.detalle', compact('bitacora'));

    }

}
