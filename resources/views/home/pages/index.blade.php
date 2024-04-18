@extends('home.layouts.app')
@section('title', 'Home')

@section('content')

    <div id="modal" class="popupContainer" style="display:none;">
        <div class="popupHeader">
            <span class="header_title">Login</span>
            <span class="modal_close"><i class="fa fa-times"></i></span>
        </div>

        <section class="popupBody">

            <!-- Register Form -->
            <div class="user_register">
                <form>
                    <label>Full Name</label>
                    <input type="text" />
                    <br />

                    <label>Email Address</label>
                    <input type="email" />
                    <br />

                    <label>Password</label>
                    <input type="password" />
                    <br />

                    <div class="checkbox">
                        <input id="send_updates" type="checkbox" />
                        <label for="send_updates">Send me occasional email updates</label>
                    </div>

                    <div class="action_btns">
                        <div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i>
                                Back</a></div>
                        <div class="one_half last"><a href="#" class="btn btn_red">Register</a></div>
                    </div>
                </form>
            </div>
        </section>
    </div>


    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 align-self-center" style="color: white">
                            <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s"
                                data-wow-delay="1s">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h2>SINSEMEM</h2>
                                        <p style="font-size: 26px;">Instale o nosso aplicativo e mantenha-se sempre
                                            atualizado.
                                        </p>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="white-button first-button scroll-to-section">
                                            <a href="#contact">Apple iOS<i class="fab fa-apple"></i></a>
                                        </div>
                                        <div class="white-button scroll-to-section">
                                            <a href="https://play.google.com/store/apps/details?id=appinventor.ai_vitinhomusic2014.SINSEMEM3"
                                                target="_blank">Android <i class="fab fa-google-play"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                <img src="{{ asset('home/assets/images/programas.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="congressos" class="services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                        <h4><em>Assembleia</em></h4>
                        <img src="{{ asset('home/assets/images/heading-line-dec.png') }}" alt="">
                        <p>Os principais eventos educacionais do ano.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($congressos as $item)
                    <div class="col-lg-3">
                        <div class="service-item first-service">
                            {{-- <div class="icon"></div> --}}
                            <h4>4 lorem</h4>
                            <p>You are not allowed to redistribute this template ZIP file on any other website.</p>
                            <div class="text-button">
                                <a href="#">Ler mais+ <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <div id="noticias" class="pricing-tables">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-heading">
                        <h4>Matérias</h4>
                        <img src="{{ asset('home/assets/images/heading-line-dec.png') }}" alt="">
                        <p>Mantenha-se atualizado sobre tudo acontece.</p>
                    </div>
                </div>
                @foreach ($noticias as $item)
                    <div class="col-lg-4">
                        <div class="pricing-item-pro">
                            {{-- <span class="price">$25</span> --}}
                            {{-- <h4>Business Plan App</h4> --}}
                            <div class="">
                                <img src="{{ asset('upload/noticias/' . $item->image) }}" alt="" height="300">
                            </div>
                            <ul>
                                <li style="padding-top: 20px;">
                                    <h4 style="marg">{{ $item->titulo }}</h4>
                                </li>
                                {{-- <li>{{ $item->desc }}</li> --}}
                            </ul>
                            <div class="border-button">
                                <a href="{{ route('home.pages.noticia.view', [$item->slug]) }}">Continuar lendo</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div id="reuniao" class="services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-heading  wow fadeInDown animated" data-wow-duration="1s" data-wow-delay="0.5s"
                        style="visibility: visible;-webkit-animation-duration: 1s; -moz-animation-duration: 1s; animation-duration: 1s;-webkit-animation-delay: 0.5s; -moz-animation-delay: 0.5s; animation-delay: 0.5s;">
                        <h4 style="color: #fb1424;">Edital de convocação</h4>
                        <img src="{{ asset('home/assets/images/heading-line-dec.png') }}" alt="">
                        <p>Conjunto de pessoas que se reúne no mesmo lugar, com o objetivo de deliberar ou para discutir
                            assuntos e temas específicos.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($reuniao as $item)
                    <div class="col-lg-3">
                        <div class="service-item first-service">
                            <div class="icon"></div>
                            <h4>{{ $item->assunto }}</h4>
                            <p>{{ $item->local }}</p>
                            <div class="text-button">
                                <p>{{ $item->data }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection
