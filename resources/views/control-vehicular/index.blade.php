 @extends('layouts.public')

@section('content')
<div class="container">
  <div class="row"> 
    <div class="col-md-12">
    <h1>Listado de unidades</h1>
        <nav class="navbar navbar-default">
          <a class="btn btn-default btn-sm" aria-label="Left Align" href="{{ route('control-vehicular.create') }}"> Nueva</a>
          <a class="btn btn-default btn-sm" href="{{ url('downloadExcel/xls') }}"> Exportar a Excel</a>
          <a class="btn btn-default btn-sm" href="/home"> Regresar</a>
        </nav>
    </div>
  </div>

  
</div>   
        @include('control-vehicular.partials.table')
@endsection
