 @extends('layouts.public')

@section('content')
<div class="container">
  <div class="row"> 
    <div class="col-md-4">
    <h4>Niveles Actuales</h4>
        

          <nav class="navbar navbar" style="background-color:rgb(63, 152, 155);">
          <center>
          <p></p>

          <a class="btn btn-default btn-sm" aria-label="Left Align" href="{{ route('tipoUsuarios.create') }}"> Agregar Nivel</a>
          <a class="btn btn-default btn-sm" href="/tipoUsuarios"> Restablecer</a>
          <a class="btn btn-default btn-sm" href="/catalogos"> Regresar</a>
          <p></p>
        </center>
        </nav>
    </div>
  </div>

</div>   
        @include('catalogos.TipoUsuarios.partials.table')
@endsection
