<?php

namespace App\Http\Controllers\Admin;

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

    public function store(Request $request)
    {
        $request['cidade'] = $request->nome;
        Campus::create($request->all());

        return redirect('/admin/campus')->with('success', 'Campus cadastrado com sucesso');
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

    public function destroy($id)
    {
        Campus::where('id', $id)->update(['status' => 'desativado']);

        return redirect('admin/campus')->with('delete', 'Campus desativado com sucesso!');
    }
}
