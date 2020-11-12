<?php

namespace App\Http\Controllers;

use App\Estudantes;
use Illuminate\Http\Request;

class EstudantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudantes = Estudantes::all();
        return view('Estudantes.estudantes')->with("estudantes", $estudantes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request, [
            'pNome' => 'required',
            'sNome' => 'required',
            'cursos' => 'required',
            'secao' => 'required'
        ]);
        $estudantes = new Estudantes();
        $estudantes->pNome = $request->input('pNome');
        $estudantes->sNome = $request->input('sNome');
        $estudantes->cursos = $request->input('cursos');
        $estudantes->secao = $request->input('secao');

        $estudantes->save();
        return redirect()->route('estudantes.index')->with('success', 'Dados Inserido com Sucesso!');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'pNome' => 'required',
            'sNome' => 'required',
            'cursos' => 'required',
            'secao' => 'required'
        ]);
        $estudantes = Estudantes::find($id);
        $estudantes->pNome = $request->input('pNome');
        $estudantes->sNome = $request->input('sNome');
        $estudantes->cursos = $request->input('cursos');
        $estudantes->secao = $request->input('secao');

        $estudantes->save();

        return $estudantes;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estudantes = Estudantes::find($id);
        $estudantes->delete();
        return $estudantes;
    }
}
