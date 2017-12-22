<?php namespace App\Http\Controllers;

use App\User;
use App\Persona;
use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Excel;
use PdfMerger;
use App\Especialidad;
use App\Logo;
use App\TipoUsuario;
use App\Educacion;
use App\TipoEducacion;
use App\Publicaciones;
use App\TipoPublicaciones;
use App\Proyectos;
use App\Http\Requests\UsuarioRequest;
use Illuminate\Http\JsonResponse;


class PersonaController extends Controller {

   public function __construct()
	{
		$this->middleware('auth');
	}


   public function form_nuevo_usuario()
	{
        
     $especialidad=Especialidad::all();
     $logo=Logo::all();
	  return view('formularios.form_nuevo_usuario')->with("especialidad",$especialidad)
	  																->with("logo",$logo);
	}


	public function listado_usuarios()
    {	
    	$usuarioactual=\Auth::user();
    	$especialidades=Especialidad::all();
        $usuarios= Persona::paginate(15);  
        return view('listados.listado_usuarios')
        ->with("especialidades", $especialidades)
        ->with("usuarios", $usuarios)
        ->with("usuario_actual", $usuarioactual );      
	}


	//presenta el formulario para nuevo usuario
	public function agregar_nuevo_usuario(UsuarioRequest $request)
	{

      $data=$request->all();

      $persona= new Persona;
		$persona->nombres  =  $data["nombres"];
		$persona->apellidos=$data["apellidos"];
		$persona->edad=$data["edad"];
		$persona->sexo=$data["sexo"];
		$persona->email=$data["email"];
		$persona->telefono=$data["telefono"];
		$persona->estado_civil=$data["estado_civil"];
		$persona->nacionalidad=$data["nacionalidad"];
		$persona->conduce=$data["conduce"];
		$persona->pasaporte=$data["pasaporte"];
		$persona->especialidad=$data["especialidad"];
		$persona->calle=$data["calle"];
		$persona->numero=$data["numero"];
		$persona->colonia=$data["colonia"];
		$persona->ciudad=$data["ciudad"];
		$persona->estado=$data["estado"];
		$persona->cp=$data["cp"];
		$persona->logo=$data["logo"];
		$resul= $persona->save();

		if($resul){
         return view("mensajes.msj_correcto")->with("msj","Usuario Registrado Correctamente");   
		}
		else
		{
        return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  
		}
	}

//leccion 7
		public function form_editar_usuario($id)
	{
		//funcion para cargar los datos de cada usuario en la ficha
		$especialidades=Especialidad::all();
		$logo=Logo::all();
		$usuario=Persona::find($id);
		$contador=count($usuario);
		
		if($contador>0){          
         return view("formularios.form_editar_usuario")
               ->with("usuario",$usuario)
               ->with("logo", $logo)
               ->with("especialidades",$especialidades);
		}
		else
		{            
         return view("mensajes.msj_rechazado")->with("msj","el usuario con ese id no existe o fue borrado");  
		}
	}




		public function editar_usuario(Request $request)
	{

      $data=$request->all();
		$idUsuario=$data["id_usuario"];
		$persona=Persona::find($idUsuario);
      $persona->nombres=$data["nombres"];
		$persona->apellidos=$data["apellidos"];
		$persona->edad=$data["edad"];
		$persona->sexo=$data["sexo"];
		$persona->email=$data["email"];
		$persona->telefono=$data["telefono"];
		$persona->estado_civil=$data["estado_civil"];
		$persona->nacionalidad=$data["nacionalidad"];
		$persona->conduce=$data["conduce"];
		$persona->pasaporte=$data["pasaporte"];
		$persona->especialidad=$data["especialidad"];
		$persona->calle=$data["calle"];
		$persona->numero=$data["numero"];
		$persona->colonia=$data["colonia"];
		$persona->ciudad=$data["ciudad"];
		$persona->estado=$data["estado"];
		$persona->cp=$data["cp"];
		$persona->logo=$data["logo"];
		$resul= $persona->save();

		if($resul){            
            return view("mensajes.msj_correcto")->with("msj","Datos actualizados Correctamente");   
		}
		else
		{            
            return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  
		}
	}

	public function subir_imagen_usuario(Request $request)
	{
	    $id=$request->input('id_usuario_foto');
		 $archivo = $request->file('archivo');
        $input  = array('image' => $archivo) ;
        $reglas = array('image' => 'required|image|mimes:jpeg,jpg,bmp,png,gif|max:900');
        $validacion = Validator::make($input,  $reglas);
        if ($validacion->fails())
        {
          return view("mensajes.msj_rechazado")->with("msj","El archivo no es una imagen valida");
        }
        else
        {

	      $nombre_original=$archivo->getClientOriginalName();
			$extension=$archivo->getClientOriginalExtension();
			$nuevo_nombre="userimagen-".$id.".".$extension;
		    $r1=Storage::disk('fotografias')->put($nuevo_nombre,  \File::get($archivo) );
		    $rutadelaimagen="storage/fotografias/".$nuevo_nombre;
	    
		    if ($r1){
			    $usuario=Persona::find($id);
			    $usuario->imagenurl=$rutadelaimagen;
			    $r2=$usuario->save();
		        return view("mensajes.msj_correcto")->with("msj","Imagen agregada correctamente");
		    }
		    else
		    {
		    	return view("mensajes.msj_rechazado")->with("msj","no se cargo la imagen");
		    }

        }	

	}


