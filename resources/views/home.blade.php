@extends ('layouts.layout')

@section('pg_title', 'Home')

@section('body')

@if(Auth::user()->hasRole('admin'))
    <h1> Bem vindo ao menu administrativo, aqui você pode criar médicos e pacientes, caso queira agendar uma consulta, por favor entrar como médico. </h1>
@else
    <h2>Consultas:</h2>
    <table class="table">
        <thead class="thead-dark">
            <th>Paciente: </th>
            <th>Data: </th>
            <th>Hora: </th>
            <th class="text-center" colspan="2">Ações</th>
        </thead>
        <tbody>
            @foreach($consultas as $consulta)
                    <tr>
                        <td class="align-middle">{{$consulta->paciente->name}}</td>
                        <td class="align-middle">{{$consulta->data_consulta}}</td>
                        <td class="align-middle">{{$consulta->horario_consulta}}</td>
                        <td class="text-center">
                            <a href="{{route('agendar',['id'=>$consulta->id])}}" title="Editar"  type="button" class="btn btn-success"><i class="fas fa-user-edit"></i></a>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('consultaEfetuada', ['id'=>$consulta->id])}}" title="Marcar consulta como efetuada" type="button" class="btn btn-info"><i class="far fa-check-circle"></i></a>
                        </td>
                    </tr>
            @endforeach
        </tbody>
    </table>
    @if (session('msg'))
        <div class="alert alert-success" role="alert">
            {{session('msg')}}
        </div>
    @endif
@endif
@endsection