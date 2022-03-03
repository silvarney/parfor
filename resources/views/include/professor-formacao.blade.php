<hr>

<div class="shadow p-3 mb-5 bg-body rounded">
    <form id="formFormacao" name="formFormacao" method="post">
        @csrf

        <input type="hidden" name="id" value="">
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
            <button type="submit" id="btn-insert-formacao" class="btn btn-success">Inserir</button>
            <button type="button" id="btn-update-formacao" class="btn btn-primary" hidden>Atualizar</button>
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

@push('scripts_formacao')
    <script>
        window.onload = function() {
            getFormacao();
        };
        var getFormacao = (function(){

            var urlData = "{{ route('admin.formacao-lista', ['id' => ':id']) }}"
            urlData = urlData.replace(":id", "{{$professor->id}}");

            $.get(urlData, function(response) {

                const obj = JSON.parse(response);

                const lista = document.getElementById('lista');

                $("#lista").html("");

                obj.forEach(function(value, idx){
                    const item = document.createElement('a');

                    conteudo = `
                    <div class='row'>
                        <div class='col'>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href='javascript: void(0);' onclick='editFomacao(`+value.id+`)' class='btn btn-outline-primary btn-sm'>Editar</a>
                                @if(\Auth::user()->type === "Admin")
                                    <a href='javascript: void(0);' onclick='delFomacao(`+value.id+`)' class='btn btn-outline-danger btn-sm'>Excluir</a>
                                @endif
                            </div>
                            Graduacao: <b>` + value.graduacao + `</b> - Instituição: <b>` + value.instituicao + `
                        </div>
                    </div>
                    `;

                    item.innerHTML = conteudo;

                    lista.appendChild(item);

                });

            });

        });

        function editFomacao(id){
            var urlData = "{{ route('admin.get.formacao', ['id' => ':id']) }}"
            urlData = urlData.replace(":id", id);

            $.get(urlData, function(response) {

                const obj = JSON.parse(response);

                $('input[name="graduacao"]').val(obj.graduacao);
                $('input[name="instituicao"]').val(obj.instituicao);
                $('input[name="pais"]').val(obj.pais);
                $('input[name="cidade"]').val(obj.cidade);
                $('input[name="uf"]').val(obj.uf);
                $('input[name="id"]').val(obj.id);

                $("#btn-insert-formacao").hide();
                $("#btn-update-formacao").removeAttr('hidden');

            });
        }

        function delFomacao(id){
            $.get("{{ url('admin/formacao/del/') }}/"+id);
            getFormacao();
        }

        $("#btn-update-formacao").click(function() {
            console.log($('#formFormacao').serialize());

            $.ajax({
                url: "{{ route('admin.update-formacao') }}",
                type: 'post',
                data: $('#formFormacao').serialize(),
                dataType: 'json',
                success: function(response){

                    toastr.success(response.message);

                    $("#lista-formacao").empty();

                    getFormacao();

                }
            });

            $("#btn-insert-formacao").show();
            $("#btn-update-formacao").hide();
            $('#formFormacao').trigger("reset");
        });

    </script>
@endpush
