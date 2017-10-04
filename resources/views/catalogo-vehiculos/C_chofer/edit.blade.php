@extends('layouts.public')

@section('content')
 
<div class="container">
    <div class="row">
        <div class="col-md-12">            
            <div class="row">
            <div class="col-md-12">
            {!! Form::model($chofers, ['route' => ['modificarChofer',$chofers->id]]) !!}
              <h3>Actualizar Chofer</h3> 
              <hr> 
                  <div class="row well"> 
                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                          {!! Form::Label('Empleado', 'Empleado:') !!}
                          {!! Form::number('empleado',null,['placeholder'=>'Empleado','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>
                  <div class="col-sm-4 col-md-4">
                      <div class="input-group">
                          {!! Form::Label('Nombre ', 'Nombre:') !!}
                          {!! Form::text('nombre',null,['placeholder'=>'Nombre','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div> 
                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                          {!! Form::Label('Apellido', 'Apellido:') !!}
                          {!! Form::text('apellido',null,['placeholder'=>'Apellido','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>
                  <div class="col-sm-4 col-md-4">
                      <div class="input-group">
                          {!! Form::Label('Correo ', 'Correo:') !!}
                          {!! Form::email('correo',null,['placeholder'=>'Correo','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div> 
                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                          {!! Form::Label('Puesto', 'Puesto:') !!}
                          {!! Form::text('puesto',null,['placeholder'=>'Puesto','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>                 
               </div> 
                <div class="row well">
                    {!! Form::hidden('id',$chofers->id) !!}
                    <a class="btn btn-warning" href="{{ route('Chofer.index') }}"> Regresar</a>
                    {!! Form::submit('Actualizar Datos',['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
               
            </div>
        </div>
    </div>
</div> 
</div>

@endsection