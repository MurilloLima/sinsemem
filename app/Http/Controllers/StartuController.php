<?php

namespace App\Http\Controllers;

use App\Models\Startu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StartuController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Startu $startu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Startu $startu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (Startu::where('userid', '=', $id)->first() == NULL) {
            Startu::create([
                'userid' => $id,
                'startu' => $request->startu,
            ]);
            return redirect()->back()->with('msg', 'Alterado com sucesso!');
        } else {
            $data = Startu::where('userid', '=', $id)->first();
            $data->userid = $id;
            $data->startu = $request->startu;
            $data->update();
            return redirect()->back()->with('msg', 'Alterado com sucesso!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Startu $startu)
    {
        //
    }
}
