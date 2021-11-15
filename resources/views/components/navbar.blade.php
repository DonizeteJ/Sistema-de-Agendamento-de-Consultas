<nav    class="navbar navbar-expand-lg navbar-dark fixed-top shadow-sm p-3 mb-5">
    <h4>
        Sistema de Agendamento de Consultas
    </h4>
    <div class="dropdown" id="user-nav">
        <a class="nav-link dropdown-toggle" href="#" id="navbarUsuario" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{Auth::user()->name}}
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            @csrf
            <li><a class="dropdown-item" href="{{ route ('logout')}}"> Logoff </a></li>
        </ul>
    </div>
</nav>