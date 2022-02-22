@if (session('no-user'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>{{ session('no-user') }}</strong>, tente de novo ou faça seu cadastro.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

@elseif(session('yes-fone'))

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{ session('yes-fone') }}</strong>, tente novamento com outro número!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

@elseif(session('user-cadastrado'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('user-cadastrado') }}</strong>, faça login para entrar!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

@elseif(session('site-true'))

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{ session('site-true') }}</strong>, tente novamento com outro 'site'!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

@elseif(session('success'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

@elseif(session('update'))

    <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{ session('update') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

@elseif(session('delete'))

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('delete') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

@elseif(session('notificacao'))

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{ session('notificacao') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

@endif