<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamento;
use App\Models\Paciente;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Carbon;

class AgendamentoController extends Controller
{
    public function index(Request $request){
        if($request->id == null){
            $pacientes = Paciente::all();
            return view('agendamento', ['pacientes' => $pacientes]);
        }else{
            $pacientes = Paciente::all();
            $consulta = Agendamento::find($request->id);
            $edit = true;
            return view('agendamento', compact('edit'), ['pacientes' => $pacientes, 'consulta' => $consulta]);
        }
    }

    public function criar(Request $request){
        $medico = Auth::user()->id;
        $paciente = $request->paciente;
        $data = $request->data_consulta;
        $time = $request->horario_consulta;

        $dia = Carbon\Carbon::now();
        $dia_atual = $dia->toDateString();

        if($dia_atual > $data){
            return redirect()->back()->with('warning', 'Não é possível marcar uma consulta para um dia anterior ao atual');
        }

        $consulta = Agendamento::first()->where('med_id', $medico)->where('data_consulta', $data)->where('horario_consulta', $time)->where('efetuada', 0)->get();
        if(count($consulta) > 0){
            return redirect()->back()->with('warning', 'Já existe uma consulta marcada neste horário');
        }
        $agendamento = Agendamento::create([
            'med_id' => $medico,
            'pac_id' => $paciente,
            'data_consulta' => $data,
            'horario_consulta' => $time
        ]);

        event(new Registered($agendamento));

        return redirect()->back();
    }

    public function efetuar(Request $request){
        $agendamento = Agendamento::find($request->id);

        $agendamento->efetuada = 1;

        $agendamento->save();

        return redirect()->back();
        
    }

    public function editar(Request $request){
        Agendamento::find($request->id)->update([
            'pac_id'=>$request->paciente,
            'data_consulta'=>$request->data_consulta,
            'horario_consulta' => $request->horario_consulta
        ]);

        return redirect()->route('home')->with('msg', 'Consulta editada com sucesso!');
    }
}
