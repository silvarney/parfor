@extends('admin.home')

@section('title', 'Cadastro Campus')

@section('body_page')

    <div class="row">
        <div class="col-2">
            <label for="exampleFormControlInput1" class="form-label">UF</label>
            <select class="form-select" aria-label="Default select example">
                <option value="PA">PA</option>
            </select>
        </div>
        <div class="col">
            <label for="exampleFormControlInput1" class="form-label">Cidade</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="cidade">
        </div>
    </div>

    <br>

    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Endereço</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>

    <br>

    <button type="button" class="btn btn-success">Salvar</button>    
@stop