<?php

namespace Controllers\Auth;

use App\Http\Requests\AppRequest;
use App\Role;
use App\User;
use Controllers\MainController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Validator;
use Session;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;


class AuthController extends MainController
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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
//    protected function validator(array $data)
//    {
//        return Validator::make($data, [
//            'name' => 'required|max:255',
//            'email' => 'required|email|max:255|unique:users',
//            'password' => 'required|min:6|confirmed',
//        ]);
//    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */




    public function login(){
        return view('auth.login');
    }

    public function handleLogin(AppRequest $request ){

        $this->validate($request,[
            'email' => 'required|email|exists:users',
            'password' => 'required|min:6|',
        ]);


        $data = $request->only('email','password');
        $user = new User();
        if(\Auth::attempt($data)){
            if(Auth::user()->hasRole('staff')) {
                return redirect(http('/dashboard'));
            }
                return redirect(http('/dashboard'));
        }
        return back()->withInput();

    }

    public function logout(){
        $routeLanguage = (isMultilingual()) ? '/'.appLanguage() : '/';
        Session::flush();
        Auth::logout();
        return redirect($routeLanguage.'/login');
    }
}
