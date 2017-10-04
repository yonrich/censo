 @extends('layouts.public')

@section('content')
<div class="container">
    @include('alerts.success')
</div>
<div class="container">
  <div class="row"> 
    <div class="col-md-12">
      <h1>MODIFICAR PERMISOS</h1>
        <nav class="navbar navbar-default">
          <a class="btn btn-info" href="/home"> Regresar</a>
        </nav>
    </div>
  </div>
</div>   


<div class="container">
  <div class="row"> 
  <div class="col-md-12">          
      {!! Form::model($rol, ['route' => ['roles.update',$rol->id]]) !!}
          <div class="row well"> 
              <div class="col-sm-4 col-md-4"> 
                  <div class="input-group"> 
                      {!! Form::Label('Rol', 'Rol:') !!}
                      {!! Form::text('name',null,['placeholder'=>'rol','class'=>'form-control','required'=>'required', 'disabled' => 'disabled']) !!}
                  </div>
              </div>
              <div class="col-sm-4 col-md-4"> 
                  <div class="input-group"> 
                      {!! Form::Label('Descripcion', 'Descripcion:') !!}
                      {!! Form::text('description',null,['placeholder'=>'descripcion','class'=>'form-control','required'=>'required', 'disabled' => 'disabled']) !!}
                  </div> 
              </div>
           </div> 

           <div class="row well"> 
              <h4>Permisos <a type="button" class="btn btn-primary btn-xs" alin="right" data-toggle="modal" data-target="#favoritesModal">Agregar</a></h4>
                @foreach ($rol->permisos as $permiso)
                  <label>{{$permiso->slug}}</label>
                  <a href="" type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eliminarPermiso" onclick="guardarRol({{$rol->id}}),guardarPermiso({{$permiso->id}})">Eliminar</a><br>
                @endforeach
           </div>

      {!! Form::hidden('id',$rol->id) !!}
      <a class="btn btn-warning" href="{{ route('roles.index') }}"> Regresar</a>
      <a class="btn btn-default" href="{{ route('roles.index') }}"> Confirmar Permisos</a>
      {!! Form::close() !!}
  </div>
  </div>
</div>

<!--  *******************Ventana Modal Agregar Permiso  ********************************* -->
<div class="container">
  <div class="modal fade" id="favoritesModal" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="favoritesModalLabel">Agregar Permiso</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(array('route' => 'agregarRol', 'method' => 'post')) }}
            <div class="row well"> 
                <div class="col-sm-4 col-md-4"> 
                    <div class="input-group"> 
                        {!! Form::Label('Permiso', 'Permiso:') !!}
                        {!! Form::select('permiso', $permisos, null, ['class' => 'form-control']) !!}
                    </div>
                </div> 
             </div>
        <input type="hidden" name="id" id="id">
        {!! Form::hidden('id',$rol->id) !!}
        {!! Form::submit('Agregar',['class'=>'btn btn-primary']) !!}
        {{ Form::close()}}
      </div>
    </div>
  </div>
  </div>
</div>

<!--  *******************Ventana Modal Agregar Permiso  ********************************* -->
<div class="container">
  <div class="modal fade" id="eliminarPermiso" tabindex="-1" role="dialog" aria-labelledby="eliminarPermiso">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="eliminarPermiso">Eliminar Permiso</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(array('route' => 'eliminarPermisoRol', 'method' => 'post')) }}
            <div class="row well"> 
                    <div class="input-group"> 
                        <h1>Seguro que quieres eliminarlo? </h1>
                    </div>
             </div>
        <input type="hidden" name="idpermiso" id="idpermiso" >
        <input type="hidden" name="idrol" id="idrol">
        {!! Form::submit('Eliminar',['class'=>'btn btn-primary']) !!}
        {{ Form::close()}}
      </div>
    </div>
  </div>
  </div>
</div>

<script type="text/javascript">
  function guardarRol(id){
    var idR = id;
    document.getElementById('idrol').value=idR;
  }

  function guardarPermiso(id){
    var idP = id;
    document.getElementById('idpermiso').value=idP;
    console.log(idP);
  }
</script>
@endsection
