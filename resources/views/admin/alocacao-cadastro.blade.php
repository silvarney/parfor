@extends('admin.home')

@section('title', 'Alocação Professor')

@section('body_page')

    <div class="shadow p-3 mb-5 bg-body rounded">
        <form @if(!isset($alocacao)) action="{{ route('admin.created-alocacao') }}" @else action="{{ route('admin.update-alocacao') }}" @endif method="post">
            @csrf

            @if (isset($alocacao))
                <input type="hidden" name="id" value="{{ $alocacao->id }}">
            @endif

            <div class="row">
                <div class="col-2">
                    <label for="alocacaoProfessor" class="form-label">Edital</label>
                    <select class="form-select" aria-label="Default select example" name="edital_id">
                        @foreach ($editais as $item)
                            @if((isset($alocacao) ? $alocacao->edital_id : old('edital_id')) === $item->id)
                                <option value="{{ $item->id }}" selected>{{ $item->numero }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->numero }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label for="alocacaoProfessor" class="form-label">Disciplina</label>
                    <select class="form-select" aria-label="Default select example" name="disciplina_id">
                        @foreach ($disciplinas as $item)
                            @if((isset($alocacao) ? $alocacao->disciplina_id : old('disciplina_id')) === $item->id)
                                <option value="{{ $item->id }}" selected>{{ $item->nome }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label for="alocacaoProfessor" class="form-label">Professor</label>
                    <select class="form-select" aria-label="Default select example" name="professor_id">
                        @foreach ($professores as $item)
                            @if((isset($alocacao) ? $alocacao->professor_id : old('professor_id')) === $item->id)
                                <option value="{{ $item->id }}" selected>{{ $item->nome }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                            @endif

                        @endforeach
                    </select>
                </div>

                <div class="col-2">
                    <label for="alocacaoProfessor" class="form-label">Pontos</label>
                    <input type="number" min="0" class="form-control" id="alocacaoProfessor" name="pontos" value="{{ isset($alocacao) ? $alocacao->pontos : old('pontos')}}">
                </div>
            </div>

            <br>

            @if (isset($alocacao))
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <button type="button" class="btn btn-default" onclick='history.go(-1)'>Cancelar</button>
            @else
                <button type="submit" class="btn btn-success">Salvar</button>
            @endif
        </form>
    </div>

    <!--lista de formacoes do professor-->
    <div class="card listFormacoes">
        <div class="card-header">
            Alocações
        </div>
        <div class="lista-formacao">
            @foreach ($list_alocacoes as $item)
            <div class="row">
                <div class="col">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('admin.alocacao.edit', $item->id) }}" class="btn btn-outline-primary btn-sm">Editar</a>
                        @if(\Auth::user()->type === "Admin")
                            <a href="{{ route('admin.alocacao-del', ['id' => $item->id]) }}" class="btn btn-outline-danger btn-sm">Excluir</a>
                        @endif
                    </div>
                    Edital: <b>{{ $item->edital_numero }}</b> - Posição: <b>{{ $item->posicao }}º</b> - Pontos: <b>{{ $item->pontos }}</b> - Professor: <b>{{ $item->professor_nome }}</b> - Disciplina: <b>{{ $item->disciplinas_nome }}</b>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <br>.
@stop
