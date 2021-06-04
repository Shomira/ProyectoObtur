@extends('layouts.main')

@section('contenido')
  
    <form action="" method="POST">
        @csrf
    </form>

    
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
    <section class="contenedorEs">
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
                <h5>Añadir linea por:</h5>
                <label class="containerRb" ><input type="checkbox" name="lineaCategoria" id="categoria" value="categoria" onchange="seleccionadoCategoria(this)"> Categoria</label><br>
                <label class="containerRb" ><input type="checkbox" name="lineaCiudad" id="ciudad" value="ciudad" onchange="seleccionadoCiudad(this)"> Ciudad</label><br>
            <div>

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
                <label for="porcentaje_ocupacion"> Porcent. Ocupación</label><br>
                <input type="checkbox" name="revpar" id="revpar" value="Revpar" onchange="seleccionarFilasMeses(this)">
                <label for="revpar"> REVPAR</label><br>
            
            </div> 
            <div class="form-group col-md-10"  >
                <div id="containerchart" style="height: 500px; min-width: 800px"></div>
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
                    <label for="porcentaje_ocupacion2"> Porcent. Ocupación</label><br>
                    <input type="checkbox" name="revpar2" id="revpar2" value="revpar" onchange="seleccionarFilasDias(this)">
                    <label for="revpar2"> REVPAR</label><br>
            
                </div>
            </div>
        
            <div class="form-group col-md-10">
                <div id="containerchart2" style="height: 500px; min-width: 800px"></div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

