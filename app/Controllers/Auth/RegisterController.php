<?php

namespace Controllers\Auth;

use App\Http\Requests\AppRequest;
use App\User;
use Illuminate\Support\Facades\Request;
use Validator;
use Controllers\MainController;
use Illuminate\Foundation\Auth\RegistersUsers;
use Models\Users;

class RegisterController extends MainController
{

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function store(AppRequest $request)
    {
        $routeLanguage = (isMultilingual()) ? '/'.appLanguage() : '/';
        $inputs = $request->all();
         User::create([
            'name' => $inputs['name'],
            'last_name' => $inputs['last_name'],
            'email' => $inputs['email'],
            'password' => bcrypt($inputs['password']),
            'remember_token' => $inputs['_token'],
             'img_src' =>'avatar.png'
        ]);
        return redirect($routeLanguage.'/login');
    }

    public function register(){
        return view('auth.register');
    }
}
