<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class MedicoController extends Controller
{
    public function index(){
        $users = User::all();

        return view('medico.lista_medico', ['medicos' => $users]);
    }

    public function criar(Request $request){
        if($request->id == null){
            return view('medico.registrar_medico');
        }else{
            $user = User::find($request->id);
            $edit = true;
            return view('medico.registrar_medico', compact('edit'), ['medico' => $user]);
        }
    }

    public function criarAction(Request $request){

        $request->validate(
            [ 
                'name' => 'required|string|max:255',
                'login' => 'required|string|max:255|unique:users',
                'password' => 'required',
                'crm' => 'required|min:6|max:6'
            ],
            [
                'required' => 'O campo ":attribute" é obrigatório.',
                'min' => 'O CRM precisa ter 6 dígitos.',
                'min' => 'O CRM precisa ter 6 dígitos.',
                'unique' => 'O login informado já está em uso.'
            ]
        );
        
        $crm = $request->crm;
        $uf = $request->uf;

        $crm_completo = $crm.'/'.$uf;

        $user = User::create([
            'name' => $request->name,
            'login' => $request->login,
            'password' => Hash::make($request->password),
            'crm' => $crm_completo
        ]);

        $user->attachRole(2);
        event(new Registered($user));

        return redirect()->back()->with('msg', 'Usuário criado com sucesso');
    }

    public function apagar(Request $request){

        User::find($request->id)->delete();
        return redirect()->back();
    }

    public function editar(Request $request){

        if (empty($request->name) or empty($request->login) or empty($request->password) or empty($request->crm)) {
            return redirect()->back()->with('warning', 'Você precisa preencher os campos devidamente');
        }

        $request->validate(
            [ 
                'name' => 'required|string|max:255',
                'login' => 'required|string|max:255',
                'password' => 'required',
                'crm' => 'required|min:6|max:6'
            ],
            [
                'required' => 'O campo ":attribute" é obrigatório.',
                'min' => 'O CRM precisa ter 6 dígitos.',
                'min' => 'O CRM precisa ter 6 dígitos.',
                'unique' => 'O login informado já está em uso.'
            ]
        );

        $crm = $request->crm;
        $uf = $request->uf;

        $crm_completo = $crm.'/'.$uf;

        User::find($request->id)->update([
            'name' => $request->name,
            'login' => $request->login,
            'password' => Hash::make($request->password),
            'crm' => $crm_completo
        ]);

        return redirect()->route('listaMedico')->with('msg', 'Medico editado com sucesso!');
    }
}
