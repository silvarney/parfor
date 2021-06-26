@extends('admin.home')

@section('title', 'Alocação Professor')

@section('body_page')

    <div class="shadow p-3 mb-5 bg-body rounded">
        <form action="{{ route('admin.created-alocacao') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-2">
                    <label for="alocacaoProfessor" class="form-label">Edital</label>
                    <select class="form-select" aria-label="Default select example" name="edital_id">
                        @foreach ($editais as $item)
                            <option value="{{ $item->id }}" selected>{{ $item->numero }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label for="alocacaoProfessor" class="form-label">Disciplina</label>
                    <select class="form-select" aria-label="Default select example" name="disciplina_id">
                        @foreach ($disciplinas as $item)
                            <option value="{{ $item->id }}" selected>{{ $item->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label for="alocacaoProfessor" class="form-label">Professor</label>
                    <select class="form-select" aria-label="Default select example" name="professor_id">
                        @foreach ($professores as $item)
                            <option value="{{ $item->id }}" selected>{{ $item->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-2">
                    <label for="alocacaoProfessor" class="form-label">Pontos</label>
                    <input type="number" class="form-control" id="alocacaoProfessor" name="pontos">
                </div>
            </div>

            <br>

            <button type="submit" class="btn btn-success">Inserir</button>
        </form>
    </div>

    <!--lista de formacoes do professor-->
    <div class="card listFormacoes">
        <div class="card-header">
            Editais
        </div>
        <div class="lista-formacao">
            @foreach ($alocacoes as $item)
            <div class="row">
                <div class="col">
                    {{ $item->edital_numero }} - {{ $item->disciplinas_nome }} - {{ $item->professor_nome }} - {{ $item->pontos }}
                </div>
                <div class="col-2">
                    <a href="{{ route('admin.alocacao-del', ['id' => $item->id]) }}" class="btn btn-outline-danger btn-sm">Excluir</a>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <br>.
@stop
