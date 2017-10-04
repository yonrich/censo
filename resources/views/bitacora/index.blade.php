 @extends('layouts.public')

@section('content')
<div class="container">
    @include('alerts.success')
</div>
<div class="container">
  <div class="row"> 
    <div class="col-md-12">
      <h1>Bitácora del Día</h1>
        <nav class="navbar navbar-default">
          <a class="btn btn-default btn-sm" aria-label="Left Align" href="{{ route('bitacora.create') }}">Crear Bitácora</a>
          <a class="btn btn-default btn-sm" aria-label="Left Align" href="{{ route('historialBitacora') }}"> Historial</a>
          <a class="btn btn-default btn-sm" href="/home"> Regresar</a>
        </nav>
    </div>
  
</div>   
        @include('bitacora.partials.table')
@endsection
