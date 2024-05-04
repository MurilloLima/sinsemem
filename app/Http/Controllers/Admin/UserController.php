<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('admin.pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // 'role' => 'required',
            // 'matricula' => ['required', 'unique:' . User::class],
            // 'sexo' => 'required',
            // 'endereco' => 'required',
            // 'profissao' => 'required',
            'email' => ['required', 'unique:' . User::class],
            'matricula' => ['required', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);
        $user = User::create([
            'name' => $request->name,
            'role' => 2,
            'matricula' => $request->matricula,
            // 'sexo' => $request->sexo,
            // 'endereco' => $request->endereco,
            // 'profissao' => $request->profissao,
            'email' => $request->email,
            'matricula' => $request->matricula,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Display the specified resource.
     */
    public function carteira()
    {
        return view('admin.pages.carteira.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function servidores()
    {
        return view('admin.pages.servidores.create');
    }

    public function servistore(Request $request)
    {
        // dd(User::find(auth()->user()->id));
        $request->validate(
            [
                'name' => 'required',
                'matricula' => 'required',
                'cidade' => 'required',
                'uf' => 'required',
                'nacionalidade' => 'required',
                'natural' => 'required',
                'rg' => 'required',
                'email' => ['required', 'unique:' . User::class],
                'cargo' => 'required',
                'nivel' => 'required',
                'lotacao' => 'required',
            ]
        );
        User::create([
            'name' => $request->name,
            'matricula' => $request->matricula,
            'estado_civil' => $request->estado_civil,
            'endereco' => $request->endereco,
            'cep' => $request->cep,
            'cidade' => $request->cidade,
            'uf' => $request->uf,
            'natural' => $request->natural,
            'rg' => $request->rg,
            'email' => $request->email, //cpf
            'cargo' => $request->cargo,
            'nivel' => $request->nivel,
            'lotacao' => $request->lotacao,
            'pai' => $request->pai,
            'mae' => $request->mae,
            'password' => Hash::make('12345678'),
        ]);

        return redirect()->back()->with('msg', 'Cadastro realizado com sucesso, senha padrão para o usuário é 12345678');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $data = User::find(auth()->user()->id);
        // dd(User::find(auth()->user()->id));
        $request->validate(
            [
                'name' => 'required',
                // 'email' => 'required',
                'estado_civil' => 'required',
                'endereco' => 'required',
                'cep' => 'required',
                'cidade' => 'required',
                'uf' => 'required',
                'nacionalidade' => 'required',
                'natural' => 'required',
                'rg' => 'required',
                // 'email' => 'required',
                'cargo' => 'required',
                'nivel' => 'required',
                'lotacao' => 'required',
                'pai' => 'required',
                'mae' => 'required',
            ]
        );

        $data->name = $request->name;
        $data->estado_civil = $request->estado_civil;
        $data->endereco = $request->endereco;
        $data->cep = $request->cep;
        $data->cidade = $request->cidade;
        $data->uf = $request->uf;
        $data->natural = $request->natural;
        $data->rg = $request->rg;
        $data->email = $request->email; //email
        $data->email2 = $request->email2; //email
        $data->cargo = $request->cargo;
        $data->nivel = $request->nivel;
        $data->lotacao = $request->lotacao;
        $data->pai = $request->pai;
        $data->nacionalidade = $request->nacionalidade;
        $data->mae = $request->mae;
        $data->update();
        return redirect()->back()->with('msg', 'Inscrição realizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function foto(Request $request, $id)
    {
        $request->validate([
            'img' => 'required'
        ]);
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('upload/fotoperfil/'), $imageName);
            $data = User::find($id);
            $data->img = $imageName;
            $data->update();
            return redirect()->back()->with('msg', 'Foto alterada com sucesso!');
        }
    }

    public function view($id)
    {
        $data = User::find($id);
        return view('admin.pages.users.view', compact('data'));
    }

    public function reset()
    {
        return view('admin.pages.users.reset-password');
    }

    public function resetupdate(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->update([
            'password' => Hash::make($request->password)
        ]);
        return redirect()->back()->with('msg', 'Senha alterada com sucesso!');
    }
}
