@extends('layouts.app')
@section('content')
    <div id="page-top"></div>
    <section class="fondoDatosEsta">
        <section class="graficaWelcome">
            <section class="tituloGrafica" ><h2>COMPARATIVAS DE DATOS HOTELEROS</h2></section>
            
            <section class="lineatituloGrafica" ></section>
            <div class="card-group" >
                <div class="card cardGraficaWelcome" >
                    <div class="row titulosPanel">
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title text-center">Fecha inicio</h5>
                                <div class="row">
                                    <div class="selectGraficaAnio" >
                                        <select id="idanioInicio" name="anioInicio" class="form-control" onchange="cambioAnioInicio(this)">
                                            
                                            @foreach($anios as $anio)
                                                @if( $anio->anio ===  $anioInicio )
                                                    <option value="{{$anio->anio}}" selected>{{$anio->anio}}</option>
                                                @else
                                                    <option value="{{$anio->anio}}">{{$anio->anio}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div >
                                        <select id="idmesInicio" name="mesInicio" class="form-control" onchange="cambioMesInicio(this)">
                                            <option disable>Elegir mes</option>
                                                @foreach($meses as $mes)
                                                    @if($mes[2] ===  $anioInicio)
                                                        @if( $mes[1] ===  $mesInicio )
                                                            <option value="{{$mes[1]}}" selected>{{$mes[0]}}</option>
                                                        @else
                                                            <option value="{{$mes[1]}}">{{$mes[0]}}</option>
                                                        @endif
                                                    @endif
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title text-center">Fecha Fin</h5>
                                <div class="row">
                                    <div class="col-6" >
                                        <select id="idanioFin" name="anioFin" class="form-control" onchange="cambioAnioFin(this)">
                                            @foreach($anios as $anio)
                                                <option value="{{$anio->anio}}">{{$anio->anio}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div >
                                        <select id="idmesFin" name="mesFin" class="form-control" onchange="cambioMesFin(this)">
                                            @foreach($meses as $mes)
                                                @if($mes[2] ===  $anioFin)
                                                    @if( $mes[1] ===  $mesFin )
                                                        <option value="{{$mes[1]}}" selected>{{$mes[0]}}</option>
                                                    @else
                                                        <option value="{{$mes[1]}}">{{$mes[0]}}</option>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="card cardGraficaWelcome" >
                    <div class="row titulosPanel">
                        <div class="col-5">
                            <div class="card-body">
                                <h5 class="card-title text-center">¿Dias o Meses?</h5>
                                <div >
                                    <select id="inputState" name="ejeX" class="form-control" onchange="cambioEjeX(this)">
                                        <option value="1" >Meses</option>
                                        <option value="2">Días</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title text-center">Categoría</h5>
                                <div class="col-13">
                                    <select id="inputState" name="categoria" class="form-control" onchange="cambioCategoria(this)">
                                        <option value="Todas">Todas</option>
                                        @foreach($categorias as $categoria)
                                            <option value="{{$categoria->categoria}}">{{$categoria->categoria}}</option>
                                        @endforeach
                                    </select>
                                  </div>
                              </div>
    
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title text-center">Estadísticos</h5>
                                <div >
                                    <select id="inputState" name="estadistico" class="form-control" onchange="cambioEstadisticoComparativas(this)">
                                        <option value="prom">Promedio</option>
                                        <option value="total" >Total</option>
                                        <option value="max">Máximo</option>
                                        <option value="min" >Mínimo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="espacioGrafica" ></section>
            <div class="row col-13">
                <div class="form-group col-md-2 graficaColums titulosPanel titulosPanelGe" >
                    <h5 >Parámetros </h5> 
                    <input type="checkbox" name="checkins" id="checkins" value="Checkins" onchange="seleccionarFilas(this)">
                    <label for="checkins"> Checkins</label><br>
                    <input type="checkbox" name="checkouts" id="checkouts" value="Checkouts" onchange="seleccionarFilas(this)">
                    <label for="checkouts"> Checkouts</label><br>
                    <input type="checkbox" name="pernoctaciones" id="pernoctaciones" value="Pernoctaciones" onchange="seleccionarFilas(this)">
                    <label for="pernoctaciones"> Pernoctaciones</label><br>
                    <input type="checkbox" name="nacionales" id="nacionales" value="Nacionales" onchange="seleccionarFilas(this)">
                    <label for="nacionales"> Nacionales</label><br>
                    <input type="checkbox" name="extranjeros" id="extranjeros" value="Extranjeros" onchange="seleccionarFilas(this)">
                    <label for="extranjeros"> Extranjeros</label><br>
                    <input type="checkbox" name="habitaciones_ocupadas" id="habitaciones_ocupadas" value="Hab. Ocupadas" onchange="seleccionarFilas(this)">
                    <label for="habitaciones_ocupadas"> Hab. Ocupadas</label><br>
                    <input type="checkbox" name="habitaciones_disponibles" id="habitaciones_disponibles" value="Hab. Disponibles" onchange="seleccionarFilas(this)">
                    <label for="habitaciones_disponibles"> Hab. Disponibles</label><br>
                    <input type="checkbox" name="ventas_netas" id="ventas_netas" value="Ventas Netas" onchange="seleccionarFilas(this)">
                    <label for="ventas_netas"> Ventas Netas</label>
                    <hr>
                    <input type="checkbox" name="tarifa_promedio" id="tarifa_promedio" value="Tarifa Prom. Hab." onchange="seleccionarFilas(this)">
                    <label for="tarifa_promedio"> Tarifa Prom. Hab.</label><br>
                    <input type="checkbox" name="TAR_PER" id="TAR_PER" value="Tarifa Prom. Per." onchange="seleccionarFilas(this)">
                    <label for="TAR_PER"> Tarifa Prom. Per.</label><br> 
                    <input type="checkbox" name="porcentaje_ocupacion" id="porcentaje_ocupacion" value="Porcent. Ocupación" onchange="seleccionarFilas(this)" checked>
                    <label for="porcentaje_ocupacion"> Porcent. Ocupación</label><br>
                    <input type="checkbox" name="revpar" id="revpar" value="Revpar" onchange="seleccionarFilas(this)">
                    <label for="revpar"> REVPAR</label><br> 
                </div>
                <div class="form-group col-md-9">
                    <br>
                        <div id="containerChartComparativa" ></div>
                </div>
            </div>
        </section>
    </section>
    <section class="fondoBlanco">
        <section class="graficaWelcome">
            <section class="tituloGrafica" ><h2>DATOS HOTELEROS POR CATEGORÍA</h2></section>
            <section class="lineatituloGrafica" ></section>
                <div class="form-row align-items-center"> 
                    <div class="row row-cols-3 col-lg-12 pl-5 text-left titulosPanel2" >
                        <label> <h5>Año</h5></label>
                        <label> <h5 class="tituloEstadisticos">Estadísticos</h5></label>
                    </div>
                    <div class="row row-cols-2 col-3 ml-2 p-3 inicio">
                        <div class="row ml-3">
                            <select id="idanioInicio" name="anio" class="form-control" onchange="cambioAnio(this)">
                                @foreach($anios as $anio)
                                    <option value="{{$anio->anio}}">{{$anio->anio}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row row-cols-2 col-3 mr-2 ml-2 inicio">
                        <div class="row mr-2">
                            <select id="inputState" name="estadistico" class="form-control" onchange="cambioEstadistico(this)">
                                <option value="prom">Promedio</option>
                                <option value="total" >Total</option>
                                <option value="max">Máximo</option>
                                <option value="min" >Mínimo</option>
                            </select>
                        </div>
                    </div>
                </div>

                <section class="espacioGrafica" ></section>
                
                <div class="row col-13">
                    <div class="form-group col-md-2 graficaColums  titulosPanel titulosPanelGe" >
                        <h5 >Parámetros</h5>
                        <input type="checkbox" name="checkins2" id="checkins2" value="Checkins" onchange="seleccionarFilas2(this)">
                        <label for="checkins2"> Checkins</label><br>
                        <input type="checkbox" name="checkouts2" id="checkouts2" value="Checkouts" onchange="seleccionarFilas2(this)">
                        <label for="checkouts2"> Checkouts</label><br>
                        <input type="checkbox" name="pernoctaciones2" id="pernoctaciones2" value="Pernoctaciones" onchange="seleccionarFilas2(this)">
                        <label for="pernoctaciones2"> Pernoctaciones</label><br>
                        <input type="checkbox" name="nacionales2" id="nacionales2" value="Nacionales" onchange="seleccionarFilas2(this)">
                        <label for="nacionales2"> Nacionales</label><br>
                        <input type="checkbox" name="extranjeros2" id="extranjeros2" value="Extranjeros" onchange="seleccionarFilas2(this)">
                        <label for="extranjeros2"> Extranjeros</label><br>
                        <input type="checkbox" name="habitaciones_ocupadas2" id="habitaciones_ocupadas2" value="Hab. Ocupadas" onchange="seleccionarFilas2(this)">
                        <label for="habitaciones_ocupadas2"> Hab. Ocupadas</label><br>
                        <input type="checkbox" name="habitaciones_disponibles2" id="habitaciones_disponibles2" value="Hab. Disponibles" onchange="seleccionarFilas2(this)">
                        <label for="habitaciones_disponibles2"> Hab. Disponibles</label><br>
                        <input type="checkbox" name="ventas_netas2" id="ventas_netas2" value="Ventas Netas" onchange="seleccionarFilas2(this)">
                        <label for="ventas_netas2"> Ventas Netas</label>
                        <hr>
                        <input type="checkbox" name="tarifa_promedio2" id="tarifa_promedio2" value="Tarifa Prom. Hab." onchange="seleccionarFilas2(this)">
                        <label for="tarifa_promedio2"> Tarifa Prom. Hab.</label><br>
                        <input type="checkbox" name="TAR_PER2" id="TAR_PER2" value="Tarifa Prom. Per." onchange="seleccionarFilas2(this)">
                        <label for="TAR_PER2"> Tarifa Prom. Per.</label><br>
                        <input type="checkbox" name="porcentaje_ocupacion2" id="porcentaje_ocupacion2" value="Porcent. Ocupación" onchange="seleccionarFilas2(this)" checked>
                        <label for="porcentaje_ocupacion2"> Porcent. Ocupación</label><br>
                        <input type="checkbox" name="revpar2" id="revpar2" value="Revpar" onchange="seleccionarFilas2(this)">
                        <label for="revpar2"> REVPAR</label><br>
                    </div>
                    <div class="form-group col-md-9">
                        <br>
                        <div id="containerChartCaregorias" ></div>
                    </div>
                </div>
        </section>
    </section>
    <form action="" method="POST">
        @csrf
    </form>
        



@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script src = "https://code.highcharts.com/highcharts.src.js"> </script>


 <!--Flecha-->
 <script>
    $(document).ready(function(){ //Hacia arriba
        irArriba();
    });

    function irArriba(){
        $('.flechaInicio').click(function(){ 
            $('body,html').animate({ scrollTop:'10px' },100); 
        });
        $(window).scroll(function(){
            if($(this).scrollTop() > 0){ 
                $('.flechaInicio').slideDown(600); 
            }else{ 
                $('.flechaInicio').slideUp(600);
            }
        });
        $('.flechaInicio').click(function(){ $('body,html').animate({ scrollTop:'0px' },2); });
        }
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

    var mesInicioGrafica1 = '{{$mesInicio}}';
    var mesFinGrafica1 = '{{$mesFin}}';
    var anioInicioGrafica1 = '{{$anioInicio}}';
    var anioFinGrafica1 = '{{$anioFin}}';
    var nomColumnaGrafica1 = '{{$columna}}';
    var nomCategoria = 'Todas';
    var ejeX = 1;
    var estadistico = 'prom';
    
     /*Tema general de las graficas */
     Highcharts.theme = {
       
        chart: {
            backgroundColor: null,
            type: 'line'   
        },
        yAxis: {
            title: {
                text: 'Escala'
            }
        },
        title: {
            style: {
                color: '#000',
                font: 'bold 16px "Roboto Condensed", Verdana, sans-serif'
            }
         },
         legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            itemStyle: {
            font: '9pt Trebuchet MS, Verdana, sans-serif',
            color: 'black'
            },
            itemHoverStyle:{
                color: 'gray'
            }
        },
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        },
        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                
            }
        },
    };
    // Apply the theme
    Highcharts.setOptions(Highcharts.theme);

    /*Fin Tema */
