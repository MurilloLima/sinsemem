<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Congresso;
use Illuminate\Http\Request;

class CongressoController extends Controller
{
    private $congresso;
    public function __construct(Congresso $congresso)
    {
        $this->congresso = $congresso;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $congressos = Congresso::orderBy('id', 'DESC')->paginate(15);
        return view('admin.pages.congresso.index', compact('congressos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.congresso.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'local' => 'required',
            'data' => 'required',
        ]);
        $this->congresso->nome = $request->nome;
        $this->congresso->local = $request->local;
        $this->congresso->data = $request->data;
        $this->congresso->save();
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
        $classe = Congresso::find($request->id);
        $classe->delete();
        return redirect()->back()->with('msg', 'Deletado com sucesso!');
    }
}
