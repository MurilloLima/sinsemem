<?php

namespace App\Http\Controllers;

use App\Models\Mensagen;
use Illuminate\Http\Request;

class MensagenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Mensagen::orderBy('id', 'DESC')->get();
        return view('admin.pages.mensagem.index', compact('data'));
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
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Mensagen $mensagen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mensagen $mensagen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mensagen $mensagen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mensagen $mensagen)
    {
        //
    }
}
