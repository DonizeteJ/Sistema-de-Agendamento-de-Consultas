@extends('layouts.layout')

@section('pg_title', 'Lista de Pacientes')

@section('body')
    <table class="table">
        <thead class="thead-dark">
            <th>Nome</th>
            <th>CPF</th>
            <th class="text-center" colspan="2">Ações</th>
        </thead>
        <tbody>
            @foreach($pacientes as $paciente)
            <tr>
                <td class="align-middle">{{$paciente->name}}</td>
                <td class="align-middle">{{$paciente->cpf}}</td>
                <td class="text-center">
                    <a href="{{route('registrarPaciente',['id'=>$paciente->id])}}"  type="button" class="btn btn-success"><i class="fas fa-user-edit"></i></a>
                </td>
                <td class="text-center">
                    <a href="{{route('apagarPaciente',['id'=>$paciente->id])}}"  type="button" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('registrarPaciente')}}" type="button" class="btn btn-primary">Criar novo paciente</a>
@endsection