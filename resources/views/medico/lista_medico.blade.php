@extends('layouts.layout')

@section('pg_title', 'Lista de Medicos')

@section('body')
    <table class="table">
        <thead class="thead-dark">
            <th>Nome</th>
            <th>CRM</th>
            <th class="text-center" colspan="2">Ações</th>
        </thead>
        <tbody>
            @foreach($medicos as $medico)
                @if($medico->id != 1)
                    <tr>
                        <td class="align-middle">{{$medico->name}}</td>
                        <td class="align-middle">{{$medico->crm}}</td>
                        <td class="text-center">
                            <a href="{{route('registrarMedico',['id'=>$medico->id])}}" title="Editar"  type="button" class="btn btn-success"><i class="fas fa-user-edit"></i></a>
                        </td>
                        <td class="text-center">
                            <a href="{{route('apagarMedico',['id'=>$medico->id])}}" title="Apagar" type="button" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('registrarMedico')}}" type="button" class="btn btn-primary">Criar novo médico</a>
@endsection