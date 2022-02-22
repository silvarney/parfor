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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>

    <div class="col-4 align-middle" >
        <img class="ima-logo" src="{{ asset('img/parfor.png') }}">
    </div>

    @component('menu.admin-home')
    @endcomponent
    <br>

    @component('alertas')
    @endcomponent

    <br>

    <div class="container len1">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <main role='main'>
                    @hasSection('body_page')
                    @yield('body_page')
                    @endif
                </main>


            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    @stack('scripts')
</body>
</html>
