<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource("control-vehicular","ControlVehicular\ControlVehicularController");
Route::post('ConfirmarVehiculo',['as'=>'modificarVehiculo','uses'=>'ControlVehicular\ControlVehicularController@update']);
Route::resource("bitacora","ControlVehicular\BitacoraController");
Route::post('bitacoraEntrada',['as'=>'bitacoraEntrada','uses'=>'ControlVehicular\BitacoraController@update']);
Route::post('agregarFolio',['as'=>'agregarFolio','uses'=>'ControlVehicular\BitacoraController@guardarFolio']);
Route::post('mandarCorreo',['as'=>'mandarCorreo','uses'=>'ControlVehicular\BitacoraController@mandarCorreo']);
Route::get('historialBitacora',['as'=>'historialBitacora','uses'=>'ControlVehicular\BitacoraController@historial']);
Route::post('buscar_historial',['as'=>'buscar_historial','uses'=>'ControlVehicular\BitacoraController@buscarHistorial']);
Route::resource("usuarios","Usuarios\UsuarioController");
Route::post('eliminarUsuario',['as'=>'eliminarUsuario','uses'=>'Usuarios\UsuarioController@destroy']);
Route::resource("empleados","Usuarios\EmpleadoController");
Route::resource("roles","Roles\RolController");
Route::post("agregarRol",['as'=>'agregarRol','uses'=>'Roles\RolController@update']);
Route::post("eliminarPermisoRol",['as'=>'eliminarPermisoRol','uses'=>'Roles\RolController@eliminarPermisoRol']);
Route::post("agregarPermiso",['as'=>'agregarPermiso','uses'=>'Roles\RolController@update']);
Route::resource("permisos","Permisos\PermisoController");

//para buscar datos de otras tablas
Route::get('/buscarEmail/{userId?}',['as' => 'buscarEmail', 'uses' => 'Usuarios\UsuarioController@buscarEmail']);
Route::get('/buscarauto/{auto?}',['as' => 'buscarauto', 'uses' => 'ControlVehicular\ControlVehicularController@buscarauto']);

//editar 
Route::post('ConfirmarEmpleado',['as'=>'modificarEmpleado','uses'=>'Usuarios\EmpleadoController@update']);
Route::post('modificartipo',['as'=>'modificartipo','uses'=>'Catalogos\TipoUsuariosController@update']);
Route::post('modificarMarca',['as'=>'modificarMarca','uses'=>'ControlVehicular\MarcaController@update']);
Route::post('modificarpuesto',['as'=>'modificarpuesto','uses'=>'Catalogos\PuestosController@update']);
Route::post('modificardepa',['as'=>'modificardepa','uses'=>'Catalogos\DepartamentoController@update']);
Route::post('modificardUni',['as'=>'modificardUni','uses'=>'Catalogos\UnidadController@update']);
Route::post('modificarChofer',['as'=>'modificarChofer','uses'=>'ControlVehicular\ChoferController@update']);
Route::post('modificarPermiso',['as'=>'modificarPermiso','uses'=>'Permisos\PermisoController@update']);
Route::post('modificar.Usuario',['as'=>'modificarUsuario','uses'=>'Usuarios\UsuarioController@update']);
Route::POST('guardar-asignacion',['as'=>'asignacion.save','uses'=>'ControlVehicular\ControlVehicularController@saveAsignacion']);
Route::post('modificar.poliza',['as'=>'modificar-poliza','uses'=>'ControlVehicular\PolizaController@update']);
Route::post('modificar.solicitud',['as'=>'modificar-solicitud','uses'=>'Solicitud\SolicitudController@update']);


Route::get('detalle-bitacora/{id}',['as'=>'detalle.bitacora','uses'=>'ControlVehicular\BitacoraController@detalle']);

//Niveles Geografcos
Route::get('estado/{estado}/municipio',['as'=>'estado.municipio','uses'=>'Municipio\MunicipioController@municipiosEstado']);
Route::get('estado/{estado}/municipio/{municipio}/localidad',['as'=>'estado.municipio.localidad','uses'=>'Localidad\LocalidadController@localidadesMunicipio']);
Route::get('asignacion-vehiculo/{id}',['as'=>'asignacion.vehiculo','uses'=>'ControlVehicular\ControlVehicularController@asignarauto']);

//Catalogos
Route::resource('catalogos', 'Catalogos\CatalogosController');
Route::resource('tipoUsuarios', 'Catalogos\TipoUsuariosController');
Route::resource('catalogo-vehiculos', 'Catalogos\CatalogosVController'); 
Route::resource('Marca', 'ControlVehicular\MarcaController');
Route::resource('Rpuestos', 'Catalogos\PuestosController');
Route::resource('Departamentos', 'Catalogos\DepartamentoController');
Route::resource('Unidad', 'Catalogos\UnidadController');
Route::resource('Chofer', 'ControlVehicular\ChoferController');
Route::resource('Polizas', 'ControlVehicular\PolizaController');
Route::resource("empleados1","Usuarios\EmpleadoController");
Route::resource("solicitud","Solicitud\SolicitudController");

