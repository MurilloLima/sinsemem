@extends('admin.layout.app')
@section('title', 'Notícias')
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
                        <a href="{{ route('admin.pages.noticias.create') }}" class="btn btn-primary"
                            style="margin-bottom: 5px">
                            Cadastrar
                        </a>
                    </div>
                </div>
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
                                                <div class="alert alert-danger text-center"
                                                    style="color: white; margin: 10px;">
                                                    {{ session('msg') }}
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Título</th>
                                            <th>Descrição</th>
                                            <th style="width: 50px">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($noticias as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->titulo }}</td>
                                                <td>{{ $item->desc }}</td>
                                                <td>
                                                    <div class="card-tools">
                                                        {{-- <a href="" class="btn btn-tool" data-card-widget="collapse">
                                                            <i class="fas fa-edit"></i>
                                                        </a> --}}
                                                        <form action="{{ route('admin.noticias.pages.destroy') }}"
                                                            method="post">
                                                            @csrf
                                                            <input type="hidden" name="id"
                                                                value="{{ $item->id }}">
                                                            <button type="submit" class="btn btn-tool">
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    {{-- <li class="page-item"><a class="page-link" href="#">«</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">»</a></li> --}}
                                </ul>
                            </div>
                        </div>



                    </div>


                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
