<div class="container">
  <div class="row"> 
  <div class="col-md-12"> 
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css ">         
    <table id="se-table" class="table table-bordered table-striped display" style="font-size:12px"> 
       <thead>
          <tr  class="info" align="center">
          <th>Id</th>
           <th>Vehículo</th>
           <th>Placas</th>
           <th>Conductor</th>
           <th>Hora salida</th>
           <th>Hora entrada</th>
           <th>Homeotraje Inicial</th>
           <th>Homeotraje Final</th>
           <th>Vigilante</th>
           <th>No Oficio</th>
           <th>Documento</th>
           <th>Acciones</th>
          </tr>
       </thead>
       <tbody>
           @foreach($bitacoras as $bitacora)
              
               <tr>
                    <td> <a href="{{ '/detalle-bitacora/'.$bitacora->id}}">
                    {{$bitacora->id}}
                    </a>
                    </td>
                    <td>{{$bitacora->vehiculo}}</td>
                    <td>{{$bitacora->placas}}</td>
                    <td>{{$bitacora->conductor}}</td>
                    <td>{{$bitacora->Hsalida}}</td>
                    <td>{{$bitacora->Hentrada}}</td>
                    <td>{{$bitacora->homeotraje}}</td>
                    <td>{{$bitacora->homeotrajeFinal}}</td>
                    <td>{{$bitacora->vigilante}}</td>
                    <td>{{$bitacora->folio}}</td>
                    <td>{{$bitacora->documento_folio}}</td>
                    <td>
                      <div class="btn-group">
                          <button type="button" class="btn btn-default btn-sm"
                              data-toggle="dropdown">
                                Opciones
                                <span class="caret"></span>
                          </button>
                            <ul class="dropdown-menu">
                              <li><a href="{{ route('bitacora.edit', $bitacora->id)}}">Editar</a></li>
                              <li><a href="{{ route('eliminar-bitacora', $bitacora->id)}}">Eliminar</a></li>
                             <li><a type="button" class="text-danger" data-toggle="modal" data-target="#favoritesModal" onclick="vModal('{{$bitacora->id}}')">Oficio</a></li>
                              <li><a type="button" data-toggle="modal" data-target="#EmailModal" onclick="vModal('{{$bitacora->id}}')">Notificación</a></li>
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
<!--  *******************Ventana Modal Adjuntar Oficio  ********************************* -->
<div class="container">
  <div class="modal fade" id="favoritesModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="favoritesModalLabel">Agregar Folio</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(array('route' => 'agregarFolio', 'files' => true, 'method' => 'post')) }}
            <div class="row well"> 
                <div class="col-sm-4 col-md-4"> 
                    <div class="input-group"> 
                        {!! Form::Label('Folio', 'Folio:') !!}
                        {!! Form::text('folio',null,['placeholder'=>'folio','class'=>'form-control','required'=>'required']) !!}
                    </div>
                </div>
                <div class="col-sm-4 col-md-4">
                    <div class="input-group">
                       {!! Form::Label('Documento', 'Documento:') !!}
                        {!! Form::file('documento',null,['placeholder'=>'documento','class'=>'form-control','required'=>'required']) !!}
                    </div>
                </div> 
             </div>
        <input type="hidden" name="id" id="id">
        {!! Form::submit('Agregar',['class'=>'btn btn-primary']) !!}
        {{ Form::close()}}
      </div>
    </div>
  </div>
</div>
</div>

<!--  ********************** Ventana modal de enviar email   *********************************  -->
<div class="container">
  <div class="modal fade" id="EmailModal" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="favoritesModalLabel">Generar Correo</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(array('route' => 'mandarCorreo', 'method' => 'post')) }}
            <div class="row well"> 
                <div class="col-sm-10 col-md-10"> 
                    <div class="input-group"> 
                        {!! Form::Label('Destino', 'Destino:') !!}
                        {!! Form::text('destino',null,['placeholder'=>'destino','class'=>'form-control','required'=>'required']) !!}
                    </div>
                </div>
                <div class="col-sm-10 col-md-10"> 
                    <div class="input-group"> 
                        {!! Form::Label('Asunto', 'Asunto:') !!}
                        {!! Form::text('asunto',null,['placeholder'=>'asunto','class'=>'form-control','required'=>'required']) !!}
                    </div>
                </div>
                <div class="col-sm-10 col-md-10">
                    <div class="input-group">
                       {!! Form::Label('Email', 'Email:') !!}
                        {!! Form::textarea('email',null,['class'=>'form-control','required'=>'required']) !!}
                    </div>
                </div> 
             </div>
        <input type="hidden" name="id" id="id">
        {!! Form::submit('Enviar Correo',['class'=>'btn btn-primary']) !!}
        {{ Form::close()}}
      </div>
    </div>
  </div>
</div>
</div>
<script type="text/javascript">
  function vModal(id) {
    document.getElementById("id").value = id;
  }
</script>