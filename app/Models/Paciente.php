<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = [
        'name',
        'cpf',
    ];

    public function agendamentos(){
        return $this->hasMany('App\Models\Agendamento');
    }
}
