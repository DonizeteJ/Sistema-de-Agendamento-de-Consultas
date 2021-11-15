<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Sistema de agendamento de consultas - Login</title>
</head>
<body>
    <div class="container">
        <form action="{{route('loginAction')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="login">Usuário: </label>
                <input type="text" class="form-control login" name="login" placeholder="">
            </div>
            <div class="form-group">
                <label for="password" >Senha:</label>
                <input type="password" class="form-control senha" name="password">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Logar">
            </div>
            @if (session('warning'))
                <div class="alert alert-danger" role="alert">
                    {{session('warning')}}
                </div>
            @endif
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>




    
