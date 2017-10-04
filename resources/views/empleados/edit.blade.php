@extends('layouts.public')

@section('content')
 
<div class="container">
    <div class="row">
        <div class="col-md-12">            
            <div class="row">
            <div class="col-md-12">
            {!! Form::model($empleados, ['route' => ['modificarEmpleado',$empleados->id]]) !!}
              <h4>Modulo para Modificar Registro de Empleado</h4> 
              <hr> 
              <div class="row well"> 
                  <div class="col-sm-4 col-md-12"> 
                      <div class="input-group"> 
                          {!! Form::Label('numeroE', 'Número de Empleado:') !!}
                          {!! Form::text('numeroE',null,['placeholder'=>'Número Empleado','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>

               </div> 
              <div class="row well"> 
                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                          {!! Form::Label('Nombre', 'Nombre(s):') !!}
                          {!! Form::text('nombre',null,['placeholder'=>'Nombre(s)','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>
                  <div class="col-sm-4 col-md-4">
                      <div class="input-group">
                          {!! Form::Label('Apellido1', 'Apellido Paterno:') !!}
                          {!! Form::text('Apaterno',null,['placeholder'=>'Apellido Paterno','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div> 
                                    <div class="col-sm-4 col-md-4">
                      <div class="input-group">
                          {!! Form::Label('Apellido2', 'Apellido Materno:') !!}
                          {!! Form::text('Amaterno',null,['placeholder'=>'Apellido Materno','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div> 
               </div> 

               <div class="row well"> 
                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group">
                          {!! Form::Label('Correo', 'Correo:') !!}
                          {!! Form::email('correo',null,['placeholder'=>'Correo','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>
                  <div class="col-sm-4 col-md-4">
                      <div class="input-group">
                          {!! Form::Label('Nivel', 'Nivel:') !!}
                          {!! Form::text('nivel', null, ['placeholder'=>'Nivel','class'=>'form-control','required'=>'required' ]) !!}
                      </div>
                  </div> 
                <div class="col-sm-4 col-md-4">
                      <div class="input-group">
                          {!! Form::Label('CURP', 'CURP:') !!}
                          {!! Form::text('curp',null,['placeholder'=>'CURP','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div> 
               </div> 

               <div class="row well"> 
                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                          {!! Form::Label('Puesto', 'Código de Puesto:') !!}
                           {!! Form::text('cod_puesto', null, ['placeholder'=>'Código de Puesto','class'=>'form-control','required'=>'required' ]) !!}
                      </div>
                  </div>
                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                          {!! Form::Label('Puesto', 'Puesto:') !!}
                           {!! Form::text('puesto', null, ['placeholder'=>'Puesto','class'=>'form-control','required'=>'required' ]) !!}
                      </div>
                  </div>
                  <div class="col-sm-4 col-md-4">
                      <div class="input-group">
                          {!! Form::Label('Unidad', 'Unidad de Adscripción:') !!}
                           {!! Form::text('unidad', null, ['placeholder'=>'Unidad de Adscripción','class'=>'form-control','required'=>'required' ]) !!}
                      </div>
                  </div>
                  </div> 

                <div class="row well">
                    {!! Form::hidden('id',$empleados->id) !!}
                    <a class="btn btn-primary" href="{{ route('empleados.index') }}"> Regresar</a>
                    {!! Form::submit('Confirmar Empleado',['class'=>'btn btn-success']) !!}
                    {!! Form::close() !!}
                </div>






                
            </div>
        </div>
    </div>
</div> 
</div>

@endsection