//---------------------------------------Grafica de Comparativas

    var chartComparativa = Highcharts.chart('containerChartComparativa', {
        chart: {
            type: 'line'   
        },
        title: {
            text: 'Gráfica Mensual de los indicadores',
        },
        xAxis: {
            categories: mesesGrafica1
        },
        
        series: [{
                name: 'Porcent. Ocupación',
                data: dataPorcOcupacion
        }]
    });

    //--------------------------------------- Grafica de barras por categorias
    var anio = '{{$anioFin}}';
    var estadisticoBarras = 'prom';

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

    var chartCategorias = Highcharts.chart('containerChartCaregorias', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafica deacuerdo a categorias de los Establecimientos'
        },
        xAxis: {
            categories: ["5 Estrellas", "4 Estrellas", "3 Estrellas", "2 Estrellas", "1 Estrella"]
        },
   
        series: [{
            name: 'Porcent. Ocupación',
            data: dataPorcOcupacion2
        }]
    });

    $(document).ready(function(){
        consultaChartComparativa();
        consultaCategorias();
        
    });

    /* 
        Funciones para interactuar con la gráfica mensual
    */

    function consultaChartComparativa(){
        
        $.ajax({
            url:'{{url("graficasEstadisticas")}}',
            method: 'POST',
            data:{
                mesInicio: mesInicioGrafica1,
                mesFin: mesFinGrafica1,
                anioInicio: anioInicioGrafica1,
                anioFin: anioFinGrafica1,
                columna: nomColumnaGrafica1,
                categoria: nomCategoria,
                estadistico: estadistico,
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
                dataTarPromPer.push(arreglo[i].tar_per);
                dataVentasNetas.push(arreglo[i].ventas_netas);
                dataPorcOcupacion.push(arreglo[i].porcentaje_ocupacion);
                dataREVPAR.push(arreglo[i].revpar);
            }

            dataCheckins = dataCheckins.map(element => parseFloat(element));
            dataCheckouts = dataCheckouts.map(element => parseFloat(element));
            dataPernoctaciones = dataPernoctaciones.map(element => parseFloat(element));
            dataNacionales = dataNacionales.map(element => parseFloat(element));
            dataExtranjeros = dataExtranjeros.map(element => parseFloat(element));
            dataHabOcupadas = dataHabOcupadas.map(element => parseFloat(element));
            dataHabDisponibles = dataHabDisponibles.map(element => parseFloat(element));
            dataTarPromHab = dataTarPromHab.map(element => parseFloat(element));
            dataTarPromPer = dataTarPromPer.map(element => parseFloat(element));
            dataVentasNetas = dataVentasNetas.map(element => parseFloat(element));
            dataPorcOcupacion = dataPorcOcupacion.map(element => parseFloat(element));
            dataREVPAR = dataREVPAR.map(element => parseFloat(element));
            
            for(var i=0;i<chartComparativa.series.length;i++){ 
                if(chartComparativa.series[i].name == 'Porcent. Ocupación')
                    chartComparativa.series[i].update({data: dataPorcOcupacion});
                else if(chartComparativa.series[i].name == 'Checkins')
                    chartComparativa.series[i].update({data: dataCheckins});
                else if(chartComparativa.series[i].name == 'Checkouts')
                    chartComparativa.series[i].update({data: dataCheckouts});
                else if(chartComparativa.series[i].name == 'Pernoctaciones')
                    chartComparativa.series[i].update({data: dataPernoctaciones});
                else if(chartComparativa.series[i].name == 'Nacionales')
                    chartComparativa.series[i].update({data: dataNacionales});
                else if(chartComparativa.series[i].name == 'Extranjeros')
                    chartComparativa.series[i].update({data: dataExtranjeros});
                else if(chartComparativa.series[i].name == 'Hab. Ocupadas')
                    chartComparativa.series[i].update({data: dataHabOcupadas});
                else if(chartComparativa.series[i].name == 'Hab. Disponibles')
                    chartComparativa.series[i].update({data: dataHabDisponibles});
                else if(chartComparativa.series[i].name == 'Tarifa Prom. Hab.')
                    chartComparativa.series[i].update({data: dataTarPromHab});
                else if(chartComparativa.series[i].name == 'Tarifa Prom. Per.')
                    chartComparativa.series[i].update({data: dataTarPromPer});
                else if(chartComparativa.series[i].name == 'Ventas Netas')
                    chartComparativa.series[i].update({data: dataVentasNetas});
                else if(chartComparativa.series[i].name  == 'Revpar')
                    chartComparativa.series[i].update({data: dataREVPAR});
            }

            chartComparativa.update( {
                xAxis: {
                    categories: mesesGrafica1
                }
            });
            
        });

    }

    function limpiarArreglosChartComparativa(){
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
    }

    function cambioMesInicio(val){
        limpiarArreglosChartComparativa();
        mesInicioGrafica1 = val.value;
        consultaChartComparativa();
    }

    function cambioMesFin(val){
        limpiarArreglosChartComparativa();
        mesFinGrafica1 = val.value;
        consultaChartComparativa();
    }

    function cambioAnioInicio(val){
        limpiarArreglosChartComparativa();
        anioInicioGrafica1 = val.value;
        consultaChartComparativa();
        mesesOption(anioInicioGrafica1, mesInicioGrafica1, 1);
    }

    function cambioAnioFin(val){
        limpiarArreglosChartComparativa();
        anioFinGrafica1 = val.value;
        consultaChartComparativa();
        mesesOption(anioFinGrafica1, mesFinGrafica1, 2);
    }
   
    function cambioCategoria(val){
        limpiarArreglosChartComparativa();
        nomCategoria = val.value;
        consultaChartComparativa();
    }

    function cambioEjeX(val){
        limpiarArreglosChartComparativa();
        ejeX = val.value;
        consultaChartComparativa();
    }

    function cambioEstadisticoComparativas(val){
        
        limpiarArreglosChartComparativa();

        if(val.value == 'total'){

            document.getElementById("tarifa_promedio").checked = false;
            document.getElementById("TAR_PER").checked = false;
            document.getElementById("porcentaje_ocupacion").checked = false;
            document.getElementById("revpar").checked = false;

            document.getElementById("tarifa_promedio").disabled = true;
            document.getElementById("TAR_PER").disabled = true;
            document.getElementById("porcentaje_ocupacion").disabled = true;
            document.getElementById("revpar").disabled = true;

            for(var i=0;i<chartComparativa.series.length;i++){
                if(chartComparativa.series[i].name == 'Porcent. Ocupación' || chartComparativa.series[i].name == 'Tarifa Prom. Per.'|| chartComparativa.series[i].name == 'Tarifa Prom. Hab.'|| chartComparativa.series[i].name == 'Revpar'){
                    chartComparativa.series[i].remove(true);
                    i--;
                }
            }

        }else{
            
            document.getElementById("tarifa_promedio").disabled = false;
            document.getElementById("TAR_PER").disabled = false;
            document.getElementById("porcentaje_ocupacion").disabled = false;
            document.getElementById("revpar").disabled = false;

        }
        estadistico = val.value;
        consultaChartComparativa();
    }

    function seleccionarFilas(val){
        var valor = val.value;
        var datos;
        var bandera;
        var color;
        
        if(valor == 'Checkins'){
            color = 'rgba(0, 0, 0)';
            datos = dataCheckins;
            bandera = document.getElementById('checkins').checked;
        }else if(valor == 'Checkouts'){
            color = 'rgba(255, 0, 0)';
            datos = dataCheckouts;
            bandera = document.getElementById('checkouts').checked;
        }else if(valor == 'Pernoctaciones'){
            color = 'rgba(110, 54, 54)';
            datos = dataPernoctaciones;
            bandera = document.getElementById('pernoctaciones').checked;
        }else if(valor == 'Nacionales'){
            color = 'rgba(131, 119, 119)';
            datos = dataNacionales;
            bandera = document.getElementById('nacionales').checked;
        }else if(valor == 'Extranjeros'){
            color = 'rgba(223, 172, 32)';
            datos = dataExtranjeros;
            bandera = document.getElementById('extranjeros').checked;
        }else if(valor == 'Hab. Ocupadas'){
            color = 'rgba(109, 209, 84)';
            datos = dataHabOcupadas;
            bandera = document.getElementById('habitaciones_ocupadas').checked;
        }else if(valor == 'Hab. Disponibles'){
            color = 'rgba(39, 215, 228)';
            datos = dataHabDisponibles;
            bandera = document.getElementById('habitaciones_disponibles').checked;
        }else if(valor == 'Tarifa Prom. Hab.'){
            color = 'rgba(41, 77, 175)';
            datos = dataTarPromHab;
            bandera = document.getElementById('tarifa_promedio').checked;
        }else if(valor == 'Tarifa Prom. Per.'){
            color = 'rgba(99, 41, 175)';
            datos = dataTarPromPer;
            bandera = document.getElementById('TAR_PER').checked;
        }else if(valor == 'Ventas Netas'){
            color = 'rgba(216, 44, 193)';
            datos = dataVentasNetas;
            bandera = document.getElementById('ventas_netas').checked;
        }else if(valor == 'Porcent. Ocupación'){
            color = 'rgba(211, 214, 30)';
            datos = dataPorcOcupacion;
            bandera = document.getElementById('porcentaje_ocupacion').checked;
        }else if(valor == 'Revpar'){
            color = 'rgba(19, 190, 153)';
            datos = dataREVPAR;
            bandera = document.getElementById('revpar').checked;
        }

        if(bandera){
            chartComparativa.addSeries({
                    name: valor,
                    data: datos
                    });
        }else{
            for(var i=0;i<chartComparativa.series.length;i++){
                if(chartComparativa.series[i].name == valor){
                    chartComparativa.series[i].remove(true);
                }
            }
        }
    }

    /* 
        Funciones para interactuar con la gráfica por categorias
    */

    function consultaCategorias(){

        $.ajax({
            url:'{{url("graficasEstadisticas/barra")}}',
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
            
            dataCheckins2 = dataCheckins2.map(element => parseFloat(element));
            dataCheckouts2 = dataCheckouts2.map(element => parseFloat(element));
            dataPernoctaciones2 = dataPernoctaciones2.map(element => parseFloat(element));
            dataNacionales2 = dataNacionales2.map(element => parseFloat(element));
            dataExtranjeros2 = dataExtranjeros2.map(element => parseFloat(element));
            dataHabOcupadas2 = dataHabOcupadas2.map(element => parseFloat(element));
            dataHabDisponibles2 = dataHabDisponibles2.map(element => parseFloat(element));
            dataTarPromHab2 = dataTarPromHab2.map(element => parseFloat(element));
            dataTarPromPer2 = dataTarPromPer2.map(element => parseFloat(element));
            dataVentasNetas2 = dataVentasNetas2.map(element => parseFloat(element));
            dataPorcOcupacion2 = dataPorcOcupacion2.map(element => parseFloat(element));
            dataREVPAR2 = dataREVPAR2.map(element => parseFloat(element));

            for(var i=0;i<chartCategorias.series.length;i++){
                if(chartCategorias.series[i].name == 'Porcent. Ocupación')
                    chartCategorias.series[i].update({data: dataPorcOcupacion2});
                else if(chartCategorias.series[i].name == 'Checkins')
                    chartCategorias.series[i].update({data: dataCheckins2});
                else if(chartCategorias.series[i].name == 'Checkouts')
                    chartCategorias.series[i].update({data: dataCheckouts2});
                else if(chartCategorias.series[i].name == 'Pernoctaciones')
                    chartCategorias.series[i].update({data: dataPernoctaciones2});
                else if(chartCategorias.series[i].name == 'Nacionales')
                    chartCategorias.series[i].update({data: dataNacionales2});
                else if(chartCategorias.series[i].name == 'Extranjeros')
                    chartCategorias.series[i].update({data: dataExtranjeros2});
                else if(chartCategorias.series[i].name == 'Hab. Ocupadas')
                    chartCategorias.series[i].update({data: dataHabOcupadas2});
                else if(chartCategorias.series[i].name == 'Hab. Disponibles')
                    chartCategorias.series[i].update({data: dataHabDisponibles2});
                else if(chartCategorias.series[i].name == 'Tarifa Prom. Hab.')
                    chartCategorias.series[i].update({data: dataTarPromHab2});
                else if(chartCategorias.series[i].name == 'Tarifa Prom. Per.')
                    chartCategorias.series[i].update({data: dataTarPromPer2});
                else if(chartCategorias.series[i].name == 'Ventas Netas')
                    chartCategorias.series[i].update({data: dataVentasNetas2});
                else if(chartCategorias.series[i].name == 'Revpar')
                    chartCategorias.series[i].update({data: dataREVPAR2});
            }

        });

    }

    function limpiarArreglosChartCategorias(){
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
    }

    function cambioAnio(val){
        limpiarArreglosChartCategorias();
        anio = val.value;
        consultaCategorias();
    }

    function cambioEstadistico(val){

        limpiarArreglosChartCategorias();

        if(val.value == 'total'){

            document.getElementById("tarifa_promedio2").checked = false;
            document.getElementById("TAR_PER2").checked = false;
            document.getElementById("porcentaje_ocupacion2").checked = false;
            document.getElementById("revpar2").checked = false;

            document.getElementById("tarifa_promedio2").disabled = true;
            document.getElementById("TAR_PER2").disabled = true;
            document.getElementById("porcentaje_ocupacion2").disabled = true;
            document.getElementById("revpar2").disabled = true;

            for(var i=0;i<chartCategorias.series.length;i++){
                
                if(chartCategorias.series[i].name == 'Porcent. Ocupación' || chartCategorias.series[i].name == 'Tarifa Prom. Per.'|| chartCategorias.series[i].name == 'Tarifa Prom. Hab.'|| chartCategorias.series[i].name == 'Revpar'){
                    chartCategorias.series[i].remove(true);
                    i--;
                }

            }

        }else{
            document.getElementById("tarifa_promedio2").disabled = false;
            document.getElementById("TAR_PER2").disabled = false;
            document.getElementById("porcentaje_ocupacion2").disabled = false;
            document.getElementById("revpar2").disabled = false;

        }

        estadisticoBarras = val.value;
        
        consultaCategorias();
    }

    function seleccionarFilas2(val){
        var valor = val.value;
        var datos;
        var bandera;
        var color;
        var borde;
        
        if(valor == 'Checkins'){
            color = 'rgba(0, 0, 0,0.6)';
            borde = 'rgba(0, 0, 0)';
            datos = dataCheckins2;
            bandera = document.getElementById('checkins2').checked;
        }else if(valor == 'Checkouts'){
            color = 'rgba(255, 0, 0,0.6)';
            borde = 'rgba(255, 0, 0)';
            datos = dataCheckouts2;
            bandera = document.getElementById('checkouts2').checked;
        }else if(valor == 'Pernoctaciones'){
            color = 'rgba(110, 54, 54,0.6)';
            borde = 'rgba(110, 54, 54)';
            datos = dataPernoctaciones2;
            bandera = document.getElementById('pernoctaciones2').checked;
        }else if(valor == 'Nacionales'){
            color = 'rgba(131, 119, 119,0.6)';
            borde = 'rgba(131, 119, 119)';
            datos = dataNacionales2;
            bandera = document.getElementById('nacionales2').checked;
        }else if(valor == 'Extranjeros'){
            color = 'rgba(223, 172, 32,0.6)';
            borde = 'rgba(223, 172, 32)';
            datos = dataExtranjeros2;
            bandera = document.getElementById('extranjeros2').checked;
        }else if(valor == 'Hab. Ocupadas'){
            color = 'rgba(109, 209, 84,0.6)';
            borde = 'rgba(109, 209, 84)';
            datos = dataHabOcupadas2;
            bandera = document.getElementById('habitaciones_ocupadas2').checked;
        }else if(valor == 'Hab. Disponibles'){
            color = 'rgba(39, 215, 228,0.6)';
            borde = 'rgba(39, 215, 228)';
            datos = dataHabDisponibles2;
            bandera = document.getElementById('habitaciones_disponibles2').checked;
        }else if(valor == 'Tarifa Prom. Hab.'){
            color = 'rgba(41, 77, 175,0.6)';
            borde = 'rgba(41, 77, 175)';
            datos = dataTarPromHab2;
            bandera = document.getElementById('tarifa_promedio2').checked;
        }else if(valor == 'Tarifa Prom. Per.'){
            color = 'rgba(99, 41, 175,0.6)';
            borde = 'rgba(99, 41, 175)';
            datos = dataTarPromPer2;
            bandera = document.getElementById('TAR_PER2').checked;
        }else if(valor == 'Ventas Netas'){
            color = 'rgba(216, 44, 193,0.6)';
            borde = 'rgba(216, 44, 193)';
            datos = dataVentasNetas2;
            bandera = document.getElementById('ventas_netas2').checked;
        }else if(valor == 'Porcent. Ocupación'){
            color = 'rgba(211, 214, 30,0.6)';
            borde = 'rgba(211, 214, 30)';
            datos = dataPorcOcupacion2;
            bandera = document.getElementById('porcentaje_ocupacion2').checked;
        }else if(valor == 'Revpar'){
            color = 'rgba(19, 190, 153,0.6)';
            borde = 'rgba(19, 190, 153)';
            datos = dataREVPAR2;
            bandera = document.getElementById('revpar2').checked;
        }

        if(bandera){
            chartCategorias.addSeries({
                    name: valor,
                    data: datos
                    });
        }else{
            for(var i=0;i<chartCategorias.series.length;i++){
                
                if(chartCategorias.series[i].name == valor){
                    chartCategorias.series[i].remove(true);
                }

            }
            
        }
        
    }

    function mesesOption(anio, mes, etiqueta){

        $.ajax({
            url:'{{url("graficasEstadisticas/meses/")}}',
            method: 'POST',
            data:{
                _token: $('input[name="_token"]').val()
            }
        }).done(function(res){
            
            var arreglo = JSON.parse(res);
            var cadena = "";
            var bandera = true;

            for(var i=0;i<arreglo.length;i++){
                if(arreglo[i][2] == parseFloat(anio)){
                    if(arreglo[i][1] == parseFloat(mes)){
                        cadena = cadena + "<option value=" + arreglo[i][1] + " selected>" + arreglo[i][0] + "</option>";
                        bandera = false;
                    }else{
                        cadena = cadena + "<option value="+ arreglo[i][1] + ">" + arreglo[i][0] + "</option>";
                    }
                }
            }

            if(bandera){
                cadena = "<option disable>Elegir mes...</option>" + cadena;
            }
            
            if(etiqueta == 2){
                document.getElementById("idmesFin").innerHTML = cadena;
            }else{
                document.getElementById("idmesInicio").innerHTML = cadena;
            }
            
        });
    }


</script>

@endsection