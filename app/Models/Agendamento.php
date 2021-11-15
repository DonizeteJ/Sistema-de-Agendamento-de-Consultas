<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $fillable = [
        'med_id', 'pac_id', 'data_consulta', 'efetuada'
    ];

    public function medico()
    {
        return $this->belongsTo('App\Models\User', 'med_id');
    }

    public function paciente()
    {
        return $this->belongsTo('App\Models\Paciente', 'pac_id');
    }
}
