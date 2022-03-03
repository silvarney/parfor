<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="shortcut icon" type="image/png" href="{{ asset('img/icone.png') }}" />

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/parfor.css') }}">
</head>
<body>

    <div class="col-4 align-middle" >
        <a href="/">
            <img class="ima-logo" src="{{ asset('img/parfor.png') }}">
        </a>
    </div>

    <div class="row bg-ufra fw-normal">
        <div class="col-8">
            <p class="txt_ufra">Parfor - UNIVERSIDADE FEDERAL RURAL DA AMAZÔNIA</p>
        </div>
        <div class="col-4 d-flex justify-content-center align-self-center">
            <a class="menu-publico" href="{{ route('edital') }}">Edital</a>
            <a class="menu-publico" href="{{ route('login') }}">Entrar</a>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <main role='main'>
                    @hasSection('body_home')
                    @yield('body_home')
                    @endif
                </main>

            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    @stack('scripts')
</body>
</html>

