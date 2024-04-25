<?php

namespace App\Http\Controllers;

use \Validator;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            // 'profissao' => 'required',
            // 'matricula' => 'required',
            // 'sexo' => 'required',
            // 'endereco' => 'required',
            'cpf' => 'required|unique:users',
            'password' => 'required',
        ]);


        User::create([
            'name' => $request->name,
            // 'profissao' => $request->profissao,
            // 'role' => $request->role,
            // 'matricula' => $request->matricula,
            // 'sexo' => $request->sexo,
            // 'endereco' => $request->endereco,
            'cpf' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Display the specified resource.
     */
    public function reset(Request $request)
    {
        dd($request->all());
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
