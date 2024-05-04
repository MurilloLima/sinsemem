@extends('admin.layout.app')
@section('title', 'Servidores')

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
        <div class="row">
            <div class="col-md-12">
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
                    <div class="row text-center">
                        <div class="col-md-12" \>
                            <div class="alert alert-success text-center" style="color: white; margin: 10px;">
                                {{ session('msg') }}
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('admin.pages.servidores.create') }}" class="btn btn-primary"
                            style="margin-bottom: 5px">
                            Cadastrar
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Nome</th>
                                            <th>Profissão</th>
                                            <th>Status</th>
                                            <th style="width: 100px">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->profissao }}</td>
                                                <th>{{ $item->startu->startu }}</th>
                                                <td>
                                                    <a href="{{ route('admin.pages.mensagem.index') }}">
                                                        <i class="nav-icon far fa-envelope"></i>
                                                    </a>

                                                    <a href="{{ route('admin.user.view', [$item->id]) }}">
                                                        <i class="nav-icon far fa-user"></i>
                                                    </a>
                                                    <a href="" title="Alterar startus" data-toggle="modal"
                                                        data-target="#modal-default{{ $item->id }}">
                                                        <i class="nav-icon far fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            {{-- modal --}}
                                            <div class="modal fade" id="modal-default{{ $item->id }}"
                                                aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                    <form action="{{ route('admin.pages.starts', $item->id) }}"
                                                        method="post">
                                                        @csrf
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Alterar startus</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <select name="startu" class="form-control">
                                                                    <option value="Ativo">Ativo</option>
                                                                    <option value="Aposentado">Aposentado</option>
                                                                    {{-- <option value=""></option> --}}
                                                                    {{-- <option value=""></option> --}}
                                                                </select>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Fechar</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Alterar</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{-- {{ $users->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>


@endsection
