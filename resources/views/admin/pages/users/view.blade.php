@extends('admin.layout.app')
@section('title', 'Dados servidor')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        {{-- <h1 class="m-0">Meus dados</h1> --}}
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
                            {{-- <li class="breadcrumb-item active">Dashboard v1</li> --}}
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Servidores</h3>
                            </div>

                            <div class="card-body">
                                <p><strong>Nome:</strong> {{ $data->name }}</p>
                                <p><strong>Sexo:</strong> {{ $data->sexo }}</p>
                                <p><strong>Matricula:</strong> {{ $data->matricula }}</p>
                                <p><strong>CPF:</strong> {{ $data->email }}</p>
                                <p><strong>E-mail:</strong> {{ $data->email2 }}</p>
                                <p><strong>Endereco:</strong>{{ $data->endereco }}</p>
                                <p><strong>CEP:</strong>{{ $data->cep }}</p>
                                <p><strong>Estado civil: {{ $data->estado_civil }}</strong></p>
                                <p><strong>Cidade: {{$data->cidade}}</strong></p>
                                <p><strong>UF:</strong> {{$data->uf}}</p>
                                <p><strong>Natural:</strong> {{$data->natural}}</p>
                                <p><strong>CPF:</strong> {{$data->cpf}}</p>
                                <p><strong>RG:</strong> {{$data->rg}}</p>
                                <p><strong>Cargo:</strong> {{$data->cargo}}</p>
                                <p><strong>Nivel:</strong> {{$data->nivel}}</p>
                                <p><strong>Lotação:</strong> {{$data->lotacao}}</p>
                                <p><strong>Pai:</strong> {{$data->pai}}</p>
                                <p><strong>Mãe:</strong> {{$data->mae}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
