<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view("login");
    }
    public function loginSubmit(Request $request)
    {
        // return $request->all();
        $validateData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:12'

        ]);
        
        $email = $request->input('email');
        $password = $request->input('password');
        return  'email  :' .$email . ',password : ' .$password;
    }
}
