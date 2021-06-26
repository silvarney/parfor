<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Campus;

class CampusController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {

        Campus::create($request->all());

        return redirect('/admin/campus')->with('success', 'Campus cadastrado com sucesso');
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Campus::where('id', $id)->update(['status' => 'desativado']);

        return redirect('admin/campus')->with('delete', 'Campus desativado com sucesso!');
    }
}