//Filtros de busqueda
Route::post('buscar_bitacora', 'ControlVehicular\BitacoraController@buscar_bitacora');
Route::post('buscar_vehiculo', 'ControlVehicular\ControlVehicularController@buscar_vehiculo');
Route::post('buscar_empleado', 'Usuarios\EmpleadoController@buscar_empleado');
Route::post('buscar_marca', 'ControlVehicular\MarcaController@buscar_marca');
Route::post('buscar_tipo', 'Catalogos\TipoUsuariosController@buscar_tipo');
Route::post('buscar_puesto', 'Catalogos\PuestosController@buscar_puesto');
Route::post('buscar_depa', 'Catalogos\DepartamentoController@buscar_depa');
Route::post('buscar_Chofer', 'ControlVehicular\ChoferController@buscar_Chofer');

//excel
Route::get('downloadExcel/{type}', 'ControlVehicular\ControlVehicularController@downloadExcel');
Route::get('sub-marcas/{marca}',['as'=>'sub-marcas','uses'=>'ApiSubmarcaController@buscarSubmarca']);
Route::GET('empleados1/{empleados1}/edit',['as'=>'empleados1.edit','uses'=>'Usuarios\EmpleadoController@edit']);
Route::GET('empleados/{empleados}/edit',['as'=>'empleados.edit','uses'=>'Usuarios\EmpleadoController@edit']);

//eliminar
Route::GET("eliminarMarca/{id}",['as'=>'eliminarMarca','uses'=>'ControlVehicular\MarcaController@destroy']);
Route::GET('eliminar.nivel/{id}',['as'=>'eliminar-nivel','uses'=>'Catalogos\TipoUsuariosController@destroy']);
Route::GET('eliminar.bitacora/{id}',['as'=>'eliminar-bitacora','uses'=>'ControlVehicular\BitacoraController@destroy']);
Route::GET('eliminar.vehiculo/{id}',['as'=>'eliminar-vehiculo','uses'=>'ControlVehicular\ControlVehicularController@destroy']);
Route::GET('eliminar.chofer/{id}',['as'=>'eliminar-chofer','uses'=>'ControlVehicular\ChoferController@destroy']);
Route::GET('eliminar.departamento/{id}',['as'=>'eliminar-departamento','uses'=>'Catalogos\DepartamentoController@destroy']);
Route::GET('eliminar.Puesto/{id}',['as'=>'eliminar-Puesto','uses'=>'Catalogos\PuestosController@destroy']);

Route::GET('eliminar.Poliza/{id}',['as'=>'eliminar-Poliza','uses'=>'ControlVehicular\PolizaController@destroy']);
Route::GET('eliminar.Solicitud/{id}',['as'=>'eliminar-Solicitud','uses'=>'Solicitud\SolicitudController@destroy']);
Route::GET('eliminar.Unidad/{id}',['as'=>'eliminar-Unidad','uses'=>'Catalogos\UnidadController@destroy']);

//Menu dinamico
Route::get('menu','HomeController@menu');
Route::GET('eliminar.Empleado/{id}',['as'=>'eliminar-Empleado','uses'=>'Usuarios\EmpleadoController@destroy']);
//autocomplete
Route::get('solicitud/search/autocomplete', 'Solicitud\SolicitudController@autocomplete');
Route::get('Chofer/search/autocomplete', 'ControlVehicular\ChoferController@autocomplete');
Route::get('usuarios/search/autocomplete', 'Usuarios\UsuarioController@autocomplete');


//Iván

Route::resource("personas","Usuarios\PersonaController");

Route::resource("censos", "Usuarios\CensoController");
Route::resource("estudios", "Usuarios\EstudioController");
//Route::get("estudios/{id}", "Usuarios\EstudioController");

Route::get("estudios.createEstudio/{id}", "Usuarios\EstudioController@createEstudio");
//Route::post("estudios-censo/{id}", "Usuarios\EstudioController");

//Route::post('ConfirmarEstudio',['as'=>'modificarEstudio','uses'=>'Usuarios\EstudioController@update']);

Route::GET('eliminar.Censo/{id}',['as'=>'eliminar-Censo','uses'=>'Usuarios\CensoController@destroy']);
Route::post('ConfirmarCenso',['as'=>'modificarCenso','uses'=>'Usuarios\CensoController@update']);

Route::get('gmaps', 'HomeController@gmaps');

Route::get('gmapsgral', 'HomeController@gmapsgral');

Route::get('censo/{id_edo}/municipio/{id_municipio}', 'Usuarios\CensoController@censoEstadoMunicipio');

Route::get('censo/{id_edo}/municipio/{id_municipio}/localidad/{id_localidad}', 'Usuarios\CensoController@censoEstadoMunicipioLocalidad');

Route::get('censo/{id_edo}/municipio/{id_municipio}/localidad/{id_localidad}/perdida/{perdida}', 'Usuarios\CensoController@censoPerdida');

// datatable
route::get('api/empleados', function(){
     return Datatables::eloquent(App\Empleados::query())->make(true);

 });