	public function cambiar_password(Request $request){
       $email=$request->input("email_usuario");
       $usuariactual=\Auth::user();
        
      if($usuariactual->email != $email ){
		
		$reglas = array('email_usuario' => 'required|Email|Unique:users,email');
		$mensajes = array('email_usuario.unique' => 'El email ingresado ya esta en uso en la base de datos');
      $this->validate($request,$reglas, $mensajes);
      }
		$id=$request->input("id_usuario_password");
		$email=$request->input("email_usuario");
		$password=$request->input("password_usuario");
		$usuario=User::find($id);
	   $usuario->email=$email;
	   $usuario->password=bcrypt($password);
	   $r=$usuario->save();

	    if($r){
           return view("mensajes.msj_correcto")->with("msj","password actualizado");
	    }
	    else
	    {
	    	return view("mensajes.msj_rechazado")->with("msj","Error al actualizar el password");
	    }
	}

	public function form_cargar_datos_usuarios(){
       return view("formularios.form_cargar_datos_usuarios");
	}

    public function cargar_datos_usuarios(Request $request)
	{
       $archivo = $request->file('archivo');
       $nombre_original=$archivo->getClientOriginalName();
	   $extension=$archivo->getClientOriginalExtension();
       $r1=Storage::disk('archivos')->put($nombre_original,  \File::get($archivo) );
       $ruta  =  storage_path('archivos') ."/". $nombre_original;
       
       if($r1){
       	    $ct=0;
            Excel::selectSheetsByIndex(0)->load($ruta, function($hoja) {
		        
		        $hoja->each(function($fila) {
			        $usersemails=Persona::where("email","=",$fila->email)->first();
			        if(count( $usersemails)==0){
				      	$usuario=new Persona;
				        $usuario->nombres= $fila->nombres;
				        $usuario->apellidos= $fila->apellidos;
				        $usuario->email= $fila->email;
				        $usuario->telefono= $fila->telefono; //este campo llamado telefono se debe agregar en la base de datos c
				        $usuario->pais= $fila->pais;
				        $usuario->ciudad= $fila->ciudad;
				        $usuario->institucion= $fila->institucion;
		              $usuario->ocupacion= $fila->ocupacion;
		              $usuario->password= bcrypt($fila->password);
		              $usuario->save();
	                }
		        });

            });

            return view("mensajes.msj_correcto")->with("msj"," Usuarios Cargados Correctamente");
       }
       else
       {
       	    return view("mensajes.msj_rechazado")->with("msj","Error al subir el archivo");
       }

	}


	public function form_educacion_usuario(){
       return view("formularios.form_educacion_usuario");
	}


	public function buscar_usuarios($pais,$dato="")
   {
        
        $usuarioactual=\Auth::user();
        $usuarios= Persona::Busqueda($pais,$dato)->paginate(25);  
        $especialidades=Especialidad::all();
        $espec_sel=$especialidades->find($pais);
        return view('listados.listado_usuarios')
        ->with("especialidades", $especialidades )
        ->with("espec_sel", $espec_sel )
        ->with("usuarios", $usuarios )
        ->with("usuario_actual", $usuarioactual );       
	}


   public function info_datos_usuario($id)
	{
		//funcion para cargar los datos de cada usuario en la ficha
		$usuario=User::find($id);
		$contador=count($usuario);
		$tiposusuario=TipoUsuario::all();
        $tiposeducacion=TipoEducacion::all();
        $educacion= $usuario->educacion();
        $tipopublicaciones=TipoPublicaciones::all();
        $publicaciones= $usuario->publicaciones();
        $rutaarchivos= "storage/archivos/";
        $proyectos= $usuario->proyectos();
        $rutaarchivos2= "storage/archivos/";
		
		if($contador>0){          
            return view("standard.info_datos_usuario")
                   ->with("usuario",$usuario)
                   ->with("tiposusuario",$tiposusuario)
                    ->with("tiposeducacion",$tiposeducacion)
                   ->with("educacion",$educacion)
                    ->with("tipopublicaciones", $tipopublicaciones)
                    ->with("publicaciones",$publicaciones) 
                    ->with("rutaarchivos",$rutaarchivos)
                    ->with("proyectos",$proyectos) 
                    ->with("rutaarchivos2",$rutaarchivos2); 
		}
		else
		{            
         return view("mensajes.msj_rechazado")->with("msj","el usuario con ese id no existe o fue borrado");  
		}
	}



	public function mostrar_errores(){
      return view("mensajes.msj_rechazado")->with("msj","Existen errores de validacion");
	}


	public function borrar_usuario(Request $request)
	{

	   $data=$request->all();
		$idUsuario=$data["id_usuario"];
		$persona=Persona::find($idUsuario);
		$persona->estatus=$data["estatus"];
		$resul= $persona->save();

		if($resul){            
         return view("mensajes.msj_correcto")->with("msj","Datos actualizados Correctamente");   
		}
		else
		{            
         return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  
		}
	}




}