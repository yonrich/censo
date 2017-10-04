 @extends('layouts.public')

@section('content')
<div class="container">
    @include('alerts.success')
</div>
<div class="container">
  <div class="row"> 
    <div class="col-md-12">
      <h1>Historial del día</h1>
        <nav class="navbar navbar-default">
          <a class="btn btn-info" href="{{ route('bitacora.index') }}"> Regresar</a>
        </nav>
    </div>
  </div>
  <div class="row">
    {{ Form::open(array('route' => 'buscar_historial')) }}
        <div class="col-sm-4 col-md-4">
          <label>Fecha inicial</label>
          <input type="date" class="form-control" id="fechaIncial" name="fechaIncial" required>
        </div>
        <div class="col-sm-4 col-md-4">
          <label>Fecha Final</label>
          <input type="date" class="form-control" id="fechaFinal" name="fechaFinal" required>
        </div>
        <div class="col-sm-4 col-md-4"><br>
        <input type="submit" class="btn btn-info" value="buscar" >
        </div>
            
    {{Form::close()}}
  </div>
</div>   
        @include('bitacora.partials.table')
@endsection
