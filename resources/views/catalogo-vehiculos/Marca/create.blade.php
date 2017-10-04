@extends('layouts.public')

@section('content')
 

<div class="container">
    <div class="row">
        <div class="col-md-12">            
            <div class="row">
            <div class="col-md-12">
            {{ Form::open(array('route' => 'Marca.store')) }} <!-- ruta -->
              <h3>Registrar Marca</h3> 
              <hr> 
              <div class="row well"> 
                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                          {!! Form::Label('Marca', 'Marca:') !!}
                          {!! Form::text('marca',null,['placeholder'=>'Marca','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>
			
                  <div class="col-sm-4 col-md-4">
                      <div class="input-group">
                          {!! Form::Label('Submarca ', 'Submarca:') !!}
                          {!! Form::text('submarca',null,['placeholder'=>'Submarca','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div> 
              </div> 
			  <div class="row well">
			  

                <div class="row well">
                    <a class="btn btn-warning" href="{{ route('Marca.index') }}"> Regresar</a>
                    {!! Form::submit('Registrar Marca Vehicular ',['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
                
            </div>
        </div>
    </div>
</div> 
</div>




@endsection

