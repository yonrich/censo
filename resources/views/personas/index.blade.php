@extends('layouts.public')

@section('content')
<div class="container">
    @include('alerts.success')
</div>
<div class="container">
  <div class="row"> 
    <div class="col-md-12">
      <h4>Listado de Prospectos a Empleados del INSUS</h4>
      </div>
      <center>
      <div class="col-md-4">
        <nav class="navbar" style="background-color:rgb(63, 152, 155);">
        <center>
          <p></p>
          <a class="btn btn-default btn-sm" aria-label="Left Align" href="{{ route('personas.create') }}">Nuevo Registro</a>
          <a class="btn btn-default btn-sm" href="/personas">Actualizar Listado</a>
          <a class="btn btn-default btn-sm" href="/home">Terminar Tarea</a>
        </center>
        </nav>
    </div>
      </center>
  </div>

  </div>   
        @include('personas.partials.table')
@endsection