<script src = "https://code.highcharts.com/highcharts.src.js"> </script>


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
    
    var parametroMeses = {
                name: 'Porcent. Ocupación',
                data: dataPorcOcupacion1
            };

    
    var arrParametrosMeses = [parametroMeses]; 

    var mesInicioGrafica1 = '{{$mesInicio}}';
    var mesFinGrafica1 = '{{$mesFin}}';
    var anioInicioGrafica1 = '{{$anioInicio}}';
    var anioFinGrafica1 = '{{$anioFin}}';
    var nomColumnaGrafica1 = '{{$columna}}';
    var estadisticoMeses = 'prom';

    var chartMes = Highcharts.chart('containerchart', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Gráfica Mensual de los indicadores',
            style: {
                color: '#000',
                font: '16px "Trebuchet MS", Verdana, sans-serif'
            }
        },
        subtitle: {
            text: 'Para hacer una comparación segun su categoría o ciudad, no elija más de 1 indicador'
        },
        yAxis: {
            title: {
                text: 'Number of Employees'
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
            font: '9pt Trebuchet MS, Verdana, sans-serif',
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
        series: arrParametrosMeses,
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
    var nomColumnaGrafica2 = '{{$columna}}';

    var parametroDias = {
                name: 'Porcent. Ocupación',
                data: dataPorcOcupacion2
            };

    
    var arrParametrosDias = [parametroDias]; 


    var chartDia = Highcharts.chart('containerchart2', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Gráfica por Días de los indicadores',
            style: {
                color: '#000',
                font: '16px "Trebuchet MS", Verdana, sans-serif'
            }
        },
        subtitle: {
            text: 'Para hacer una comparación segun su categoría o ciudad, no elija más de 1 indicador'
        },
        yAxis: {
            title: {
                text: 'Number of Employees'
            }
        },
        xAxis: {
            categories: diasGrafica2
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
        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                
            }
        },
        series: arrParametrosDias,
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
                    datos = dataPorcOcupacion1;
                else if(chartMes.series[i].name == 'Checkins')
                    datos = dataCheckins1;
                else if(chartMes.series[i].name == 'Checkouts')
                    datos = dataCheckouts1;
                else if(chartMes.series[i].name == 'Pernoctaciones')
                    datos = dataPernoctaciones1;
                else if(chartMes.series[i].name == 'Nacionales')
                    datos = dataNacionales1;
                else if(chartMes.series[i].name == 'Extranjeros')
                    datos = dataExtranjeros1;
                else if(chartMes.series[i].name == 'Hab. Ocupadas')
                    datos = dataHabOcupadas1;
                else if(chartMes.series[i].name == 'Hab. Disponibles')
                    datos = dataHabDisponibles1;
                else if(chartMes.series[i].name == 'Tarifa Prom. Hab.')
                    datos = dataTarPromHab1;
                else if(chartMes.series[i].name == 'Tarifa Prom. Per.')
                    datos = dataTarPromPer1;
                else if(chartMes.series[i].name == 'Ventas Netas')
                    datos = dataVentasNetas1;
                else if(chartMes.series[i].name  == 'Revpar')
                    datos = dataREVPAR1;

                arrParametrosMeses[i] = {
                                    name: chartMes.series[i].name,
                                    data: datos
                                    };
                
            }
            
            chartMes.update( {
                series: arrParametrosMeses,
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
            color = 'rgba(0, 0, 0)';
            datos = dataCheckins1;
            bandera = document.getElementById('checkins').checked;
        }else if(valor == 'Checkouts'){
            color = 'rgba(255, 0, 0)';
            datos = dataCheckouts1;
            bandera = document.getElementById('checkouts').checked;
        }else if(valor == 'Pernoctaciones'){
            color = 'rgba(110, 54, 54)';
            datos = dataPernoctaciones1;
            bandera = document.getElementById('pernoctaciones').checked;
        }else if(valor == 'Nacionales'){
            color = 'rgba(131, 119, 119)';
            datos = dataNacionales1;
            bandera = document.getElementById('nacionales').checked;
        }else if(valor == 'Extranjeros'){
            color = 'rgba(223, 172, 32)';
            datos = dataExtranjeros1;
            bandera = document.getElementById('extranjeros').checked;
        }else if(valor == 'Hab. Ocupadas'){
            color = 'rgba(109, 209, 84)';
            datos = dataHabOcupadas1;
            bandera = document.getElementById('habitaciones_ocupadas').checked;
        }else if(valor == 'Hab. Disponibles'){
            color = 'rgba(39, 215, 228)';
            datos = dataHabDisponibles1;
            bandera = document.getElementById('habitaciones_disponibles').checked;
        }else if(valor == 'Tarifa Prom. Hab.'){
            color = 'rgba(41, 77, 175)';
            datos = dataTarPromHab1;
            bandera = document.getElementById('tarifa_promedio').checked;
        }else if(valor == 'Tarifa Prom. Per.'){
            color = 'rgba(99, 41, 175)';
            datos = dataTarPromPer1;
            bandera = document.getElementById('TAR_PER').checked;
        }else if(valor == 'Ventas Netas'){
            color = 'rgba(216, 44, 193)';
            datos = dataVentasNetas1;
            bandera = document.getElementById('ventas_netas').checked;
        }else if(valor == 'Porcent. Ocupación'){
            color = 'rgba(211, 214, 30)';
            datos = dataPorcOcupacion1;
            bandera = document.getElementById('porcentaje_ocupacion').checked;
        }else if(valor == 'Revpar'){
            color = 'rgba(19, 190, 153)';
            datos = dataREVPAR1;
            bandera = document.getElementById('revpar').checked;
        }
        
        if(bandera){

            chartMes.addSeries({
                    name: valor,
                    data: datos
                    });

        }else{
            
            for(var i=0;i<chartMes.series.length;i++){
                
                if(chartMes.series[i].name == valor){
                    chartMes.series[i].remove(true);
                }

            }
            
        }
        
    }

    /* 
        Funciones para interactuar con la gráfica mensual
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
                    datos = dataPorcOcupacion2;
                else if(chartDia.series[i].name == 'Checkins')
                    datos = dataCheckins2;
                else if(chartDia.series[i].name == 'Checkouts')
                    datos = dataCheckouts2;
                else if(chartDia.series[i].name == 'Pernoctaciones')
                    datos = dataPernoctaciones2;
                else if(chartDia.series[i].name == 'Nacionales')
                    datos = dataNacionales2;
                else if(chartDia.series[i].name == 'Extranjeros')
                    datos = dataExtranjeros2;
                else if(chartDia.series[i].name == 'Hab. Ocupadas')
                    datos = dataHabOcupadas2;
                else if(chartDia.series[i].name == 'Hab. Disponibles')
                    datos = dataHabDisponibles2;
                else if(chartDia.series[i].name == 'Tarifa Prom. Hab.')
                    datos = dataTarPromHab2;
                else if(chartDia.series[i].name == 'Tarifa Prom. Per.')
                    datos = dataTarPromPer2;
                else if(chartDia.series[i].name == 'Ventas Netas')
                    datos = dataVentasNetas2;
                else if(chartDia.series[i].name  == 'Revpar')
                    datos = dataREVPAR2;

                arrParametrosDias[i] = {
                                name: chartDia.series[i].name,
                                data: datos
                                };
                
            }
            console.log(arreglo);
            chartDia.update( {
                series: arrParametrosDias,
                xAxis: {
                categories: diasGrafica2
                }
            });
            
            
            
        });

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


    function seleccionarFilasDias(val){
        var valor = val.value;
        var datos;
        var bandera;
        var color;
        
        if(valor == 'Checkins'){
            color = 'rgba(0, 0, 0)';
            datos = dataCheckins2;
            bandera = document.getElementById('checkins2').checked;
        }else if(valor == 'Checkouts'){
            color = 'rgba(255, 0, 0)';
            datos = dataCheckouts2;
            bandera = document.getElementById('checkouts2').checked;
        }else if(valor == 'Pernoctaciones'){
            color = 'rgba(110, 54, 54)';
            datos = dataPernoctaciones2;
            bandera = document.getElementById('pernoctaciones2').checked;
        }else if(valor == 'Nacionales'){
            color = 'rgba(131, 119, 119)';
            datos = dataNacionales2;
            bandera = document.getElementById('nacionales2').checked;
        }else if(valor == 'Extranjeros'){
            color = 'rgba(223, 172, 32)';
            datos = dataExtranjeros2;
            bandera = document.getElementById('extranjeros2').checked;
        }else if(valor == 'Hab. Ocupadas'){
            color = 'rgba(109, 209, 84)';
            datos = dataHabOcupadas2;
            bandera = document.getElementById('habitaciones_ocupadas2').checked;
        }else if(valor == 'Hab. Disponibles'){
            color = 'rgba(39, 215, 228)';
            datos = dataHabDisponibles2;
            bandera = document.getElementById('habitaciones_disponibles2').checked;
        }else if(valor == 'Tarifa Prom. Hab.'){
            color = 'rgba(41, 77, 175)';
            datos = dataTarPromHab2;
            bandera = document.getElementById('tarifa_promedio2').checked;
        }else if(valor == 'Tarifa Prom. Per.'){
            color = 'rgba(99, 41, 175)';
            datos = dataTarPromPer2;
            bandera = document.getElementById('TAR_PER2').checked;
        }else if(valor == 'Ventas Netas'){
            color = 'rgba(216, 44, 193)';
            datos = dataVentasNetas2;
            bandera = document.getElementById('ventas_netas2').checked;
        }else if(valor == 'Porcent. Ocupación'){
            color = 'rgba(211, 214, 30)';
            datos = dataPorcOcupacion2;
            bandera = document.getElementById('porcentaje_ocupacion2').checked;
        }else if(valor == 'Revpar'){
            color = 'rgba(19, 190, 153)';
            datos = dataREVPAR2;
            bandera = document.getElementById('revpar2').checked;
        }
        
        if(bandera){

            chartDia.addSeries({
                    name: valor,
                    data: datos
                    });

        }else{
            
            for(var i=0;i<chartDia.series.length;i++){
                
                if(chartDia.series[i].name == valor){
                    chartDia.series[i].remove(true);
                }

            }
            
        }
        
    }

    function seleccionadoCategoria(val){
            
        if(document.getElementById("mes").checked){

            $("#variables").append("<input id='diasDelMes' type='button' class='btn btn-default' value='Num(Días)' onclick='escribir(this)'>");

            document.getElementById("anio").disabled = true;
        }else{

            $("#diasDelMes").remove();
            document.getElementById("anio").disabled = false;
            cadena = "";
            document.getElementById("formula").value=cadena;
        }
        
    }
    

</script>
@endsection
