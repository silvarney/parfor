<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Campus;
use Illuminate\Http\Request;

use App\Models\Admin\Professor;

class ProfessorController extends Controller
{
    public function index()
    {
        $campus = Campus::where('status', null)->get();

        return view('admin/professor-cadastro', compact('campus'));
    }

    public function edit($id)
    {
        $campus = Campus::where('status', null)->get();
        $professor = Professor::find($id);

        $lista_professores = Professor::all();

        return view('admin/professor-cadastro', compact('campus', 'professor', 'lista_professores'));
    }

    public function store(Request $request)
    {

        $professor = Professor::create($request->all());

        return redirect('/admin/professor/edit/'.$professor->id)->with('success', 'Professor cadastrado com sucesso!');

    }

    public function update(Request $request)
    {

        unset($request['_token']);

        Professor::where('id', $request['id'])->update($request->all());


        return redirect('/admin/professor/')->with('success', 'Dados atualizados com sucesso!');


    }

    public function destroy($id)
    {
        Campus::where('id', $id)->update(['status' => 'desativado']);

        return redirect('admin/professor')->with('delete', 'O Professor foi deletado!');
    }

    //funcoes para alimentar javascript

    public function getProfessores()
    {
        $professores = Professor::all();

        //$output['data'] = $professores;
        echo json_encode($professores);
        //return response()->json($professores);

    }
}




/*
    public function store(Request $request, Professor $professor)
    {

        $cpf = $request->cpf;

        $data = $professor->where('cpf', $cpf)->first();

        if (isset($data)) {

            $return['success'] = true;
            $return['message'] = 'CPF já cadastrado';
            $return['data'] = $cpf;
            echo json_encode($return);

        } elseif (!isset($data)) {

            $professor->returne($request->all());
            $return['success'] = true;
            $return['message'] = 'CPF cadastrado com sucesso';
            echo json_encode($return);

        }

    }
*/
