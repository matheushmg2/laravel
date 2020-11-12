<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::all();
        return view("Modal.empModal")->with('itens' , $employee);
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
            'endereco' => 'required',
            'tel' => 'required'
        ]);

        $employee = new Employee();
        $employee->pNome = $request->input('pNome');
        $employee->sNome = $request->input('sNome');
        $employee->endereco = $request->input('endereco');
        $employee->tel = $request->input('tel');

        $employee->save();

        return redirect('/employee')->with('success', 'Dados Salvo!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        //return view('Produtos.show', ['item' => $employee]);
        return view("Modal.empModal")->with('items' , $employee);
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
            'endereco' => 'required',
            'tel' => 'required'
        ]);

        $employee = Employee::find($id);
        $employee->pNome = $request->input('pNome');
        $employee->sNome = $request->input('sNome');
        $employee->endereco = $request->input('endereco');
        $employee->tel = $request->input('tel');

        $employee->save();

        return redirect('/employee')->with('success', 'Dados Editado Salvo!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
