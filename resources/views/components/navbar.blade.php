<nav    class="navbar navbar-expand-lg navbar-dark fixed-top shadow-sm p-3 mb-5">
    <a href="{{ route('home')}}">
        Sistema de Agendamento de Consultas
    </a>
    <div class="dropdown" id="user-nav">
        <a class="nav-link dropdown-toggle" href="#" id="navbarUsuario" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{Auth::user()->name}}
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            @csrf
            <li><a class="dropdown-item" href="{{ route ('logout')}}"> Logoff </a></li>
            <li><a class="dropdown-item" href="{{ route ('agendar')}}"> Agendar consulta</a></li>
            <li><a class="dropdown-item" href="{{ route ('registrarPaciente')}}">Registrar paciente</a></li>
            @if(Auth::user()->hasRole('admin'))
                <li><a class="dropdown-item" href="{{ route ('registrarMedico')}}"> Registrar médico </a></li>
            @endif
        </ul>
    </div>
</nav>