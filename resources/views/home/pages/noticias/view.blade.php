@extends('home.layouts.app')
@section('title', 'Home')

@section('content')

    <div id="congressos" class="services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                        <span>Notícia</span>
                        <h1>{{ $data->titulo }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <img src="{{ asset('upload/noticias/' . $data->image) }}" alt="">
                    <p style="margin-top: 30px; color: #000">{!! $data->conteudo !!}</p>
                    <br>
                    <p>Compartilhar</p>
                    <a href="https://api.whatsapp.com/send?text=www.destaquenoticias.com/view/{{ $data->slug }}">
                        <img src="{{ asset('home/assets/images/whatsapp-logp.png') }}" style="width: 50px; height: 50px;"
                            class="whatsapp" alt="">
                    </a>
                </div>
                <div class="col-lg-2"></div>
            </div>


        </div>
    </div>
@endsection
