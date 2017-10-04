 @extends('layouts.public')

@section('content')
<div class="container">
  <div class="row"> 
    <div class="col-md-12">
    <h1>Listado de Departamentos</h1>
        <nav class="navbar navbar-default">
          <a class="btn btn-default btn-sm" aria-label="Left Align" href="{{ route('Departamentos.create') }}"> Nuevo</a>
          <a class="btn btn-default btn-sm" href="/Departamentos"> Restablecer</a>
          <a class="btn btn-default btn-sm" href="/catalogos"> Regresar</a>
        </nav>
    </div>
  </div>

</div>   
        @include('catalogos.Cdepartamentos.partials.table')
                 
@endsection
