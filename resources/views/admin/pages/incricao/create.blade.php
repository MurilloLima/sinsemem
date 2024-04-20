@extends('admin.layout.app')
@section('title', 'Inscrição')
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
                                        <div class="alert alert-success text-center" style="color: white; margin: 10px;">
                                            {{ session('msg') }}
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Inscrição</h3>
                                </div>
                                <form action="{{ route('admin.pages.ficha.update') }}" method="post">
                                    @csrf
                                    <div class="card-body">

                                        <div class="row" style="margin-top: 10px;">
                                            <div class="col-sm-12">

                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="">Nome completo</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ auth()->user()->name }}" name="name"
                                                            placeholder="Nome completo">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">CPF</label>
                                                        <input type="text" class="form-control" oninput="mascara(this)"
                                                            value="{{ auth()->user()->email }}" name="email"
                                                            placeholder="CPF">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">E-mail</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ auth()->user()->email2 }}" name="email2"
                                                            placeholder="E-mail">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Estado civil</label>
                                                        <select class="custom-select" name="estado_civil">
                                                            <option value="{{ auth()->user()->estado_civil }}" selected>
                                                                {{ auth()->user()->estado_civil }}</option>
                                                            <option value="Solteiro">Solteiro</option>
                                                            <option value="Casado">Casado</option>
                                                            <option value="Separado">Separado</option>
                                                            <option value="Divorciado">Divorciado</option>
                                                            <option value="Viúvo">Viúvo</option>

                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Endereço</label>
                                                        <input type="text" name="endereco" class="form-control"
                                                            value="{{ auth()->user()->endereco }}" placeholder="Endereço">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">CEP</label>
                                                        <input type="text" name="cep" class="form-control"
                                                            value="{{ auth()->user()->cep }}" placeholder="00000-00">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Cidade</label>
                                                        <input type="text" name="cidade" class="form-control"
                                                            value="{{ auth()->user()->cidade }}" placeholder="Cidade">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">UF</label>
                                                        <select name="uf" class="form-control">
                                                            <option value="{{ auth()->user()->uf }}">
                                                                {{ auth()->user()->uf }}</option>
                                                            <option value="AC">Acre</option>
                                                            <option value="AL">Alagoas</option>
                                                            <option value="AP">Amapá</option>
                                                            <option value="AM">Amazonas</option>
                                                            <option value="BA">Bahia</option>
                                                            <option value="CE">Ceará</option>
                                                            <option value="DF">Distrito Federal</option>
                                                            <option value="ES">Espirito Santo</option>
                                                            <option value="GO">Goiás</option>
                                                            <option value="MA">Maranhão</option>
                                                            <option value="MS">Mato Grosso do Sul</option>
                                                            <option value="MT">Mato Grosso</option>
                                                            <option value="MG">Minas Gerais</option>
                                                            <option value="PA">Pará</option>
                                                            <option value="PB">Paraíba</option>
                                                            <option value="PR">Paraná</option>
                                                            <option value="PE">Pernambuco</option>
                                                            <option value="PI">Piauí</option>
                                                            <option value="RJ">Rio de Janeiro</option>
                                                            <option value="RN">Rio Grande do Norte</option>
                                                            <option value="RS">Rio Grande do Sul</option>
                                                            <option value="RO">Rondônia</option>
                                                            <option value="RR">Roraima</option>
                                                            <option value="SC">Santa Catarina</option>
                                                            <option value="SP">São Paulo</option>
                                                            <option value="SE">Sergipe</option>
                                                            <option value="TO">Tocantins</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Nacionalidade</label>
                                                        <input type="text" name="nacionalidade" class="form-control"
                                                            value="{{ auth()->user()->nacionalidade }}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Natural</label>
                                                        <input type="text" name="natural" class="form-control"
                                                            value="{{ auth()->user()->natural }}" placeholder="Natural">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">RG</label>
                                                        <input type="text" name="rg" class="form-control"
                                                            value="{{ auth()->user()->rg }}" placeholder="">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Cargo</label>
                                                        <input type="text" name="cargo" class="form-control"
                                                            value="{{ auth()->user()->cargo }}"
                                                            placeholder="Nacionalidade">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Nivil</label>
                                                        <input type="text" name="nivel" class="form-control"
                                                            value="{{ auth()->user()->nivel }}" placeholder="">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Lotação</label>
                                                        <input type="text" name="lotacao" class="form-control"
                                                            value="{{ auth()->user()->lotacao }}" placeholder="">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Pai</label>
                                                        <input type="text" name="pai" class="form-control"
                                                            value="{{ auth()->user()->pai }}" placeholder="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Mãe</label>
                                                        <input type="text" name="mae" class="form-control"
                                                            value="{{ auth()->user()->mae }}" placeholder="">
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Inscreve-se</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>


            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
