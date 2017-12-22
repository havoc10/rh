<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Storage;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Persona;
use App\Publicaciones;
use App\TipoPublicaciones;
use App\Archivos;
use App\TipoArchivos;




class ArchivosController extends Controller
{
    
        public function __construct()
    {
        $this->middleware('auth');
    }

    
            //leccion 11

    public function form_archivos_persona($id){

       $usuario=Persona::find($id);
       $tipoarchivos=TipoArchivos::all();
       $archivos= $usuario->archivosp();
       $rutaarchivos= "storage/archivos/";

       return view("formularios.form_archivos_persona")
       ->with("usuario",$usuario)
       ->with("tipoarchivos", $tipoarchivos)
       ->with("archivos",$archivos) 
       ->with("rutaarchivos",$rutaarchivos);

    }

 
    public function agregar_archivos(Request $request ){
         //funcion para agregar la publicacion de cada usuario

    	  $archivo = $request->file('file');
    	  $input  = array('file' => $archivo) ;
        $reglas = array('file' => 'required|mimes:pdf|max:50000');  //recordar que para activar mimes se debe descomentar la linea de codigo  'extension=php_fileinfo.dll' del php.ini
        $validacion = Validator::make($input,  $reglas);
        if ($validacion->fails())
        {
          return view("mensajes.msj_rechazado")->with("msj","El archivo no es un pdf o es demasiado Grande para subirlo");
        }
        else
        {
	         $publicacion= new Archivos;
	         $publicacion->idUsuario= $request->input("id_usuario");
	         $publicacion->idTipoArchivo= $request->input("tipo_publicacion");
	         $publicacion->nombre=$request->input("nombre");
           $carpeta=$request->input("tipo_publicacion");
	         $ruta=$carpeta."/".$request->input("id_usuario")."_".$archivo->getClientOriginalName();
		       $r1=Storage::disk('archivos')->put($ruta,  \File::get($archivo) );
           $publicacion->ruta=$ruta;
           $resul= $publicacion->save();

	        if($resul){            
	            return view("mensajes.msj_correcto")->with("msj","Archivo Agregado Correctamente");   
	        }
	        else
	        {            
	             return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  
	        }

         }
    }

    public function borrar_archivo($id){
      $archivo=Archivos::find($id);
      $path=$archivo->ruta;
      \File::Delete('storage/archivos/'.$path);     
      $resul=$archivo->delete();
     
      if($resul){            
          return view("mensajes.msj_correcto")->with("msj","Borrado correctamente");   
      }
      else
      {            
           return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  
      }

    }


       public function listado_publicaciones($id){

         $publicaciones=Publicaciones::paginate(25);
         $rutaarchivos= "storage/archivos/";
         return view("listados.listado_publicaciones")
         ->with("publicaciones", $publicaciones)
         ->with("rutaarchivos", $rutaarchivos);      
       }

       public function descargar_publicacion($id){

         $publicacion=Publicaciones::find($id);
         $rutaarchivo= "storage/archivos/".$publicacion->ruta;
         return response()->download($rutaarchivo);

       }


}