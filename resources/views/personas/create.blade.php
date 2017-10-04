@extends('layouts.public')

@section('content')
 
<div class="container">
    <div class="row">
        <div class="col-md-12">            
            <div class="row">
            <div class="col-md-12">
            {{ Form::open(array('route' => 'personas.store')) }} 
              <h4>Modulo para el Registro de Prospectos a Empleados del INSUS</h4> 
              <hr>
                
                <center>
                  <font size="4" face="roman" color="#B20060">Ingresar o Seleccionar Datos Generales</font> 
                </center> 

                <div class="row well" style="background-color:rgb(232, 232, 232);"> 
                <div class="col-sm-4 col-md-8">
                      <div class="input-group">
                          {!! Form::Label('Unidad', 'Posible Unidad de Adscripción:') !!}
                           {!! Form::select('unidad', $Unidad, null, ['placeholder'=>'Seleccione...','class'=>'form-control','required'=>'required' ]) !!}
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
                          {!! Form::text('apellido_paterno',null,['placeholder'=>'Apellido Paterno','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div> 
                  <div class="col-sm-4 col-md-4">
                      <div class="input-group">
                          {!! Form::Label('Apellido2', 'Apellido Materno:') !!}
                          {!! Form::text('apellido_materno',null,['placeholder'=>'Apellido Materno','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div> 
                  
                  <div class="col-sm-6 col-md-4">
                      <div class="input-group">
                          {!! Form::Label('RFC', 'RFC:') !!}
                          {!! Form::text('rfc',null,['placeholder'=>'RFC','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div> 

                  <div class="col-sm-6 col-md-4">
                      <div class="input-group">
                          {!! Form::Label('CURP', 'CURP:') !!}
                          {!! Form::text('curp',null,['placeholder'=>'CURP','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div> 

                  <div class="col-sm-6 col-md-4">
                      <div class="input-group">
                          {!! Form::Label('Telefono1', 'Telefono Fijo:') !!}
                          {!! Form::text('telefono_fijo',null,['placeholder'=>'Telefono Fijo','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div> 

                  <div class="col-sm-6 col-md-4">
                      <div class="input-group">
                          {!! Form::Label('Telefono2', 'Telefono Movil:') !!}
                          {!! Form::text('telefono_movil',null,['placeholder'=>'Telefono Movil','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div> 

                  <div class="col-sm-4 col-md-4"> 
                      <div class="form-group"> 
                        <label for="estado_civil">Estado Civil:</label>
                        <select id="estado_civil" name="estado_civil" class="form-control">
                          <option value="0">Seleccione...</option>
                          <option value="1">CADADO(A)</option>
                          <option value="2">SOLTERO(A)</option>
                          <option value="3">DIVORCIADO(A)</option>
                        </select>
                      </div>
                  </div>

                  <div class="col-sm-4 col-md-4"> 
                      <div class="form-group"> 
                        <label for="sexo">Sexo:</label>
                        <select id="sexo" name="sexo" class="form-control">
                          <option value="0">Seleccione...</option>
                          <option value="1">MASCULINO</option>
                          <option value="2">FEMENINO</option>
                        </select>
                      </div>
                  </div>

                  <div class="col-sm-4 col-md-4"> 
                      <div class="form-group"> 
                        <label for="nacionalidad">Nacionalidad:</label>
                        <select id="nacionalidad" name="nacionalidad" class="form-control">
                          <option value="0">Seleccione...</option>
                          <option value="1">MEXICANA</option>
                          <option value="2">EXTRANJERA</option>
                        </select>
                      </div>
                  </div>

                  <div class="col-sm-4 col-md-4"> 
                      <div class="form-group"> 
                        <label for="escolaridad">Escolaridad:</label>
                        <select id="escolaridad" name="escolaridad" class="form-control">
                          <option value="0">Seleccione...</option>
                          <option value="1">PRIMARIA</option>
                          <option value="2">SECUNDARIA</option>
                          <option value="3">PREPARATORIA</option>
                          <option value="4">LICENCIATURA</option>
                          <option value="5">MAESTRIA</option>
                          <option value="6">DOCTORADO</option>
                        </select>
                      </div>
                  </div>

               </div> 


               
                <center>
                  <font size="4" face="roman" color="#B20060">Ingresar o Seleccionar Datos Domiciliarios</font> 
                </center> 
                

               <div class="row well" style="background-color:rgb(232, 232, 232);"> 
                    <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                          {!! Form::Label('Calle', 'Calle:') !!}
                          {!! Form::text('calle',null,['placeholder'=>'Calle','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>

                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                          {!! Form::Label('Exterior', 'Número Exterior:') !!}
                          {!! Form::text('num_exterior',null,['placeholder'=>'Numero Exterior','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>

                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                          {!! Form::Label('Interior', 'Número Interior:') !!}
                          {!! Form::text('num_interior',null,['placeholder'=>'Numero Interior','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>

                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                          {!! Form::Label('Delegacion', 'Delegación o Municipio:') !!}
                          {!! Form::text('delegacion_municipio',null,['placeholder'=>'Delegación o Municipio','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>

                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                          {!! Form::Label('Localidad', 'Localidad:') !!}
                          {!! Form::text('localidad',null,['placeholder'=>'Localidad','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>

                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                          {!! Form::Label('Colonia', 'Colonia:') !!}
                          {!! Form::text('colonia',null,['placeholder'=>'Colonia','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>

                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                          {!! Form::Label('Codigo', 'Código Postal:') !!}
                          {!! Form::text('codigo_postal',null,['placeholder'=>'Codigo Postal','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>
               </div>
                
              
        
                <div class="row well">
                    <a class="btn btn-info" href="{{ route('personas.index') }}"> Regresar</a>
                    {!! Form::submit('Registrar Persona',['class'=>'btn btn-success']) !!}
                    {!! Form::close() !!}
                </div>
                
            </div>
        </div>
    </div>
</div> 
</div>

@endsection