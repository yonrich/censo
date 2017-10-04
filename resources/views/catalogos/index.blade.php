 @extends('layouts.public')

@section('content')
<div class="container">
  <div class="row"> 
    <div class="col-md-12">
    <center>
      <h4>Menú de Catálogos - Creación y Modificación de Registros</h4>
    <p>Seleccione Alguna de las Opciones</p>
    </center>
    
        

        <nav class="navbar navbar" style="background-color:rgb(63, 152, 155);">
          <center>
          <p></p>
            <a class="btn btn-default" aria-label="Left Align" href="{{ route('tipoUsuarios.index')}}"> Nivel</a>
          <a class="btn btn-default" aria-label="Left Align" href="{{ route('Rpuestos.index')}}"> Codigo y Puesto</a>
          <!--<a class="btn btn-default" aria-label="Left Align" href="{{ route('Departamentos.index')}}"> Departamento</a>-->
          <a class="btn btn-default" aria-label="Left Align" href="{{ route('Unidad.index')}}"> Unidad de Adscripción</a>
          <a class="btn btn-default" aria-label="Left Align" href=""> Clave de Cobro</a>
          <a class="btn btn-default" aria-label="Left Align" href=""> Tipo de Solicitud</a>
          <a class="btn btn-default" aria-label="Left Align" href=""> Estatus de Solicitud</a>
          <a class="btn btn-default" href="home"> Terminar Tarea</a>
        <p></p>
          </center>
          
</nav>
       
              <p>
                Catalogo de Nivel: Incluir descripción 

              </p>   

              <p>
                Codigo y Puesto: Incluir descripción

               </p>  

              <p>
                Unidad de Adscripción: Incluir descripción
              </p>      
       

  </div>
  </div>
</div>  
@endsection
