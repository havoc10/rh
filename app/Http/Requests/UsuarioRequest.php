<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Redirect;

class UsuarioRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
      * @param  array  $errors
     * @return \Symfony\Component\HttpFoundation\Response
     */

   

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                        'nombres' => 'required|string',
                        'apellidos' => 'required|string',
                        'edad' =>   'required|numeric|min:20|max:99',
                        'email' =>   'required|email|unique:persona',
                        'telefono' =>   'required|numeric|min:999999999|max:9999999999999',
                        'nacionalidad' => 'required|string',
                        'ciudad' => 'required|string',
                        'conduce' => 'required',
                        'calle' => 'required|string',
                        'colonia' => 'required|string',
                        'numero' => 'numeric|min:1|max:9999',
                        'estado' => 'required|string',
                        'cp' => 'numeric|min:9999|max:99999',
                      
              ];
    }


       public function messages()
    {
        return [
                         
                         'nombres.required' =>  'Ingresar <span class="label label-danger">Nombres</span> es obligatorio',
                         'nombres.string' =>  'Nombres debe contener solo letras',
                         'apellidos.required' =>  'Ingresar <span class="label label-danger">Apellidos</span> es obligatorio',
                         'apellidos.string' =>  'Apellidos debe contener solo letras',
                        
                         'edad.required' =>  'Ingresa una <span class="label label-danger">Edad</span>',
                         'edad.numeric' =>  'Edad debe ser numérico',
                         'edad.min' =>  'El campo <span class="label label-danger">Edad</span> debe contener al menos 2 digitos',
                         'edad.max' =>  'El campo <span class="label label-danger">Edad</span> debera tener hasta 2 digitos maximo',

                         'email.required' =>  'Ingresar <span class="label label-danger">Email</span>es obligatorio',
                         'email.email' =>  'El <span class="label label-danger">email</span> debe tener un formato valido',

                         'telefono.required' =>  'Ingresar <span class="label label-danger">Teléfono</span> es obligatorio',
                         'telefono.numeric' =>  'El campo <span class="label label-danger">Teléfono</span> debe ser numérico',
                         'telefono.min' =>  'El campo <span class="label label-danger">teléfono</span> debe tener al menos 10 digitos',
                         'telefono.max' =>  'El campo <span class="label label-danger">telefono</span> debe ser menor de 14 digitos',

                         'ciudad.required' =>  'Ingresar <span class="label label-danger">Ciudad</span> es obligatorio',
                         'ciudad.string' =>  'La <span class="label label-danger">ciudad</span>no puede contener numeros en su nombre',

                         'nacionalidad.required' =>  'Ingresar <span class="label label-danger">Nacionalidad</span> es obligatorio',
                         'conduce.required' =>  'Ingresar <span class="label label-danger">Conduce</span> es obligatorio',
                         'calle.required' =>  'Ingresar <span class="label label-danger">Calle</span> es obligatorio',
                         'calle.alpha' =>  'El campo <span class="label label-danger">calle</span> no debe contener numeros',
                         'colonia.required' =>  'Ingresar <span class="label label-danger">Colonia</span> es obligatorio',
                         'colonia.alpha' =>  'El campo <span class="label label-danger">colonia</span> no debe contener numeros  ',
                         'numero.numeric' =>  'El <span class="label label-danger">numero</span> debera ser numérico',
                         'numero.min' =>  'El <span class="label label-danger">numero</span> debera contener al menos 1 digito',
                         'numero.max' =>  'El <span class="label label-danger">numero</span> debera ser maximo de 4 digitos',
                         'estado.required' =>  'Ingresar estado es obligatorio',
                         'estado.string' =>  '<span class="label bg-red"> El campo estado no debe contener numeros </span> ',
                         'cp.numeric' =>  'El campo <span class="label label-danger">código postal </span>  debera solo contener numeros',
                         'cp.min' =>  ' El campo <span class="label label-danger">código postal </span>  debera al menos tener 5 digitos ',
                         'cp.max' =>  ' El campo <span class="label label-danger"> código postal</span>  debera tener un maximo de 5 digitos',
          
               ];
    }



     /**
     * Get the proper failed validation response for the request.
     *
     * @param  array  $errors
     * @return \Symfony\Component\HttpFoundation\Response
     
    public function response(array $errors)
    {
        
        return Redirect::to("/mostrar_errores")
                                        ->withInput($this->except($this->dontFlash))
                                        ->withErrors($errors, $this->errorBag);
    }
    */







}
