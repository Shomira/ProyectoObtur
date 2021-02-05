@extends('layouts.app')

@section('content')
    <section class="fondoWelcome">
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
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="{{ asset('imgs/img2SliderT2.png')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    </div>
                    
                    <div class="carousel-item">
                    <img src="{{ asset('imgs/destSlider.png')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="{{ asset('imgs/Buss1Slider.png')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
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
            <h2>DATOS ESTABLECIMIENTO</h2>

            <div class="container2">
                <article class="datEs">    
                    <img src="{{ asset('imgs/velocidad.png')}}" alt="Avatar" class="image">
                    <div class="overlay">
                        <div class="text">Significa "ingreso por habitación disponible" y sirve para valorar el rendimiento financiero </div>
                    </div>
                    <div class="hoverDe">
                        <h4>Revpar</h4>
                    </div> 
                </article >
            </div>
            <div class="container2">
                <article class="datEs">    
                        <img src="{{ asset('imgs/cargar.png')}}" alt="Avatar" class="image">
                        <div class="overlay">
                            <div class="text">Dinero promedio que recepta un establecimiento, ya sea por cada persona que ingresa, o por cada habitación ocupada</div>
                        </div>
                        <div class="hoverDe">
                            <h4>Tarifa Promedio</h4>
                        </div>
                </article >
            </div>
            <div class="container2">
                <article class="datEs">    
                        <img src="{{ asset('imgs/vendedor.png')}}"  alt="Avatar" class="image">
                        <div class="overlay">
                            <div class="text">Es la relación entre las habitaciones ocupadas y las disponibles durante un período dado</div>
                        </div>
                        <div class="hoverDe">
                            <h4>Porcentaje Ocupación</h4>
                        </div>
                </article >
            </div>
            <div class="container2">
                <article class="datEs">    
                        <img src="{{ asset('imgs/vendedor.png')}}"  alt="Avatar" class="image">
                        <div class="overlay">
                            <div class="text">Es una aproximación al número de días que por término medio permanece un viajero en un establecimiento</div>
                        </div>
                        <div class="hoverDe">
                            <h4>Estadia Promedio</h4>
                        </div>
                </article >
            </div>
        </section>
        <section class="graficaWelcome">
            <section class="tituloGrafica" ><h2>Comparativas de Datos Hoteleros</h2></section>
            <section class="lineatituloGrafica" ></section>
                <div class="form-row align-items-center"> 
                    <div class="row row-cols-4 col-lg-12 text-center titulosPanel">
                        <label  for="inputState"> <h4>Fecha Inicio</h4></label>
                        <label  for="inputState" > <h4>Fecha Fin</h4></label>
                        <label   for="inputState" > <h4> Categoría</h4></label>
                        <label   for="inputState" > <h4> ¿Dias o Meses?</h4></label>
                    </div>
                    <div class="row row-cols-3 col-4 ml-2 p-4 inicio">
                        <div class="row mr-1">
                            <div class="calloutG">
                                <select id="idanioInicio" name="anioInicio" class="form-control" onchange="cambioAnioInicio(this)">
                                    <option disable>Elegir año</option>
                                    @foreach($anios as $anio)
                                        <option value="{{$anio->anio}}">{{$anio->anio}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="calloutG2">   
                            <select id="idmesInicio" name="mesInicio" class="form-control" onchange="cambioMesInicio(this)">
                                <option disable>Elegir mes</option>
                                @foreach($meses as $mes)
                                    <option value="{{$mes[1]}}">{{$mes[0]}}</option>
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                    <div class="row row-cols-3 col-4 mr-1  ml-1 ">
                        <div class="row mr-1 fin">
                            <div class="calloutG">
                                <select id="idanioFin" name="anioFin" class="form-control" onchange="cambioAnioFin(this)">
                                    @foreach($anios as $anio)
                                        <option value="{{$anio->anio}}">{{$anio->anio}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="calloutG2" >
                            <select id="inputState" name="mesFin" class="form-control" onchange="cambioMesFin(this)">
                                @foreach($meses as $mes)
                                    <option value="{{$mes[1]}}">{{$mes[0]}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row row-cols-2 col-4  categoria">
                        <div class="row mr-4">
                            <div class="calloutGcat">
                                <select id="inputState" name="categoria" class="form-control" onchange="cambioCategoria(this)">
                                    <option value="Todas">Todas</option>
                                    @foreach($categorias as $categoria)
                                        <option value="{{$categoria->categoria}}">{{$categoria->categoria}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row row-cols-2 col-2   ml-2 mesDia">
                        <div class="row ml-1">
                            <div class="calloutGM">
                                <select id="inputState" name="ejeX" class="form-control" onchange="cambioEjeX(this)">
                                    <option value="1" >Meses</option>
                                    <option value="2">Días</option>
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="espacioGrafica" ></section>
                <div class="row col-13">
                    <div class="form-group col-md-2 graficaColums" >
                        <h3>Columna </h3><br>
                        <input type="checkbox" name="checkins" id="checkins" value="checkins" onchange="seleccionarFilas(this)">
                        <label for="checkins"> Checkins</label><br>
                        <input type="checkbox" name="checkouts" id="checkouts" value="checkouts" onchange="seleccionarFilas(this)">
                        <label for="checkouts"> Checkouts</label><br>
                        <input type="checkbox" name="pernoctaciones" id="pernoctaciones" value="pernoctaciones" onchange="seleccionarFilas(this)">
                        <label for="pernoctaciones"> Pernoctaciones</label><br>
                        <input type="checkbox" name="nacionales" id="nacionales" value="nacionales" onchange="seleccionarFilas(this)">
                        <label for="nacionales"> Nacionales</label><br>
                        <input type="checkbox" name="extranjeros" id="extranjeros" value="extranjeros" onchange="seleccionarFilas(this)">
                        <label for="extranjeros"> Extranjeros</label><br>
                        <input type="checkbox" name="habitaciones_ocupadas" id="habitaciones_ocupadas" value="habitaciones_ocupadas" onchange="seleccionarFilas(this)">
                        <label for="habitaciones_ocupadas"> Hab. Ocupadas</label><br>
                        <input type="checkbox" name="habitaciones_disponibles" id="habitaciones_disponibles" value="habitaciones_disponibles" onchange="seleccionarFilas(this)">
                        <label for="habitaciones_disponibles"> Hab. Disponibles</label><br>
                        <input type="checkbox" name="tarifa_promedio" id="tarifa_promedio" value="tarifa_promedio" onchange="seleccionarFilas(this)">
                        <label for="tarifa_promedio"> Tarifa Prom. Hab.</label><br>
                        <input type="checkbox" name="TAR_PER" id="TAR_PER" value="TAR_PER" onchange="seleccionarFilas(this)">
                        <label for="TAR_PER"> Tarifa Prom. Per.</label><br>
                        <input type="checkbox" name="ventas_netas" id="ventas_netas" value="ventas_netas" onchange="seleccionarFilas(this)">
                        <label for="ventas_netas"> Ventas Netas</label><br>
                        <input type="checkbox" name="porcentaje_ocupacion" id="porcentaje_ocupacion" value="porcentaje_ocupacion" onchange="seleccionarFilas(this)" checked>
                        <label for="porcentaje_ocupacion"> Porcent. Ocupación</label><br>
                        <input type="checkbox" name="revpar" id="revpar" value="revpar" onchange="seleccionarFilas(this)">
                        <label for="revpar"> REVPAR</label><br>
                        
                    </div>
                    <div class="form-group col-md-9">
                        <br>
                        <canvas id="graficaMeses" width="1500" height="600"></canvas>
                    </div>
                </div>
        </section>


        <section class="graficaWelcome">
            <section class="tituloGrafica" ><h2>Datos Hoteleros Por Categoría </h2></section>
            <section class="lineatituloGrafica" ></section>
                <div class="form-row align-items-center">
                    
                    <div class="row row-cols-3 col-lg-12 text-center titulosPanel">
                        <label  for="inputState"> <h3>Año</h3></label>
                        <label  for="inputState" > <h3>Estadisticos</h3></label>
                    </div>
                    <div class="row row-cols-3 col-5 ml-1 p-5 inicio">
                        <div class="row mr-2">
                            <div class="calloutG">
                                <select id="idanioInicio" name="anio" class="form-control" onchange="cambioAnio(this)">
                                    
                                    @foreach($anios as $anio)
                                        <option value="{{$anio->anio}}">{{$anio->anio}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row row-cols-2 col-3 mr-5  ml-2 inicio">
                        <div class="row mr-2">
                            <div class="calloutG">
                                <select id="inputState" name="estadistico" class="form-control" onchange="cambioEstadistico(this)">
                                    <option value="total" >Total</option>
                                    <option value="prom">Promedio</option>
                                    <option value="max">Máximo</option>
                                    <option value="min" >Mínimo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="espacioGrafica" ></section>
                
                <div class="row col-13">
                    <div class="form-group col-md-2 graficaColums" >
                        <h3>Columna </h3><br>
                        <input type="checkbox" name="checkins2" id="checkins2" value="checkins" onchange="seleccionarFilas2(this)">
                        <label for="checkins2"> Checkins</label><br>
                        <input type="checkbox" name="checkouts2" id="checkouts2" value="checkouts" onchange="seleccionarFilas2(this)">
                        <label for="checkouts2"> Checkouts</label><br>
                        <input type="checkbox" name="pernoctaciones2" id="pernoctaciones2" value="pernoctaciones" onchange="seleccionarFilas2(this)">
                        <label for="pernoctaciones2"> Pernoctaciones</label><br>
                        <input type="checkbox" name="nacionales2" id="nacionales2" value="nacionales" onchange="seleccionarFilas2(this)">
                        <label for="nacionales2"> Nacionales</label><br>
                        <input type="checkbox" name="extranjeros2" id="extranjeros2" value="extranjeros" onchange="seleccionarFilas2(this)">
                        <label for="extranjeros2"> Extranjeros</label><br>
                        <input type="checkbox" name="habitaciones_ocupadas2" id="habitaciones_ocupadas2" value="habitaciones_ocupadas" onchange="seleccionarFilas2(this)">
                        <label for="habitaciones_ocupadas2"> Hab. Ocupadas</label><br>
                        <input type="checkbox" name="habitaciones_disponibles2" id="habitaciones_disponibles2" value="habitaciones_disponibles" onchange="seleccionarFilas2(this)">
                        <label for="habitaciones_disponibles2"> Hab. Disponibles</label><br>
                        <input type="checkbox" name="tarifa_promedio2" id="tarifa_promedio2" value="tarifa_promedio" onchange="seleccionarFilas2(this)">
                        <label for="tarifa_promedio2"> Tarifa Prom. Hab.</label><br>
                        <input type="checkbox" name="TAR_PER2" id="TAR_PER2" value="TAR_PER" onchange="seleccionarFilas2(this)">
                        <label for="TAR_PER2"> Tarifa Prom. Per.</label><br>
                        <input type="checkbox" name="ventas_netas2" id="ventas_netas2" value="ventas_netas" onchange="seleccionarFilas2(this)">
                        <label for="ventas_netas2"> Ventas Netas</label><br>
                        <input type="checkbox" name="porcentaje_ocupacion2" id="porcentaje_ocupacion2" value="porcentaje_ocupacion" onchange="seleccionarFilas2(this)" checked>
                        <label for="porcentaje_ocupacion2"> Porcent. Ocupación</label><br>
                        <input type="checkbox" name="revpar2" id="revpar2" value="revpar" onchange="seleccionarFilas2(this)">
                        <label for="revpar2"> REVPAR</label><br>
                    </div>
                    <div class="form-group col-md-9">
                        <br>
                        <canvas id="barChartCategorias" width="1500" height="600"></canvas>
                    </div>
                </div>
        </section>

      
        
        <form action="" method="POST">
            @csrf
        </form>
        
        <section class="serviciosL">
            <h2>SERVICIOS GENERALES</h2>
            <article class="servicios">    
                    <img src="{{ asset('imgs/hotel.png')}}">
                    <h4>Residencia</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam error voluptatibus rerum quam, 
                        at qui laboriosam explicabo debitis odit esse alias obcaecati? Dignissimos dolor commodi aspernatur 
                        eligendi quidem totam dicta!</p>
            </article >
            <article class="servicios">    
                    <img src="{{ asset('imgs/plato.png')}}">
                    <h4>Restaurantes</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam error voluptatibus rerum quam, 
                        at qui laboriosam explicabo debitis odit esse alias obcaecati? Dignissimos dolor commodi aspernatur 
                        eligendi quidem totam dicta!</p>
            </article >
            <article class="servicios">    
                    <img src="{{ asset('imgs/lugar.png')}}">
                    <h4>Sitios</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam error voluptatibus rerum quam, 
                        at qui laboriosam explicabo debitis odit esse alias obcaecati? Dignissimos dolor commodi aspernatur 
                        eligendi quidem totam dicta!</p>
            </article >
        </section>
        <section class="serviciosL2">
            <h2 >SERVICIOS DE HOTELES</h2>
            <article style="background-color: rgba(238, 230, 118, 0.466)" class="servicios">    
                    <img style="width: 45%; "src="{{ asset('imgs/redess.png')}}">
                    <h4 style="color:#1b0ba8;">Acceso a Wifi</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam error voluptatibus rerum quam, 
                        at qui laboriosam explicabo debitis odit esse alias obcaecati? Dignissimos dolor commodi aspernatur 
                        eligendi quidem totam dicta!</p>
            </article >
            <article style="background-color: rgba(238, 230, 118, 0.466)" class="servicios">    
                    <img src="{{ asset('imgs/dormitorio.png')}}">
                    <h4 style="color:#1b0ba8;">Servicios de Habitación</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam error voluptatibus rerum quam, 
                        at qui laboriosam explicabo debitis odit esse alias obcaecati? Dignissimos dolor commodi aspernatur 
                        eligendi quidem totam dicta!</p>
            </article >
            <article  style="background-color: rgba(238, 230, 118, 0.466)" class="servicios">    
                    <img src="{{ asset('imgs/promocion.png')}}">
                    <h4 style="color:#1b0ba8;">Promociones</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam error voluptatibus rerum quam, 
                        at qui laboriosam explicabo debitis odit esse alias obcaecati? Dignissimos dolor commodi aspernatur 
                        eligendi quidem totam dicta!</p>
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

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63680.998371727175!2d-79.2433984719824!3d-4.007594453866496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91cb480661b91d2d%3A0x8e12137cdc1eee09!2sLoja!5e0!3m2!1ses!2sec!4v1608711364387!5m2!1ses!2sec" width="1515" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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

<script>
    
    var mesesGrafica1 = [];

    var dataCheckins = [];
    var dataCheckouts = [];
    var dataPernoctaciones = [];
    var dataNacionales = [];
    var dataExtranjeros = [];
    var dataHabOcupadas = [];
    var dataHabDisponibles = [];
    var dataTarPromHab = [];
    var dataTarPromPer = [];
    var dataVentasNetas = [];
    var dataPorcOcupacion = [];
    var dataREVPAR = [];


    var categorias = [];
    var dataCheckins2 = [];
    var dataCheckouts2 = [];
    var dataPernoctaciones2 = [];
    var dataNacionales2 = [];
    var dataExtranjeros2 = [];
    var dataHabOcupadas2 = [];
    var dataHabDisponibles2 = [];
    var dataTarPromHab2 = [];
    var dataTarPromPer2 = [];
    var dataVentasNetas2 = [];
    var dataPorcOcupacion2 = [];
    var dataREVPAR2 = [];


    var porcentaje_ocupacion = {
                label: 'porcentaje_ocupacion',
                data: dataPorcOcupacion,
                backgroundColor: 'rgb(255,255,255,0.20)',
                borderColor: 'rgba(211, 214, 30, 0.74)',
                borderWidth: 3
            };

            
    var columnas = [porcentaje_ocupacion];

    var mesInicioGrafica1 = '{{$mesInicio}}';
    var mesFinGrafica1 = '{{$mesFin}}';
    var anioInicioGrafica1 = '{{$anioInicio}}';
    var anioFinGrafica1 = '{{$anioFin}}';
    var nomColumnaGrafica1 = '{{$columna}}';
    var nomCategoria = 'Todas';
    var ejeX = 1;
    var anio = '{{$anioFin}}';
    var estadisticoBarras = 'total'
    
    
    var ctx2 = document.getElementById('graficaMeses').getContext('2d');
    var graficaMeses = new Chart(ctx2, {
        type: "line",
        data: {
            labels: mesesGrafica1,
            datasets: columnas
        },
        options: {
            capBezierPoints: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
        
    });

    
    var porcentaje_ocupacion2 = {
                label: 'porcentaje_ocupacion',
                fillColor: "rgba(220,220,220,0.5)",
                strokeColor: "rgba(220,220,220,0.8)",
                highlightFill: "rgba(220,220,220,0.75)",
                highlightStroke: "rgba(220,220,220,1)",
                data: [1,2,3,4,5]
            };

    var columnas2 = [porcentaje_ocupacion2];

    var ctx = document.getElementById('barChartCategorias').getContext('2d');
    var barChartCategorias = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["5 Estrellas", "4 Estrellas", "3 Estrellas", "2 Estrellas", "1 Estrella"],
            datasets: columnas2
        }
    });



    $(document).ready(function(){
        
        consultaMeses();
        consultaBarras();
        
    });

    function consultaMeses(){
        $.ajax({
            url:'{{url("/")}}',
            method: 'POST',
            data:{
                mesInicio: mesInicioGrafica1,
                mesFin: mesFinGrafica1,
                anioInicio: anioInicioGrafica1,
                anioFin: anioFinGrafica1,
                columna: nomColumnaGrafica1,
                categoria: nomCategoria,
                ejeX: ejeX,
                _token: $('input[name="_token"]').val()
            }
        }).done(function(res){

            var arreglo = JSON.parse(res);
            
            for(var i=0;i<arreglo.length;i++){

                if(ejeX == 1 ){
                    if (arreglo[i].mes == 1)
                        nombreMes = "Enero-"+arreglo[i].anio;
                    else if (arreglo[i].mes == 2)
                        nombreMes = "Febrero-"+arreglo[i].anio;
                    else if (arreglo[i].mes == 3)
                        nombreMes = "Marzo-"+arreglo[i].anio;
                    else if (arreglo[i].mes == 4)
                        nombreMes = "Abril-"+arreglo[i].anio;
                    else if (arreglo[i].mes == 5)
                        nombreMes = "Mayo-"+arreglo[i].anio;
                    else if (arreglo[i].mes == 6)
                        nombreMes = "Junio-"+arreglo[i].anio;
                    else if (arreglo[i].mes == 7)
                        nombreMes = "Julio-"+arreglo[i].anio;
                    else if (arreglo[i].mes == 8)
                        nombreMes = "Agosto-"+arreglo[i].anio;
                    else if (arreglo[i].mes == 9)
                        nombreMes = "Septiembre-"+arreglo[i].anio;
                    else if (arreglo[i].mes == 10)
                        nombreMes = "Octubre-"+arreglo[i].anio;
                    else if (arreglo[i].mes == 11)
                        nombreMes = "Noviembre-"+arreglo[i].anio;
                    else 
                        nombreMes = "Diciembre-"+arreglo[i].anio;
                    
                    mesesGrafica1.push(nombreMes);
                }else{
                    mesesGrafica1.push(arreglo[i].fecha);
                }

                    

                dataCheckins.push(arreglo[i].checkins);
                dataCheckouts.push(arreglo[i].checkouts);
                dataPernoctaciones.push(arreglo[i].pernoctaciones);
                dataNacionales.push(arreglo[i].nacionales);
                dataExtranjeros.push(arreglo[i].extranjeros);
                dataHabOcupadas.push(arreglo[i].habitaciones_ocupadas);
                dataHabDisponibles.push(arreglo[i].habitaciones_disponibles);
                dataTarPromHab.push(arreglo[i].tarifa_promedio);
                dataTarPromPer.push(arreglo[i].TAR_PER);
                dataVentasNetas.push(arreglo[i].ventas_netas);
                dataPorcOcupacion.push(arreglo[i].porcentaje_ocupacion);
                dataREVPAR.push(arreglo[i].revpar);
            }
            
            for(var i=0;i<columnas.length;i++){
                if(graficaMeses.data.datasets[i].label == 'porcentaje_ocupacion'){
                    graficaMeses.data.datasets[i].data = dataPorcOcupacion;
                }
                if(graficaMeses.data.datasets[i].label == 'checkins'){
                    graficaMeses.data.datasets[i].data = dataCheckins;
                }
                if(graficaMeses.data.datasets[i].label == 'checkouts'){
                    graficaMeses.data.datasets[i].data = dataCheckouts;
                }
                if(graficaMeses.data.datasets[i].label == 'pernoctaciones'){
                    graficaMeses.data.datasets[i].data = dataPernoctaciones;
                }
                if(graficaMeses.data.datasets[i].label == 'nacionales'){
                    graficaMeses.data.datasets[i].data = dataNacionales;
                }
                if(graficaMeses.data.datasets[i].label == 'extranjeros'){
                    graficaMeses.data.datasets[i].data = dataExtranjeros;
                }
                if(graficaMeses.data.datasets[i].label == 'habitaciones_ocupadas'){
                    graficaMeses.data.datasets[i].data = dataHabOcupadas;
                }
                if(graficaMeses.data.datasets[i].label == 'habitaciones_disponibles'){
                    graficaMeses.data.datasets[i].data = dataHabDisponibles;
                }
                if(graficaMeses.data.datasets[i].label == 'tarifa_promedio'){
                    graficaMeses.data.datasets[i].data = dataTarPromHab;
                }
                if(graficaMeses.data.datasets[i].label == 'TAR_PER'){
                    graficaMeses.data.datasets[i].data = dataTarPromPer;
                }
                if(graficaMeses.data.datasets[i].label == 'ventas_netas'){
                    graficaMeses.data.datasets[i].data = dataVentasNetas;
                }
                if(graficaMeses.data.datasets[i].label == 'revpar'){
                    graficaMeses.data.datasets[i].data = dataREVPAR;
                }
                
            }
        
            graficaMeses.data.labels = mesesGrafica1;
            graficaMeses.update();
            
        });

    }

    function consultaBarras(){

        $.ajax({
            url:'{{url("/barra")}}',
            method: 'POST',
            data:{
                anio: anio,
                columna: nomColumnaGrafica1,
                estadistico: estadisticoBarras,
                _token: $('input[name="_token"]').val()
            }
        }).done(function(res){
            
            var arreglo = JSON.parse(res);
            
            for(var i=0;i<arreglo.length;i++){
                    
                categorias.push(arreglo[i].categoria);
                dataCheckins2.push(arreglo[i].checkins);
                dataCheckouts2.push(arreglo[i].checkouts);
                dataPernoctaciones2.push(arreglo[i].pernoctaciones);
                dataNacionales2.push(arreglo[i].nacionales);
                dataExtranjeros2.push(arreglo[i].extranjeros);
                dataHabOcupadas2.push(arreglo[i].habitaciones_ocupadas);
                dataHabDisponibles2.push(arreglo[i].habitaciones_disponibles);
                dataTarPromHab2.push(arreglo[i].tarifa_promedio);
                dataTarPromPer2.push(arreglo[i].TAR_PER);
                dataVentasNetas2.push(arreglo[i].ventas_netas);
                dataPorcOcupacion2.push(arreglo[i].porcentaje_ocupacion);
                dataREVPAR2.push(arreglo[i].revpar);

            }
            

            for(var i=0;i<columnas2.length;i++){
                if(barChartCategorias.data.datasets[i].label == 'porcentaje_ocupacion'){
                    
                    barChartCategorias.data.datasets[i].data = dataPorcOcupacion2;
                }
                if(barChartCategorias.data.datasets[i].label == 'checkins'){
                    barChartCategorias.data.datasets[i].data = dataCheckins2;
                }
                if(barChartCategorias.data.datasets[i].label == 'checkouts'){
                    barChartCategorias.data.datasets[i].data = dataCheckouts2;
                }
                if(barChartCategorias.data.datasets[i].label == 'pernoctaciones'){
                    barChartCategorias.data.datasets[i].data = dataPernoctaciones2;
                }
                if(barChartCategorias.data.datasets[i].label == 'nacionales'){
                    barChartCategorias.data.datasets[i].data = dataNacionales2;
                }
                if(barChartCategorias.data.datasets[i].label == 'extranjeros'){
                    barChartCategorias.data.datasets[i].data = dataExtranjeros2;
                }
                if(barChartCategorias.data.datasets[i].label == 'habitaciones_ocupadas'){
                    barChartCategorias.data.datasets[i].data = dataHabOcupadas2;
                }
                if(barChartCategorias.data.datasets[i].label == 'habitaciones_disponibles'){
                    barChartCategorias.data.datasets[i].data = dataHabDisponibles2;
                }
                if(barChartCategorias.data.datasets[i].label == 'tarifa_promedio'){
                    barChartCategorias.data.datasets[i].data = dataTarPromHab2;
                }
                if(barChartCategorias.data.datasets[i].label == 'TAR_PER'){
                    barChartCategorias.data.datasets[i].data = dataTarPromPer2;
                }
                if(barChartCategorias.data.datasets[i].label == 'ventas_netas'){
                    barChartCategorias.data.datasets[i].data = dataVentasNetas2;
                }
                if(barChartCategorias.data.datasets[i].label == 'revpar'){
                    barChartCategorias.data.datasets[i].data = dataREVPAR2;
                }
                
            }
            
            barChartCategorias.update();

        });

    }

    function cambioMesInicio(val){
        mesesGrafica1 = [];
        dataCheckins = [];
        dataCheckouts = [];
        dataPernoctaciones = [];
        dataNacionales = [];
        dataExtranjeros = [];
        dataHabOcupadas = [];
        dataHabDisponibles = [];
        dataTarPromHab = [];
        dataTarPromPer = [];
        dataVentasNetas = [];
        dataPorcOcupacion = [];
        dataREVPAR = [];

        mesInicioGrafica1 = val.value;
        
        consultaMeses();
        
    }

    function cambioMesFin(val){
        mesesGrafica1 = [];
        dataCheckins = [];
        dataCheckouts = [];
        dataPernoctaciones = [];
        dataNacionales = [];
        dataExtranjeros = [];
        dataHabOcupadas = [];
        dataHabDisponibles = [];
        dataTarPromHab = [];
        dataTarPromPer = [];
        dataVentasNetas = [];
        dataPorcOcupacion = [];
        dataREVPAR = [];

        mesFinGrafica1 = val.value;
        
        consultaMeses();
    }

    function cambioAnioInicio(val){
        mesesGrafica1 = [];
        dataCheckins = [];
        dataCheckouts = [];
        dataPernoctaciones = [];
        dataNacionales = [];
        dataExtranjeros = [];
        dataHabOcupadas = [];
        dataHabDisponibles = [];
        dataTarPromHab = [];
        dataTarPromPer = [];
        dataVentasNetas = [];
        dataPorcOcupacion = [];
        dataREVPAR = [];

        anioInicioGrafica1 = val.value;
        
        consultaMeses();
        
    }

    function cambioAnioFin(val){
        mesesGrafica1 = [];
        dataCheckins = [];
        dataCheckouts = [];
        dataPernoctaciones = [];
        dataNacionales = [];
        dataExtranjeros = [];
        dataHabOcupadas = [];
        dataHabDisponibles = [];
        dataTarPromHab = [];
        dataTarPromPer = [];
        dataVentasNetas = [];
        dataPorcOcupacion = [];
        dataREVPAR = [];

        anioFinGrafica1 = val.value;
        
        consultaMeses();
    }
   

    function cambioCategoria(val){
        mesesGrafica1 = [];
        dataCheckins = [];
        dataCheckouts = [];
        dataPernoctaciones = [];
        dataNacionales = [];
        dataExtranjeros = [];
        dataHabOcupadas = [];
        dataHabDisponibles = [];
        dataTarPromHab = [];
        dataTarPromPer = [];
        dataVentasNetas = [];
        dataPorcOcupacion = [];
        dataREVPAR = [];

        nomCategoria = val.value;
        
        consultaMeses();
    }

    function cambioEjeX(val){
        mesesGrafica1 = [];
        dataCheckins = [];
        dataCheckouts = [];
        dataPernoctaciones = [];
        dataNacionales = [];
        dataExtranjeros = [];
        dataHabOcupadas = [];
        dataHabDisponibles = [];
        dataTarPromHab = [];
        dataTarPromPer = [];
        dataVentasNetas = [];
        dataPorcOcupacion = [];
        dataREVPAR = [];

        ejeX = val.value;
        
        consultaMeses();
    }

    function cambioAnio(val){
        categorias = [];
        dataCheckins2 = [];
        dataCheckouts2 = [];
        dataPernoctaciones2 = [];
        dataNacionales2 = [];
        dataExtranjeros2 = [];
        dataHabOcupadas2 = [];
        dataHabDisponibles2 = [];
        dataTarPromHab2 = [];
        dataTarPromPer2 = [];
        dataVentasNetas2 = [];
        dataPorcOcupacion2 = [];
        dataREVPAR2 = [];

        anio = val.value;
        
        consultaBarras();
    }

    function cambioEstadistico(val){
        categorias = [];
        dataCheckins2 = [];
        dataCheckouts2 = [];
        dataPernoctaciones2 = [];
        dataNacionales2 = [];
        dataExtranjeros2 = [];
        dataHabOcupadas2 = [];
        dataHabDisponibles2 = [];
        dataTarPromHab2 = [];
        dataTarPromPer2 = [];
        dataVentasNetas2 = [];
        dataPorcOcupacion2 = [];
        dataREVPAR2 = [];

        anio = val.value;
        
        consultaBarras();
    }

    function seleccionarFilas(val){
        var valor = val.value;
        var datos;
        var bandera;
        var color;
        
        if(valor == 'checkins'){
            color = 'rgba(0, 0, 0)';
            datos = dataCheckins;
            bandera = document.getElementById('checkins').checked;
        }else if(valor == 'checkouts'){
            color = 'rgba(255, 0, 0)';
            datos = dataCheckouts;
            bandera = document.getElementById('checkouts').checked;
        }else if(valor == 'pernoctaciones'){
            color = 'rgba(110, 54, 54)';
            datos = dataPernoctaciones;
            bandera = document.getElementById('pernoctaciones').checked;
        }else if(valor == 'nacionales'){
            color = 'rgba(131, 119, 119)';
            datos = dataNacionales;
            bandera = document.getElementById('nacionales').checked;
        }else if(valor == 'extranjeros'){
            color = 'rgba(223, 172, 32)';
            datos = dataExtranjeros;
            bandera = document.getElementById('extranjeros').checked;
        }else if(valor == 'habitaciones_ocupadas'){
            color = 'rgba(109, 209, 84)';
            datos = dataHabOcupadas;
            bandera = document.getElementById('habitaciones_ocupadas').checked;
        }else if(valor == 'habitaciones_disponibles'){
            color = 'rgba(39, 215, 228)';
            datos = dataHabDisponibles;
            bandera = document.getElementById('habitaciones_disponibles').checked;
        }else if(valor == 'tarifa_promedio'){
            color = 'rgba(41, 77, 175)';
            datos = dataTarPromHab;
            bandera = document.getElementById('tarifa_promedio').checked;
        }else if(valor == 'TAR_PER'){
            color = 'rgba(99, 41, 175)';
            datos = dataTarPromPer;
            bandera = document.getElementById('TAR_PER').checked;
        }else if(valor == 'ventas_netas'){
            color = 'rgba(216, 44, 193)';
            datos = dataVentasNetas;
            bandera = document.getElementById('ventas_netas').checked;
        }else if(valor == 'porcentaje_ocupacion'){
            color = 'rgba(211, 214, 30)';
            datos = dataPorcOcupacion;
            bandera = document.getElementById('porcentaje_ocupacion').checked;
        }else if(valor == 'revpar'){
            color = 'rgba(19, 190, 153)';
            datos = dataREVPAR;
            bandera = document.getElementById('revpar').checked;
        }

        var aux = {
            label: valor,
            data: datos,
            backgroundColor: 'rgb(255,255,255,0.01)',
            borderColor: color,
            borderWidth: 3
        };
        
        if(bandera){

            columnas.push(aux);
            graficaMeses.update();


        }else{

            
            for(var i=0;i<columnas.length;i++){
                
                if(columnas[i].label == valor){
                    columnas.splice(i, 1);
                }

            }
            
            graficaMeses.update();
            
        }
        
    }

    function seleccionarFilas2(val){
        var valor = val.value;
        var datos;
        var bandera;
        var color;
        
        if(valor == 'checkins'){
            color = 'rgba(0, 0, 0)';
            datos = dataCheckins2;
            bandera = document.getElementById('checkins2').checked;
        }else if(valor == 'checkouts'){
            color = 'rgba(255, 0, 0)';
            datos = dataCheckouts2;
            bandera = document.getElementById('checkouts2').checked;
        }else if(valor == 'pernoctaciones'){
            color = 'rgba(110, 54, 54)';
            datos = dataPernoctaciones2;
            bandera = document.getElementById('pernoctaciones2').checked;
        }else if(valor == 'nacionales'){
            color = 'rgba(131, 119, 119)';
            datos = dataNacionales2;
            bandera = document.getElementById('nacionales2').checked;
        }else if(valor == 'extranjeros'){
            color = 'rgba(223, 172, 32)';
            datos = dataExtranjeros2;
            bandera = document.getElementById('extranjeros2').checked;
        }else if(valor == 'habitaciones_ocupadas'){
            color = 'rgba(109, 209, 84)';
            datos = dataHabOcupadas2;
            bandera = document.getElementById('habitaciones_ocupadas2').checked;
        }else if(valor == 'habitaciones_disponibles'){
            color = 'rgba(39, 215, 228)';
            datos = dataHabDisponibles2;
            bandera = document.getElementById('habitaciones_disponibles2').checked;
        }else if(valor == 'tarifa_promedio'){
            color = 'rgba(41, 77, 175)';
            datos = dataTarPromHab2;
            bandera = document.getElementById('tarifa_promedio2').checked;
        }else if(valor == 'TAR_PER'){
            color = 'rgba(99, 41, 175)';
            datos = dataTarPromPer2;
            bandera = document.getElementById('TAR_PER2').checked;
        }else if(valor == 'ventas_netas'){
            color = 'rgba(216, 44, 193)';
            datos = dataVentasNetas2;
            bandera = document.getElementById('ventas_netas2').checked;
        }else if(valor == 'porcentaje_ocupacion'){
            color = 'rgba(211, 214, 30)';
            datos = dataPorcOcupacion2;
            bandera = document.getElementById('porcentaje_ocupacion2').checked;
        }else if(valor == 'revpar'){
            color = 'rgba(19, 190, 153)';
            datos = dataREVPAR2;
            bandera = document.getElementById('revpar2').checked;
        }

        var aux = {
            label: valor,
            data: datos,
            backgroundColor: 'rgb(255,255,255,0.01)',
            borderColor: color,
            borderWidth: 3
        };
        
        if(bandera){

            columnas2.push(aux);
            barChartCategorias.update();


        }else{

            
            for(var i=0;i<columnas2.length;i++){
                
                if(columnas2[i].label == valor){
                    columnas2.splice(i, 1);
                }

            }
            
            barChartCategorias.update();
            
        }
        
    }

</script>

@endsection