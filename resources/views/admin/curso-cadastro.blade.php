@extends('admin.home')

@section('title', 'Cadastro Curso')

@section('body_page')

    <div class="row">
        <div class="col">
            <label for="exampleFormControlInput1" class="form-label">Curso</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="nome do curso">
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

    <button type="button" class="btn btn-success">Salvar</button>    
@stop