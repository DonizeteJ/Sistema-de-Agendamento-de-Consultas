@extends('layouts.layout')

@section('pg_title', 'Registrar Usuário')

@section('body')
<form @if($edit ?? '') action="{{ route('editarPacienteAction', ['id' => $paciente->id]) }}" @else action="{{ route('registrarPacienteAction')}}" @endif method="post">
    @csrf
    <div class="register_inputs">
        <div class="form-group">
            <label for="name">Nome do paciente: </label>
            <input type="text" name="name" class="form-control" @if($edit ?? '') value="{{$paciente->name}}"@endif required>
        </div>
        <div class="form-group">
            <label for="name">CPF: </label>
            <input type="number" name="cpf" class="form-control" @if($edit ?? '') value="{{$paciente->cpf}}"@else value="00000000000" @endif min="0" max="99999999999" required>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" @if($edit ?? '') value="Editar Paciente" @else value="Registrar Paciente"@endif>
        </div>
        @if (session('msg'))
            <div class="alert alert-success" role="alert">
                {{session('msg')}}
            </div>
        @endif
        @if (session('warning'))
        <div class="alert alert-danger" role="alert">
            {{session('warning')}}
        </div>
    @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</form>


@endsection