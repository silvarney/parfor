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
</head>
<body>
    
    <div class="col-4 align-middle" >
        <img class="ima-logo" src="{{ asset('img/parfor.png') }}">
    </div>
    
    @component('menu.admin-home')
    @endcomponent

    <div class="container">
        <div class="box-admin">

            <main role='main'>
                @hasSection('body_page')
                @yield('body_page')
                @endif
            </main>


        </div>               
    </div>
    

    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
</html>