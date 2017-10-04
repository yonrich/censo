 @extends('layouts.public')

@section('content')
<div class="container">
    @include('alerts.success')
</div>
<div class="container">
  <div class="row"> 
    <div class="col-md-12">
      <h1>Permisos</h1>
        <nav class="navbar navbar-default">
          <a class="btn btn-default" aria-label="Left Align" href="{{ route('permisos.create') }}"> Nueva</a>
          <a class="btn btn-default" href="/permisos"> Restablecer</a>
          <a class="btn btn-default" href="/home"> Regresar</a>
        </nav>
    </div>
  </div>
</div>   
        @include('permisos.partials.table')
@endsection
