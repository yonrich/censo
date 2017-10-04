@extends('layouts.public')

@section('content')
 
<div class="container">
    <div class="row">
        <div class="col-md-12">            
            <div class="row">
            <div class="col-md-12">
            {!! Form::model($unidades, ['route' => ['modificardUni',$unidades->id]]) !!}
              <h4>Actualizar Registro</h4> 
              <hr> 
                  <div class="row well"> 
                      <div class="col-sm-4 col-md-4"> 
                          <div class="input-group"> 
                              {!! Form::Label('Código', 'Código:') !!}
                              {!! Form::text('codigo',null,['placeholder'=>'codigo','class'=>'form-control','required'=>'required']) !!}
                          </div>
                      </div>
                      <div class="col-sm-8 col-md-8">
                          <div class="input-group">
                              {!! Form::Label('Descripción ', 'Descripción:') !!}
                              {!! Form::text('descripcion',null,['placeholder'=>'descripcion','class'=>'form-control','required'=>'required']) !!}
                          </div>
                      </div> 
                   </div> 

                <div class="row well">
                    {!! Form::hidden('id',$unidades->id) !!}
                    <a class="btn btn-info" href="{{ route('Unidad.index') }}"> Regresar</a>
                    {!! Form::submit('Confirmar Unidad',['class'=>'btn btn-success']) !!}
                    {!! Form::close() !!}
                </div>    
               
            </div>
        </div>
    </div>
</div> 
</div>

@endsection