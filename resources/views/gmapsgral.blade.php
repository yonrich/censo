@extends('layouts.public')

@section('content')
  <div class="container">
    <div class="row"> 
          <div class="col-md-12">
            <h4><b>Georeferencía General de Censos Registrados</b></h4>
            <hr>
            <a class="btn btn-default btn-md active" href="{{ url('censos') }}">Regresar al Menú</a>
          </div>
  </div>

    <hr>

        <div class="col-md-12">
          <style type="text/css">
             #mymap {
                border:1px solid black;
                width: 100%;
                height: 650px;
               }
          </style>
         <div id="mymap"></div>
        </div>
  </div>

  <script type="text/javascript">
    function initMap() {
      var censos = {!! $censos !!};
      //Coordenadas de referencia para centrar el mapa
      var centro = {lat: 17.05, lng: -96.7167};
            //Se construye el mapa y se asigna al html
      var map = new google.maps.Map(document.getElementById('mymap'), {
        
        zoom: 8,
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
          title:'Censo'
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

      });  
    }
  </script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvucHqfJ864xctpm30yHZGJe8vdNHF-y8&callback=initMap">
  </script>
@endsection