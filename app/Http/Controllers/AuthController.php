<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Agendamento;

class AuthController extends Controller
{
    public function index() {
        return view('login');
    }

    public function login(Request $request)
    {          
        $validator = Validator::make($request->all(), [
            'login' => 'required|exists:App\Models\User,login',
            'password' => 'required'
        ]);            
        
        if (Auth::attempt(['login' => $request->login, 'password' => $request->password])) {            
            return redirect()->route('home');
            
        } else {
            return redirect()->back()->with(
                'warning' , 'Login e ou senha inválidos.'
            );
        }        
    }

    public function home(){
        $consultas = Agendamento::all()->where('efetuada', 0)->where('med_id', Auth::user()->id);
        return view('home', ['consultas' => $consultas]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
