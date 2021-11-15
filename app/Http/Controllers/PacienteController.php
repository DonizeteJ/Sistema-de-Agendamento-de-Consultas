<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Paciente;
use Illuminate\Auth\Events\Registered;

class PacienteController extends Controller
{
    public function index(){
        return view('registrar_paciente');
    }

    public function criarAction(Request $request){

        $request->validate(
            [ 
                'name' => 'required|string|max:255',
                'cpf' => 'required|min:11|max:11'
            ],
            [
                'required' => 'O campo ":attribute" é obrigatório.',
                'min' => 'O CPF precisa ter 11 dígitos.',
                'max' => 'O CPF precisa ter 11 dígitos.',
            ]
        );

        $paciente = Paciente::create([
            'name' => $request->name,
            'cpf' => $request->cpf,
        ]);

        event(new Registered($paciente));

        return redirect()->back()->with('msg', 'Paciente registrado com sucesso');
    }
}
