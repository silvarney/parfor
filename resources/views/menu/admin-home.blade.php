<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('admin') }}">Início</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" aria-current="page" href="{{ route('admin.campus') }}">Campus</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" aria-current="page" href="{{ route('admin.edital') }}">Edital</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" aria-current="page" href="{{ route('admin.professor') }}">Professor</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" aria-current="page" href="{{ route('admin.curso') }}">Curso</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" aria-current="page" href="{{ route('admin.disciplina') }}">Disciplina</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" aria-current="page" href="{{ route('admin.turma') }}">Turma</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" aria-current="page" href="{{ route('admin.alocacao') }}">Alocação</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" aria-current="page" href="{{ route('admin.usuario') }}">Usuário</a>
        </li>
        <li class="nav-item">
          <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a class="logout nav-link" :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Sair') }}
            </a>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>
