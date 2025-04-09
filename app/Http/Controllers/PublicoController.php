<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Edital;
use App\Models\Admin\Alocacao;

class PublicoController extends Controller
{
    public function index()
    {
        return view('inicio');
    }

    public function edital()
    {
        $editais = Edital::where('status', null)->get();

        return view('edital', compact('editais'));
    }

    public function pesquisa($id)
    {
        $alocacoes = DB::table('disciplina_professores')
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
                ->where('disciplina_professores.status', null)
                ->where('disciplina_professores.edital_id', $id)
                ->whereNull('disciplina_professores.deleted_at')
                ->orderBy('disciplina_professores.edital_id')
                ->orderBy('disciplina_professores.pontos', 'desc')
                ->get();

        return response()->json($alocacoes);
    }
}
