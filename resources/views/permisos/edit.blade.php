@extends('layouts.public')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">            
            <div class="row">
            <div class="col-md-12">
            {!! Form::model($permiso, ['route' => ['modificarPermiso',$permiso->id]]) !!}
              <h3>Registrar Permiso</h3> 
              <hr> 

               <div class="row well"> 
                  <div class="col-sm-4 col-md-4">
                      <div class="input-group">
                          {!! Form::Label('Nombre', 'Nombre:') !!}
                          {!! Form::text('name',null,['placeholder'=>'nombre','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>
                  <div class="col-sm-4 col-md-4">
                      <div class="input-group">
                          {!! Form::Label('Slug', 'Slug:') !!}
                          {!! Form::text('slug',null,['placeholder'=>'slug','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>
                  <div class="col-sm-4 col-md-4">
                      <div class="input-group">
                          {!! Form::Label('Descripcion', 'Descripcion:') !!}
                          {!! Form::text('description',null,['placeholder'=>'descripcion','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>
               </div> 
                <div class="row well">
                    {!! Form::hidden('id',$permiso->id) !!}
                    <a class="btn btn-warning" href="{{ route('permisos.index') }}"> Regresar</a>
                    {!! Form::submit('Modificar Permiso',['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
                
            </div>
        </div>
    </div>
</div> 
</div>
@endsection