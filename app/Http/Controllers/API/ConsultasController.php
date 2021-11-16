<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Agendamento;
use Illuminate\Support\Facades\Auth;

class ConsultasController extends Controller{
    public function consultas(Request $request){
        $consultas = Agendamento::all()->where('efetuada', 0)->where('med_id', $request->id);
        return response()->json($consultas, 200);
    }
}