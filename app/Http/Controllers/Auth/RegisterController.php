<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'cpf' => 'required',
            // 'role' => 'required',
            // 'matricula' => 'required',
            // 'sexo' => 'required',
            // 'endereco' => 'required',
            // 'profissao' => 'required',
            'cpf' => ['required', 'string', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        return view('home.registro.index');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $request)
    {

        User::create([
            'name' => $request->name,
            'email' => $request->cpf,
            'role' => $request->role,
            'matricula' => $request->matricula,
            'sexo' => $request->sexo,
            'endereco' => $request->endereco,
            'profissao' => $request->profissao,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect(RouteServiceProvider::HOME);
    }
}
