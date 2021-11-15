@extends('layouts.layout')

@section('pg_title', 'Login')

@section('body')
    <form action="submit">
        <div>
            <label for="username">Usuário: </label>
            <input type="text" class="form-control login" name="username" placeholder="">
        </div>
        <div>
            <label for="password" >Senha:</label>
            <input type="password" class="form-control senha" name="password">
        </div>
        <div>
            <input type="submit" class="btn login" value="Logar">
        </div>
    </form>
@endsection