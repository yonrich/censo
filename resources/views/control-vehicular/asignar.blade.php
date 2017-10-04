@extends('layouts.public')

@section('content')
 
<div class="container">
    <div class="row">
        <div class="col-md-12">            
            <div class="row">
            <div class="col-md-12">
            {!! Form::model($vehiculo, ['route' => ['asignacion.save',$vehiculo->id]]) !!}
              <h3>Asignar Vehiculo</h3> 
              <hr> 
              <div class="row well"> 
                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                          {!! Form::Label('Conductor', 'Conductor:') !!}
                          {!! Form::select('conductor', $conductor, null, ['placeholder'=>'Selecciona a un EMpleado','class'=>'form-control','required'=>'required','id'=>'conductor' ]) !!}
                      </div>
                  </div>

                  <div class="col-sm-4 col-md-4">
                      <div class="input-group">
                          {!! Form::Label('Estatus', 'Estatus:') !!}
                          <select id="disponibilidad" name="disponibilidad" class="form-control">
                              <option value="Libre">Libre</option>
                              <option value="Asignado">Asignado</option>
                            </select>
                      </div>
                  </div> 
                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                          {!! Form::Label('Unidad', 'Unidad:') !!}
                          {!! Form::select('localidad', $localidad, null, ['placeholder'=>'Selecciona una Unidad','class'=>'form-control','required'=>'required','id'=>'localidad' ]) !!}
                      </div>
                  </div>                  
               </div> 
             
                <div class="row well">
                    {!! Form::hidden('id',$vehiculo->id) !!}
                    <a class="btn btn-warning" href="{{ route('control-vehicular.index') }}"> Regresar</a>
                    {!! Form::submit('Confirmar Asignación',['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
                
            </div>
        </div>
    </div>
</div> 
</div>

@endsection

