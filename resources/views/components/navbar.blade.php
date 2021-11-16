<nav  style="background-color: #292525;"  class="navbar navbar-expand-lg navbar-dark fixed-top shadow-sm p-3 mb-5">
    <a style="text-decoration:none; color: white;" href="{{ route('home')}}">
        Sistema de Agendamento de Consultas
    </a>
    <div class="dropdown" id="user-nav">
        <a style="text-decoration:none; color: white" class="nav-link dropdown-toggle" href="#" id="navbarUsuario" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{Auth::user()->name}}
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            @csrf
            <li><a class="dropdown-item" href="{{ route ('logout')}}"> Logoff </a></li>
            @if(Auth::user()->hasRole('medico'))
                <li><a class="dropdown-item" href="{{ route ('agendar')}}"> Agendar consulta</a></li>
            @endif
            <li><a class="dropdown-item" href="{{ route ('listaPaciente')}}">Pacientes</a></li>
            @if(Auth::user()->hasRole('admin'))
                <li><a class="dropdown-item" href="{{ route ('listaMedico')}}">Médicos</a></li>
            @endif
        </ul>
    </div>
</nav>