@extends('admin.home')

@section('title', 'Cadastro Disciplina')

@section('body_page')

    <div class="row">
        <div class="col">
            <label for="exampleDataList" class="form-label">Edital</label>
            <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Selecione um Edital...">
            <datalist id="datalistOptions">
                <option value="01/2020">
                <option value="02/2020">
                <option value="03/2020">
                <option value="04/2020">
            </datalist>
        </div>
        <div class="col">
            <label for="exampleDataList" class="form-label">Disciplina</label>
            <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Selecione uma Disciplina...">
            <datalist id="datalistOptions">
                <option value="Banco de Dados">
                <option value="Estatistica I">
                <option value="Botânica">
                <option value="Suinos II">
            </datalist>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col">
            <label for="exampleDataList" class="form-label">Professor</label>
            <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Selecione um Professor...">
            <datalist id="datalistOptions">
                <option value="Antônio Silva">
                <option value="Carlas Moraes">
                <option value="João Quaresma">
                <option value="Vera Oliveira">
            </datalist>
        </div>
        <div class="col">
            <label for="exampleFormControlInput1" class="form-label">Pontos</label>
            <input type="number" class="form-control" id="exampleFormControlInput1">
        </div>
    </div>

    <br>

    <button type="button" class="btn btn-success">Salvar</button>    
@stop