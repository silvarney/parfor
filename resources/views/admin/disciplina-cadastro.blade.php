@extends('admin.home')

@section('title', 'Cadastro Disciplina')

@section('body_page')

    <div class="row">
        <div class="col">
            <label for="exampleFormControlInput1" class="form-label">Disciplina</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="nome da disciplina">
        </div>
        <div class="col">
            <label for="exampleFormControlInput1" class="form-label">Carga Horária</label>
            <input type="number" class="form-control" id="exampleFormControlInput1">
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col">
            <label for="exampleFormControlInput1" class="form-label">Período - Início</label>
            <input type="date" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="col">
            <label for="exampleFormControlInput1" class="form-label">Período - Término</label>
            <input type="date" class="form-control" id="exampleFormControlInput1">
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-6">
            <label for="exampleDataList" class="form-label">Curso</label>
            <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Selecione um Curso...">
            <datalist id="datalistOptions">
                <option value="Engenharia Agronômica">
                <option value="Licenciatura em Computação">
                <option value="Medicina Veterinária">
                <option value="Sistemas de Informações">
            </datalist>
        </div>
    </div>

    <br>

    <button type="button" class="btn btn-success">Salvar</button>    
@stop