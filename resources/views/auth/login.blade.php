<!DOCTYPE html>
    <html lang="{{ app()->getLocale() }}">
          <head>
              <meta charset="utf-8">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta name="viewport" content="width=device-width, initial-scale=1">

              <!-- CSRF Token -->
              <meta name="csrf-token" content="{{ csrf_token() }}">

              <title>{{ config('app.name', 'Laravel') }}</title>

              <!-- Styles -->
              <link href="{{ asset('css/app.css') }}" rel="stylesheet">
              <link rel="stylesheet" href="{{ url('css/mycustom.css') }}">
          </head>

     
<body>
        <p></p>

        <div class="container-fluid"> 
              <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                          <div class="panel panel-default">
                              
                              <div class="panel-heading">Modulo para el Censo</div>
                              <p>Autenticación de Usuario</p>
                                <div class="panel-body">                                                                             
                                      @if (count($errors) > 0)
                                           <div class="col-sm-12" >
                                                  <div class="alert alert-danger">
                                                      <strong>Whoops!</strong> Error de Accesso 
                                                      <ul>
                                                          @foreach ($errors->all() as $error)
                                                              <li>{{ $error }}</li>
                                                          @endforeach
                                                      </ul>
                                                  </div>
                                          
                                          @endif
                    
                      
                      <form class="form-horizontal" role="form" action="{{ url('/login') }}" method="post" >
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              
                              <div class="form-group">
                                <label class="col-md-4 control-label">E-Mail</label>
                                  <div class="col-md-6">
                                    <input type="text" name="email" placeholder="Correo Electrónico Institucional..." class="form-control">
                                  </div>
                              </div>

                            <div class="form-group">
                              <label class="col-md-4 control-label">Password</label>
                                  <div class="col-md-6">
                                    <input type="password" name="password" placeholder="Contraseña..." class="form-control">
                                  </div>
                            </div>
                            
                            <div class="form-group">
                              <div class="col-md-12">
                                
                                  <button type="submit" class="btn btn-success" style="left:inherit">Ingresar al Sistema</button>

                              </div>
                            </div>

                      </form>

                    </div>
              </div>
            </div>
            <!--<div class="row">
                <div style="color: #333;";>
                    <h4>...¿Problemas con el Acceso?...</h4>
                    <h4><strong>(55) 50809600</strong>   ext.9640</h4>
                    
                </div>
            </div>-->
        </div>
      </div>

 <!-- Enlazamos el js de Bootstrap, y otros plugins que usemos siempre al final antes de cerrar el body -->
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
  </body>

</html>
   



