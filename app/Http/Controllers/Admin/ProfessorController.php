<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Professor;

class ProfessorController extends Controller
{
    public function store(Request $request)
    {
        $cpf = $request['cpf'];

        $professorBd = Professor::where('cpf', $cpf)->first();

        if (isset($professorBd)){

            return redirect('/admin/professor/form-professor/'.$professorBd->id);

        } else {

            $professor = Professor::create($request->all());

            return redirect('/admin/professor/form-professor/'.$professor->id)->with('success', 'CPF registrado com sucesso!');
        }




    }

    public function update(Request $request)
    {

        unset($request['_token']);

        Professor::where('id', $request['id'])->update($request->all());


        return redirect('/admin/professor/form-professor/'.$request['id'])->with('success', 'Dados atualizados com sucesso!');


    }

    public function formProfessor($id)
    {
        $professor = Professor::find($id);

        return view('admin/professor-form', compact('professor'));
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
