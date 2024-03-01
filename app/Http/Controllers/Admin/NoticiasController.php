<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NoticiasController extends Controller
{
    private $noticia;
    public function __construct(Noticia $noticia)
    {
        $this->noticia = $noticia;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $noticias = Noticia::orderBy('id', 'DESC')->paginate(15);
        return view('admin.pages.noticias.index', compact('noticias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.noticias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'titulo' => 'required',
            'desc' => 'required',
            'conteudo' => 'required',
        ]);


        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('upload/noticias'), $imageName);
            $this->noticia->image = $imageName;
            $this->noticia->titulo = $request->titulo;
            $this->noticia->slug = Str::slug($request->titulo, '-');
            $this->noticia->desc = $request->desc;
            $this->noticia->conteudo = $request->conteudo;
            $this->noticia->save();
            return redirect()->back()->with('msg', 'Cadastrado com sucesso!');
        }
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
        $classe = Noticia::find($request->id);
        $classe->delete();
        return redirect()->back()->with('msg', 'Deletado com sucesso!');

    }
}
