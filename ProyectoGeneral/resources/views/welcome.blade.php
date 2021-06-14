@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
@endsection

@section('content')
    <section class="fondoWelcome" id="page-top">
        <section class="containerSlider">

            <!--inicia el slider-->
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="{{ asset('imgs/Buss2Slider.png')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="{{ asset('imgs/img2SliderT2.png')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                    </div>
                    
                    <div class="carousel-item">
                    <img src="{{ asset('imgs/destSlider.png')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="{{ asset('imgs/Buss1Slider.png')}}" class="d-block w-100"  alt="...">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="{{ asset('imgs/mapCarSlider.png')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="{{ asset('imgs/img1SliderT1.png')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="{{ asset('imgs/mapPlaneSlider.png')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                    </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
        <section class="datosEstab">
            <h2>INDICADORES DE ALOJAMIENTO</h2>
            <a href="{{url('http://127.0.0.1:8000/indicadoresAlojamiento#revpar')}}">
                <div class="container2">
                    <article class="datEs">    
                        <img src="{{ asset('imgs/velocidad.png')}}" alt="Avatar" class="image">
                        <div class="overlay">
                            <div class="text">Significa "ingreso por habitación disponible" y sirve para valorar el rendimiento financiero. </div>
                        </div>
                        <div class="hoverDe">
                            <h4>Revpar</h4>
                        </div> 
                    </article >
                </div>
            </a>
            <a href="{{url('http://127.0.0.1:8000/indicadoresAlojamiento#tarifaPromedio')}}">
                <div class="container2">
                    <article class="datEs">    
                            <img src="{{ asset('imgs/cargar.png')}}" alt="Avatar" class="image">
                            <div class="overlay">
                                <div class="text">Dinero promedio que recepta un establecimiento, ya sea por cada persona que ingresa, o por cada habitación ocupada.</div>
                            </div>
                            <div class="hoverDe">
                                <h4>Tarifa Promedio</h4>
                            </div>
                    </article >
                </div>
            </a>
            <a href="{{url('http://127.0.0.1:8000/indicadoresAlojamiento#porcentajeOcupacion')}}">
                <div class="container2">
                    <article class="datEs">    
                            <img src="{{ asset('imgs/vendedor.png')}}"  alt="Avatar" class="image">
                            <div class="overlay">
                                <div class="text">Es la relación entre las habitaciones ocupadas y las disponibles durante un período dado.</div>
                            </div>
                            <div class="hoverDe">
                                <h4>Porcentaje Ocupación</h4>
                            </div>
                    </article >
                </div>
            </a>
            <a href="{{url('indicadoresAlojamiento#estadiaPromedio')}}">
                <div class="container2">
                    <article class="datEs">    
                            <img src="{{ asset('imgs/cama.png')}}"  alt="Avatar" class="image">
                            <div class="overlay">
                                <div class="text">Es una aproximación al número de días que por término medio permanece un viajero en un establecimiento.</div>
                            </div>
                            <div class="hoverDe">
                                <h4>Estadia Promedio</h4>
                            </div>
                    </article >
                </div>
            </a>
        </section>
        <section class="datosEstab">
            
            <a href="{{url('http://127.0.0.1:8000/indicadoresAlojamiento#revpar')}}">
                <div class="container2">
                    <article class="datEsResultados">    
                        <img src="{{ asset('imgs/barra-grafica.png')}}" alt="Avatar" class="image">
                        <div class="overlay">
                            <div class="text">...</div>
                        </div>
                        <div class="hoverDe">
                            <h4>Revpar</h4>
                        </div> 
                    </article >
                </div>
            </a>
            <a href="{{url('http://127.0.0.1:8000/indicadoresAlojamiento#tarifaPromedio')}}">
                <div class="container2">
                    <article class="datEsResultados">    
                            <img src="{{ asset('imgs/barra-grafica.png')}}" alt="Avatar" class="image">
                            <div class="overlay">
                                <div class="text">...</div>
                            </div>
                            <div class="hoverDe">
                                <h4>Tarifa Promedio</h4>
                            </div>
                    </article >
                </div>
            </a>
            <a href="{{url('http://127.0.0.1:8000/indicadoresAlojamiento#porcentajeOcupacion')}}">
                <div class="container2">
                    <article class="datEsResultados">    
                            <img src="{{ asset('imgs/barra-grafica.png')}}"  alt="Avatar" class="image">
                            <div class="overlay">
                                <div class="text">...</div>
                            </div>
                            <div class="hoverDe">
                                <h4>Porcentaje Ocupación</h4>
                            </div>
                    </article >
                </div>
            </a>
            <a href="{{url('http://127.0.0.1:8000/indicadoresAlojamiento#estadiaPromedio')}}">
                <div class="container2">
                    <article class="datEsResultados">    
                            <img src="{{ asset('imgs/barra-grafica.png')}}"  alt="Avatar" class="image">
                            <div class="overlay">
                                <div class="text">...</div>
                            </div>
                            <div class="hoverDe">
                                <h4>Estadia Promedio</h4>
                            </div>
                    </article >
                </div>
            </a>
        </section>

        <form action="" method="POST">
            @csrf
        </form>
        
        <section class="serviciosL">
            <h2>SERVICIOS GENERALES</h2>
            <article class="servicios">    
                    <img src="{{ asset('imgs/hotel.png')}}">
                    <h4>Residencia</h4>
                    <p>El personal usa equipos de protección; se controla la temperatura del personal; 
                        hay controles de temperatura disponibles para los huéspedes; y se ofrece desinfectante para 
                        manos a los huéspedes.</p>
            </article >
            <article class="servicios">    
                    <img src="{{ asset('imgs/plato.png')}}">
                    <h4>Restaurantes</h4>
                    <p>La gastronomía del Ecuador, se caracteriza por su variada forma de preparar 
                        comidas y bebidas.Dentro de la “comida típica” podemos encontrar; arroz, huevo, papas, 
                        aguacate, carne de res o de cerdo.</p>
            </article >
            <article class="servicios">    
                    <img src="{{ asset('imgs/lugar.png')}}">
                    <h4>Sitios</h4>
                    <p>Ecuador Travel - Turismo en Ecuador les presenta los mejores lugares 
                        turísticos de Ecuador, una amplia gama de turismo y aventura construido 
                        en el sitio perfecto. </p>
            </article >
        </section>
        <section class="serviciosL2">
            <h2 >SERVICIOS DE HOTELES</h2>
            <article class="servicios">    
                    <img src="{{ asset('imgs/redess.png')}}">
                    <h4>Concierge</h4>
                    <p>
                        Es un asesor personal que se convierte en el “mejor amigo” del huésped. Tiene un alto 
                        conocimiento de cultura general, gastronomía, sitios turísticos y además debe tener 
                        conocimiento en la actualidad de planes y agenda de la ciudad. 
                    </p>
            </article >
            <article  class="servicios">    
                    <img src="{{ asset('imgs/dormitorio.png')}}">
                    <h4>Servicios de Habitación</h4>
                    <p>El servicio de habitaciones de un hotel es la asistencia que reciben sus huéspedes 
                        directamente en su propia habitación. Puede abarcar desde el servicio de comida y bebida, 
                        hasta cualquier tipo de petición dependiendo de la oferta disponible.</p>
            </article >
            <article   class="servicios">    
                    <img src="{{ asset('imgs/promocion.png')}}">
                    <h4>Reservación</h4>
                    <p>
                        Es la obligación que asume un alojamiento turístico de guardar
                         para una fecha o un periodo de tiempo determinado una o varias habitaciones o plazas,
                        con la exigencia inmediata de pago de todo o parte del precio que éste supondrá la cancelación.
                    </p>
            </article >
        </section>
        
    
        
        <section class="sitiosLoja">
            <h2>DESCUBRE EN LA PROVINCIA DE LOJA</h2>
            <article class="sitios">    
                    <img src="{{ asset('imgs/img1Hom.png')}}">
                    <h4>Eventos</h4>
            </article >
            <article class="sitios" >
                    <img src="{{ asset('imgs/img2Hom.png')}}">
                    <h4>Plazas</h4>
            </article >
            <article class="sitios">
                    <img  src="{{ asset('imgs/img3Hom.png')}}">
                    <h4>Atractivos</h4>
            </article >
            <article class="sitios" >
                    <img  src="{{ asset('imgs/img4Hom.png')}}">
                    <h4>Parques</h4>
            </article>
        </section>
        
        <section class="map">
            <h2>Ubicación</h2>

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63680.998371727175!2d-79.2433984719824!3d-4.007594453866496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91cb480661b91d2d%3A0x8e12137cdc1eee09!2sLoja!5e0!3m2!1ses!2sec!4v1608711364387!5m2!1ses!2sec" width="1510" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </section>
        <script>
            var myCarousel = document.querySelector('#myCarousel')
            var carousel = new bootstrap.Carousel(myCarousel, {
                interval: 1000,
                wrap: false
            })
        </script>

    
    </section>

    

   
@endsection

@section('pieDePagina')
    @include('layouts.footer')
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

@endsection