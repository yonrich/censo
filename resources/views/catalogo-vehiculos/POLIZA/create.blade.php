@extends('layouts.public')

@section('content')
 

<div class="container">
    <div class="row">
        <div class="col-md-12">            
            <div class="row">
            <div class="col-md-12">
            {{ Form::open(array('route' => 'Polizas.store')) }} <!-- ruta -->
              <h3>Registrar Aseguradora</h3> 
              <hr> 
              <div class="row well"> 
                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                          {!! Form::Label('Aseguradora', 'Aseguradora:') !!}
                          {!! Form::text('Aseguradora',null,['placeholder'=>'Aseguradora','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>
                  <div class="col-sm-4 col-md-4">
                      <div class="input-group">
                          {!! Form::Label('Poliza ', 'Poliza:') !!}
                          {!! Form::text('Poliza',null,['placeholder'=>'Poliza','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div> 
                  <div class="col-sm-4 col-md-4">
                      <div class="input-group">
                          {!! Form::Label('Inciso ', 'Inciso:') !!}
                          {!! Form::text('Inciso',null,['placeholder'=>'Inciso','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>
              </div> 

                <div class="row well">
                    <a class="btn btn-warning" href="{{ route('Polizas.index') }}"> Regresar</a>
                    {!! Form::submit('Registrar Aseguradora',['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
                
            </div>
        </div>
    </div>
</div> 
</div>




@endsection

