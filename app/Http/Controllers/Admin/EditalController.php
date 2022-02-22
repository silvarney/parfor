<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Edital;

class EditalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editais = Edital::where('status', null)->get();

        return view('admin/edital-cadastro', compact('editais'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $newEdital = new Edital();
        $editais = $newEdital->where('status', null)->get();
        $edital = $newEdital->find($id);


        return view('admin/edital-cadastro', compact('edital', 'editais'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Edital::create($request->all());

        return redirect('/admin/edital')->with('success', 'Edital cadastrado com sucesso');
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

        Edital::where('id', $request['id'])->update($request->all());

        return redirect('/admin/edital')->with('success', 'Edital cadastrado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Edital::where('id', $id)->update(['status' => 'desativado']);

        return redirect('admin/edital')->with('delete', 'Edital desativado com sucesso!');
    }
}
