<?php

namespace App\Http\Controllers;

use App\Models\Arquivo;
use Illuminate\Http\Request;

class ArquivoController extends Controller
{
    private $arquivo;
    public function __construct(Arquivo $arquivo)
    {
        $this->arquivo = $arquivo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Arquivo::orderBy('id', 'desc')->get();
        return view('admin.pages.arquivos.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required',
            'title' => 'required',
        ]);

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $imageName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('upload/arquivo'), $imageName);
            $this->arquivo->file = $imageName;
            $this->arquivo->user_id = auth()->user()->id;
            $this->arquivo->title = $request->title;
            $this->arquivo->save();
            return redirect()->back()->with('msg', 'Arquivo anexado com sucesso!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Arquivo $arquivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Arquivo $arquivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Arquivo $arquivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->arquivo->destroy($id);
        return redirect()->back()->with('msg', 'Deletada com sucesso!');
    }
}
