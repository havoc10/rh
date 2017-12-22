<?php

namespace App\Http\Controllers\Auth;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Session;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('guest', ['except' => 'getLogout']);
      
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
   


//login

   protected function getLogin()
{
    return view("login");
}


       

public function postLogin(Request $request)
   {
    $this->validate($request, [
        'email' => 'required|email|max:255',
        'password' => 'required|min:6',
    ]);



    $credentials = $request->only('email', 'password');

    if ($this->auth->attempt($credentials, $request->has('remember')))
    {
    return redirect()->intended($this->redirectPath());
    }

    return redirect('/login')
           ->withInput($request->all())
           ->withErrors(
            ['email' => 'Usuario o Contraseña son incorrectas',

            ]);

    }


//login

 //registro   


    protected function getRegister()
    {
    return view("registro");
    }


        

  protected function postRegister(Request $request)

   {
    $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6|confirmed',
    ]);


    $data = $request;
    $user=new User;
    $user->name=$data['name'];
    $user->email=$data['email'];
    $user->tipoUsuario=$data['tipo_usuario'];
    $user->password=bcrypt($data['password']);


    if($user->save()){

          return redirect('/register')
           ->withErrors(
            ['registro' => 'Usuario Agregado correctamente',

            ]);
               
    }else{

        return redirect('/register')
           ->withInput($request->all())
           ->withErrors(
            ['email' => 'Usuario o Contraseña son incorrectas',

            ]);
    }
   

   

}

//registro

protected function getLogout()
    {
        $this->auth->logout();

        Session::flush();

        return redirect('login');
    }


}
