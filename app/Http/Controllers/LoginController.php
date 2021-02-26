<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function dashboard()
    {
        if(Auth::check() === true){
            return view('admin.dashboard');
        }
        return redirect()->route('admin.login'); 
    }

    public function showLoginForm()
    {
        return view('admin.login.index');
    }

    public function login(Request $request)
    {   
        $credentials = 
        [
            'email' => $request->username,
            'password' => $request->password
        ];
       

        if(Auth::attempt($credentials)){
            return redirect()->route('admin');
        }

        return redirect()->back()->withInput()->withErrors(['Os dados inseridos não confere!']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin');
    }
}
