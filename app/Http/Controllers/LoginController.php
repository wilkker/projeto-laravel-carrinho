<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function index()
    {
        return view('login.form');
    }
    
    public function auth(request $request)
    {

        $credenciais = $request->validate([
            'email'=> ['required' , 'email'],
            'password'=> ['required'],

        ]);
        
        if(Auth::attempt($credenciais)){
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }else{
            return redirect()->back()->with('erro', 'Usuário ou senha inválidos');
        }
    }

}
