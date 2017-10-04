 @extends('layouts.public')

@section('content')
<div class="container">
  <div class="row"> 
    <div class="col-md-12">
    <h1>Usuarios</h1>
        <nav class="navbar navbar-default">
          <a class="btn btn-default btn-sm" aria-label="Left Align" href="{{ route('usuarios.create') }}"> Nuevo</a>
          <a class="btn btn-default btn-sm" href="/usuarios"> Restablecer</a>
          <a class="btn btn-default btn-sm" href="/home"> Regresar</a>
        </nav>
    </div>
  </div>
</div>   
        @include('usuarios.partials.table')
@endsection
