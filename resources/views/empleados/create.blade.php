@extends('layouts.public')

@section('content')
 
<div class="container">
    <div class="row">
        <div class="col-md-12">            
            <div class="row">
            <div class="col-md-12">
            {{ Form::open(array('route' => 'empleados.store')) }} 
              <h4>Modulo para el Registro de Personal</h4> 
              <hr> 
              
              <center>
                  <font size="4" face="roman" color="#B20060">Ingresar o Seleccionar Datos</font> 
              </center> 

              <div class="row well" style="background-color:rgb(232, 232, 232);"> 
                  <div class="col-sm-6 col-md-6"> 
                      <div class="input-group"> 
                          {!! Form::Label('numeroE', 'Número de Empleado:') !!}
                          {!! Form::text('numeroE',null,['placeholder'=>'Número Empleado','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>

               </div> 
              
              <div class="row well" style="background-color:rgb(232, 232, 232);"> 
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

               <div class="row well" style="background-color:rgb(232, 232, 232);"> 
                  <div class="col-sm-6 col-md-6">
                      <div class="input-group">
                          {!! Form::Label('CURP', 'CURP:') !!}
                          {!! Form::text('curp',null,['placeholder'=>'CURP','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div> 

                  <div class="col-sm-6 col-md-6"> 
                      <div class="input-group">
                          {!! Form::Label('Correo', 'Correo Institucional:') !!}
                          {!! Form::email('correo',null,['placeholder'=>'Correo','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>

                  
                
               </div> 

               <div class="row well" style="background-color:rgb(232, 232, 232);"> 
               <div class="col-sm-4 col-md-2">
                      <div class="input-group">
                          {!! Form::Label('Nivel', 'Nivel:') !!}
                          {!! Form::select('nivel', $nivel, null, ['placeholder'=>'Seleccione...','class'=>'form-control','required'=>'required' ]) !!}
                      </div>
                  </div> 
                  <div class="col-sm-4 col-md-2"> 
                      <div class="input-group"> 
                          {!! Form::Label('Puesto', 'Código de Puesto:') !!}
                           {!! Form::select('cod_puesto', $puestos, null, ['placeholder'=>'Seleccione...','class'=>'form-control','required'=>'required' ]) !!}
                      </div>
                  </div>
                  <div class="col-sm-4 col-md-4"> 
                  
                  </div>
                  <div class="col-sm-4 col-md-8">
                      <div class="input-group">
                          {!! Form::Label('Unidad', 'Unidad de Adscripción:') !!}
                           {!! Form::select('unidad', $Unidad, null, ['placeholder'=>'Seleccione...','class'=>'form-control','required'=>'required' ]) !!}
                      </div>
                  </div> 
               </div> 



                <div class="row well">
                    <a class="btn btn-info" href="{{ route('empleados.index') }}"> Regresar</a>
                    {!! Form::submit('Registrar Empleado',['class'=>'btn btn-success']) !!}
                    {!! Form::close() !!}
                </div>
                
            </div>
        </div>
    </div>
</div> 
</div>

@endsection