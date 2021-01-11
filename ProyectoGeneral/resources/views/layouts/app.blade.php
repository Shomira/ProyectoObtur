<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="jquery-3.2.1.min.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>

    <!-- Fonts     <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quantico&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <section class="logo">
                    <img class="logo" src="{{ asset('imgs/logo.png')}}" alt="logo">
                </section>
                <a class="navbar-brand" href="{{ url('/') }}">
                    OBTUR-UTPL
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest

                            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                <div class="navbar-nav">
                                    <a class="nav-link" aria-current="page" href="{{url('welcome')}}">INICIO</a>
                                    <a class="nav-link" href="{{url('obtur')}}">OBTUR</a>
                                    <a class="nav-link" href="{{url('informacionTuristica')}}">INFORMACIÓN TURÍSTICA</a>
                                    <a class="nav-link" href="{{url('datosEstadisticos')}}"tabindex="-1" aria-disabled="true">DATOS ESTADÍSTICOS</a>
                                </div>
                            </div>

                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('INGRESAR') }}</a>
                                </li>
                            @endif
                            <!--
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            -->
                        @else
                            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                <div class="navbar-nav">
                                    <a class="nav-link active"  href="#">Administrador</a>
                                </div>
                            </div>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="publico">
            @yield('content')
        </main>
    </div>

    

    <footer class="piePagina">
        <article class="final">
            <img src="{{ asset('imgs/logo-utpl.png')}}" alt="logoUtpl" class="logoUtpl">
        </article>
        <article class="final">
            <article class="contactos">
                <h3 class="tituloFooter">Contactos</h3>
            </article>
            <article class="contactos">
                <h3 class="tituloFooter">Vinculos de Interés</h3>
            </article>
            <article class="contactos">
                <p><strong>Ecuador</strong> <br>
                    <img src="{{ asset('imgs/iconUbicacion2.png')}}"> San Cayetano Alto - Loja <br>
                    <img src="{{ asset('imgs/iconUbicacion2.png')}}"> Centros UTPL <br>
                    <img src="{{ asset('imgs/iconBuzon.png')}}"> Buzón de consultas <br>
                    <img src="{{ asset('imgs/iconCallCenter.png')}}"> 1800 88 75 88 <br>
                    <img src="{{ asset('imgs/whatsapp.png')}}"> WhatsApp: 0999565400 <br>
                    <img src="{{ asset('imgs/iconTelefono.png')}}"> PBX: 07 370 1444</p>
            </article>
            <article class="contactos">
                <article class="vinculos">
                    <p><img src="{{ asset('imgs/punto.png')}}"> Decide ser más<br>
                        <img src="{{ asset('imgs/punto.png')}}"> Admisiones<br>
                        <img src="{{ asset('imgs/punto.png')}}"> Noticias<br>
                        <img src="{{ asset('imgs/punto.png')}}"> Trabaja con nosotros</p>
                </article>
                <article class="vinculos">
                    <p><img src="{{ asset('imgs/punto.png')}}"> Internacional<br>
                        <img src="{{ asset('imgs/punto.png')}}"> Eventos <br>
                        <img src="{{ asset('imgs/punto.png')}}"> Alumni<br>
                        <img src="{{ asset('imgs/punto.png')}}"> Vida Universitaria</p>
                </article>
            </article>
        </article>
        
    </footer>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('dash/vendor/jquery/jquery.min.js')}}"></script>
    <!--<script src="{{ asset('dash/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>-->

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('dash/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('dash/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('dash/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('dash/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{ asset('dash/js/demo/chart-pie-demo.js')}}"></script>


    @yield('scripts')
</body>
</html>
