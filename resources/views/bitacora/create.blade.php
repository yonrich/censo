@extends('layouts.public')

@section('content')
 <link href="{{ asset('DATEPICKER/samplebootstrapv2/bootstra/css/bootstrap.min.css" rel="stylesheet') }}" media="screen">
    <link href="{{ asset('DATEPICKER/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" media="screen">
 />
        
<div class="container">
    <div class="row">
        <div class="col-md-12">            
            <div class="row">
            <div class="col-md-12">
            {{ Form::open(array('route' => 'bitacora.store')) }} 
            <h3>Crear Bitácora</h3> 
            <hr>
            <div class="row well"> 
            <div class="row well"> 
                <div class="col-sm-4 col-md-3"> 
                    <div class="input-group"> 
                        {!! Form::Label('Vehículo', 'Vehiculo:') !!}
                        {!! Form::select('vehiculo', $vehiculos, null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-sm-4 col-md-3">
                    <div class="input-group">
                        {!! Form::Label('Placas', 'Placas:') !!}
                        {!! Form::text('placas',null,['placeholder'=>'Placas','class'=>'form-control','required'=>'required']) !!}
                    </div>
                </div>
                <div class="col-sm-4 col-md-3">
                    <div class="input-group">
                        {!! Form::Label('Conductor', 'Conductor:') !!}
                        {!! Form::select('conductor', $empleados, null, ['class' => 'form-control']) !!}
                    </div>
                </div> 
                <div class="col-sm-4 col-md-3">
                    <div class="input-group">
                        {!! Form::Label('Homeotraje', 'Homeotraje:') !!}
                        {!! Form::text('homeotraje',null,['placeholder'=>'Homeotraje','class'=>'form-control','required'=>'required']) !!}
                    </div>
                </div>
             </div> 
             <div class="row well">                  
                <div class="col-sm-3 col-md-3">
                    <div class="input-group">
                        {!! Form::Label('Destino', 'Destino:') !!}
                        {!! Form::text('destino',null,['placeholder'=>'Destino','class'=>'form-control','required'=>'required']) !!}
                    </div>
                </div>
                <div class="col-sm-4 col-md-3">
                      <div class="input-group">
                            {!! Form::Label('Fecha y Hora Salida', 'Fecha y Hora Salida*:') !!}
                        <input type="datetime-local" name="Hsalida" id="Hsalida">
                            </div>
                        </div>
                    </div>
                <div class="col-sm-3 col-md-3"> 
                    <div class="input-group"> 
                        {!! Form::Label('Vigilante', 'Vigilante*:') !!}
                        {!! Form::text('vigilante',null,['placeholder'=>'Vigilante','class'=>'form-control','required'=>'required']) !!}
                    </div> 
                </div>
             </div>             
             <div class="row well">   
                <div class="col-sm-12 col-md-12"> 
                    <div class="input-group"> 
                        {!! Form::Label('Obserbaciones', 'Observaciones*:') !!}
                        {!! Form::textarea('obs',null,['placeholder'=>'Observaciones','class'=>'form-control','required'=>'required']) !!}
                    </div> 
                </div>
             </div>
             </div>
             <div class="row well">
             <div class="row well"> 
              <h3>Herramientas</h3>
                <div class="col-sm-2 col-md-2"> 
                    <div class="input-group"> 
                        {!! Form::label('Gato','Gato', array('class'=>'control-label'))!!} <br>
                        {!! Form::radios('gato', $option) !!} 
                    </div> 
                </div>
                <div class="col-sm-2 col-md-2">
                    <div class="input-group">
                        {!! Form::label('Refacción','Refacción', array('class'=>'control-label'))!!} <br>
                        {!! Form::radios('refaccion', $option) !!}
                    </div>
                </div> 
                <div class="col-sm-2 col-md-2">
                    <div class="input-group">
                        {!! Form::label('Señalamiento','Señalamiento', array('class'=>'control-label'))!!} <br>
                        {!! Form::radios('señalamiento', $option) !!}
                    </div>
                </div> 
                <div class="col-sm-2 col-md-2">
                    <div class="input-group">
                        {!! Form::label('Herramientas','Herramientas', array('class'=>'control-label'))!!} <br>
                        {!! Form::radios('herramientas', $option) !!}
                    </div>
                </div> 
                <div class="col-sm-2 col-md-2">
                    <div class="input-group">
                        {!! Form::label('Verificación','Verificación', array('class'=>'control-label'))!!} <br>
                        {!! Form::radios('verificacion', $option) !!}
                    </div>
                </div>
                <div class="col-sm-2 col-md-2"> 
                     <div class="input-group"> 
                         {!! Form::label('Extintor','Extintor', array('class'=>'control-label'))!!} <br>
                         {!! Form::radios('extintor', $option) !!}
                     </div> 
                 </div>
             </div>

              <div class="row well">                 
                 <div class="col-sm-2 col-md-2">
                     <div class="input-group">
                         {!! Form::label('Cables','Cables', array('class'=>'control-label'))!!} <br>
                         {!! Form::radios('cables', $option) !!}
                     </div>
                 </div> 
                 <div class="col-sm-2 col-md-2">
                     <div class="input-group">
                         {!! Form::label('Licencia','Licencia', array('class'=>'control-label'))!!} <br>
                         {!! Form::radios('licencia', $option) !!}
                     </div>
                 </div> 
                 <div class="col-sm-2 col-md-2">
                     <div class="input-group">
                         {!! Form::label('Tarjeton','Tarjeton', array('class'=>'control-label'))!!} <br>
                         {!! Form::radios('tarjeton', $option) !!}
                     </div>
                 </div>
                 <div class="col-sm-2 col-md-2">
                     <div class="input-group">
                         {!! Form::label('Poliza','poliza', array('class'=>'control-label'))!!} <br>
                         {!! Form::radios('poliza', $option) !!}
                     </div>
                 </div> 
              </div> 
              </div> 
            <a class="btn btn-warning" href="{{ route('bitacora.index') }}"> Regresar</a>
           {!! Form::submit('Confirmar Bitacora',['class'=>'btn btn-primary']) !!} 
           {!! Form::close() !!} 
          </div>
          </div>
        </div>
    </div>
</div> 
</div>

    <script type="text/javascript">
            $(function () {
                $('#Hsalida').datetimepicker({
                    locale: 'ES'
                });
            });
        </script>

@endsection

