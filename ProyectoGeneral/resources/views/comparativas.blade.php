@extends('layouts.app')

@section('content')
    <section class="fondo">
        <section class="fondo2">
            <nav class="navAdmin">
                <a href="{{url('home/')}}"><img src="{{ asset('imgs/inicio.png')}}">Inicio</a>
                <a  class="etiquetaActiva" href="{{url('home/comparativas')}}"><img src="{{ asset('imgs/comparar.png')}}">Comparativas</a>
                <a  href="{{url('home/resumenMensual')}}"><img src="{{ asset('imgs/resumen.png')}}">Resumen Mensual</a>
                <a  href="{{url('home/analisisDeNegocio')}}"><img src="{{ asset('imgs/analisisNegocio.png')}}">Análisis De Negocio</a>
                <a href="{{url('home/visualizarRegistros')}}"><img src="{{ asset('imgs/vision1.png')}}"> Visualizar Registros </a>                
            </nav>

            <form action="" method="POST">
                @csrf
            </form>

            <section class="espacioAdminEs"> 
                <div class="container principalV">
                    <div class="row">
                        <div class="col-lg-12 text-left">
                            <div class="row">
                                <!--tarjeta 1-->
                                <div class="col-lg-30  col-md-8 mb-4">
                                    <div class="card-section border rounded p-3">
                                        <div class="card-header-s rounded pb-4">
                                            <h5 class="card-header-title text-white pt-3">GRÁFICA POR MES</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><br>
                <div class="row " >
                    <div class="col-sm-4">
                        <div class="card cardGrafica" >
                            <div class="card-body">
                                <div>
                                    <h5>Inicio:
                                        <label>
                                            <select id="idanioInicio" name="anioInicio" class="form-control" onchange="cambioAnioInicio(this)"> 
                                                <option disable>Año ...</option>
                                                @foreach($anios as $anio)
                                                    <option value="{{$anio->anio}}">{{$anio->anio}}</option>
                                                @endforeach
                                            </select>
                                        </label>
                                        <label>
                                            <select id="idmesInicio" name="mesInicio" class="form-control" onchange="cambioMesInicio(this)">
                                                <option disable>Mes ...</option>
                                                @foreach($meses as $mes)
                                                    <option value="{{$mes[1]}}">{{$mes[0]}}</option>
                                                @endforeach
                                            </select>
                                        </label>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card  cardGrafica" >
                            <div class="card-body">
                                <h5>Fin: 
                                    <label>
                                        <select id="idanioFin" name="anioFin" class="form-control" onchange="cambioAnioFin(this)">
                                            @foreach($anios as $anio)
                                                <option value="{{$anio->anio}}">{{$anio->anio}}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                    <label>
                                        <select id="inputState" name="mesFin" class="form-control" onchange="cambioMesFin(this)">
                                    
                                            @foreach($meses as $mes)
                                                <option value="{{$mes[1]}}">{{$mes[0]}}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="card cardGrafica" >
                        <div class="card-body">
                          <div>
                            <h5>Estadístico:
                                <label  >
                                    <select id="inputState" name="estadistico" class="form-control" onchange="cambioEstadisticoMeses(this)">
                                        <option value="prom">Promedio</option>
                                        <option value="total" >Total</option>
                                        <option value="max">Máximo</option>
                                        <option value="min" >Mínimo</option>
                                    </select>
                                </label>
                            </h5>
                        </div>
                        </div>
                      </div>
                    </div>

                </div>
          
                <hr>
                <div class="row col-13">
                    <div class="form-group col-md-2 panelVisualColums" >
                        <label ><h5>Parámetros:</h5></label><br>
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
                        <input type="checkbox" name="ventas_netas" id="ventas_netas" value="ventas_netas" onchange="seleccionarFilas(this)">
                        <label for="ventas_netas"> Ventas Netas</label><br>
                        <hr>
                        <input type="checkbox" name="tarifa_promedio" id="tarifa_promedio" value="tarifa_promedio" onchange="seleccionarFilas(this)">
                        <label for="tarifa_promedio"> Tarifa Prom. Hab.</label><br>
                        <input type="checkbox" name="TAR_PER" id="TAR_PER" value="TAR_PER" onchange="seleccionarFilas(this)">
                        <label for="TAR_PER"> Tarifa Prom. Per.</label><br>
                        <input type="checkbox" name="porcentaje_ocupacion" id="porcentaje_ocupacion" value="porcentaje_ocupacion" onchange="seleccionarFilas(this)" checked>
                        <label for="porcentaje_ocupacion"> Porcent. Ocupación</label><br>
                        <input type="checkbox" name="revpar" id="revpar" value="revpar" onchange="seleccionarFilas(this)">
                        <label for="revpar"> REVPAR</label><br>
                   
                    </div> 
                    <div class="form-group col-md-10"  >
                        <canvas id="graficaMeses" width="1400" height="600" ></canvas>
                    </div>
                </div>
                <br>
                <div class="container principalV">
                    <div class="row">
                        <div class="col-lg-12 text-left">
                            <div class="row">
                                <!--tarjeta 1-->
                                <div class="col-lg-30  col-md-8 mb-4">
                                    <div class="card-section border rounded p-3">
                                        <div class="card-header-s rounded pb-4">
                                            <h5 class="card-header-title text-white pt-3">GRÁFICA POR DÍAS</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row tituloFiltrosGraficasEs">
                    <div class="pt-2 ml-2 pr-3" >
                        <label><h5>Fecha inicio:</h5> </label>
                    </div>
                    <div class="pr-5">
                        <input type="date" name="inicio" class="form-control" id="cambioFechaInicio" value="{{$diaMin}}"> 
                    </div>
                    <div class="pt-2 pr-3" >
                        <label><h5>Fecha final:<h5></label>
                    </div>
                    <div class="pr-3">
                        <input type="date" name="inicio" class="form-control" id="cambioFechaFin" value="{{$diaMax}}">
                    </div>
                </div>
                
                <hr>
                <div class="row col-13">
                    <div class="form-group col-md-2 panelVisualColums" >
                        <div class="callout">
                            <label ><h5>Parámetros:</h5></label><br>
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
                            <input type="checkbox" name="ventas_netas2" id="ventas_netas2" value="ventas_netas" onchange="seleccionarFilas2(this)">
                            <label for="ventas_netas2"> Ventas Netas</label><br>
                            <hr>
                            <input type="checkbox" name="tarifa_promedio2" id="tarifa_promedio2" value="tarifa_promedio" onchange="seleccionarFilas2(this)">
                            <label for="tarifa_promedio2"> Tarifa Prom. Hab.</label><br>
                            <input type="checkbox" name="TAR_PER2" id="TAR_PER2" value="TAR_PER" onchange="seleccionarFilas2(this)">
                            <label for="TAR_PER2"> Tarifa Prom. Per.</label><br>
                            <input type="checkbox" name="porcentaje_ocupacion2" id="porcentaje_ocupacion2" value="porcentaje_ocupacion" onchange="seleccionarFilas2(this)" checked>
                            <label for="porcentaje_ocupacion2"> Porcent. Ocupación</label><br>
                            <input type="checkbox" name="revpar2" id="revpar2" value="revpar" onchange="seleccionarFilas2(this)">
                            <label for="revpar2"> REVPAR</label><br>
                    
                        </div>
                    </div>
                
                    <div class="form-group col-md-10">
                        <canvas id="graficaDias" width="1400" height="600" ></canvas>
                    </div>
                </div>
            </section>   
        </section>
   </section>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script>
    
