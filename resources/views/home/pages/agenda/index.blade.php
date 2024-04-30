@extends('home.layouts.app')
@section('title', 'Agendar atendimento')

@section('content')
    <div id="noticias" class="pricing-tables">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-heading">
                        <h4>Agendar atendimento</h4>
                        <img src="{{ asset('home/assets/images/heading-line-dec.png') }}" alt="">
                        <p>Preencha o fomulário baixa e agende seu atendimento.</p>
                    </div>
                </div>

            </div>
            <div class="col-lg-8 offset-lg-2">
                @if ($errors->any())
                    <div class="alert alert-danger text-center" style="margin: 10px;">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="text-align: center">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('msg'))
                    <div class="row">
                        <div class="col-md-12" \>
                            <div class="alert alert-success text-center"
                                style="color: white; margin: 10px; background-color:#E81314; text-align: center">
                                {{ session('msg') }}
                            </div>
                        </div>
                    </div>
                @endif
                <form action="{{ route('home.pages.agenda.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Nome</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="col-lg-3">
                                <label for="">Data</label>
                                <input type="date" name="date" class="form-control">
                            </div>
                            <div class="col-lg-3">
                                <label for="Telefone">Telefone</label>
                                <input type="text" name="fone" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <label for="">Assunto</label>
                            <input type="text" name="assunto" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Mensagem</label>
                        <textarea name="msg" class="form-control" cols="30" rows="10"></textarea><br>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

@endsection
