<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function addUser (Request $request)
    {
        $userValidated = $request->validate([
            'email' => 'required|email:dns',
            'username' => 'unique:users|min:5|max:30',
            'password' => 'required|min:5'
        ]);

        $userValidated['password'] = bcrypt($userValidated['username']);

        User::create($userValidated);

        return view('index');
    }
}
