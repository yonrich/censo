 @extends('layouts.public')

@section('content')
<div class="container">
    @include('alerts.success')
</div>
<div class="container">
  <div class="row"> 
    <div class="col-md-12">
      <h1>Roles</h1>
        <nav class="navbar navbar-default">
          <a class="btn btn-default btn-sm" href="{{ route('permisos.index') }}"> Agregar Permiso</a>
          <a class="btn btn-default btn-sm" href="/roles"> Restablecer</a>
          <a class="btn btn-default btn-sm" href="/home"> Regresar</a>
        </nav>
    </div>
  </div>
</div>   
        @include('roles.partials.table')
@endsection
