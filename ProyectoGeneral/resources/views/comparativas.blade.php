@extends('layouts.main')

@section('contenido')
  
    <form action="" method="POST">
        @csrf
    </form>
    
    
    
    <div class="lineaIzquierda">
        <div class=" container principalV">
            <div class="row">  
                <div class=" pb-3">
                    <h5 class="pt-3">GRÁFICA POR MES</h5>
                </div> 
            </div>
        </div>
    </div>

   
    <div class="estiloTablasEs">
        <div class="row filtroGraficaEs" >
            <div class="col-sm-4">
                <div class="card cardGrafica" >
                    <div class="card-body">
                        <div>
                            <h5>Inicio:
                                <label>
                                    <select id="idanioInicio" name="anioInicio" class="form-control" onchange="cambioAnioInicio(this)"> 
                                        @foreach($anios as $anio)
                                            @if( $anio->anio ===  $anioInicio )
                                                <option value="{{$anio->anio}}" selected>{{$anio->anio}}</option>
                                            @else
                                                <option value="{{$anio->anio}}">{{$anio->anio}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </label>
                                <label>
                                    <select id="idmesInicio" name="mesInicio" class="form-control" onchange="cambioMesInicio(this)">
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
                                </label>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card  cardGrafica" >
                    <div class="card-body">
                        <h5 class="h5Comparativas">Fin: 
                            <label>
                                <select id="idanioFin" name="anioFin" class="form-control" onchange="cambioAnioFin(this)">
                                    @foreach($anios as $anio)
                                        @if( $anio ===  $anioFin )
                                            <option value="{{$anio->anio}}" selected>{{$anio->anio}}</option>
                                        @else
                                            <option value="{{$anio->anio}}">{{$anio->anio}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </label>
                            <label>
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
                                        <option value="total">Total</option>
                                        <option value="max">Máximo</option>
                                        <option value="min" >Mínimo</option>
                                    </select>
                                </label>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="analisisCiuyCat">
                <h5>
                <label class="labCiuyCat" >Análisis por: <input type="checkbox" name="lineaCategoria" id="categoria" value="categoria" onchange="generarLinea(this)"> Categoría</label>
                <label class="labCiuyCat" ><input type="checkbox" name="lineaCanton" id="canton" value="canton" onchange="generarLinea(this)"> Cantón</label>
                </h5>
            </div>
        </div>
        <hr>
        <div class="row col-13">
            <div class="form-group col-md-2 panelVisualColums" >
                <label ><h5>Parámetros:</h5></label><br>
                <input type="checkbox" name="checkins" id="checkins" value="Checkins" onchange="seleccionarFilasMeses(this)">
                <label for="checkins"> Checkins</label><br>
                <input type="checkbox" name="checkouts" id="checkouts" value="Checkouts" onchange="seleccionarFilasMeses(this)">
                <label for="checkouts"> Checkouts</label><br>
                <input type="checkbox" name="pernoctaciones" id="pernoctaciones" value="Pernoctaciones" onchange="seleccionarFilasMeses(this)">
                <label for="pernoctaciones"> Pernoctaciones</label><br>
                <input type="checkbox" name="nacionales" id="nacionales" value="Nacionales" onchange="seleccionarFilasMeses(this)">
                <label for="nacionales"> Nacionales</label><br>
                <input type="checkbox" name="extranjeros" id="extranjeros" value="Extranjeros" onchange="seleccionarFilasMeses(this)">
                <label for="extranjeros"> Extranjeros</label><br>
                <input type="checkbox" name="habitaciones_ocupadas" id="habitaciones_ocupadas" value="Hab. Ocupadas" onchange="seleccionarFilasMeses(this)">
                <label for="habitaciones_ocupadas"> Hab. Ocupadas</label><br>
                <input type="checkbox" name="habitaciones_disponibles" id="habitaciones_disponibles" value="Hab. Disponibles" onchange="seleccionarFilasMeses(this)">
                <label for="habitaciones_disponibles"> Hab. Disponibles</label><br>
                <input type="checkbox" name="ventas_netas" id="ventas_netas" value="Ventas Netas" onchange="seleccionarFilasMeses(this)">
                <label for="ventas_netas"> Ventas Netas</label><br>
                <hr>
                <input type="checkbox" name="tarifa_promedio" id="tarifa_promedio" value="Tarifa Prom. Hab." onchange="seleccionarFilasMeses(this)">
                <label for="tarifa_promedio"> Tarifa Prom. Hab.</label><br>
                <input type="checkbox" name="TAR_PER" id="TAR_PER" value="Tarifa Prom. Per." onchange="seleccionarFilasMeses(this)">
                <label for="TAR_PER"> Tarifa Prom. Per.</label><br>
                <input type="checkbox" name="porcentaje_ocupacion" id="porcentaje_ocupacion" value="Porcent. Ocupación" onchange="seleccionarFilasMeses(this)" checked>
                <label for="porcentaje_ocupacion"> Porcent.Ocupación</label><br>
                <input type="checkbox" name="revpar" id="revpar" value="Revpar" onchange="seleccionarFilasMeses(this)">
                <label for="revpar"> REVPAR</label><br>
            
            </div> 
            <div class="form-group col-md-10"  >
                <div id="containerchart" ></div>
            </div>
        </div>
    </div>
    <br>
    <div class="lineaIzquierda">
        <div class=" container principalV">
            <div class="row">  
                <div class=" pb-3">
                    <h5 class="text-black pt-3">GRÁFICA POR DÍAS</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="estiloTablasEs">
        <div class="row filtroGraficaDias">
            <div class="pt-1 ml-2 pr-3" >
                <label><h5>Fecha inicio:</h5> </label>
            </div>
            <div class="pr-5">
                <input type="date" name="inicio" class="form-control" id="cambioFechaInicio" value="{{$diaMin}}"> 
            </div>
            <div class="pt-1 pr-3" >
                <label><h5>Fecha final:<h5></label>
            </div>
            <div class="pr-3">
                <input type="date" name="inicio" class="form-control" id="cambioFechaFin" value="{{$diaMax}}">
            </div>
        
        </div>
        <div class="analisisCiuyCatDias">
            <h5>
                <label class="labCiuyCat" >Análisis por: <input type="checkbox" name="lineaCategoria" id="categoriaDias" value="categoria" onchange="generarLineaDias(this)"> Categoría</label>
                <label class="labCiuyCat" ><input type="checkbox" name="lineaCanton" id="cantonDias" value="canton" onchange="generarLineaDias(this)"> Cantón</label>
            </h5>
        </div>
        <hr>
        <div class="row col-13">
            <div class="form-group col-md-2 panelVisualColums" >
                <div class="callout">
                    <label ><h5>Parámetros:</h5></label><br>
                    <input type="checkbox" name="checkins2" id="checkins2" value="Checkins" onchange="seleccionarFilasDias(this)">
                    <label for="checkins2"> Checkins</label><br>
                    <input type="checkbox" name="checkouts2" id="checkouts2" value="Checkouts" onchange="seleccionarFilasDias(this)">
                    <label for="checkouts2"> Checkouts</label><br>
                    <input type="checkbox" name="pernoctaciones2" id="pernoctaciones2" value="Pernoctaciones" onchange="seleccionarFilasDias(this)">
                    <label for="pernoctaciones2"> Pernoctaciones</label><br>
                    <input type="checkbox" name="nacionales2" id="nacionales2" value="Nacionales" onchange="seleccionarFilasDias(this)">
                    <label for="nacionales2"> Nacionales</label><br>
                    <input type="checkbox" name="extranjeros2" id="extranjeros2" value="Extranjeros" onchange="seleccionarFilasDias(this)">
                    <label for="extranjeros2"> Extranjeros</label><br>
                    <input type="checkbox" name="habitaciones_ocupadas2" id="habitaciones_ocupadas2" value="Hab. Ocupadas" onchange="seleccionarFilasDias(this)">
                    <label for="habitaciones_ocupadas2"> Hab. Ocupadas</label><br>
                    <input type="checkbox" name="habitaciones_disponibles2" id="habitaciones_disponibles2" value="Hab. Disponibles" onchange="seleccionarFilasDias(this)">
                    <label for="habitaciones_disponibles2"> Hab. Disponibles</label><br>
                    <input type="checkbox" name="ventas_netas2" id="ventas_netas2" value="Ventas Netas" onchange="seleccionarFilasDias(this)">
                    <label for="ventas_netas2"> Ventas Netas</label><br>
                    <hr>
                    <input type="checkbox" name="tarifa_promedio2" id="tarifa_promedio2" value="Tarifa Prom. Hab." onchange="seleccionarFilasDias(this)">
                    <label for="tarifa_promedio2"> Tarifa Prom. Hab.</label><br>
                    <input type="checkbox" name="TAR_PER2" id="TAR_PER2" value="Tarifa Prom. Per." onchange="seleccionarFilasDias(this)">
                    <label for="TAR_PER2"> Tarifa Prom. Per.</label><br>
                    <input type="checkbox" name="porcentaje_ocupacion2" id="porcentaje_ocupacion2" value="Porcent. Ocupación" onchange="seleccionarFilasDias(this)" checked>
                    <label for="porcentaje_ocupacion2"> Porcent.Ocupación</label><br>
                    <input type="checkbox" name="revpar2" id="revpar2" value="revpar" onchange="seleccionarFilasDias(this)">
                    <label for="revpar2"> REVPAR</label><br>
            
                </div>
            </div>
        
            <div class="form-group col-md-10">
                <div id="containerchart2" ></div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

<script src = "https://code.highcharts.com/highcharts.src.js"> </script>

<!-- Scripts para exportación Graficas Higcharts -->
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<script src="https://code.highcharts.com/stock/modules/export-data.js"></script>
<script>
    
    /* 
        Variables para crear la gráfica mensual
    */

    var mesesGrafica1 = [];
    var fechas = [];

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
    var dataCategoria = [];
    var dataCanton = [];

    var mesInicioGrafica1 = '{{$mesInicio}}';
    var mesFinGrafica1 = '{{$mesFin}}';
    var anioInicioGrafica1 = '{{$anioInicio}}';
    var anioFinGrafica1 = '{{$anioFin}}';
    var estadisticoMeses = 'prom';

    var chartMes = Highcharts.chart('containerchart', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Gráfica Mensual de los indicadores',
            style: {
                color: '#000',
                font: 'bold 16px "Roboto Condensed", Verdana, sans-serif'
            }
        },
        subtitle: {
            text: 'Para hacer una comparación segun su categoría o canton, no elija más de 1 indicador',
            style:{
                font:'9pt "Roboto Condensed", Verdana, sans-serif',
            }
        },
        credits: {
                enabled: false
        },
        yAxis: {
            title: {
                text: 'Escala'
            }
        },
        xAxis: {
            categories: mesesGrafica1
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            itemStyle: {
            font:'9pt "Roboto Condensed", Verdana, sans-serif',
            color: 'black'
            },
            itemHoverStyle:{
                color: 'gray'
            }
        },
        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                
            }
        },
        series: [{
                name: 'Porcent. Ocupación',
                data: dataPorcOcupacion1,
                color: 'rgba(211, 214, 30)'
        }],
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
        }
    });


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

    var fechaInicioGrafica2 = '{{$diaMin}}';
    var fechaFinGrafica2 = '{{$diaMax}}';

    var chartDia = Highcharts.chart('containerchart2', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Gráfica por Días de los indicadores',
            style: {
                color: '#000',
                font: 'bold 16px "Roboto Condensed", Verdana, sans-serif'
            }
        },
        subtitle: {
            text: 'Para hacer una comparación segun su categoría o canton, no elija más de 1 indicador',
            style:{
                font:'9pt "Roboto Condensed", Verdana, sans-serif',
            }
        },
        yAxis: {
            title: {
                text: 'Escala'
            }
        },
        xAxis: {
            categories: diasGrafica2
        },
        credits: {
                enabled: false
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            itemStyle: {
            font: '7pt Trebuchet MS, Verdana, sans-serif',
            color: 'black'
            },
            itemHoverStyle:{
                color: 'gray'
            }
        },
        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                
            }
        },
        series: [{
            name: 'Porcent. Ocupación',
            data: dataPorcOcupacion2
        }],
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

    /* 
        Funciones para interactuar con la gráfica mensual
    */

    function consultaMeses(){
        
        $.ajax({
            url:'{{url("home/comparativas/all")}}',
            method: 'POST',
            data:{
                mesInicio: mesInicioGrafica1,
                mesFin: mesFinGrafica1,
                anioInicio: anioInicioGrafica1,
                anioFin: anioFinGrafica1,
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
                fechas.push(arreglo[i].anio + "-" + arreglo[i].mes);
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
            
            dataCheckins1 = dataCheckins1.map(element => parseFloat(element));
            dataCheckouts1 = dataCheckouts1.map(element => parseFloat(element));
            dataPernoctaciones1 = dataPernoctaciones1.map(element => parseFloat(element));
            dataNacionales1 = dataNacionales1.map(element => parseFloat(element));
            dataExtranjeros1 = dataExtranjeros1.map(element => parseFloat(element));
            dataHabOcupadas1 = dataHabOcupadas1.map(element => parseFloat(element));
            dataHabDisponibles1 = dataHabDisponibles1.map(element => parseFloat(element));
            dataTarPromHab1 = dataTarPromHab1.map(element => parseFloat(element));
            dataTarPromPer1 = dataTarPromPer1.map(element => parseFloat(element));
            dataVentasNetas1 = dataVentasNetas1.map(element => parseFloat(element));
            dataPorcOcupacion1 = dataPorcOcupacion1.map(element => parseFloat(element));
            dataREVPAR1 = dataREVPAR1.map(element => parseFloat(element));

            var datos;

            for(var i=0; i<chartMes.series.length; i++){
                if(chartMes.series[i].name == 'Porcent. Ocupación')
                    chartMes.series[i].update({data: dataPorcOcupacion1});
                else if(chartMes.series[i].name == 'Checkins')
                    chartMes.series[i].update({data: dataCheckins1});
                else if(chartMes.series[i].name == 'Checkouts')
                    chartMes.series[i].update({data: dataCheckouts1});
                else if(chartMes.series[i].name == 'Pernoctaciones')
                    chartMes.series[i].update({data: dataPernoctaciones1});
                else if(chartMes.series[i].name == 'Nacionales')
                    chartMes.series[i].update({data: dataNacionales1});
                else if(chartMes.series[i].name == 'Extranjeros')
                    chartMes.series[i].update({data: dataExtranjeros1});
                else if(chartMes.series[i].name == 'Hab. Ocupadas')
                    chartMes.series[i].update({data: dataHabOcupadas1});
                else if(chartMes.series[i].name == 'Hab. Disponibles')
                    chartMes.series[i].update({data: dataHabDisponibles1});
                else if(chartMes.series[i].name == 'Tarifa Prom. Hab.')
                    chartMes.series[i].update({data: dataTarPromHab1});
                else if(chartMes.series[i].name == 'Tarifa Prom. Per.')
                    chartMes.series[i].update({data: dataTarPromPer1});
                else if(chartMes.series[i].name == 'Ventas Netas')
                    chartMes.series[i].update({data: dataVentasNetas1});
                else if(chartMes.series[i].name  == 'Revpar')
                    chartMes.series[i].update({data: dataREVPAR1});
                else if(chartMes.series[i].name == '{{$categoria}}')
                    consultaGenerarLinea('categoria');
                else if(chartMes.series[i].name  == '{{$canton}}')
                    consultaGenerarLinea('canton');
            }
            
            chartMes.update( {
                xAxis: {
                    categories: mesesGrafica1
                }
            });
            
            
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
        fechas = [];
    }

    function cambioAnioInicio(val){
        
        limpiarArreglosGraficaMes();

        anioInicioGrafica1 = val.value;
        
        consultaMeses();

        mesesOption(anioInicioGrafica1, mesInicioGrafica1, 1);
    }

    function cambioMesInicio(val){

        limpiarArreglosGraficaMes();

        mesInicioGrafica1 = val.value;
        
        consultaMeses();
        
    }
    
    function cambioAnioFin(val){
        
        limpiarArreglosGraficaMes();

        anioFinGrafica1 = val.value;
        
        consultaMeses();
        
        mesesOption(anioFinGrafica1, mesFinGrafica1, 2);
    }

    function cambioMesFin(val){
        
        limpiarArreglosGraficaMes();

        mesFinGrafica1 = val.value;
        
        consultaMeses();
    }

    function cambioEstadisticoMeses(val){
        
        limpiarArreglosGraficaMes();

        if(val.value == 'total'){

            if(document.getElementById("tarifa_promedio").checked || document.getElementById("TAR_PER").checked || document.getElementById("porcentaje_ocupacion").checked || document.getElementById("revpar").checked){
                document.getElementById("categoria").checked = false;
                document.getElementById("canton").checked = false;
                for(var i=0;i<chartMes.series.length;i++){
                    if(chartMes.series[i].name == '{{$categoria}}' || chartMes.series[i].name == '{{$canton}}'){
                        chartMes.series[i].remove(true);
                        i--;
                    }
                }
            }

            document.getElementById("tarifa_promedio").checked = false;
            document.getElementById("TAR_PER").checked = false;
            document.getElementById("porcentaje_ocupacion").checked = false;
            document.getElementById("revpar").checked = false;

            document.getElementById("tarifa_promedio").disabled = true;
            document.getElementById("TAR_PER").disabled = true;
            document.getElementById("porcentaje_ocupacion").disabled = true;
            document.getElementById("revpar").disabled = true;

            for(var i=0;i<chartMes.series.length;i++){
                
                if(chartMes.series[i].name == 'Porcent. Ocupación' || chartMes.series[i].name == 'Tarifa Prom. Per.'|| chartMes.series[i].name == 'Tarifa Prom. Hab.'|| chartMes.series[i].name == 'Revpar'){
                    chartMes.series[i].remove(true);
                    i--;
                }

            }

        }else{
            
            document.getElementById("tarifa_promedio").disabled = false;
            document.getElementById("TAR_PER").disabled = false;
            document.getElementById("porcentaje_ocupacion").disabled = false;
            document.getElementById("revpar").disabled = false;

        }

        estadisticoMeses = val.value;
        
        consultaMeses();
    }

    function seleccionarFilasMeses(val){
        var valor = val.value;
        var datos;
        var bandera;
        var color;
        
        if(valor == 'Checkins'){
            color = 'rgb(204, 118, 51)';
            datos = dataCheckins1;
            bandera = document.getElementById('checkins').checked;
        }else if(valor == 'Checkouts'){
            color = 'rgb(143, 32, 119)';
            datos = dataCheckouts1;
            bandera = document.getElementById('checkouts').checked;
        }else if(valor == 'Pernoctaciones'){
            color = 'rgb(45, 196, 146)';
            datos = dataPernoctaciones1;
            bandera = document.getElementById('pernoctaciones').checked;
        }else if(valor == 'Nacionales'){
            color = 'rgb(28, 89, 147)';
            datos = dataNacionales1;
            bandera = document.getElementById('nacionales').checked;
        }else if(valor == 'Extranjeros'){
            color = 'rgb(105, 191, 19)';
            datos = dataExtranjeros1;
            bandera = document.getElementById('extranjeros').checked;
        }else if(valor == 'Hab. Ocupadas'){
            color = 'rgb(2, 3, 229)';
            datos = dataHabOcupadas1;
            bandera = document.getElementById('habitaciones_ocupadas').checked;
        }else if(valor == 'Hab. Disponibles'){
            color = 'rgb(129, 2, 2)';
            datos = dataHabDisponibles1;
            bandera = document.getElementById('habitaciones_disponibles').checked;
        }else if(valor == 'Tarifa Prom. Hab.'){
            color = 'rgb(186, 52, 209)';
            datos = dataTarPromHab1;
            bandera = document.getElementById('tarifa_promedio').checked;
        }else if(valor == 'Tarifa Prom. Per.'){
            color = 'rgb(207, 45, 102)';
            datos = dataTarPromPer1;
            bandera = document.getElementById('TAR_PER').checked;
        }else if(valor == 'Ventas Netas'){
            color = 'rgb(246, 109, 17)';
            datos = dataVentasNetas1;
            bandera = document.getElementById('ventas_netas').checked;
        }else if(valor == 'Porcent. Ocupación'){
            color = 'rgb(19, 31, 55)';
            datos = dataPorcOcupacion1;
            bandera = document.getElementById('porcentaje_ocupacion').checked;
        }else if(valor == 'Revpar'){
            color = 'rgb(255, 215, 1)';
            datos = dataREVPAR1;
            bandera = document.getElementById('revpar').checked;
        }
        
        if(bandera){
            chartMes.addSeries({
                    name: valor,
                    data: datos,
                    color: color
                    
                    });

        }else{
            
            for(var i=0;i<chartMes.series.length;i++){
                
                if(chartMes.series[i].name == valor){
                    chartMes.series[i].remove(true);
                }
            }
        }
        
        if(chartMes.series.length > 1){
            document.getElementById("categoria").checked = false;
            document.getElementById("canton").checked = false;
            document.getElementById("categoria").disabled = true;
            document.getElementById("canton").disabled = true;

            for(var i=0;i<chartMes.series.length;i++){
                if(chartMes.series[i].name == '{{$categoria}}' || chartMes.series[i].name == '{{$canton}}'){
                    chartMes.series[i].remove(true);
                    i--;
                }
            }
        }else{
            document.getElementById("categoria").disabled = false;
            document.getElementById("canton").disabled = false;
        }
    }

    function mesesOption(anio, mes, etiqueta){

        $.ajax({
            url:'{{url("home/comparativas/meses/")}}',
            method: 'POST',
            data:{
                inicio: fechaInicioGrafica2,
                fin: fechaFinGrafica2,
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

    function generarLinea(val){

        if(val.value == 'categoria'){
            if(document.getElementById("categoria").checked){
                
                consultaGenerarLinea(val.value);

            }else{
                for(var i=0;i<chartMes.series.length;i++){
                    
                    if(chartMes.series[i].name == '{{$categoria}}'){
                        chartMes.series[i].remove(true);
                    }

                }
            }
        }else{
            if(document.getElementById("canton").checked){
                
                consultaGenerarLinea(val.value);
                
            }else{
                for(var i=0;i<chartMes.series.length;i++){
                    
                    if(chartMes.series[i].name == '{{$canton}}'){
                        chartMes.series[i].remove(true);
                    }

                }
            }
        }
    }

    function consultaGenerarLinea(val){
        
        $.ajax({
            url:'{{url("home/comparativas/nuevaLinea")}}',
            method: 'POST',
            data:{
                mesInicio: mesInicioGrafica1,
                mesFin: mesFinGrafica1,
                anioInicio: anioInicioGrafica1,
                anioFin: anioFinGrafica1,
                estadistico: estadisticoMeses,
                parametro: val,
                _token: $('input[name="_token"]').val()
            }
        }).done(function(res){
            var arreglo = JSON.parse(res);
            var bandera = true;
            var datos = [];
            
            for(var i=0;i<arreglo.length;i++){
                
                if(fechas.includes(arreglo[i].anio + "-" + arreglo[i].mes)){
                    if(chartMes.series[0].name == 'Porcent. Ocupación')
                        datos.push(arreglo[i].porcentaje_ocupacion);
                    else if(chartMes.series[0].name == 'Checkins')
                        datos.push(arreglo[i].checkins);
                    else if(chartMes.series[0].name == 'Checkouts')
                        datos.push(arreglo[i].checkouts);
                    else if(chartMes.series[0].name == 'Pernoctaciones')
                        datos.push(arreglo[i].pernoctaciones);
                    else if(chartMes.series[0].name == 'Nacionales')
                        datos.push(arreglo[i].nacionales);
                    else if(chartMes.series[0].name == 'Extranjeros')
                        datos.push(arreglo[i].extranjeros);
                    else if(chartMes.series[0].name == 'Hab. Ocupadas')
                        datos.push(arreglo[i].habitaciones_ocupadas);
                    else if(chartMes.series[0].name == 'Hab. Disponibles')
                        datos.push(arreglo[i].habitaciones_disponibles);
                    else if(chartMes.series[0].name == 'Tarifa Prom. Hab.')
                        datos.push(arreglo[i].tarifa_promedio);
                    else if(chartMes.series[0].name == 'Tarifa Prom. Per.')
                        datos.push(arreglo[i].tar_per);
                    else if(chartMes.series[0].name == 'Ventas Netas')
                        datos.push(arreglo[i].ventas_netas);
                    else if(chartMes.series[0].name  == 'Revpar')
                        datos.push(arreglo[i].revpar);

                }
            }
            
            datos = datos.map(element => parseFloat(element));
            
            for(var i=0;i<chartMes.series.length;i++){
                if( (val == 'categoria' && chartMes.series[i].name == '{{$categoria}}') || (val == 'canton' && chartMes.series[i].name == '{{$canton}}') ){
                    chartMes.series[i].update({data: datos});
                    bandera = false;
                }
            }
            if(bandera){
                if(val == 'categoria'){
                    var color = 'red';
                }else{
                    var color = 'black';
                }
                
                chartMes.addSeries({
                    name: arreglo[0].parametro,
                    data: datos,
                    color: color,
                    lineWidth: 3.5
                    });
            }
            
        });
    }

    /* 
        Funciones para interactuar con la gráfica diaria
    */

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

            var datos;

            for(var i=0;i<chartDia.series.length;i++){
                if(chartDia.series[i].name == 'Porcent. Ocupación')
                    chartDia.series[i].update({data: dataPorcOcupacion2});
                else if(chartDia.series[i].name == 'Checkins')
                    chartDia.series[i].update({data: dataCheckins2});
                else if(chartDia.series[i].name == 'Checkouts')
                    chartDia.series[i].update({data: dataCheckouts2});
                else if(chartDia.series[i].name == 'Pernoctaciones')
                    chartDia.series[i].update({data: dataPernoctaciones2});
                else if(chartDia.series[i].name == 'Nacionales')
                    chartDia.series[i].update({data: dataNacionales2});
                else if(chartDia.series[i].name == 'Extranjeros')
                    chartDia.series[i].update({data: dataExtranjeros2});
                else if(chartDia.series[i].name == 'Hab. Ocupadas')
                    chartDia.series[i].update({data: dataHabOcupadas2});
                else if(chartDia.series[i].name == 'Hab. Disponibles')
                    chartDia.series[i].update({data: dataHabDisponibles2});
                else if(chartDia.series[i].name == 'Tarifa Prom. Hab.')
                    chartDia.series[i].update({data: dataTarPromHab2});
                else if(chartDia.series[i].name == 'Tarifa Prom. Per.')
                    chartDia.series[i].update({data: dataTarPromPer2});
                else if(chartDia.series[i].name == 'Ventas Netas')
                    chartDia.series[i].update({data: dataVentasNetas2});
                else if(chartDia.series[i].name  == 'Revpar')
                    chartDia.series[i].update({data: dataREVPAR2});
                else if(chartDia.series[i].name == '{{$categoria}}')
                    consultaGenerarLineaDias('categoria');
                else if(chartDia.series[i].name  == '{{$canton}}')
                    consultaGenerarLineaDias('canton');
            }

            chartDia.update( {
                xAxis: {
                categories: diasGrafica2
                }
            });
            
        });

    }

    function seleccionarFilasDias(val){
        var valor = val.value;
        var datos;
        var bandera;
        var color;
        
        if(valor == 'Checkins'){
            color = 'rgb(204, 118, 51)';
            datos = dataCheckins2;
            bandera = document.getElementById('checkins2').checked;
        }else if(valor == 'Checkouts'){
            color = 'rgb(143, 32, 119)';
            datos = dataCheckouts2;
            bandera = document.getElementById('checkouts2').checked;
        }else if(valor == 'Pernoctaciones'){
            color = 'rgb(45, 196, 146)';
            datos = dataPernoctaciones2;
            bandera = document.getElementById('pernoctaciones2').checked;
        }else if(valor == 'Nacionales'){
            color = 'rgb(28, 89, 147)';
            datos = dataNacionales2;
            bandera = document.getElementById('nacionales2').checked;
        }else if(valor == 'Extranjeros'){
            color = 'rgb(105, 191, 19)';
            datos = dataExtranjeros2;
            bandera = document.getElementById('extranjeros2').checked;
        }else if(valor == 'Hab. Ocupadas'){
            color = 'rgb(2, 3, 229)';
            datos = dataHabOcupadas2;
            bandera = document.getElementById('habitaciones_ocupadas2').checked;
        }else if(valor == 'Hab. Disponibles'){
            color = 'rgb(129, 2, 2)';
            datos = dataHabDisponibles2;
            bandera = document.getElementById('habitaciones_disponibles2').checked;
        }else if(valor == 'Tarifa Prom. Hab.'){
            color = 'rgb(186, 52, 209)';
            datos = dataTarPromHab2;
            bandera = document.getElementById('tarifa_promedio2').checked;
        }else if(valor == 'Tarifa Prom. Per.'){
            color = 'rgb(207, 45, 102)';
            datos = dataTarPromPer2;
            bandera = document.getElementById('TAR_PER2').checked;
        }else if(valor == 'Ventas Netas'){
            color = 'rgb(246, 109, 17)';
            datos = dataVentasNetas2;
            bandera = document.getElementById('ventas_netas2').checked;
        }else if(valor == 'Porcent. Ocupación'){
            color = 'rgb(19, 31, 55)';
            datos = dataPorcOcupacion2;
            bandera = document.getElementById('porcentaje_ocupacion2').checked;
        }else if(valor == 'Revpar'){
            color = 'rgb(255, 215, 1)';
            datos = dataREVPAR2;
            bandera = document.getElementById('revpar2').checked;
        }
        
        if(bandera){
            chartDia.addSeries({
                    name: valor,
                    data: datos,
                    color: color
                    });

        }else{
            
            for(var i=0;i<chartDia.series.length;i++){
                
                if(chartDia.series[i].name == valor){
                    chartDia.series[i].remove(true);
                }

            }
            
        }

        if(chartDia.series.length > 1){
            document.getElementById("categoriaDias").checked = false;
            document.getElementById("cantonDias").checked = false;
            document.getElementById("categoriaDias").disabled = true;
            document.getElementById("cantonDias").disabled = true;

            for(var i=0;i<chartDia.series.length;i++){
                if(chartDia.series[i].name == '{{$categoria}}' || chartDia.series[i].name == 'canton'){
                    chartDia.series[i].remove(true);
                    i--;
                }
            }
        }else{
            document.getElementById("categoriaDias").disabled = false;
            document.getElementById("cantonDias").disabled = false;
        }
        
    }

    function generarLineaDias(val){
        if(val.value == 'categoria'){
            if(document.getElementById("categoriaDias").checked){
            
                consultaGenerarLineaDias(val.value);

            }else{
                for(var i=0;i<chartDia.series.length;i++){
                    
                    if(chartDia.series[i].name == '{{$categoria}}'){
                        chartDia.series[i].remove(true);
                    }

                }
            }
        }else{
            if(document.getElementById("cantonDias").checked){

                consultaGenerarLineaDias(val.value);
                
            }else{
                for(var i=0;i<chartDia.series.length;i++){
                    
                    if(chartDia.series[i].name == '{{$canton}}'){
                        chartDia.series[i].remove(true);
                    }

                }
            }
        }
    }

    function consultaGenerarLineaDias(val){
        
        $.ajax({
            url:'{{url("home/comparativas/nuevaLineaDias")}}',
            method: 'POST',
            data:{
                inicio: fechaInicioGrafica2,
                fin: fechaFinGrafica2,
                parametro: val,
                _token: $('input[name="_token"]').val()
            }
        }).done(function(res){
            var arreglo = JSON.parse(res);
            var bandera = true;
            var datos = [];

            for(var i=0;i<arreglo.length;i++){
                
                if(diasGrafica2.includes(arreglo[i].fecha)){
                    if(chartDia.series[0].name == 'Porcent. Ocupación')
                        datos.push(arreglo[i].porcentaje_ocupacion);
                    else if(chartDia.series[0].name == 'Checkins')
                        datos.push(arreglo[i].checkins);
                    else if(chartDia.series[0].name == 'Checkouts')
                        datos.push(arreglo[i].checkouts);
                    else if(chartDia.series[0].name == 'Pernoctaciones')
                        datos.push(arreglo[i].pernoctaciones);
                    else if(chartDia.series[0].name == 'Nacionales')
                        datos.push(arreglo[i].nacionales);
                    else if(chartDia.series[0].name == 'Extranjeros')
                        datos.push(arreglo[i].extranjeros);
                    else if(chartDia.series[0].name == 'Hab. Ocupadas')
                        datos.push(arreglo[i].habitaciones_ocupadas);
                    else if(chartDia.series[0].name == 'Hab. Disponibles')
                        datos.push(arreglo[i].habitaciones_disponibles);
                    else if(chartDia.series[0].name == 'Tarifa Prom. Hab.')
                        datos.push(arreglo[i].tarifa_promedio);
                    else if(chartDia.series[0].name == 'Tarifa Prom. Per.')
                        datos.push(arreglo[i].tar_per);
                    else if(chartDia.series[0].name == 'Ventas Netas')
                        datos.push(arreglo[i].ventas_netas);
                    else if(chartDia.series[0].name  == 'Revpar')
                        datos.push(arreglo[i].revpar);

                }
            }
            
            datos = datos.map(element => parseFloat(element));

            for(var i=0;i<chartDia.series.length;i++){
                if( (val == 'categoria' && chartDia.series[i].name == '{{$categoria}}') || (val == 'canton' && chartDia.series[i].name == '{{$canton}}') ){
                    chartDia.series[i].update({data: datos});
                    bandera = false;
                }
            }
            if(bandera){
                if(val == 'categoria'){
                    var color = 'red';
                }else{
                    var color = 'black';
                }
                
                chartDia.addSeries({
                    name: arreglo[0].parametro,
                    data: datos,
                    color: color,
                    lineWidth: 3.5
                    });
            }
            
        });
    }
    
</script>
@endsection
