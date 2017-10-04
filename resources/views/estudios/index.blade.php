@extends('layouts.public')

@section('content')
    <div class="container">
        @include('alerts.success')
    </div>
          <div class="container">
            <div class="row"> 
              <div class="col-md-12">


                <h4><b>Listado General de Estudios</b></h4>
                <hr>
                    

                    <a class="btn btn-default btn-sm active" href="{{ route('estudios.create') }}"><b>Nuevo Registro</b></a>
                    
                    <a class="btn btn-default btn-sm active" href="home"><b>Terminar Tarea</b></a>
                    

                </div>
            </div>
            <hr>
          </div> 

        @include('estudios.partials.table')

@endsection
