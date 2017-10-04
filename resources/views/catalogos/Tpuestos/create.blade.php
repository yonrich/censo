@extends('layouts.public')

@section('content')
 
<div class="container">
    <div class="row">
        <div class="col-md-12">            
            <div class="row">
            <div class="col-md-12">
            {{ Form::open(array('route' => 'Rpuestos.store')) }} 
              <h4>Registrar Puestos</h4> 
              <hr> 
              <div class="row well"> 
                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                          {!! Form::Label('Código', 'Código:') !!}
                          {!! Form::text('codigo',null,['placeholder'=>'codigo','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>
                  <div class="col-sm-4 col-md-4">
                      <div class="input-group">
                          {!! Form::Label('Descripción ', 'Descripción:') !!}
                          {!! Form::text('descripcion',null,['placeholder'=>'descripcion','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div> 
               </div> 

                <div class="row well">
                    <a class="btn btn-info" href="{{ route('Rpuestos.index') }}"> Regresar</a>
                    {!! Form::submit('Registrar el Puesto ',['class'=>'btn btn-success']) !!}
                    {!! Form::close() !!}
                </div>
                
            </div>
        </div>
    </div>
</div> 
</div>

@endsection

