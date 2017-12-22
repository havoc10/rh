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

//rutas accessibles slo si el usuario no se ha logueado
Route::group(['middleware' => 'guest'], function () {
  Route::get('login', 'Auth\AuthController@getLogin');
  Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin']); 
  // Registration routes...
  Route::get('register', 'Auth\AuthController@getRegister');
  Route::post('register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);
});

//rutas accessibles solo si el usuario esta autenticado y ha ingresado al sistema
Route::group(['middleware' => 'auth'], function () {

	Route::get('/', 'HomeController@index');
  Route::get('home', 'HomeController@index');
  Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
  Route::get('listado_usuarios/{page?}', 'PersonaController@listado_usuarios');
  Route::get('listado_especialidades', 'EspecialidadController@listado_especialidades');
	// Route::get('listado_publicaciones/{id?}', 'PublicacionesController@listado_publicaciones');
	// Route::get('descargar_publicacion/{id}', 'PublicacionesController@descargar_publicacion');
	Route::get('buscar_usuarios/{especialidad}/{dato?}', 'PersonaController@buscar_usuarios');
	//   //leccion 13
 //  Route::get('form_enviar_correo', 'CorreoController@crear');
 //  Route::post('enviar_correo', 'CorreoController@enviar');
 //  Route::post('cargar_archivo_correo', 'CorreoController@store');

  // Route::get('reportes', 'PdfController@index');
  Route::get('verpdf', 'PdfController@ver');


  Route::get('crear_pdf/{tipo}/{id}', 'PdfController@crear_pdf');
 //  Route::get('listado_graficas', 'GraficasController@index');
 //  Route::get('grafica_registros/{anio}/{mes}', 'GraficasController@registros_mes');
 //  Route::get('grafica_publicaciones', 'GraficasController@total_publicaciones');
 //  Route::get('/mostrar_errores', 'PersonaController@mostrar_errores');

    

});


//rutas accessibles solo para el usuario administrador

Route::group(['middleware' => 'usuarioAdmin'], function () {
      
      Route::get('form_nuevo_usuario', 'PersonaController@form_nuevo_usuario');
      Route::post('agregar_nuevo_usuario', 'PersonaController@agregar_nuevo_usuario');
      Route::get('form_editar_usuario/{id}', 'PersonaController@form_editar_usuario');
      Route::post('editar_usuario', 'PersonaController@editar_usuario');
      Route::post('subir_imagen_usuario', 'PersonaController@subir_imagen_usuario');
      Route::post('cambiar_password', 'PersonaController@cambiar_password');
      
      Route::get('form_nueva_especialidad', 'EspecialidadController@get_especialidad');
      Route::post('form_add_especialidad', 'EspecialidadController@add_especialidad');
      Route::get('borrar_especialidad/{id}', 'EspecialidadController@delete_especialidad');
      //leccion 9
      // Route::get('form_cargar_datos_usuarios', 'PersonaController@form_cargar_datos_usuarios');
      // Route::post('cargar_datos_usuarios', 'PersonaController@cargar_datos_usuarios');
      // //leccion 10
      Route::get('form_educacion_usuario/{id}', 'EducacionController@form_educacion_usuario');
      Route::post('agregar_educacion_usuario', 'EducacionController@agregar_educacion');
      Route::get('borrar_educacion/{id}', 'EducacionController@borrar_educacion');
      Route::post('borrar_usuario', 'PersonaController@borrar_usuario');

      //leccion 11
      // Route::get('form_publicaciones_usuario/{id}', 'PublicacionesController@form_publicaciones_usuario');
      // Route::post('agregar_publicacion_usuario', 'PublicacionesController@agregar_publicacion');
      // Route::get('borrar_publicacion/{id}', 'PublicacionesController@borrar_publicacion');


      Route::get('form_archivos_persona/{id}', 'ArchivosController@form_archivos_persona');
      Route::post('agregar_archivos_persona', 'ArchivosController@agregar_archivos');
      Route::get('borrar_archivo/{id}', 'ArchivosController@borrar_archivo');
      

      Route::get('form_experiencia_laboral_usuario/{id}', 'ExperienciaLaboralController@form_experiencia_laboral_usuario');
      Route::post('agregar_experiencia_laboral_usuario', 'ExperienciaLaboralController@agregar_experiencia_laboral');
      Route::get('borrar_experiencia_laboral/{id}', 'ExperienciaLaboralController@borrar_experiencia_laboral');
      Route::get('unirpdf/{id}/{tipo}', 'PdfController@unirpdf');

      //leccion 11 repetida
  	  // Route::get('form_proyectos_usuario/{id}', 'ProyectosController@form_proyectos_usuario');
  	  // Route::post('agregar_proyectos_usuario', 'ProyectosController@agregar_proyectos_usuario');
  	  // Route::get('borrar_proyecto/{id}', 'ProyectosController@borrar_proyecto');


});




Route::group(['middleware' => 'usuarioStandard'], function () {	
     
    Route::get('info_datos_usuario/{id}', 'PersonaController@info_datos_usuario');

});










