<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class InscricaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.incricao.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'email2' => 'required',
                'cpf' => 'required',
                'estado_civil' => 'required',
                'endereco' => 'required',
                'cep' => 'required',
                'cidade' => 'required',
                'uf' => 'required',
                'nacionalidade' => 'required',
                'natural' => 'required',
                'rg' => 'required',
                'email' => 'required',
                'cargo' => 'required',
                'nivel' => 'required',
                'lotacao' => 'required',
                'pai' => 'required',
                'mae' => 'required',
            ]
        );

        $data = User::find(auth()->user()->id);
        $data->name = $request->name;
        $data->cpf = $request->cpf;
        $data->email = $request->email;
        $data->estado_civil = $request->estado_civil;
        $data->endereco = $request->endereco;
        $data->cep = $request->cep;
        $data->cidade = $request->cidade;
        $data->uf = $request->uf;
        $data->nacionalidade = $request->nacionalidade;
        $data->natural = $request->natural;
        $data->rg = $request->rg;
        $data->email2 = $request->email2; //cpf
        $data->cargo = $request->cargo;
        $data->nivel = $request->nivel;
        $data->lotacao = $request->lotacao;
        $data->pai = $request->pai;
        $data->mae = $request->mae;
        $data->save();
        return redirect()->back()->with('msg', 'Inscrição salva com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
