<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\RestoreModel;
use App\Providers\JsonServiceProvider as JsonFile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Campus;

class CampusController extends Controller
{
    public function index(JsonFile $jsonFile)
    {
        $list_campus = Campus::where('status', null)->get();
        $cidades = $jsonFile->getCidades();

        return view('admin/campus-cadastro', compact('list_campus', 'cidades'));
    }

    public function edit(JsonFile $jsonFile, $id)
    {
        $list_campus = new Campus();
        $cidades = $jsonFile->getCidades();

        $list_campus = $list_campus->where('status', null)->get();
        $campus = $list_campus->where('id', $id)->first();

        return view('admin/campus-cadastro', compact('list_campus', 'campus', 'cidades'));
    }

    public function store(Request $request, Campus $campus)
    {
        if (RestoreModel::restore($campus, 'cidade', $request->nome)) {
            return redirect('/admin/campus')->with('success', 'Item restaurado com sucesso');
        } else {
            $request['cidade'] = $request->nome;
            Campus::create($request->all());

            return redirect('/admin/campus')->with('success', 'Item cadastrado com sucesso');
        }

    }

    public function show($id)
    {
        //
    }

    public function update(Request $request)
    {
        unset($request['_token']);

        $request['cidade'] = $request->nome;

        Campus::where('id', $request['id'])->update($request->all());

        return redirect('/admin/campus')->with('success', 'Campus alterado com sucesso');

    }

}
