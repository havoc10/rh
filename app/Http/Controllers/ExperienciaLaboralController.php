<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Persona;
use App\ExperienciaLaboral;
use Carbon\Carbon;



class ExperienciaLaboralController extends Controller
{
    
       public function __construct()
    {
        $this->middleware('auth');
    }

            //leccion 11

    public function form_experiencia_laboral_usuario($id){

       $usuario=Persona::find($id);
       $experiencia_laboral= $usuario->experiencia_laboral()->orderBy('inicio_labores', 'desc');

       return view("formularios.form_experiencia_laboral_usuario")
       ->with("usuario",$usuario)
       ->with("experiencia_laboral",$experiencia_laboral);

    }

 
    public function agregar_experiencia_laboral(Request $request){
         //funcion para agregar la experiencia laboral de cada usuario

       $experiencia_laboral= new ExperienciaLaboral;
       $experiencia_laboral->idUsuario= $request->input("id_usuario");
       $experiencia_laboral->puesto=$request->input("puesto_explab");
       $experiencia_laboral->empresa=$request->input("empresa_explab");
       $experiencia_laboral->lugar=$request->input("lugar_explab");
       $experiencia_laboral->inicio_labores=$request->input("inicio_labores_explab");
       $experiencia_laboral->fin_labores=$request->input("fin_labores_explab");
       $experiencia_laboral->actividades=$request->input("actividades_explab");

       $resul=$experiencia_laboral->save();

      if($resul){            
          return view("mensajes.msj_correcto")->with("msj","Experiencia Laboral Agregada Correctamente");   
      }
      else
      {            
           return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  
      }

    }

    public function borrar_experiencia_laboral($id){

       $experiencia_laboral=ExperienciaLaboral::find($id);
       $resul=$experiencia_laboral->delete();
        if($resul){            
            return view("mensajes.msj_correcto")->with("msj","Borrado correctamente");   
        }
        else
        {            
             return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  
        }

    }



}