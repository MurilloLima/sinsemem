@extends('home.layouts.app')
@section('title', 'Cadastro')

@section('content')
    <div id="noticias" class="pricing-tables">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-heading">
                        <h4>Cadastro</h4>
                        <img src="{{ asset('home/assets/images/heading-line-dec.png') }}" alt="">
                        <p>Mantenha-se atualizado sobre tudo aque acontece na sinsemem.</p>

                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger text-center">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="text-align: center">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('msg'))
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <div class="alert alert-success text-center" style="color: black">
                                {{ session('msg') }}
                            </div>
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-6 offset-md-3 text-center">
                        <form method="POST" action="{{ route('home.pages.user.store') }}">
                            @csrf

                            <label for="">Nome completo</label>
                            <input type="text" name="name" class="form-control">

                            <label for="">CPF*</label>
                            <input oninput="mascara(this)" type="text" name="email" class="form-control">

                            <label for="">Matrícula funcional</label>
                            <input type="text" name="matricula" class="form-control">

                            {{-- <label for="">Profissão</label>
                            <input type="text" name="profissao" class="form-control">

                            <label for="">Sexo</label>
                            <select name="sexo" class="form-control">
                                <option value=""></option>
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                            </select> 

                            <label for="">Endereço</label>
                            <input type="text" name="endereco" class="form-control">

                            <label for="">CPF</label>
                            <input type="text" name="email" class="form-control"> --}}

                            <label for="">Senha</label>
                            <input type="password" name="password" class="form-control">

                            <label for="">Confirmar senha</label>
                            <input type="password" name="password_confirmation" class="form-control" required
                                autocomplete="new-password">

                            <input type="hidden" name="role" value="2">

                            <br>
                            <input type="submit" value="Cadastrar-se" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>One fine body…</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
