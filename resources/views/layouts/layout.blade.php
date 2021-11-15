<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Sistema de agendamento de consultas - @yield('pg_title')</title>
</head>
    <body>
        <div class="container">
            @component('components.navbar')
            @endcomponent

            <div style="margin-top: 100px;">
                @hasSection ('body')
                    @yield ('body')
                @endif
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/23d202d498.js" crossorigin="anonymous"></script>
    </body>
</html>