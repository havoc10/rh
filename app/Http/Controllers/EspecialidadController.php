<?php namespace App\Http\Controllers;

use App\User;
use App\Persona;
use App\Especialidad;
use PdfMerger;
use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UsuarioRequest;
use Illuminate\Http\JsonResponse;


class EspecialidadController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
   public function __construct()
	{
		$this->middleware('auth');
	}


   public function get_especialidad()
	{
		$especialidades=Especialidad::all();
		return view('formularios.form_nueva_especialidad') ->with("especialidades", $especialidades);
	}


	public function add_especialidad(Request $request){
    $this->validate($request, [
        'nombre_especialidad' => 'required',
    ]);

    $user = new Especialidad;
    $user->nombre = $request->input('nombre_especialidad');
    $resul = $user->save();

	if($resul){
            return view("mensajes.msj_correcto")->with("msj","Especialidad Registrada Correctamente");   
		}
		else
		{
             
            return view("mensajes.msj_rechazado")->with("msj","Hubo un error vuelva a intentarlo");  

		}

	}


	public function delete_especialidad($id){
	
	$especialidad=Especialidad::find($id);
	$resul=$especialidad->delete();

        if($resul){            
            return view("mensajes.msj_correcto")->with("msj","Borrado correctamente");   
        }
        else
        {            
             return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  
        }

	}

   
  

	



}