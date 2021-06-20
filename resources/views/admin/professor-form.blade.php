@extends('admin.professor-cadastro')

@section('form_professor')

    <!--cadastrar geral do professor-->
    <div class="shadow p-3 mb-5 bg-body rounded formGeral">
        <form action="{{ route('admin.update-professor') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$professor->id}}">
            <div class="row">
                <div class="col-6">
                    <label for="cadastroProfessorNome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="cadastroProfessorNome" name="nome" value="{{ $professor->nome }}">
                </div>
                <div class="col-2">
                    <label for="cadastroProfessorSexo" class="form-label">Sexo</label>
                    <select class="form-select" aria-label="Default select example" name="sexo">
                        <option>Masculino</option>
                        <option>Feminino</option>
                        <option>Não declarado</option>
                        <option selected>{{ $professor->sexo }}</option>
                    </select>
                </div>
                <div class="col-4">
                    <label for="cadastroProfessorCpf" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="cadastroProfessorCpf" name="cpf"  value="{{ $professor->cpf }}">
                </div>

            </div>

            <br>

            <div class="row">
                <div class="col">
                    <label for="cadastroProfessorNascimento" class="form-label">Nascimento</label>
                    <input type="date" class="form-control" id="cadastroProfessorNascimento" name="nascimento"  value="{{ $professor->nascimento }}">
                </div>
                <div class="col">
                    <label for="cadastroProfessorRg" class="form-label">RG</label>
                    <input type="text" class="form-control" id="cadastroProfessorRg" name="rg"  value="{{ $professor->rg }}">
                </div>
                <div class="col">
                    <label for="cadastroProfessorEmissao" class="form-label">Data Emissão</label>
                    <input type="date" class="form-control" id="cadastroProfessorEmissao" name="emissao"  value="{{ $professor->emissao }}">
                </div>
                <div class="col">
                    <label for="cadastroProfessorNacionalidade" class="form-label">Nacionalidade</label>
                    <input type="text" class="form-control" id="cadastroProfessorNacionalidade" name="nacionalidade" value="{{ $professor->nacionalidade }}">
                </div>
                <div class="col">
                    <label for="cadastroProfessorNaturalidade" class="form-label">Naturalidade</label>
                    <input type="text" class="form-control" id="cadastroProfessorNaturalidade" name="naturalidade" value="{{ $professor->naturalidade }}">
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col">
                    <label for="cadastroProfessorTelefone" class="form-label">Telefone</label>
                    <input type="text" class="form-control" id="cadastroProfessorTelefone" name="telefone"  value="{{ $professor->telefone }}">
                </div>
                <div class="col">
                    <label for="cadastroProfessorEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="cadastroProfessorEmail"name="email"  value="{{ $professor->email }}">
                </div>
                <div class="col">
                    <label for="cadastroProfessorPne" class="form-label">Portador de necessidade</label>
                    <select class="form-select" aria-label="Default select example" name="portador_necessidade">
                        <option>Não</option>
                        <option>Sim</option>
                        <option selected>{{ $professor->portador_necessidade }}</option>
                    </select>
                </div>
            </div>

            <br>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Endereço</label>
                <textarea class="form-control" id="cadastroProfessorEndereco" name="endereco" rows="2"> {{ $professor->endereco }}</textarea>
            </div>

            <br>

            <div class="row">
                <div class="col">
                    <label for="cadastroProfessorBairro" class="form-label">Bairro</label>
                    <input type="text" class="form-control" id="cadastroProfessorBairro" name="bairro"  value="{{ $professor->bairro }}">
                </div>
                <div class="col">
                    <label for="cadastroProfessorCidade" class="form-label">Cidade</label>
                    <input type="text" class="form-control" id="cadastroProfessorCidade" name="cidade"  value="{{ $professor->cidade }}">
                </div>
                <div class="col">
                    <label for="cadastroProfessorCep" class="form-label">CEP</label>
                    <input type="text" class="form-control" id="cadastroProfessorCep" name="cep"  value="{{ $professor->cep }}">
                </div>
                <div class="col">
                    <label for="cadastroProfessorUf" class="form-label">UF</label>
                    <select class="form-select" aria-label="Default select example" name="uf">
                        <option value="PA">PA</option>
                    </select>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col">
                    <label for="cadastroProfessorCampus" class="form-label">Campus</label>
                    <select class="form-select" aria-label="Default select example" name="campus_id">
                        @foreach (session('campus') as $item)
                            @if ($item->id == $professor->campus_id)
                                <option value="{{ $item->id }}" selected>{{ $item->nome }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <br>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>

        </form>
    </div>

    <!--lista de formacoes do professor-->
    <div class="card listFormacoes">
        <div class="card-header">
            Formações
        </div>
        <div class="lista-formacao">
            <ul class="list-group" id="lista-formacao">
            </ul>
            <div id="lista"></div>
        </div>
    </div>

    <br>

    <!--cadastrar formacao do professor-->
    <div class="shadow p-3 mb-5 bg-body rounded">
        <form name="formFormacao" method="post">
            @csrf
            <input type="hidden" name="professor_id" value="{{$professor->id}}">
            <div class="row">
                <div class="col">
                    <label for="cadastroFormacaoGraducao" class="form-label">Graduacao</label>
                    <input type="text" class="form-control" id="cadastroFormacaoGraducao" name="graduacao">
                </div>
                <div class="col">
                    <label for="cadastroFormacaoInstituicao" class="form-label">Instituicao</label>
                    <input type="text" class="form-control" id="cadastroFormacaoInstituicao" name="instituicao">
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col">
                    <label for="cadastroFormacaoPais" class="form-label">País</label>
                    <input type="text" class="form-control" id="cadastroFormacaoPais" name="pais">
                </div>
                <div class="col">
                    <label for="cadastroFormacaoCidade" class="form-label">Cidade</label>
                    <input type="text" class="form-control" id="cadastroFormacaoCidade" name="cidade">
                </div>
                <div class="col">
                    <label for="cadastroFormacaoUf" class="form-label">UF</label>
                    <input type="text" class="form-control" id="cadastroFormacaoUf" name="uf">
                </div>
            </div>

            <br>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-success">Inserir</button>
            </div>
        </form>
    </div>
    <br>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>


    <script>

        $(function() {
            $('form[name="formFormacao"]').submit(function(event) {
                event.preventDefault();

                $.ajax({
                    url: "{{ route('admin.created-formacao') }}",
                    type: 'post',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response){

                        alert(response.message);

                        $("#lista-formacao").empty();

                        getFormacao();

                    }
                });
            });
        });

        var getFormacao = (function(){

            var urlData = "{{ route('admin.formacao-lista', ['id' => ':id']) }}"
            urlData = urlData.replace(":id", "{{$professor->id}}");

            $.get(urlData, function(response) {

                const obj = JSON.parse(response);

                const lista = document.getElementById('lista');

                $("#lista").html("");

                obj.forEach(function(value, idx){
                    const item = document.createElement('a');

                    item.innerHTML = value.graduacao + " " + value.instituicao + " " + value.pais + " " + value.cidade + " " + value.uf + "<hr>";

                    lista.appendChild(item);

                });

            });

        });


    </script>

    <script>
        $(document).ready(function(){
            getFormacao();
        });
 /*
    $('.formGeral').css("display", "block");

    $(document).ready(function(){
            $('.formGeral').css("display", "none");
            $('.listFormacoes').css("display", "none");
            $('.formFormacoes').css("display", "none");
        });
*/
    </script>

@stop
