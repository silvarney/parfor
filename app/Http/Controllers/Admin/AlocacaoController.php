<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Alocacao;
use App\Models\Admin\Disciplina;
use App\Models\Admin\Edital;
use App\Models\Admin\Professor;
use Illuminate\Support\Facades\DB;

class AlocacaoController extends Controller
{
    public function index()
    {
        $editais = Edital::where('status', null)->get();

        $professores = Professor::orderBy('nome')->get();

        $disciplinas = Disciplina::where('status', null)->orderBy('nome')->get();

        $list_alocacoes = DB::table('disciplina_professores')
                ->join('editais', function ($join) {
                    $join->on('disciplina_professores.edital_id', '=', 'editais.id');
                })
                ->join('professores', function ($join) {
                    $join->on('disciplina_professores.professor_id', '=', 'professores.id');
                })
                ->join('disciplinas', function ($join) {
                    $join->on('disciplina_professores.disciplina_id', '=', 'disciplinas.id');
                })
                ->select('disciplina_professores.id', 'disciplina_professores.posicao', 'disciplina_professores.pontos', 'editais.numero as edital_numero', 'professores.nome as professor_nome', 'disciplinas.nome as disciplinas_nome')
                ->orderBy('disciplina_professores.edital_id')
                ->orderBy('disciplina_professores.posicao', 'asc')
                ->get();

        return view('admin/alocacao-cadastro', compact('list_alocacoes', 'editais', 'professores', 'disciplinas'));
    }

    public function edit($id)
    {
        $editais = Edital::where('status', null)->get();

        $professores = Professor::orderBy('nome')->get();

        $disciplinas = Disciplina::where('status', null)->orderBy('nome')->get();

        $alocacao = Alocacao::find($id);

        $list_alocacoes = DB::table('disciplina_professores')
                ->join('editais', function ($join) {
                    $join->on('disciplina_professores.edital_id', '=', 'editais.id');
                })
                ->join('professores', function ($join) {
                    $join->on('disciplina_professores.professor_id', '=', 'professores.id');
                })
                ->join('disciplinas', function ($join) {
                    $join->on('disciplina_professores.disciplina_id', '=', 'disciplinas.id');
                })
                ->select('disciplina_professores.id', 'disciplina_professores.posicao', 'disciplina_professores.pontos', 'editais.numero as edital_numero', 'professores.nome as professor_nome', 'disciplinas.nome as disciplinas_nome')
                ->orderBy('disciplina_professores.disciplina_id')
                ->orderBy('disciplina_professores.pontos', 'desc')
                ->get();

        return view('admin/alocacao-cadastro', compact('list_alocacoes', 'alocacao', 'editais', 'professores', 'disciplinas'));
    }

    public function store(Request $request)
    {
        Alocacao::create($request->all());

        static::positionEdital($request->edital_id);

        return redirect('/admin/alocacao')->with('success', 'Alocação realizada com sucesso');
    }

    public function update(Request $request)
    {
        unset($request['_token']);

        Alocacao::where('id', $request['id'])->update($request->all());

        static::positionEdital($request['edital_id']);

        return redirect('/admin/alocacao')->with('success', 'Alocação alterada com sucesso');

    }

    public function destroy($id)
    {
        Alocacao::where('id', $id)->update(['status' => 'desativado']);

        return redirect('admin/alocacao')->with('delete', 'Alocacao desativado com sucesso!');
    }

    public static function positionEdital($edital_id)
    {
        $key = 1;

        $professores = Alocacao::where('edital_id', $edital_id)->get();

        $professoresOrdenados = $professores->sortByDesc('pontos');

        foreach ($professoresOrdenados as $item) {
            DB::table('disciplina_professores')->where('id', $item->id)->update(['posicao' => $key]);
            $key++;
        }
    }
}
