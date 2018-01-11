<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function showProfilePage()
    {
        return view('profile');
    }
}
