@extends('layouts.public')

@section('content')
 
<div class="container">
    <div class="row">
        <div class="col-md-12">            
            <div class="row">
            <div class="col-md-12">
            {!! Form::model($censos, ['route' => ['modificarCenso',$censos->id]]) !!}
              <h4><b>Modulo para Modificar Registro de Censo</b></h4> 
              <hr> 
              <div class="row well" style="background-color:rgb(252, 252, 252);"> 
                   
                  <div class="col-sm-4 col-md-3">
                      <div class="input-group"> 
                          {!! Form::Label('Folio', 'Folio:') !!}
                          {!! Form::text('folio',null,['placeholder'=>'Ingresar Folio','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>

                  <div class="col-sm-4 col-md-3"> 
                      <div class="input-group"> 
                          {!! Form::Label('Fecha Visita', 'Fecha de la Visita:') !!}
                          {!! Form::text('fecha_visita',null,['placeholder'=>'Fecha de la Visita','class'=>'form-control','required'=>'required', 'id'=>'fecha_visita']) !!}
                      </div>
                  </div>

                  <div class="col-sm-6 col-md-3">
                      <div class="input-group">
                          {!! Form::Label('Fecha Indicencia', 'Fecha de Incidencia:') !!}
                          {!! Form::text('fecha_incidencia',null,['placeholder'=>'Fecha de Incidencia','class'=>'form-control','required'=>'required', 'id'=>'fecha_incidencia']) !!}
                      </div>
                  </div>

                  <div class="col-sm-4 col-md-3"> 
                      <div class="form-group"> 
                        {!! Form::Label('perdida', 'Perdida:') !!}
                        {!! Form::select('perdida', ['DAÑO PARCIAL (HABITABLE)' => 'DAÑO PARCIAL (HABITABLE)', 'DAÑO PARCIAL (NO HABITABLE)' => 'DAÑO PARCIAL (NO HABITABLE)','PERDIDA TOTAL'=>'PERDIDA TOTAL'], null, ['placeholder' => 'Selecciona una opción','class'=>'form-control']) !!}
                      </div>
                  </div>

                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                          {!! Form::Label('Nombre', 'Nombre(s):') !!}
                          {!! Form::text('nombre',null,['placeholder'=>'Nombre(s)','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>
                  <div class="col-sm-4 col-md-4">
                      <div class="input-group">
                          {!! Form::Label('Apellido1', 'Apellido Paterno:') !!}
                          {!! Form::text('apellido_paterno',null,['placeholder'=>'Apellido Paterno','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div> 
                  <div class="col-sm-4 col-md-4">
                      <div class="input-group">
                          {!! Form::Label('Apellido2', 'Apellido Materno:') !!}
                          {!! Form::text('apellido_materno',null,['placeholder'=>'Apellido Materno','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>                                             

                  <div class="col-sm-6 col-md-4">
                      <div class="input-group">
                          {!! Form::Label('Telefono1', 'Telefono Fijo:') !!}
                          {!! Form::text('telefono_fijo',null,['placeholder'=>'Telefono Fijo','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div> 

                  <div class="col-sm-6 col-md-4">
                      <div class="input-group">
                          {!! Form::Label('Telefono2', 'Telefono Movil:') !!}
                          {!! Form::text('telefono_movil',null,['placeholder'=>'Telefono Movil','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div> 

                  <div class="col-sm-6 col-md-4">
                      <div class="input-group">
                          {!! Form::Label('Habitantes', 'Habitantes:') !!}
                          {!! Form::text('habitantes',null,['placeholder'=>'Habitantes','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div> 

                  <div class="col-sm-6 col-md-4">
                      <div class="input-group">
                          {!! Form::Label('Pisos', 'Pisos:') !!}
                          {!! Form::text('pisos',null,['placeholder'=>'Pisos','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>

                  
                  

               </div>         
                

               <div class="row well" style="background-color:rgb(252, 252, 252);"> 
                  <div class="col-sm-4 col-md-4"> 
                    <div class="form-group"> 
                      {!! Form::Label('estado', 'Estado:') !!}
                      {!! Form::select('estado', $estados, null, ['placeholder' => 'SELECCIONA ....','class'=>'form-control','id'=>'estado']) !!}
                    </div>
                  </div>
                
                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                          {!! Form::Label('municipio', 'Municipio:') !!}
                          {!! Form::select('municipio',[],null,['placeholder'=>'Municipio','class'=>'form-control','required'=>'required','id'=>'municipio']) !!}
                      </div>
                  </div>

                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                          {!! Form::Label('localidad', 'Localidad:') !!}
                          {!! Form::select('localidad',[],null,['placeholder'=>'Localidad','class'=>'form-control','required'=>'required','id'=>'localidad']) !!}
                      </div>
                  </div>

                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                          {!! Form::Label('Direccion', 'Dirección:') !!}
                          {!! Form::text('direccion',null,['placeholder'=>'Dirección','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>

                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                          {!! Form::Label('Referencia1', 'Referencia1:') !!}
                          {!! Form::text('referencia1',null,['placeholder'=>'Referencia1','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>

                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                          {!! Form::Label('Referencia2', 'Referencia2:') !!}
                          {!! Form::text('referencia2',null,['placeholder'=>'Referencia2','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>

                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                          {!! Form::Label('coordenada1', 'Latitud:') !!}
                          {!! Form::text('lat',null,['placeholder'=>'Coordenada X','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>

                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                          {!! Form::Label('coordenada2', 'Longitud:') !!}
                          {!! Form::text('lng',null,['placeholder'=>'Coordenada Y','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>

               </div>
               </div> 

               <center>
                  <font size="4" face="roman" color="#35001C">Datos del Encuestador</font> 
                </center> 
               <div class="row well" style="background-color:rgb(252, 252, 252);"> 
                    <div class="col-sm-4 col-md-4"> 
                         <div class="input-group"> 
                          {!! Form::Label('nombre1', 'Nombre:') !!}
                          {!! Form::text('nombre_encuestador',null,['placeholder'=>'Nombre Encuestador','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>

                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                          {!! Form::Label('apellidoen1', 'Apellido Paterno:') !!}
                          {!! Form::text('apellido1_encuestador',null,['placeholder'=>'Apellido Encuestador','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>

                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                          {!! Form::Label('apellidoen2', 'Apellido Materno:') !!}
                          {!! Form::text('apellido2_encuestador',null,['placeholder'=>'Apellido Materno','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>

                  

               </div>
               </div> 

               
                
                    {!! Form::hidden('id',$censos->id) !!}
                    <a class="btn btn-default btn-md active" href="{{ route('censos.index') }}"> Regresar</a>
                    {!! Form::submit('Confirmar Registro',['class'=>'btn btn-default btn-md active']) !!}
                    {!! Form::close() !!}
                






                
            </div>
        </div>
    </div>
</div> 
</div>
<script type="text/javascript">
  $(function() {
    
    //Iniciañización de formatos para fechas
    $('#fecha_visita').datepicker({
      format: 'dd-mm-yyyy'
    });

    $('#fecha_incidencia').datepicker({
      format: 'dd-mm-yyyy'
    });

    //Inicialización de fecha visita
    $('#fecha_visita').datepicker('setDate', moment().format('DD/MM/YYYY'));

    var idEstado = '{{$censos->estado}}';
    var idMunicipio = '{{$censos->municipio}}';
    var idLocalidad = '{{$censos->localidad}}';

    //Evento onchange en Select de Estado
    $('#estado').on('change',function(){
      //Se obtiene id estado seleccionado
      idEstado = $(this).val();
      //Se pintan municipios por estado seleccionado
      $.ajax({
        url: "/censo_mapa/estado/"+idEstado+"/municipio",
        dataType:'json',
		async: false
      }).done(function(data) {
        //Se limpia valores de municipio
        $('#municipio').empty();
        $('#municipio').append("<option value='0'>SELECCIONE ..</option>");

        $('#localidad').empty();
        $('#localidad').append("<option value='0'>SELECCIONE ..</option>");

        //Se pintan nuevos valores
        $.each(data,function(index,result){
          var selected = "";
          if(parseInt(idMunicipio) === result.id_municipio){
            selected = "selected='selected'";
          }

          $('#municipio').append("<option value='"+result.id_municipio+"' "+selected+">"+result.nombre+"</option>");
        });
      });
    });


    
    //Evento onchange en Select de Municipios
    $('#municipio').on('change',function(){
      //Se obtiene id estado seleccionado
      var idMun = 0;
      //Se valida si ya hay un municipio seleccionado
      if($(this).val() === ''){
        //Se inicializa con el id que viene de los datos
        idMun = idMunicipio;
      }else {
        //Si el valor es diferente vacio se selecciona el valor que escojan
        idMun = $(this).val();
      }
      //Se pintan municipios por estado y municipio seleccionado
      $.ajax({
        url: "/censo_mapa/estado/"+idEstado+"/municipio/"+idMun+"/localidad",
        dataType:'json',
		async: false
      }).done(function(data) {
        //Se limpia valores de localidades
        $('#localidad').empty();
        $('#localidad').append("<option value='0'>SELECCIONE ..</option>");

        //Se pintan nuevos valores
        $.each(data,function(index,result){
          var selected = "";
          if(parseInt(idLocalidad) === result.id_localidad){
            selected = "selected = 'selected'";
          }
          
          $('#localidad').append("<option value='"+result.id_localidad+"' "+selected+">"+result.nombre+"</option>");
        });
      });
    });

    if(parseInt(idEstado)>0){
      $('#estado').change();
    }

    if(parseInt(idMunicipio)>0){
      $('#municipio').change();
    }

  });
</script>
@endsection