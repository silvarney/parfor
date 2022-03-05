@extends('admin.home')

@section('title', 'Cadastro Professor')

@section('body_page')

    <!--cadastrar geral do professor-->
    <div class="shadow p-3 mb-5 bg-body rounded formGeral">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="create-tab" data-toggle="tab" href="#create" role="tab" aria-controls="create" aria-selected="true">Dados</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="list-tab" data-toggle="tab" href="#list" role="tab" aria-controls="list" onclick="redirect()" aria-selected="false">Lista</a>
            </li>
          </ul>

          <br>

          <div class="tab-content" id="myTabContent">

            <!--inicio dados-->
            <div class="tab-pane fade show active" id="create" role="tabpanel" aria-labelledby="create-tab">

                @if (isset($professor))
                    <form action="{{ route('admin.update-professor') }}" method="post">
                        @csrf

                        @if (isset($professor))
                            <input type="hidden" name="id" value="{{ $professor->id }}">
                        @else
                            <input type="hidden" name="cadastroFormacoes[]" id="cadastroFormacoes">
                        @endif

                        <div class="row">
                            <div class="col-6">
                                <label for="cadastroProfessorNome" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="cadastroProfessorNome" name="nome" value="{{ isset($professor) ? $professor->nome : old('nome')}}" required>
                            </div>
                            <div class="col-2">
                                <label for="cadastroProfessorSexo" class="form-label">Sexo</label>
                                <select class="form-control" aria-label="Default select example" name="sexo">
                                    @foreach (config('text.sexo') as $item)
                                        @if (isset($professor) && $professor->sexo === $item)
                                            <option selected>{{$item}}</option>
                                        @else
                                            <option>{{$item}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="cadastroProfessorCpf" class="form-label">CPF</label>
                                <input type="text" class="form-control" id="cadastroProfessorCpf" name="cpf" data-mask="000.000.000-00" value="{{ isset($professor) ? $professor->cpf : old('cpf')}}" required>
                            </div>

                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label for="cadastroProfessorNascimento" class="form-label">Nascimento</label>
                                <input type="date" class="form-control" id="cadastroProfessorNascimento" name="nascimento"  value="{{ isset($professor) ? $professor->nascimento : old('nascimento')}}">
                            </div>
                            <div class="col">
                                <label for="cadastroProfessorRg" class="form-label">RG</label>
                                <input type="text" class="form-control" id="cadastroProfessorRg" name="rg" data-mask="0000000000000"  value="{{ isset($professor) ? $professor->rg : old('rg')}}">
                            </div>
                            <div class="col">
                                <label for="cadastroProfessorEmissao" class="form-label">Data Emissão</label>
                                <input type="date" class="form-control" id="cadastroProfessorEmissao" name="emissao"  value="{{ isset($professor) ? $professor->emissao : old('emissao')}}">
                            </div>
                            <div class="col">
                                <label for="cadastroProfessorNacionalidade" class="form-label">Nacionalidade</label>
                                <input type="text" class="form-control" id="cadastroProfessorNacionalidade" name="nacionalidade" value="{{ isset($professor) ? $professor->nacionalidade : old('nacionalidade')}}">
                            </div>
                            <div class="col">
                                <label for="cadastroProfessorNaturalidade" class="form-label">Naturalidade</label>
                                <input type="text" class="form-control" id="cadastroProfessorNaturalidade" name="naturalidade" value="{{ isset($professor) ? $professor->naturalidade : old('naturalidade')}}" required>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label for="cadastroProfessorTelefone" class="form-label">Telefone</label>
                                <input type="text" class="form-control" id="cadastroProfessorTelefone" name="telefone" data-mask="(00)000000000" value="{{ isset($professor) ? $professor->telefone : old('telefone')}}"  required>
                            </div>
                            <div class="col">
                                <label for="cadastroProfessorEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="cadastroProfessorEmail"name="email"  value="{{ isset($professor) ? $professor->email : old('email')}}">
                            </div>
                            <div class="col">
                                <label for="cadastroProfessorPne" class="form-label">Portador de necessidade</label>
                                <select class="form-control" aria-label="Default select example" name="portador_necessidade">
                                    @foreach (config('text.necessidade') as $item)
                                        @if (isset($professor) && $professor->portador_necessidade === $item)
                                            <option selected>{{$item}}</option>
                                        @else
                                            <option>{{$item}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <br>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Endereço</label>
                            <textarea class="form-control" id="cadastroProfessorEndereco" name="endereco" rows="2">{{ isset($professor) ? $professor->endereco : old('endereco')}}</textarea>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label for="cadastroProfessorBairro" class="form-label">Bairro</label>
                                <input type="text" class="form-control" id="cadastroProfessorBairro" name="bairro"  value="{{ isset($professor) ? $professor->bairro : old('bairro')}}">
                            </div>
                            <div class="col">
                                <label for="cadastroProfessorCidade" class="form-label">Cidade</label>
                                <input type="text" class="form-control" id="cadastroProfessorCidade" name="cidade"  value="{{ isset($professor) ? $professor->cidade : old('cidade')}}">
                            </div>
                            <div class="col">
                                <label for="cadastroProfessorCep" class="form-label">CEP</label>
                                <input type="text" class="form-control" id="cadastroProfessorCep" name="cep" data-mask="00000-000" value="{{ isset($professor) ? $professor->cep : old('cep')}}">
                            </div>
                            <div class="col">
                                <label for="cadastroProfessorUf" class="form-label">UF</label>
                                <select class="form-control" aria-label="Default select example" name="uf">
                                    <option value="PA">PA</option>
                                </select>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label for="cadastroProfessorCampus" class="form-label">Campus</label>
                                <select class="form-control" aria-label="Default select example" name="campus_id">
                                    @foreach ($campus as $item)
                                        @if (isset($professor) && $professor->campus_id === $item->id)
                                            <option value="{{ $item->id }}" selected>{{ $item->nome }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <br>

                        <button type="button" class="btn btn-info" id="btn-show-formacao">Formações</button>
                        <button type="submit" class="btn btn-success">Atualizar</button>
                        <button type="button" class="btn btn-default" onclick='history.go(-1)'>Cancelar</button>


                    </form>

                    <br>
                    <div id="include-formacao" style="display: none">
                        @include('include.professor-formacao')
                    </div>

                @else
                    <form class="form-inline" action="{{route('admin.created-professor')}}" method="post">
                        @csrf
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="inputCpf" class="sr-only">CPF</label>
                            <input type="text" class="form-control" id="inputCpf" name="cpf" data-mask="000.000.000-00" placeholder="CPF" required>
                        </div>
                        <button type="submit" class="btn btn-success mb-2"><i class="fa fa-paper-plane"></i></button>
                    </form>
                @endif

            </div>
            <!--fim dados-->

            <!--inicio lista-->
            <div class="tab-pane fade" id="list" role="tabpanel" aria-labelledby="list-tab">
                <div class="lista-professores">
                    <div id="lista-professores"></div>
                </div>
            </div>
            <!--fim list-->
        </div>

    </div>

    @push('scripts')
        <script>
            $('#myTab a').on('click', function (e) {
                e.preventDefault()
                $(this).tab('show')
            })

            $("#cadastroProfessorNome").blur(function(){
                $(this).val($(this).val().toUpperCase());
            });

            $("#cadastroProfessorNacionalidade").blur(function(){
                $(this).val($(this).val().toUpperCase());
            });

            $("#cadastroProfessorNaturalidade").blur(function(){
                $(this).val($(this).val().toUpperCase());
            });

            $('#btn-show-formacao').on('click', function (e) {
                e.preventDefault()
                $( "#include-formacao" ).toggle();
            })

        </script>

        <script>
            window.onload = function() {
                getListaProfessores();
            };

            var getListaProfessores = (function(){

                var urlData = "{{ route('admin.get.professores') }}"

                $.get(urlData, function(response) {

                    const obj = JSON.parse(response);

                    const lista = document.getElementById('lista-professores');

                    $("#lista-professores").html("");

                    obj.forEach(function(value, idx){
                        const item = document.createElement('a');

                        conteudo = `
                        <div class='row'>
                            <div class='col list-btn'>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href='/admin/professor/relatorio/` + value.id + `' target='_blank' class='btn btn-outline-success btn-sm'>Relatório</a>
                                    <a href='/admin/professor/edit/` + value.id + `' class='btn btn-outline-primary btn-sm'>Editar</a>
                                    @if(\Auth::user()->type === "Admin")
                                        <a href='/admin/professor/del/` + value.id + `' class='btn btn-outline-danger btn-sm'>Excluir</a>
                                    @endif
                                </div>
                                &nbsp;
                                Professor: <b>` + value.nome + `</b> - CPF: <b>` + value.cpf + `</b> - Cidade: <b>` + value.cidade + `
                            </div>
                        </div>
                        `;

                        item.innerHTML = conteudo;

                        lista.appendChild(item);

                    });

                });
            });

            $(function() {
                $('form[name="formFormacao"]').submit(function(event) {
                    event.preventDefault();

                    $.ajax({
                        url: "{{ route('admin.created-formacao') }}",
                        type: 'post',
                        data: $(this).serialize(),
                        dataType: 'json',
                        success: function(response){

                            toastr.success(response.message);

                            $("#lista-formacao").empty();

                            getFormacao();

                        }
                    });

                    $(this).trigger("reset");
                });
            });

            function redirect() {
                window.location.href = "/admin/professor#list";
            }

        </script>

        @stack('scripts_formacao')
    @endpush

@stop
