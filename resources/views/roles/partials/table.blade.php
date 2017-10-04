<div class="container">
  <div class="row"> 
  <div class="col-md-12">
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css ">
    <table id="se-table" class="table table-bordered table-striped display" style="font-size:12px"> 
       <thead>
          <tr  class="info" align="center">
           <th>Rol</th>
           <th>Permisos</th>
           <th>Configuracion</th>
          </tr>
       </thead>
       <tbody>

         @foreach($roles as $rol)
              
               <tr>
                    <td>{{$rol->name}}</td>
                    <td>
                    @foreach ($rol->permisos as $permiso)
                      <label>{{$permiso->slug}}</label><br>
                    @endforeach
                    </td>
                    <td>
                        <a href="{{ route('roles.edit', $rol->id) }}" class="btn btn-default btn-sm">Editar</a>
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