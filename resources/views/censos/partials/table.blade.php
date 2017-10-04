<div class="container">
  <div class="row"> 
  <div class="col-md-12">  
  <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css ">         
    <table id="se-table" class="table table-bordered" style="font-size:12px"> 
       
       <thead>
          <tr  class="info" align="center">
           <th>Folio SEDATU</th>
           <th>Fecha Visita</th>
           <th>Fecha Incidencia</th>
           <th>Nombre(s)</th>
           <th>Apellido Paterno</th>
           <th>Apellido Materno</th>
           <th>Estado</th>
           <th>Municipio</th>
           <th>Localidad</th>
           <th>Perdida</th>
           <!--<th>Telefono Fijo</th>
           <th>Telefono Movil</th>
           <th>Habitantes</th>
           <th>Pisos</th>
           <th>Referencia1</th>
           <th>Referencia2</th>-->
           <th>Acciones</th>
          </tr>
       </thead>
       <tbody> 
          @foreach($censos as $censo)
            <tr>
              <td><a href="{{ route('censos.edit', $censo->id)}}">{{$censo->folio}}</td>
              <td>{{$censo->fecha_visita}}</td>
              <td>{{$censo->fecha_incidencia}}</td>
              <td>{{$censo->nombre}}</td>
              <td>{{$censo->apellido_paterno}}</td>
              <td>{{$censo->apellido_materno}}</td>
              <td>{{$censo->edo->nombre}}</td>
              <td>{{$censo->mun->nombre}}</td>
              <td>
                @if($censo->loc != null)
                {{$censo->loc->nombre}}
                @endif
                @if($censo->loc == null)
                  N/A
                @endif
              </td>
              <td>
    						@if($censo->perdida == 'PERDIDA TOTAL')
    							<span class="badge badge-error">&nbsp;</span> {{$censo->perdida}}
    						@endif
    						@if($censo->perdida == 'DAÑO PARCIAL (NO HABITABLE)')
    							<span class="badge badge-warning">&nbsp;</span> {{$censo->perdida}}
    						@endif
    						@if($censo->perdida == 'DAÑO PARCIAL (HABITABLE)')
    							<span class="badge badge-success">&nbsp;</span> {{$censo->perdida}}
    						@endif



    					</td>
              <td>
                <!--<div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"
                          data-toggle="dropdown">
                    Opciones
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="{{ route('censos.edit', $censo->id)}}" >Editar</a></li>


                    <li><a href="{{ route('estudios.create', $censo->id)}}" >Capturar Estudio</a></li>
                    <li><a href="{{ route('eliminar-Censo', $censo->id)}}">Eliminar</a></li>
                  </ul>-->

                  @if($censo->status == 1)
                  <center>
                  <a class="btn btn-success btn-sm" href="{{ route('estudios.edit', $censo->id)}}"><b>Capturar Estudio</b></a>
                  </center>
                  @else
                  <center><a class="btn btn-warning btn-sm" href=""><b>Ver Estudio</b></a></center>
                    @endif
                
                  
                </div>
            </td>
            </tr>
           @endforeach
        </tbody>  
    </table>
    
    <script type="http://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
      <script>
        $(document).ready(function(){
        $('#se-table').DataTable({
          "language":{
           "lengthMenu":"Mostrar _MENU_ registros por página.",
           "zeroRecords": "Lo sentimos. No se encontraron registros.",
                 "info": "Mostrando página _PAGE_ de _PAGES_",
                 "infoEmpty": "No hay registros aún.",
                 "infoFiltered": "(filtrados de un total de _MAX_ registros)",
                 "search" : "Búsqueda",
                 "LoadingRecords": "Cargando ...",
                 "Processing": "Procesando...",
                 "SearchPlaceholder": "Comience a teclear...",
                 "paginate": {
         "previous": "Anterior",
         "next": "Siguiente", 
        }
          }
         });
        });
    </script>

    <script type="text/javascript">
  function vModal(id) {
    document.getElementById("id").value = id;
  }
</script>
</div>
</div>
</div>