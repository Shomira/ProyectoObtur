@extends('layouts.app')

@section('content')

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

        <section class="datosEstab">
            <h2>DATOS ESTABLECIMIENTO</h2>
            <article class="datEs">    
                <img src="{{ asset('imgs/velocidad.png')}}">
                <div class="hoverDe">
                    <h4>Categoria</h4>
                </div> 
            </article >
            <article class="datEs">    
                    <img src="{{ asset('imgs/cargar.png')}}">
                    <div class="hoverDe">
                        <h4>Tarifa Promedio</h4>
                    </div>
            </article >
            <article class="datEs">    
                    <img src="{{ asset('imgs/vendedor.png')}}">
                    <div class="hoverDe">
                        <h4>Porcentaje de Ocupación</h4>
                    </div>
            </article>
        </section>

        <form action="" method="POST">
            @csrf
        </form>
        <section class="tituloGrafica" ><h3>LINEA DE TENDENCIA</h3></section>
        <section class="graficaWelcome">
                <div class="form-row align-items-center">
                    <div class="row row-cols-3 col-lg-12 text-center">
                        <label for="inputState"><strong> Inicio</strong></label>
                        <label for="inputState" ><strong> Fin</strong></label>
                        <label for="inputState" ><strong> Categoría</strong></label>
                    </div>
                    <div class="row row-cols-3 col-5 ml-1 p-5">
                        
                        <div class="row mr-2">
                            <div class="calloutG">
                                <select id="idanioInicio" name="anioInicio" class="form-control" onchange="cambioAnioInicio(this)">
                                    <option disable>Elegir año Inicio ...</option>
                                    @foreach($anios as $anio)
                                        <option value="{{$anio->anio}}">{{$anio->anio}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="calloutG">   
                            <select id="idmesInicio" name="mesInicio" class="form-control" onchange="cambioMesInicio(this)">
                                <option disable>Elegir mes Inicio ...</option>
                                @foreach($meses as $mes)
                                    <option value="{{$mes[1]}}">{{$mes[0]}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row row-cols-2 col-3 mr-5  ml-2 fin">
                        <div class="row mr-2">
                            <div class="calloutG">
                                <select id="idanioFin" name="anioFin" class="form-control" onchange="cambioAnioFin(this)">
                                    @foreach($anios as $anio)
                                        <option value="{{$anio->anio}}">{{$anio->anio}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="calloutG">
                            <select id="inputState" name="mesFin" class="form-control" onchange="cambioMesFin(this)">
                                @foreach($meses as $mes)
                                    <option value="{{$mes[1]}}">{{$mes[0]}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row col-2   col-lg-1   ml-2">
                        <div class="row mr-2">
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
                    </div>
                    <section class="espacioGrafica" ></section>
                    <div class="row col-13">
                        <div class="form-group col-md-2 graficaColums" >
                            <label for="inputState"><strong> Columna </strong></label><br>

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
                            <canvas id="graficaMeses" width="1500" height="600"></canvas>
                        </div>
                    </div>
                </div>
        </section>


     
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
    
</script>
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

    var checkins = {
                label: 'checkins',
                data: dataPorcOcupacion,
                backgroundColor: 'rgb(255,255,255,0.01)',
                borderColor: 'rgba(211, 214, 30, 0.74)',
                borderWidth: 3
            };

    var porcentaje_ocupacion = {
                label: 'porcentaje_ocupacion',
                data: dataPorcOcupacion,
                backgroundColor: 'rgb(255,255,255,0.01)',
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


    $(document).ready(function(){
        
        consultaMeses();
        
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
                _token: $('input[name="_token"]').val()
            }
        }).done(function(res){

            var arreglo = JSON.parse(res);
            
            for(var i=0;i<arreglo.length;i++){

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
   
    function cambioColumnaG1(val){
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
        
        dataPorcOcupacion = val.value;
        
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

    function seleccionarFilas(val){
        var valor = val.value;
        var datos;
        var bandera;
        var color;
        
        if(valor == 'checkins'){
            color = 'rgba(0, 0, 0, 0.74)';
            datos = dataCheckins;
            bandera = document.getElementById('checkins').checked;
        }else if(valor == 'checkouts'){
            color = 'rgba(255, 0, 0, 0.74)';
            datos = dataCheckouts;
            bandera = document.getElementById('checkouts').checked;
        }else if(valor == 'pernoctaciones'){
            color = 'rgba(110, 54, 54, 0.74)';
            datos = dataPernoctaciones;
            bandera = document.getElementById('pernoctaciones').checked;
        }else if(valor == 'nacionales'){
            color = 'rgba(131, 119, 119, 0.74)';
            datos = dataNacionales;
            bandera = document.getElementById('nacionales').checked;
        }else if(valor == 'extranjeros'){
            color = 'rgba(223, 172, 32, 0.74)';
            datos = dataExtranjeros;
            bandera = document.getElementById('extranjeros').checked;
        }else if(valor == 'habitaciones_ocupadas'){
            color = 'rgba(109, 209, 84, 0.74)';
            datos = dataHabOcupadas;
            bandera = document.getElementById('habitaciones_ocupadas').checked;
        }else if(valor == 'habitaciones_disponibles'){
            color = 'rgba(39, 215, 228, 0.74)';
            datos = dataHabDisponibles;
            bandera = document.getElementById('habitaciones_disponibles').checked;
        }else if(valor == 'tarifa_promedio'){
            color = 'rgba(41, 77, 175, 0.74)';
            datos = dataTarPromHab;
            bandera = document.getElementById('tarifa_promedio').checked;
        }else if(valor == 'TAR_PER'){
            color = 'rgba(99, 41, 175, 0.74)';
            datos = dataTarPromPer;
            bandera = document.getElementById('TAR_PER').checked;
        }else if(valor == 'ventas_netas'){
            color = 'rgba(216, 44, 193, 0.74)';
            datos = dataVentasNetas;
            bandera = document.getElementById('ventas_netas').checked;
        }else if(valor == 'porcentaje_ocupacion'){
            color = 'rgba(211, 214, 30, 0.74)';
            datos = dataPorcOcupacion;
            bandera = document.getElementById('porcentaje_ocupacion').checked;
        }else if(valor == 'revpar'){
            color = 'rgba(19, 190, 153, 0.74)';
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

</script>
@endsection