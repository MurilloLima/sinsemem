@extends('admin.layout.app')
@section('title', 'Arquivos digitais')

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
                                <div class="card card-danger text-center">
                                    <div class="card-header">
                                        <h3 class="card-title">Carteira de sócio</h3>
                                    </div>
                                    <div class="card-body text-center">
                                        <br>

                                        <button type="button" class="btn btn-default" data-toggle="modal"
                                            data-target="#foto">
                                            Alterar foto
                                        </button>


                                        <div class="row" style="margin-top: 10px;">
                                            <div class="col-sm-12 mb-2">
                                                <h3>Frente</h3>
                                                <button class="botao" data-toggle="modal" data-target="#exampleModal">
                                                    <div class="logocarteira">
                                                        <img src="{{ asset('home/assets/images/logo200x200px.png') }}"
                                                            height="60" width="60" alt="" width="100px">
                                                    </div>
                                                    <div class="text-header text-center">
                                                        <p>SINDICATO DOS SERVIDORES DA EDUCAÇÃO <br>
                                                            DO MUNICIPIO ESTREITO-MA <br>
                                                            CNPJ: 06.100.310/0001-64
                                                        </p>
                                                    </div>
                                                    <div class="bolder"></div>
                                                    <div class="foto-user">
                                                        <img src="{{ asset('upload/fotoperfil/' . auth()->user()->img) }}"
                                                            alt="">
                                                    </div>
                                                    <div class="col-md-12 text-center">
                                                        <p class="nomeuser"><strong>{{ auth()->user()->name }}</strong></p>
                                                        <p class="nomeuser"><strong>{{ auth()->user()->cargo }}</strong></p>
                                                        <p class="nomeuser">
                                                            <strong>Matrícula:
                                                                {{ auth()->user()->matricula }}</strong>
                                                        </p>
                                                    </div>
                                                </button>
                                            </div>

                                            <div class="col-sm-12">
                                                <h3>Verso</h3>
                                                <button class="carteira text-center">
                                                    <div class="" style="margin-top: 30px">
                                                        <img src="{{ asset('upload/qr.png') }}" width="100"
                                                            height="100" alt="" width="100px">
                                                        <p>CNPJ: 06.100.310/0001-64</p>
                                                    </div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ count($noticias) }}</h3>
                                    <p>NOTÍCIAS</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="{{ route('admn.pages.noticias.index') }}" class="small-box-footer">+info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>53</h3>
                                    <p>Congresssos</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">+info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ count($users) }}</h3>
                                    <p>SERVIDORES</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="{{ route('admin.pages.users.index') }}" class="small-box-footer">+info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ count($reunioes) }}</h3>

                                    <p>REUNIÕES</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="{{ route('admin.pages.reunioes.index') }}" class="small-box-footer">+info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                @endif


            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    {{-- carteira verso --}}

    <!-- /.modal -->
    {{-- carteira frente --}}
    <div class="col-6">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalfrente"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="padding: 20px">
                    <div class="content d-flex align-items-stretch w-100">
                        <div class="d-flex text-center w-100">
                            <div class="d-flex align-items-center w-100">
                                <button class="botao" data-toggle="modal" data-target="#exampleModal">
                                    <div class="logocarteira">
                                        <img src="{{ asset('home/assets/images/logo200x200px.png') }}" height="60"
                                            width="60" alt="" width="100px">
                                    </div>
                                    <div class="text-header text-center">
                                        <p>SINDICATO DOS SERVIDORES DA EDUCAÇÃO <br>
                                            DO MUNICIPIO ESTREITO-MA <br>
                                            CNPJ: 06.100.310/0001-64
                                        </p>
                                    </div>
                                    <div class="bolder"></div>
                                    <div class="foto-user">
                                        <img src="{{ asset('upload/fotoperfil/' . auth()->user()->img) }}"
                                            alt="">
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <p class="nomeuser"><strong>{{ auth()->user()->name }}</strong></p>
                                        <p class="nomeuser"><strong>{{ auth()->user()->cargo }}</strong></p>
                                        <p class="nomeuser">
                                            <strong>Matrícula:
                                                {{ auth()->user()->matricula }}</strong>
                                        </p>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /.modal -->
    {{-- carteira verso --}}
    <div class="col-6">
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabelverso" aria-hidden="true">
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 justify-content-md-center">

                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
    <!-- /.modal -->
    {{-- //modal reset image --}}
    <div class="modal fade" id="foto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Alterar foto perfil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>



                <form action="{{ route('admin.pages.carteira.foto', auth()->user()->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Imagem perfil</label>
                            <input type="file" name="img" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Alterar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.modal -->
@endsection
