<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reunioe;
use Illuminate\Http\Request;

class ReunioesController extends Controller
{
    private $reuniao;
    public function __construct(Reunioe $reuniao)
    {
        $this->reuniao = $reuniao;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reunioes = Reunioe::orderBy('id', 'DESC')->paginate();
        return view('admin.pages.reunioes.index', compact('reunioes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.reunioes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'assunto' => 'required',
            'local' => 'required',
            'data' => 'required',
            'horario' => 'required',
        ]);
        $this->reuniao->assunto = $request->assunto;
        $this->reuniao->local = $request->local;
        $this->reuniao->data = $request->data;
        $this->reuniao->horario = $request->horario;
        $this->reuniao->save();
        return redirect()->back()->with('msg', 'Cadastrado com sucesso!');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $classe = Reunioe::find($request->id);
        $classe->delete();
        return redirect()->back()->with('msg', 'Deletado com sucesso!');
    }
}
