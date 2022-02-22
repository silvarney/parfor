<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Campus;
use Illuminate\Http\Request;

use App\Models\Admin\Curso;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campus = Campus::where('status', null)->get();

        $list_curso = DB::table('cursos')
                        ->join('campus', 'cursos.campus_id', 'campus.id')
                        ->where('cursos.status', null)
                        ->select('cursos.*', 'campus.nome as campus_nome')
                        ->get();

        return view('admin/curso-cadastro', compact('campus', 'list_curso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $campus = Campus::where('status', null)->get();

        $curso = new Curso();
        $list_curso = $curso->where('cursos.status', null)
                            ->join('campus', 'cursos.campus_id', 'campus.id')
                            ->select('cursos.*', 'campus.nome as campus_nome')
                            ->get();
        $curso = $curso->find($id);

        return view('admin/curso-cadastro', compact('campus', 'list_curso', 'curso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Curso::create($request->all());

        return redirect('/admin/curso')->with('success', 'Curso cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        unset($request['_token']);

        Curso::where('id', $request['id'])->update($request->all());


        return redirect('/admin/curso/')->with('success', 'Dados atualizados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Curso::where('id', $id)->update(['status' => 'desativado']);

        return redirect('admin/curso')->with('delete', 'Curso desativado com sucesso!');

    }
}
