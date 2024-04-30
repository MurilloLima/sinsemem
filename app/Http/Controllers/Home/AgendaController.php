<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home.pages.agenda.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function indexadmin()
    {
        $data = Agenda::latest()->get();
        return view('admin.pages.agenda.index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'fone' => 'required',
            'assunto' => 'required',
            'msg' => 'required',
        ]);


        Agenda::create([
            'name' => $request->name,
            'date' => $request->date,
            'fone' => $request->fone,
            'assunto' => $request->assunto,
            'msg' => $request->msg,
        ]);
        return redirect()->back()->with('msg', 'Agendamento criado sucesso!');
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
    public function destroy(string $id)
    {
        //
    }
}
