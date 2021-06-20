@extends('admin.home')

@section('title', 'Cadastro Disciplina')

@section('body_page')
    <div class="shadow p-3 mb-5 bg-body rounded">
        <form action="{{ route('admin.created-disciplina') }}" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Disciplina</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="nome" placeholder="nome da disciplina">
                </div>
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Carga Horária</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" name="carga_horaria">
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Período - Início</label>
                    <input type="date" class="form-control" id="exampleFormControlInput1" name="periodo_inicio">
                </div>
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Período - Término</label>
                    <input type="date" class="form-control" id="exampleFormControlInput1" name="periodo_termino">
                </div>
            </div>

            <br>

            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>

    <!--lista de formacoes do professor-->
    <div class="card listFormacoes">
        <div class="card-header">
            Turmas
        </div>
        <div class="lista-formacao">
            @foreach ($disciplinas as $item)
            <div class="row">
                <div class="col">
                    - {{ $item->nome }}
                </div>
                <div class="col-2">
                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="delet({{ $item->id }})">Excluir</button>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <br>.
    <script>
        var delet = (function(id){
            alert(id);
            window.location.href = "admin/curso/del/?id="+id;
        });
    </script>
@stop
