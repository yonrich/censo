 @extends('layouts.public')

@section('content')
<div class="container">
  <div class="row"> 
    <div class="col-md-12">
    <h1>Conductores</h1>
        <nav class="navbar navbar-default">
          <a class="btn btn-default btn-sm" aria-label="Left Align" href="{{ route('Chofer.create') }}"> Nueva</a> 
          <a class="btn btn-default btn-sm" href="/Polizas"> Restablecer</a>
          <a class="btn btn-default btn-sm" href="/catalogo-vehiculos"}}"> Regresar</a>
        </nav>
    </div>
  </div>

</div>   
        @include('catalogo-vehiculos.C_chofer.partials.table')
@endsection
