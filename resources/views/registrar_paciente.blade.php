@extends('layouts.layout')

@section('pg_title', 'Registrar Usuário')

@section('body')
<form action="{{ route('registrarPacienteAction') }}" method="post">
    @csrf
    <div class="register_inputs">
        <div class="form-group">
            <label for="name">Nome do paciente: </label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="name">CPF: </label>
            <input type="number" name="cpf" class="form-control" value="00000000000" min="0" max="99999999999" required>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Registrar Paciente">
        </div>
        @if (session('msg'))
            <div class="alert alert-success" role="alert">
                {{session('msg')}}
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