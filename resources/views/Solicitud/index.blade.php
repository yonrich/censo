  @extends('layouts.public')

@section('content')
<div class="container">
    @include('alerts.success')
</div>
<div class="container">
  <div class="row"> 
    <div class="col-md-12">
      <h4>Requisición para Equipo de Computo</h4>
      </div>
      <div class="col-md-4">
        <nav class="navbar navbar" style="background-color:rgb(63, 152, 155);">
        <P></P>
          <a class="btn btn-default btn-sm" aria-label="Left Align" href="{{ route('solicitud.create') }}">Registrar Solicitud</a>
          <a class="btn btn-default btn-sm" href="solicitud">Actualizar Listado</a>
          <a class="btn btn-default btn-sm" href="home">Terminar Tarea</a>
        </nav>
    </div>
  </div>

  </div>   
        @include('Solicitud.partials.table')
@endsection