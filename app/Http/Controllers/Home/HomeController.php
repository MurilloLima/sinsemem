<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Congresso;
use App\Models\Noticia;
use App\Models\Reunioe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $noticias = Noticia::orderBy('id', 'DESC')->paginate(6);
        $congressos = Congresso::orderBy('id', 'DESC')->paginate(4);
        $reuniao = Reunioe::orderBy('id', 'DESC')->paginate(4);
        return view('home.pages.index', compact(['noticias', 'congressos', 'reuniao']));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function cadastro()
    {
        return view('home.pages.cadastro');
    }


    public function noticias()
    {
        return view('home.pages.noticias');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function download(Request $request)
    {
        $file_path = public_path('home/SINSEMEM.apk');
        return response()->download($file_path);
    }

    /**
     * Display the specified resource.
     */
    public function politica()
    {
        return view('home.pages.politica.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function view($slug)
    {
        $data = Noticia::where('slug', $slug)->first();
        return view('home.pages.noticias.view', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function reset()
    {
        return view('home.pages.user.reset');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
