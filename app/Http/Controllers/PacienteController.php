<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Paciente;
use Illuminate\Auth\Events\Registered;

class PacienteController extends Controller
{
    public function index(){
        $pacientes = Paciente::all();
        return view('paciente.lista_paciente', ['pacientes' => $pacientes]);
    }

    public function criar(Request $request){
        if($request->id == null){
            return view('paciente.registrar_paciente');
        }else{
            $paciente = Paciente::find($request->id);
            $edit = true;
            return view('paciente.registrar_paciente', compact('edit'), ['paciente' => $paciente]);
        }
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

    public function apagar(Request $request){

        Paciente::find($request->id)->delete();
        return redirect()->back();
    }

    public function editar(Request $request){

        if (empty($request->name) or $request->cpf == 00000000000) {
            return redirect()->back()->with('warning', 'Você precisa preencher os campos devidamente');
        }

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

        Paciente::find($request->id)->update([
            'name'=>$request->name,
            'cpf'=>$request->cpf,
        ]);

        return redirect()->route('listaPaciente')->with('msg', 'Paciente editado com sucesso!');
    }
}