@extends('admin.layout.app')
@section('title', 'Home')

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
                <!-- Small boxes (Stat box) -->
                @if (auth()->user()->role == 2)
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-2 col-3">
                                <a href="{{ route('admin.pages.ficha.create') }}" class="btn btn-app bg-danger">
                                    <i class="fas fa-edit"></i>Inscrição
                                </a>
                            </div>
                            <div class="col-lg-2 col-3">
                                <a href="{{ route('admin.pages.arquivos.index') }}" class="btn btn-app bg-danger">
                                    <i class="fas fa-inbox"></i>Arquivos
                                </a>
                            </div>
                            <div class="col-lg-2 col-3">
                                <a href="{{ route('admin.pages.mensagem.index') }}" class="btn btn-app bg-danger">
                                    <span class="badge bg-teal">{{ count($noticias) }}</span>
                                    <i class="fa fa-envelope" aria-hidden="true"></i>Mensagens
                                </a>
                            </div>
                            <div class="col-lg-2 col-3">
                                <a href="{{ route('admin.pages.carteira.index') }}" class="btn btn-app bg-danger">
                                    <i class="fas fa-file"></i>Carteira
                                </a>
                            </div>
                        </div>

                    </div>

            </div>
        @else
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 col-3">
                        <a href="{{ route('admn.pages.noticias.index') }}" class="btn btn-app bg-danger">
                            <span class="badge bg-teal">{{ count($noticias) }}</span>
                            <i class="fas fa-edit"></i> Notícias
                        </a>
                    </div>
                    <div class="col-lg-2 col-3">
                        <a href="{{ route('admin.pages.congresso.index') }}" class="btn btn-app bg-danger btn-lg">
                            {{-- <span class="badge bg-teal">{{ count($noticias) }}</span> --}}
                            <i class="fas fa-users"></i> Assembleia
                        </a>
                    </div>
                    <div class="col-lg-2 col-3">
                        <a href="{{ route('admin.pages.users.index') }}" class="btn btn-app bg-danger btn-lg">
                            <span class="badge bg-teal">{{ count($users) }}</span>
                            <i class="fas fa-users"></i> Servidores
                        </a>
                    </div>
                    <div class="col-lg-2 col-3">
                        <a href="{{ route('admin.pages.reunioes.index') }}" class="btn btn-app bg-danger btn-lg">
                            {{-- <span class="badge bg-teal">{{ count($noticias) }}</span> --}}
                            <i class="fas fa-inbox"></i> Convocações
                        </a>
                    </div>
                    <div class="col-lg-2 col-3">
                        <a href="{{ route('admin.pages.agenda.index') }}" class="btn btn-app bg-danger btn-lg">
                            {{-- <span class="badge bg-teal">{{ count($noticias) }}</span> --}}
                            <i class="fas fa-envelope"></i> Agenda
                        </a>
                    </div>
                    {{-- <a href="" class="btn btn-app bg-info">
                                <i class="fas fa-user"></i> Perfil
                            </a> --}}
                </div>
                <!-- ./col -->
            </div>
    </div>
    <!-- /.row -->
    @endif
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection
