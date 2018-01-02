<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegisterPage()
    {
        return view('register');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

<<<<<<< HEAD
    public function getForm(){
        return view('register');
    }

    public function postForm(Request $request){
        $email = $request->inputEmail;
        $registerType = $request->registerType;
        $password = $request->inputPassword;

        //grabbing the hidden token g-recaptcha sends, if the checkbox was clicked!
        $token = $request->input('g-recaptcha-response');
        
        if($token){
            //token was submitted
=======
    public function store(Request $request)
    {
        $email = $request->input('username');
        //$registerType = $request->registerType;
        $email = $request->input('email');
        $password = $request->input('password');

        /*$this->validate($request, [
            'title' => 'required|unique|max:255',
            'body' => 'required',
        ]);*/

        //grabbing the hidden token g-recaptcha sends, if the checkbox was clicked!
        $token = $request->input('g-recaptcha-response');

        if($token){
>>>>>>> caf00ee88e84a917a4fecd2e02f7c1c275b938fe
            return view('profile')->withRegisterType($registerType)->withEmail($email);
        }else{
            return redirect('/');
        }
<<<<<<< HEAD

        
=======
>>>>>>> caf00ee88e84a917a4fecd2e02f7c1c275b938fe
    }
}
