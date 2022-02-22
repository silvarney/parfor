@extends('admin.home')

@section('title', 'Cadastro Professor')

@section('body_page')

    <!--cadastrar cpf do professor-->
    <div class="shadow p-3 mb-5 bg-body rounded cadCpf">
        <form name="formCpf" id="formCpf">
        <!--
            <form name="formCpf" action="{{ route('admin.created-professor') }}" method="post">
        -->
            @csrf
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="inputProfessorCpf" class="col-form-label">CPF e Campus do Professor</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="inputProfessorCpf" name="cpf" class="form-control" data-mask="000.000.000-00">
                </div>
                <div class="col-auto">
                    <select class="form-select" aria-label="Default select example" name="campus_id">
                        @foreach (session('campus') as $item)
                            <option value="{{ $item->id }}">{{ $item->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <button type="button" id="btn-buscar" class="btn btn-success">Buscar</button>
                </div>
            </div>
        </form>
    </div>

    <!--cadastrar geral do professor-->
    @hasSection('form_professor')
        @yield('form_professor')
    @endif

    @push('scripts')
        <script>

            $( "#btn-buscar" ).click(function() {
                alert( "Handler for .click() called." );
            });

        </script>
    @endpush

@stop
