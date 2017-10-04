 @extends('layouts.public')

@section('content')
<div class="container">
  <div class="row"> 
    <div class="col-md-12">
    <h1>Configuración de Catalogos</h1>
        <nav class="navbar navbar-default">
          <a class="btn btn-default btn-sm" aria-label="Left Align" href="{{ route('Marca.index')}}"> Marca</a>
          <a class="btn btn-default btn-sm" aria-label="Left Align" href="{{ route('Chofer.index')}}"> Conductor</a>
          <a class="btn btn-default btn-sm" aria-label="Left Align" href="{{ route('Polizas.index')}}"> Poliza</a>
          <a class="btn btn-default btn-sm" href="/home"> Regresar</a>
        </nav>
    </div>
  </div>
</div>  
@endsection
