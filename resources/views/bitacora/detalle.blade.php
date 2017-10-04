@extends('layouts.public')

@section('content')
 <form>
<div class="container">
    <div class="row">
        <div class="col-md-12">            
            <div class="row">
                <h3>Datos de la Bitácora</h3>
               <div class="row well">      
                <div class="row well"> 
                  <div class="col-sm-4 col-md-4"> 
                      <div class="form-group"> 
                     </div><span style="font-weight: bold;">Vehiculo:</span>
                            <span>{{$bitacora->vehiculo}}</span>
                  </div>
                  <div class="col-sm-4 col-md-4"> 
                      <div class="form-group"> 
                     </div><span style="font-weight: bold;">Placas:</span>
                            <span>{{$bitacora->placas}}</span>
                  </div>
                  <div class="col-sm-4 col-md-4"> 
                      <div class="form-group"> 
                     </div><span style="font-weight: bold;">Conductor:</span>
                            <span>{{$bitacora->conductor}}</span>
                  </div>
                </div> 
                <div class="row well"> 
                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                     </div><span style="font-weight: bold;">Hora salida:</span>
                            <span>{{$bitacora->Hsalida}}</span>
                  </div>
                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                     </div><span style="font-weight: bold;">Homeotraje Inicial:</span>
                            <span>{{$bitacora->homeotraje}}</span>
                  </div>
                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                     </div><span style="font-weight: bold;">Destino:</span>
                            <span>{{$bitacora->destino}}</span>
                  </div>
                </div>
                   <div class="row well">
                   <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                     </div><span style="font-weight: bold;">Vigilante:</span>
                            <span>{{$bitacora->vigilante}}</span>
                  </div>
                  <div class="col-sm-4 col-md-8"> 
                      <div class="input-group"> 
                     </div><span style="font-weight: bold;">Observacion:</span>
                            <span>{{$bitacora->obs}}</span>
                  </div>
                </div>  
                <div class="row well">
                <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                     </div><span style="font-weight: bold;">Hora entrada:</span>
                            <span>{{$bitacora->Hentrada}}</span>
                  </div>
                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                     </div><span style="font-weight: bold;">Homeotraje Final:</span>
                            <span>{{$bitacora->homeotrajeFinal}}</span>
                  </div>
                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                     </div><span style="font-weight: bold;">Observacion:</span>
                            <span>{{$bitacora->obs2}}</span>
                  </div>                  
                </div>
                </div> 
                <div class="row well">
                <div class="col-sm-2 col-md-12">
                <h3>Herramientas</h3>
                </div>
                <div class="row well">
                 <div class="col-sm-4 col-md-2"> 
                      <div class="input-group"> 
                     </div><span style="font-weight: bold;">Gato Hidraulico:</span>
                            <span>{{$bitacora->gato}}</span>
                  </div> 
                  <div class="col-sm-9 col-md-2"> 
                      <div class="input-group"> 
                     </div><span style="font-weight: bold;">Llanta de Refaccion:</span>
                            <span>{{$bitacora->refaccion}}</span>
                  </div>
                  <div class="col-sm-9 col-md-2"> 
                      <div class="input-group"> 
                     </div><span style="font-weight: bold;">Señalamiento:</span>
                            <span>{{$bitacora->señalamiento}}</span>
                  </div>
                  <div class="col-sm-9 col-md-2"> 
                      <div class="input-group"> 
                     </div><span style="font-weight: bold;">Herramientas:</span>
                            <span>{{$bitacora->herramientas}}</span>
                  </div>
 
                  <div class="col-sm-9 col-md-2"> 
                      <div class="form-group"> 
                     </div><span style="font-weight: bold;">Extintor:</span>
                            <span>{{$bitacora->extintor}}</span>
                  </div>
                  <div class="col-sm-9 col-md-2"> 
                      <div class="form-group"> 
                     </div><span style="font-weight: bold;">Cables:</span>
                            <span>{{$bitacora->cables}}</span>
                  </div>
                  <div class="col-sm-9 col-md-2"> 
                      <div class="form-group"> 
                     </div><span style="font-weight: bold;">Licencia:</span>
                            <span>{{$bitacora->licencia}}</span>
                  </div>
                  <div class="col-sm-9 col-md-2"> 
                      <div class="form-group"> 
                     </div><span style="font-weight: bold;">Tarjeton:</span>
                            <span>{{$bitacora->tarjeton}}</span>
                  </div>
                  <div class="col-sm-9 col-md-2"> 
                      <div class="form-group"> 
                     </div><span style="font-weight: bold;">Verificacion:</span>
                            <span>{{$bitacora->verificacion}}</span>
                  </div>
                  <div class="col-sm-9 col-md-2"> 
                      <div class="form-group"> 
                     </div><span style="font-weight: bold;">Seguro de Auto:</span>
                            <span>{{$bitacora->poliza}}</span>
                  </div>
                </div> 
                <div class="row well">
                    <a class="btn btn-warning" href="{{ route('Chofer.index') }}"> Regresar</a>
                
                </div>

            </div>
        </div>
    </div> 
</div>
</form>
@endsection

