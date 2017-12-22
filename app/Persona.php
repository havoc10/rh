<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Especialidad;
use App\Persona;
use App\TipoUsuario;
use App\Archivos;
use App\TipoArchivos;
use App\Educacion;
use App\ExperienciaLaboral;
use App\Logo;


class Persona extends Model 
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'persona';

  


        public function educacion()
      {
        return $this->hasMany('App\Educacion', 'idUsuario', 'id');
      }

        public function publicaciones()
      {
        return $this->hasMany('App\Publicaciones', 'idUsuario', 'id');
      }

          public function experiencia_laboral()
      {
        return $this->hasMany('App\ExperienciaLaboral', 'idUsuario', 'id');
      }

        public function archivosp()
      {
        return $this->hasMany('App\Archivos', 'idUsuario', 'id');
      }

  
        public function proyectos()
      {
        return $this->hasMany('App\Proyectos', 'idUsuario', 'id');
      }

        public function delaespec()
      {
        return $this->hasOne('App\Especialidad', 'id', 'especialidad');
      }

       public function logocv()
      {
        return $this->hasOne('App\Logo', 'id', 'logo');
      }

   

      public function scopeBusqueda($query,$pais,$dato="")
     {

            if($pais==0){ 
            $resultado= $query->where('nombres','like','%'.$dato.'%')
                              ->orWhere('especialidad','like', '%'.$dato.'%')
                               ->orWhere('email','like', '%'.$dato.'%');
            }
            else{
               
               //select * from users where pais = $pais  and (nombres like %$dato% or apellidos like %$dato%  or email like  %$dato% )
              $resultado= $query->where("especialidad","=",$pais)
                                  ->Where(function($q) use ($pais,$dato)  {
                                    $q->where('nombres','like','%'.$dato.'%')
                                      ->orWhere('apellidos','like', '%'.$dato.'%')
                                      ->orWhere('email','like', '%'.$dato.'%');       
                                   });

             }                     
        
        return  $resultado;
     }


     





}
