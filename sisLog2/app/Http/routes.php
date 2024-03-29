<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('auth/login');
});


Route::auth();

Route::get('/home', 'HomeController@index');

//Route::resource('seguridad/usuario','UsuarioController');

Route::group(['middleware' => 'usuarioAdmin'], function () {
	Route::resource('seguridad/usuario','UsuarioController');

	//para hacer un grupo de rutas de recursos con las peticiones index,update,edit,cretae,etc
	Route::resource('clinica/medico','MedicoController');

    
	//Route::resource('clinica','IndiceController');
	Route::resource('seguridad','IndiceController@index2');

    


  
     
    


});

Route::group(['middleware' => 'usuarioEstrategico'], function () {
	

	//para hacer un grupo de rutas de recursos con las peticiones index,update,edit,cretae,etc
	Route::resource('clinica/paciente','PacienteController');
	Route::resource('clinica/examen','ExamenController');
	Route::resource('clinica/incapacidad','IncapacidadController');
	Route::resource('clinica/cita','CitaController');
	Route::resource('clinica/consulta','ConsultaController');
	Route::resource('clinica/pago','PagoController');
	Route::resource('clinica/receta','RecetaController');
    Route::resource('clinica/infoReceta','InforeceController');


	Route::resource('estrategico','IndiceController@index');
});

Route::group(['middleware' => 'usuarioTactico'], function () {
	

	//para hacer un grupo de rutas de recursos con las peticiones index,update,edit,cretae,etc
	
	Route::resource('clinica/pago','PagoController');
	Route::resource('clinica/receta','RecetaController');
    Route::resource('clinica/infoReceta','InforeceController');
	Route::resource('clinica/ingresos','IngresoController');
    
    Route::resource('tactico/vehiculo','VehiculoController');
    Route::resource('tactico/tecnico','TecnicoController');


	Route::resource('tactico','IndiceController@index3');
});

