 @extends('layouts.public')

@section('content')
<div class="container">
  <div class="row"> 
    <div class="col-md-12">
    <h1>Listado de Marcas y Submarcas</h1>
        <nav class="navbar navbar-default">
          <a class="btn btn-default btn-sm" aria-label="Left Align" href="{{ route('Polizas.create') }}"> Nueva</a> 
          <a class="btn btn-default btn-sm" href="/Polizas"> Restablecer</a>
          <a class="btn btn-default btn-sm" href="/catalogo-vehiculos"> Regresar</a>
        </nav>
    </div>
  </div>

 
</div>   
        @include('catalogo-vehiculos.POLIZA.partials.table')
@endsection
