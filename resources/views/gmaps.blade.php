@extends('layouts.public')

@section('content')
	<div class="container">
		<div class="row"> 
			  <div class="col-md-12">
				<h4><b>Reportes de Censos Registrados</b></h4>
				<hr>
				<a class="btn btn-default btn-md active" href="{{ url('censos') }}">Regresar al Menú</a>
				<a class="btn btn-default btn-md active" href="gmaps">Restablecer</a>
			  </div>                    
		</div>

		<hr>
		<div class="row well" style="background-color:rgb(245, 245, 245);"> 
			<div class="col-sm-4 col-md-3"> 
				<div class="form-group"> 
					{!! Form::Label('estado', 'Estado:') !!}
					{!! Form::select('estado', $estados, null, ['placeholder' => 'Selecciona ....','class'=>'form-control','id'=>'estado']) !!}
				</div>
			</div>

			<div class="col-sm-4 col-md-3"> 
				<div class="input-group"> 
					{!! Form::Label('municipio', 'Municipio:') !!}
					{!! Form::select('municipio',[],null,['placeholder'=>'Municipio','class'=>'form-control','required'=>'required','id'=>'municipio']) !!}
				</div>
			</div>

			<div class="col-sm-4 col-md-3"> 
				<div class="input-group"> 
					{!! Form::Label('localidad', 'Localidad:') !!}
					{!! Form::select('localidad',[],null,['placeholder'=>'Localidad','class'=>'form-control','required'=>'required','id'=>'localidad']) !!}
				</div>
			</div>                            
			<div class="col-sm-4 col-md-3"> 
				<div class="form-group"> 
					{!! Form::Label('perdida', 'Perdida:') !!}
					{!! Form::select('perdida', ['DAÑO PARCIAL (HABITABLE)' => 'DAÑO PARCIAL (HABITABLE)', 'DAÑO PARCIAL (NO HABITABLE)' => 'DAÑO PARCIAL (NO HABITABLE)','PERDIDA TOTAL'=>'PERDIDA TOTAL'], null, ['placeholder' => 'Selecciona ....','class'=>'form-control']) !!}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<h6><b>A:</b>Perdida Total<br> <b>B:</b>Daño Parcial Habitable<br><b>C:</b>Daño Parcial No Habitable</h6>
				<canvas id="myChart" width="400" height="450"></canvas>
			</div>
			<div class="col-md-8">
				<div id="mymap"></div>
			</div>
		</div>
	</div>
	<script type="text/javascript">      
	var markers=[];
	var idEstado = 0;
	var idMun = 0; 
	var idLoc = 0;
	var perdida = '';
	var map = null;
	
	function clearMarkersnAll() {
		for (var i = 0; i < markers.length; i++) {
		  markers[i].setMap(null);
		}
	};

	function cambiaDatosGrafica(datos){
		console.log(datos);
		myChart.data.datasets[0].data = datos;
		myChart.update();
	};

	function pintaMarkers(id_edo, id_municipio, id_localidad, perdida, map){            
	  //Se pintan municipios por estado seleccionado
	  var url = "/censo_mapa/censo/"+id_edo+"/municipio/"+id_municipio;

	  if(id_edo > 0 && id_municipio > 0 && id_localidad > 0){
	  	url = "/censo_mapa/censo/"+id_edo+"/municipio/"+id_municipio+"/localidad/"+id_localidad;
	  } 
	  if(id_edo > 0 && id_municipio > 0 && id_localidad > 0 && perdida !== ''){
	  	url = "/censo_mapa/censo/"+id_edo+"/municipio/"+id_municipio+"/localidad/"+id_localidad+"/perdida/"+perdida;
	  }

	  $.ajax({
		url: url,
		dataType:'json',
		async: false
	  }).done(function(data) {
	  	cambiaDatosGrafica(data.grafica);
		$.each( data.data, function( index, value ){
		  //Coordenadas de referencia en el mapa
		  var latlng = {lat: value.lat, lng: value.lng};

		  //Se construye el marker
		  var marker = new google.maps.Marker({
			position: latlng,
			map: map,
			title:'Seleccione para detalles'
		  });

		  //Codigo para el html del popup
		  var informacion = '<p>Detalle del Censo<br><b>Folio:</b>'+value.folio+'<br><b>Nombre(s):</b>'+value.nombre+'<br><b>Apellido Paterno:</b>'+value.apellido_paterno+'<br><b>Apellido Materno:</b>'+value.apellido_materno+'<br><b>Obs:</b>'+value.perdida+'</p>';

		  //Objeto de Infowindows
		  var infowindow = new google.maps.InfoWindow({
			content: informacion
		  });

		  //Se agrega evento para cada marker y muestre el popup
		  marker.addListener('click', function() {
			infowindow.open(map, marker);
		  });
		  markers.push(marker);
		});

	  });
	};

    function initMap() {
		var censos = {!! $censos !!};
		//Coordenadas de referencia para centrar el mapa
		var centro = {lat: 17.05, lng: -96.7167};

		//Se construye el mapa y se asigna al html
		map = new google.maps.Map(document.getElementById('mymap'), {
			zoom: 6,
			center: centro
		});

		//lista de puntos en el mapa
		$.each( censos, function( index, value ){
			//Coordenadas de referencia en el mapa
			var latlng = {lat: value.lat, lng: value.lng};

			//Se construye el marker
			var marker = new google.maps.Marker({
			  position: latlng,
			  map: map,
			  title:'Seleccione para ver detalles'
			});

			//Codigo para el html del popup
			var informacion = '<p>Detalle del Censo<br><b>Folio:</b>'+value.folio+'<br><b>Nombre(s):</b>'+value.nombre+'<br><b>Apellido Paterno:</b>'+value.apellido_paterno+'<br><b>Apellido Materno:</b>'+value.apellido_materno+'<br><b>Obs:</b>'+value.perdida+'</p>';

			//Objeto de Infowindows
			var infowindow = new google.maps.InfoWindow({
			  content: informacion
			});

			//Se agrega evento para cada marker y muestre el popup
			marker.addListener('click', function() {
			  infowindow.open(map, marker);
			});
			markers.push(marker);
		});      

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
			$('#municipio').append("<option value='0'>Selecciona ..</option>");

			$('#localidad').empty();
			$('#localidad').append("<option value='0'>Selecciona ..</option>");

			//Se pintan nuevos valores
			$.each(data,function(index,result){
			  $('#municipio').append("<option value='"+result.id_municipio+"'>"+result.nombre+"</option>");
			});
		  });
		});

		//Inician eventos para el mapa 
		                      
		//Evento onchange en Select de Municipios
		$('#municipio').on('change',function(){
		  //Se limpia el mapeo de markers
		  clearMarkersnAll();
		  
		  //Se obtiene id estado seleccionado
		  idMun = $(this).val();
		  pintaMarkers(idEstado, idMun, 0, "", map);
		  //Se pintan municipios por estado seleccionado
		  $.ajax({
			url: "/censo_mapa/estado/"+idEstado+"/municipio/"+idMun+"/localidad",
			dataType:'json',
			async: false
		  }).done(function(data) {
			//Se limpia valores de municipio
			$('#localidad').empty();
			$('#localidad').append("<option value='0'>Selecciona ..</option>");

			//Se pintan nuevos valores
			$.each(data,function(index,result){
			  $('#localidad').append("<option value='"+result.id_localidad+"'>"+result.nombre+"</option>");
			});
		  });
		});
		
		//Evento onchange en Select de localidad
		
		$('#localidad').on('change',function(){
		  //Se limpia el mapeo de markers
		  clearMarkersnAll();
		  idLoc = $(this).val();
		  pintaMarkers(idEstado, idMun, idLoc, "", map);
		});

		//Evento onchange en Select de perdida
		
		$('#perdida').on('change',function(){
			clearMarkersnAll();
			perdida = $(this).val();
			console.log("Perdida: "+perdida);
			pintaMarkers(idEstado, idMun, idLoc, perdida, map);
		});
    };


	//Graficas
	var ctx = document.getElementById("myChart");
	var myChart = new Chart(ctx, {
	  type: 'bar',
	  data: {
		labels: ["A", "B", "C"],
		datasets: [{
					  label: 'Total',
					  data: [20,18,27],
					  backgroundColor: [
						  'rgba(255, 99, 132, 0.2)',
						  'rgba(137,171,154, 0.2)',
						  'rgba(210,179,84, 0.2)',
						  
					  ],
					  borderColor: [
						  'rgba(255,99,132,1)',
						  'rgba(137,171,154, 1)',
						  'rgba(2210,179,84, 1)',
						  
					  ],
					  borderWidth: 1
			  		}]
	  		},
		options: {
			scales: {
			  yAxes: [{
				  ticks: {
					  beginAtZero:true
				  }
			  }]
			}
	  	}
	});
</script>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvucHqfJ864xctpm30yHZGJe8vdNHF-y8&callback=initMap">
</script>
@endsection