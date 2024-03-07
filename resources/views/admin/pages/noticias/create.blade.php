@extends('admin.layout.app')
@section('title', 'Criar notícias')
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
                {{-- <div class="row">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">
                                <a href="{{ route('admin.pages.noticias.create') }}">
                                    Cadastrar
                                </a>
                            </li>
                        </ol>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Notícias</h3>
                            </div>

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
                                                <div class="alert alert-success text-center"
                                                    style="color: white; margin: 10px;">
                                                    {{ session('msg') }}
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            </div>

                            <form action="{{ route('admin.pages.noticias.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">
                                    <label for="">Imagem</label>
                                    <input type="file" name="image" class="form-control" required>
                                    <label for="">Título</label>
                                    <input type="text" name="titulo" class="form-control">
                                    <label for="">Descrição</label>
                                    <input type="text" name="desc" class="form-control">
                                    <div class="form-group">
                                        <label for="customFile">Conteúdo</label>
                                        <div class="mb-3">
                                            <textarea class="textarea" name="conteudo" placeholder="Place some text here"
                                                style="width: 100%; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px; display: none;"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-default">Cadastrar</button>
                                </div>
                            </form>
                        </div>



                    </div>


                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
