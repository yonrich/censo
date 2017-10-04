@extends('layouts.public')

@section('content')
    <div class="container">
        @include('alerts.success')
    </div>
          <div class="container">
            @if(Session::has('message'))
  <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    {{ Session::get('message') }}
  </div>
@endif
@if(Session::has('error'))
  <div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    {{ Session::get('error') }}
  </div>
@endif
            <div class="row"> 
              <div class="col-md-12">


                <h4><b>Listado General de Censos</b></h4>
                <hr>
                    

                    <a class="btn btn-default btn-sm active" href="{{ route('censos.create') }}"><b>Nuevo Registro</b></a>
                    <a class="btn btn-default btn-sm active" href="censos"><b>Actualizar Listado</b></a>
                    <a class="btn btn-default btn-sm active" href="gmapsgral"><b>Mapeo de Censos</b></a>
                    <a class="btn btn-default btn-sm active" href="gmaps"><b>Reportes</b></a>
                    <a class="btn btn-default btn-sm active" href="home"><b>Terminar Tarea</b></a>
                    

                </div>
            </div>
            <hr>
          </div> 

        @include('censos.partials.table')

@endsection
