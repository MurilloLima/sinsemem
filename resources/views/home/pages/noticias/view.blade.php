@extends('home.layouts.app')
@section('title', 'Home')

@section('content')
    <div id="about" class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="section-heading">
                        <h4>{{ $data->titulo }}</h4>
                        <img src="{{ asset('upload/noticias/' . $data->image) }}" alt="">
                        <p>{!! $data->conteudo !!}</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-image">
                        <img src="{{ asset('upload/noticias/' . $data->image) }}" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p>Compartilhar</p>
                    <a href="https://api.whatsapp.com/send?text=www.sinsemem.org.com/noticia/{{ $data->slug }}">
                        <img src="{{ asset('home/assets/images/whatsapp-logp.png') }}" style="width: 60px; height: 60px;" class="whatsapp" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
