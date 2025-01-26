 <!-- ***** Header Area Start ***** -->
 <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <nav class="main-nav">
                     <!-- ***** Logo Start ***** -->
                     <a href="/" class="logo">
                         <img src="{{ asset('home/assets/images/logo200x200px.png') }}" style="width: 90px"
                             alt="">
                     </a>
                     <!-- ***** Logo End ***** -->

                     <!-- ***** Menu Start ***** -->
                     <ul class="nav">
                         <li class="scroll-to-section">
                             <a href="/">Início</a>
                         </li>
                         {{-- <li class="scroll-to-section">
                             <a href="#Filiados">Sobre</a>
                         </li> --}}
                         <li class="scroll-to-section">
                             <a href="#reuniao">Convocação</a>
                         </li>
                         {{-- <li class="scroll-to-section"><a href="#pricing">Quem somos</a></li> --}}
                         <li class="scroll-to-section">
                             <a href="#congressos">Assembleia</a>
                         </li>
                         <li class="scroll-to-section">
                             <a href="#noticias">Matérias</a>
                         </li>
                         <li class="scroll-to-section">
                             <a href="application-9b1a6aab-66ec-400b-9ead-e7d3130f36c3.apk">Aplicativo</a>
                         </li>
                         {{-- <li class="scroll-to-section">
                             <a href="{{ route('home.pages.agenda.index') }}">Agenda</a>
                         </li> --}}

                         <li>
                             <div class="gradient-button">
                                 <a href="{{ route('home.pages.cadastro') }}">
                                     <i class="fa fa-sign-in-alt"></i>
                                     Registro
                                 </a>
                             </div>
                         </li>


                         <li>
                             <div class="gradient-button"><a id="modal_trigger" href="#modal"><i
                                         class="fa fa-sign-in-alt"></i> Entrar</a></div>
                         </li>

                     </ul>
                     <a class='menu-trigger'>
                         <span>Menu</span>
                     </a>
                     <!-- ***** Menu End ***** -->
                 </nav>
             </div>
         </div>
     </div>
 </header>
 <!-- ***** Header Area End ***** -->

 <div id="modal" class="popupContainer" style="display:none;">
     <div class="popupHeader">
         <span class="header_title">Entrar</span>
         <span class="modal_close"><i class="fa fa-times"></i></span>
     </div>

     <section class="popupBody">
         <!-- Social Login -->
         <div class="social_login">
             <div class="">
                 <form action="{{ route('login') }}" method="post">
                     @csrf
                     <label for="">CPF</label>
                     <input oninput="mascara(this)" type="text" name="email" class="form-control">
                     <x-input-error :messages="$errors->get('email')" class="mt-2" />
                     <label for="">Senha</label>
                     <input type="password" name="password" class="form-control">
                     <x-input-error :messages="$errors->get('password')" class="mt-2" />
                     <br>
                     <input type="submit" value="Entrar" class="btn" style="">
                     <a href="{{ route('home.pages.reset') }}">Esqueci a senha</a>
                 </form>
             </div>
         </div>
     </section>
 </div>
