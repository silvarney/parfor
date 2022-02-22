<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Formacao;

class FormacaoController extends Controller
{
    public function store(Request $request)
    {
        unset($request['_token']);
        unset($request['id']);

        Formacao::create($request->all());

        $result['success'] = true;
        $result['message'] = 'Formação inserida com sucesso';
        echo json_encode($result);

    }

    public function update(Request $request)
    {
        unset($request['_token']);

        Formacao::where('id', $request['id'])->update($request->all());

        $result['success'] = true;
        $result['message'] = 'Formação atualizada com sucesso';
        echo json_encode($result);

    }

    public function destroy($id)
    {

        Formacao::where('id', $id)->update(['status' => 'desativado']);
        //Formacao::where('id', $id)->delete();

        $result['success'] = true;
        $result['message'] = 'Formação excluída com sucesso';

        echo json_encode($result);

    }

    public function getFormacao($id)
    {

        $formacoes = Formacao::find($id);

        echo json_encode($formacoes);

    }

    public function getFormacaoAll($id)
    {

        $formacoes = Formacao::where('professor_id', $id)->where('status', null)->get();

        echo json_encode($formacoes);

    }
}