</script>
<script>
    
    var mesesGrafica1 = [];

    var dataCheckins1 = [];
    var dataCheckouts1 = [];
    var dataPernoctaciones1 = [];
    var dataNacionales1 = [];
    var dataExtranjeros1 = [];
    var dataHabOcupadas1 = [];
    var dataHabDisponibles1 = [];
    var dataTarPromHab1 = [];
    var dataTarPromPer1 = [];
    var dataVentasNetas1 = [];
    var dataPorcOcupacion1 = [];
    var dataREVPAR1 = [];

    var porcentaje_ocupacion1 = {
                label: 'porcentaje_ocupacion',
                data: dataPorcOcupacion1,
                backgroundColor: 'rgb(255,255,255,0.20)',
                borderColor: 'rgba(211, 214, 30, 0.74)',
                borderWidth: 3
            };

            
    var columnas1 = [porcentaje_ocupacion1];

    var mesInicioGrafica1 = '{{$mesInicio}}';
    var mesFinGrafica1 = '{{$mesFin}}';
    var anioInicioGrafica1 = '{{$anioInicio}}';
    var anioFinGrafica1 = '{{$anioFin}}';
    var nomColumnaGrafica1 = '{{$columna}}';
    var estadisticoMeses = 'prom';

    //Grafica 2. Por Dias
    var diasGrafica2 = [];
    
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

    var porcentaje_ocupacion2 = {
                label: 'porcentaje_ocupacion',
                data: dataPorcOcupacion2,
                backgroundColor: 'rgb(255,255,255,0.20)',
                borderColor: 'rgba(211, 214, 30, 0.74)',
                borderWidth: 3
            };

            
    var columnas2 = [porcentaje_ocupacion2];

    var fechaInicioGrafica2 = '{{$diaMin}}';
    var fechaFinGrafica2 = '{{$diaMax}}';
    var nomColumnaGrafica2 = '{{$columna}}';

    
    var ctx2 = document.getElementById('graficaMeses').getContext('2d');
    var graficaMeses = new Chart(ctx2, {
        type: "line",
        data: {
            labels: mesesGrafica1,
            datasets: columnas1
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

    var ctx2 = document.getElementById('graficaDias').getContext('2d');
    var graficaDias = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: diasGrafica2,
            datasets: columnas2
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            tooltips:{
                mode: 'x',
            }
        }
        
    });

    $(document).ready(function(){
        $('#cambioFechaInicio').focusout(function() {
            
            diasGrafica2 = [];
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

            fechaInicioGrafica2 = $(this).val();
           
            consultaDias();
        });

        $('#cambioFechaFin').focusout(function() {
            
            diasGrafica2 = [];
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
            fechaFinGrafica2 = $(this).val();
        
            consultaDias();
        });
        
        
        consultaMeses();
        consultaDias();
        
    });

    function consultaMeses(){
        $.ajax({
            url:'{{url("home/comparativas/all")}}',
            method: 'POST',
            data:{
                mesInicio: mesInicioGrafica1,
                mesFin: mesFinGrafica1,
                anioInicio: anioInicioGrafica1,
                anioFin: anioFinGrafica1,
                columna: nomColumnaGrafica1,
                estadistico: estadisticoMeses,
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
                dataCheckins1.push(arreglo[i].checkins);
                dataCheckouts1.push(arreglo[i].checkouts);
                dataPernoctaciones1.push(arreglo[i].pernoctaciones);
                dataNacionales1.push(arreglo[i].nacionales);
                dataExtranjeros1.push(arreglo[i].extranjeros);
                dataHabOcupadas1.push(arreglo[i].habitaciones_ocupadas);
                dataHabDisponibles1.push(arreglo[i].habitaciones_disponibles);
                dataTarPromHab1.push(arreglo[i].tarifa_promedio);
                dataTarPromPer1.push(arreglo[i].tar_per);
                dataVentasNetas1.push(arreglo[i].ventas_netas);
                dataPorcOcupacion1.push(arreglo[i].porcentaje_ocupacion);
                dataREVPAR1.push(arreglo[i].revpar);
            }

            for(var i=0;i<columnas1.length;i++){
                if(graficaMeses.data.datasets[i].label == 'porcentaje_ocupacion'){
                    graficaMeses.data.datasets[i].data = dataPorcOcupacion1;
                }
                if(graficaMeses.data.datasets[i].label == 'checkins'){
                    graficaMeses.data.datasets[i].data = dataCheckins1;
                }
                if(graficaMeses.data.datasets[i].label == 'checkouts'){
                    graficaMeses.data.datasets[i].data = dataCheckouts1;
                }
                if(graficaMeses.data.datasets[i].label == 'pernoctaciones'){
                    graficaMeses.data.datasets[i].data = dataPernoctaciones1;
                }
                if(graficaMeses.data.datasets[i].label == 'nacionales'){
                    graficaMeses.data.datasets[i].data = dataNacionales1;
                }
                if(graficaMeses.data.datasets[i].label == 'extranjeros'){
                    graficaMeses.data.datasets[i].data = dataExtranjeros1;
                }
                if(graficaMeses.data.datasets[i].label == 'habitaciones_ocupadas'){
                    graficaMeses.data.datasets[i].data = dataHabOcupadas1;
                }
                if(graficaMeses.data.datasets[i].label == 'habitaciones_disponibles'){
                    graficaMeses.data.datasets[i].data = dataHabDisponibles1;
                }
                if(graficaMeses.data.datasets[i].label == 'tarifa_promedio'){
                    graficaMeses.data.datasets[i].data = dataTarPromHab1;
                }
                if(graficaMeses.data.datasets[i].label == 'TAR_PER'){
                    graficaMeses.data.datasets[i].data = dataTarPromPer1;
                }
                if(graficaMeses.data.datasets[i].label == 'ventas_netas'){
                    graficaMeses.data.datasets[i].data = dataVentasNetas1;
                }
                if(graficaMeses.data.datasets[i].label == 'revpar'){
                    graficaMeses.data.datasets[i].data = dataREVPAR1;
                }
                
            }
        
            graficaMeses.data.labels = mesesGrafica1;
            graficaMeses.update();
        });

    }

    function consultaDias(){
        
        $.ajax({
            url:'{{url("home/comparativas/dias")}}',
            method: 'POST',
            data:{
                inicio: fechaInicioGrafica2,
                fin: fechaFinGrafica2,
                _token: $('input[name="_token"]').val()
            }
        }).done(function(res){
            
            var arreglo = JSON.parse(res);
   
            for(var i=0;i<arreglo.length;i++){
                
                diasGrafica2.push(arreglo[i].fecha);
                dataCheckins2.push(arreglo[i].checkins);
                dataCheckouts2.push(arreglo[i].checkouts);
                dataPernoctaciones2.push(arreglo[i].pernoctaciones);
                dataNacionales2.push(arreglo[i].nacionales);
                dataExtranjeros2.push(arreglo[i].extranjeros);
                dataHabOcupadas2.push(arreglo[i].habitaciones_ocupadas);
                dataHabDisponibles2.push(arreglo[i].habitaciones_disponibles);
                dataTarPromHab2.push(arreglo[i].tarifa_promedio);
                dataTarPromPer2.push(arreglo[i].tar_per);
                dataVentasNetas2.push(arreglo[i].ventas_netas);
                dataPorcOcupacion2.push(arreglo[i].porcentaje_ocupacion);
                dataREVPAR2.push(arreglo[i].revpar);
                
            }

            for(var i=0;i<columnas2.length;i++){
                if(graficaDias.data.datasets[i].label == 'porcentaje_ocupacion'){
                    graficaDias.data.datasets[i].data = dataPorcOcupacion2;
                }
                if(graficaDias.data.datasets[i].label == 'checkins'){
                    graficaDias.data.datasets[i].data = dataCheckins2;
                }
                if(graficaDias.data.datasets[i].label == 'checkouts'){
                    graficaDias.data.datasets[i].data = dataCheckouts2;
                }
                if(graficaDias.data.datasets[i].label == 'pernoctaciones'){
                    graficaDias.data.datasets[i].data = dataPernoctaciones2;
                }
                if(graficaDias.data.datasets[i].label == 'nacionales'){
                    graficaDias.data.datasets[i].data = dataNacionales2;
                }
                if(graficaDias.data.datasets[i].label == 'extranjeros'){
                    graficaDias.data.datasets[i].data = dataExtranjeros2;
                }
                if(graficaDias.data.datasets[i].label == 'habitaciones_ocupadas'){
                    graficaDias.data.datasets[i].data = dataHabOcupadas2;
                }
                if(graficaDias.data.datasets[i].label == 'habitaciones_disponibles'){
                    graficaDias.data.datasets[i].data = dataHabDisponibles2;
                }
                if(graficaDias.data.datasets[i].label == 'tarifa_promedio'){
                    graficaDias.data.datasets[i].data = dataTarPromHab2;
                }
                if(graficaDias.data.datasets[i].label == 'TAR_PER'){
                    graficaDias.data.datasets[i].data = dataTarPromPer2;
                }
                if(graficaDias.data.datasets[i].label == 'ventas_netas'){
                    graficaDias.data.datasets[i].data = dataVentasNetas2;
                }
                if(graficaDias.data.datasets[i].label == 'revpar'){
                    graficaDias.data.datasets[i].data = dataREVPAR2;
                }
                
            }
            
            graficaDias.data.labels = diasGrafica2;
            graficaDias.update();
        });

    }

    function limpiarArreglosGraficaMes(){
        mesesGrafica1 = [];
        dataCheckins1 = [];
        dataCheckouts1 = [];
        dataPernoctaciones1 = [];
        dataNacionales1 = [];
        dataExtranjeros1 = [];
        dataHabOcupadas1 = [];
        dataHabDisponibles1 = [];
        dataTarPromHab1 = [];
        dataTarPromPer1 = [];
        dataVentasNetas1 = [];
        dataPorcOcupacion1 = [];
        dataREVPAR1 = [];
    }

    function cambioMesInicio(val){

        limpiarArreglosGraficaMes();

        mesInicioGrafica1 = val.value;
        
        consultaMeses();
        
    }

    function cambioMesFin(val){
        
        limpiarArreglosGraficaMes();

        mesFinGrafica1 = val.value;
        
        consultaMeses();
    }

    function cambioAnioInicio(val){
        
        limpiarArreglosGraficaMes();

        anioInicioGrafica1 = val.value;
        
        consultaMeses();
        
    }

    function cambioAnioFin(val){
        
        limpiarArreglosGraficaMes();

        anioFinGrafica1 = val.value;
        
        consultaMeses();
    }

    function cambioEstadisticoMeses(val){
        
        limpiarArreglosGraficaMes();

        if(val.value == 'total'){

            document.getElementById("tarifa_promedio").checked = false;
            document.getElementById("TAR_PER").checked = false;
            document.getElementById("porcentaje_ocupacion").checked = false;
            document.getElementById("revpar").checked = false;

            document.getElementById("tarifa_promedio").disabled = true;
            document.getElementById("TAR_PER").disabled = true;
            document.getElementById("porcentaje_ocupacion").disabled = true;
            document.getElementById("revpar").disabled = true;

            for(var i=0;i<columnas1.length;i++){
                
                if(columnas1[i].label == 'tarifa_promedio' || columnas1[i].label == 'TAR_PER'|| columnas1[i].label == 'porcentaje_ocupacion'|| columnas1[i].label == 'revpar'){
                    columnas1.splice(i, 1);
                    i--;
                }

            }

            graficaMeses.update();


        }else{
            
            document.getElementById("tarifa_promedio").disabled = false;
            document.getElementById("TAR_PER").disabled = false;
            document.getElementById("porcentaje_ocupacion").disabled = false;
            document.getElementById("revpar").disabled = false;

        }

        estadisticoMeses = val.value;
        
        consultaMeses();
    }
   


    function seleccionarFilas(val){
        var valor = val.value;
        var datos;
        var bandera;
        var color;
        
        if(valor == 'checkins'){
            color = 'rgba(0, 0, 0)';
            datos = dataCheckins1;
            bandera = document.getElementById('checkins').checked;
        }else if(valor == 'checkouts'){
            color = 'rgba(255, 0, 0)';
            datos = dataCheckouts1;
            bandera = document.getElementById('checkouts').checked;
        }else if(valor == 'pernoctaciones'){
            color = 'rgba(110, 54, 54)';
            datos = dataPernoctaciones1;
            bandera = document.getElementById('pernoctaciones').checked;
        }else if(valor == 'nacionales'){
            color = 'rgba(131, 119, 119)';
            datos = dataNacionales1;
            bandera = document.getElementById('nacionales').checked;
        }else if(valor == 'extranjeros'){
            color = 'rgba(223, 172, 32)';
            datos = dataExtranjeros1;
            bandera = document.getElementById('extranjeros').checked;
        }else if(valor == 'habitaciones_ocupadas'){
            color = 'rgba(109, 209, 84)';
            datos = dataHabOcupadas1;
            bandera = document.getElementById('habitaciones_ocupadas').checked;
        }else if(valor == 'habitaciones_disponibles'){
            color = 'rgba(39, 215, 228)';
            datos = dataHabDisponibles1;
            bandera = document.getElementById('habitaciones_disponibles').checked;
        }else if(valor == 'tarifa_promedio'){
            color = 'rgba(41, 77, 175)';
            datos = dataTarPromHab1;
            bandera = document.getElementById('tarifa_promedio').checked;
        }else if(valor == 'TAR_PER'){
            color = 'rgba(99, 41, 175)';
            datos = dataTarPromPer1;
            bandera = document.getElementById('TAR_PER').checked;
        }else if(valor == 'ventas_netas'){
            color = 'rgba(216, 44, 193)';
            datos = dataVentasNetas1;
            bandera = document.getElementById('ventas_netas').checked;
        }else if(valor == 'porcentaje_ocupacion'){
            color = 'rgba(211, 214, 30)';
            datos = dataPorcOcupacion1;
            bandera = document.getElementById('porcentaje_ocupacion').checked;
        }else if(valor == 'revpar'){
            color = 'rgba(19, 190, 153)';
            datos = dataREVPAR1;
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

            columnas1.push(aux);
            graficaMeses.update();


        }else{

            
            for(var i=0;i<columnas1.length;i++){
                
                if(columnas1[i].label == valor){
                    columnas1.splice(i, 1);
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
            graficaDias.update();


        }else{

            
            for(var i=0;i<columnas2.length;i++){
                
                if(columnas2[i].label == valor){
                    columnas2.splice(i, 1);
                }

            }
            
            graficaDias.update();
            
        }
        
    }

</script>
@endsection
