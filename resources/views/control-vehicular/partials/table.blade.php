<div class="container">
  <div class="row"> 
  <div class="col-md-12"> 
  <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css ">          
    <table id="se-table" class="table table-bordered table-striped display" style="font-size:12px"> 
       <thead>
          <tr  class="info" align="center">
          <th>Id</th>
           <th>Unidad</th>
           <th>Marca</th>
           <th>Submarca</th>
           <th>Modelo</th>
           <th>Serie</th>
           <th>Placas</th>
           <th>Número Económico</th>           
           <th>Tipo</th>
           <th>Seguro</th>
           <th>Conductor</th>
           <th>Disponibilidad</th>
           <th>Unidado</th>
           <th>Acciones</th>
          </tr>
       </thead>
       <tbody>
           @foreach($vehiculos as $vehiculo)
              
               <tr>
                    <td>{{$vehiculo->id}}</td>
                    <td>{{$vehiculo->vehiculo}}</td>
                    <td>{{$vehiculo->marca}}</td>
                    <td>{{$vehiculo->submarca}}</td>
                    <td>{{$vehiculo->modelo}}</td>
                    <td>{{$vehiculo->serie}}</td>
                    <td>{{$vehiculo->placas}}</td>
                    <td>{{$vehiculo->num_eco}}</td>
                    <td>{{$vehiculo->tipo}}</td>
                    <td>{{$vehiculo->seguro}}</td>
                    <td>{{$vehiculo->conductor}}</td>
                    <td>{{$vehiculo->tipo_auto}}</td>
                    <td>{{$vehiculo->localidad}}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm"
                                data-toggle="dropdown">
                                  Opciones
                                  <span class="caret"></span>
                            </button>
                              <ul class="dropdown-menu">
                                <li><a href="{{ route('control-vehicular.edit', $vehiculo->id)}}" >Editar</a></li>
                                <li><a href="{{ route('eliminar-vehiculo', $vehiculo->id)}}">Eliminar</a></li>
                                <li><a href="{{ route('asignacion.vehiculo', $vehiculo->id)}}">Asignar</a></li>
                              </ul>
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
</div>
</div>
</div>