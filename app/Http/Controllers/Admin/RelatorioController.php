<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Alocacao;
use App\Models\Admin\Curso;
use App\Models\Admin\Disciplina;
use App\Models\Admin\Edital;
use App\Models\Admin\Formacao;
use App\Models\Admin\Professor;
use App\Models\Admin\Turma;
use Illuminate\Http\Request;
use \Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;

class RelatorioController extends Controller
{
    public function relatorioEdital($id)
    {
        $edital = Edital::find($id);

        $alocacao = Alocacao::where('edital_id', $id)->first();

        $professores = Professor::join('disciplina_professores', 'professores.id', 'disciplina_professores.professor_id')
                                ->select('professores.*', 'disciplina_professores.posicao', 'disciplina_professores.pontos')
                                ->where('disciplina_professores.edital_id', $id)
                                ->orderBy('disciplina_professores.pontos', 'desc')
                                ->whereNull('disciplina_professores.deleted_at')
                                ->get();

        $disciplinas = Disciplina::join('disciplina_professores', 'disciplinas.id', 'disciplina_professores.disciplina_id')
                                ->select('disciplinas.*')
                                ->where('disciplina_professores.edital_id', $id)
                                ->whereNull('disciplina_professores.deleted_at')
                                ->distinct()
                                ->get();

        $disciplinas_ids = array_column($disciplinas->toArray(), 'id');
        $turmas = Turma::selectRaw('DISTINCT nome, curso_id')
                                ->whereIn('disciplina_id', array_values($disciplinas_ids))
                                ->orderBy('nome')
                                ->get();

        $cursos = Curso::whereIn('id', array_column($turmas->toArray(), 'curso_id'))->get();

        $string = $edital['numero'].'-'.now();

        return Pdf::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
        ->loadView('admin.relatorio-edital', compact('edital', 'professores', 'disciplinas', 'turmas', 'cursos'))
                // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
                ->stream('relatorio-edital-'.Str::slug($string, '-').'.pdf');
    }

    public function relatorioProfessor($id)
    {
        $professor = Professor::find($id);
        $formacoes = Formacao::where('professor_id', $id)->get();
        $editais = Edital::join('disciplina_professores', 'editais.id', 'disciplina_professores.edital_id')
                ->select('editais.*', 'disciplina_professores.pontos')
                ->where('disciplina_professores.professor_id', $id)
                ->whereNull('disciplina_professores.deleted_at')
                ->distinct()
                ->orderBy('editais.numero', 'asc')
                ->get();
        $disciplinas = Disciplina::join('disciplina_professores', 'disciplinas.id', 'disciplina_professores.disciplina_id')
                        ->select('disciplinas.*')
                        ->where('disciplina_professores.professor_id', $id)
                        ->whereNull('disciplina_professores.deleted_at')
                        ->get();
        $disciplinas_ids = array_column($disciplinas->toArray(), 'id');
        $turmas = Turma::selectRaw('DISTINCT nome, curso_id')
              ->whereIn('disciplina_id', array_values($disciplinas_ids))
              ->orderBy('nome')
              ->get();
        $turmas_ids = array_column($turmas->toArray(), 'curso_id');

        $cursos = Curso::whereIn('id', array_values($turmas_ids))->get();

        $string = $professor['nome'].'-'.now();

        return Pdf::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
        ->loadView('admin.relatorio-professor', compact('professor', 'formacoes', 'editais', 'cursos', 'turmas', 'disciplinas'))
                // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
                ->stream('relatorio-professor-'.Str::slug($string, '-').'.pdf');

    }
}
