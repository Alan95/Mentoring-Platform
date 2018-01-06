<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Auth;


class UserController extends BaseController
{
    public function showRegisterForm()
    {
        return view('register');
    }
    public function addNewUser(Request $request)
    {
        $request->validate([
            'username' => 'required|max:255',
            'password' => 'required|max:255',
            'email' => ''
        ]);

        $user = new User;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $request->registerType === 'mentor' ? $user->is_a_mentor = true: $user->is_a_mentor = false;
        $user->is_admin = false;
        $user->save();
        $this->loginUser($user);
        return response(200);
    }
    private function loginUser($user)
    {
        Auth::login($user);
    }

    public function getUser()
    {
        if(Auth::user()){
            return response()->json(Auth::user());
        } 
    }
}