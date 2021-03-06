 @extends('layouts.main')

@section('contenido')

    <form action="" method="POST">
        @csrf
    </form>

    <div class="lineaIzquierda">
        <div class=" container principalV">
            <div class="row">  
                <div class=" pb-3">
                    <h5 class="text-black pt-3">ANÁLISIS DE NEGOCIO</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row tituloFiltrosGraficasEs" >
        <div>
            <h5 class="pl-3 pt-2 pr-2">Estadísticos:</h5>
        </div>
        <div>
            <select class="form-select filtroAnalisisN" onchange="cambioEstadistico(this)">
                <option value="Promedio">Promedio</option>
                <option value="Total" >Total</option>
                <option value="Max">Máximo</option>
                <option value="Min" >Mínimo</option>
            </select>
        </div>
        <div class="pt-2 pl-4">
            <h5 >Ver registros desde:</h5>
        </div>
        <div>
            <input type="date" name="inicio" value="{{$diaMin}}" class="form-control" id="cambioFechaInicio"  aria-describedby="inputGroupPrepend2" >
        </div>
        <div class="pt-2 pr-2 pl-4">
            <h5>Ver registros hasta:</h5>
        </div>  
        <div>
            <input type="date" name="fin" value="{{$diaMax}}" class="form-control" id="cambioFechaFin" aria-describedby="inputGroupPrepend2" >
        </div>
        <div class="col-sm-3">
            <div class="card-body cardBodyResumenM">
                <input type="checkbox" class="from-control" id="desviacion" onclick="desviacion(this)">Desviación estandar
            </div>
        </div>
    </div>
    <hr>
    
    <br>
    <div class="card-group pb-4">
        <div class="card mr-3 cardAnalisisNegocio">
            <div class="card-body ">
                <h5 class="card-header-second text-center pt-2 ">Checkins</h5> <br>
                <div id="containerCheckins"></div>
            </div>
        </div>
        <div class="card ml-3 cardAnalisisNegocio">
            <div class="card-body">
                <h5 class="card-header-second text-center pt-2">Checkouts</h5> <br>
                <div id="containerCheckouts"></div>
            </div>
        </div>
    </div>
    <div class="card-group b-5">
        <div class="card mr-3  cardAnalisisNegocio" >
            <div class="card-body">
                <h5 class="card-header-second text-center pt-2">Porcentaje Ocupación</h5><br>
                <div id="containerPorcentajeOcup"></div>
            </div>
        </div>
        <div class="card ml-2 cardAnalisisNegocio">
            <div class="card-body">
                <h5 class="card-header-second text-center pt-2">REVPAR</h5> <br>
                <div id="containerRevpar"  ></div>
            </div>
        </div>
    </div>
        
    
@endsection

@section('scripts')
<!-- Scripts Graficas Higcharts -->
<script src = "https://code.highcharts.com/highcharts.src.js"> </script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>

<script>

    var fechaInicio = '{{$diaMin}}';
    var fechaFin = '{{$diaMax}}';

    var dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
    var dataCheckins = [];
    var dataCheckouts = [];
    var dataVentasNetas = [];
    var dataPorcOcupacion = [];
    var dataREVPAR = [];
    var estadistico = 'Promedio';

    var desvCheckins = [];
    var desvCheckouts = [];
    var desvVentasNetas = [];
    var desvPorcOcupacion = [];
    var desvREVPAR = [];

    /*Tema general de las graficas */
    Highcharts.theme = {
        colors:[ 'rgb(242,170,59)', '#eccd6a',
                'rgb(182,50,52)' ,'rgb(182,50,52,0.8)','rgb(158,115,75)',
                'rgba(20,21,24,0.8)','#c2c2c2'],
        chart: {
            backgroundColor: null,
            type: 'bar'   
        },

        xAxis: {
            categories: dias
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
            itemStyle: {
                font: '9pt "Roboto Condensed", Verdana, sans-serif',
                color: 'black'
            },
            itemHoverStyle:{
                color: 'green'
            }
        }
    };
    // Apply the theme
    Highcharts.setOptions(Highcharts.theme);

    /*Fin Tema */

    var chartCheckins = Highcharts.chart('containerCheckins', {
        title: {
            text: ' '
        },
        series: [{
            name: 'Checkins',
            data: dataCheckins,
            colorByPoint: true
        }]
    });

    var chartCheckouts = Highcharts.chart('containerCheckouts', {
        title: {
            text: ' '
        },
        series: [{
            name: 'Checkouts',
            data: dataCheckouts,
            colorByPoint: true
        }]
    });

    var chartPorcentOcupacion = Highcharts.chart('containerPorcentajeOcup', {
        title: {
            text: null
        },
        series: [{
            name: 'Porcentaje Ocupación',
            data: dataPorcOcupacion,
            colorByPoint: true
        }]
    });

    var chartRevpar = Highcharts.chart('containerRevpar', {
        title: {
            text: null
        },
        series: [{
            name: 'Revpar',
            data: dataREVPAR,
            colorByPoint: true,
           
        }]
    });

    $(document).ready(function(){

        $('#cambioFechaInicio').focusout(function() {
            
            dataCheckins = [];
            dataCheckouts = [];
            dataVentasNetas = [];
            dataPorcOcupacion = [];
            dataREVPAR = [];

            fechaInicio = $(this).val();
           
            consulta();
            desviacion();

        });

        $('#cambioFechaFin').focusout(function() {
            
            dataCheckins = [];
            dataCheckouts = [];
            dataVentasNetas = [];
            dataPorcOcupacion = [];
            dataREVPAR = [];

            fechaFin = $(this).val();
        
            consulta();
            desviacion();
        });
        
        consulta();

    });

    function consulta(){
        $.ajax({
            url:'{{url("home/analisisDeNegocio")}}',
            method: 'POST',
            data:{
                inicio: fechaInicio,
                fin: fechaFin,
                estadistico: estadistico,
                _token: $('input[name="_token"]').val()
            }
        }).done(function(res){
            
            var arreglo = JSON.parse(res);
            
            for(var i=0;i<arreglo.length;i++){

                dataCheckins.push(arreglo[i].checkins);
                dataCheckouts.push(arreglo[i].checkouts);
                dataVentasNetas.push(arreglo[i].ventas_netas);
                dataPorcOcupacion.push(arreglo[i].porcentaje_ocupacion);
                dataREVPAR.push(arreglo[i].revpar);

            }

            dataCheckins = dataCheckins.map(element => parseFloat(element));
            dataCheckouts = dataCheckouts.map(element => parseFloat(element));
            dataVentasNetas = dataVentasNetas.map(element => parseFloat(element));
            dataPorcOcupacion = dataPorcOcupacion.map(element => parseFloat(element));
            dataREVPAR = dataREVPAR.map(element => parseFloat(element));

            chartCheckins.update( {
                series: [{
                    data: dataCheckins
                }]
            });

            chartCheckouts.update( {
                series: [{
                    data: dataCheckouts
                }]
            });

            chartPorcentOcupacion.update( {
                series: [{
                    data: dataPorcOcupacion
                }]
            });

            chartRevpar.update( {
                series: [{
                    data: dataREVPAR
                }]
            });

        });
    }

    function cambioEstadistico(val){

        dataCheckins = [];
        dataCheckouts = [];
        dataVentasNetas = [];
        dataPorcOcupacion = [];
        dataREVPAR = [];

        estadistico = val.value;

        consulta();
        desviacion();
    }

    function desviacion(){
        if(document.getElementById("desviacion").checked && estadistico == 'Promedio'){
            desvCheckins = [];
            desvCheckouts = [];
            desvPorcOcupacion = [];
            desvREVPAR = [];
            $.ajax({
                url:'{{url("home/analisisDeNegocio/desviacion")}}',
                method: 'POST',
                data:{
                    inicio: fechaInicio,
                    fin: fechaFin,
                    _token: $('input[name="_token"]').val()
                }
            }).done(function(res){

                var arreglo = JSON.parse(res);

                for(var i=0;i<arreglo.length;i++){

                    desvCheckins.push(arreglo[i].checkins);
                    desvCheckouts.push(arreglo[i].checkouts);
                    desvVentasNetas.push(arreglo[i].ventas_netas);
                    desvPorcOcupacion.push(arreglo[i].porcentaje_ocupacion);
                    desvREVPAR.push(arreglo[i].revpar);

                }

                desvCheckins = desvCheckins.map(element => parseFloat(element));
                desvCheckouts = desvCheckouts.map(element => parseFloat(element));
                desvVentasNetas = desvVentasNetas.map(element => parseFloat(element));
                desvPorcOcupacion = desvPorcOcupacion.map(element => parseFloat(element));
                desvREVPAR = desvREVPAR.map(element => parseFloat(element));
                
                for(var i=0;i<arreglo.length;i++){

                    desvCheckins[i] = [dataCheckins[i]-desvCheckins[i], dataCheckins[i]+desvCheckins[i]];
                    desvCheckouts[i] = [dataCheckouts[i]-desvCheckouts[i], dataCheckouts[i]+desvCheckouts[i]];
                    desvVentasNetas[i] = [dataVentasNetas[i]-desvVentasNetas[i], dataVentasNetas[i]+desvVentasNetas[i]];
                    desvPorcOcupacion[i] = [dataPorcOcupacion[i]-desvPorcOcupacion[i], dataPorcOcupacion[i]+desvPorcOcupacion[i]];
                    desvREVPAR[i] = [dataREVPAR[i]-desvREVPAR[i], dataREVPAR[i]+desvREVPAR[i]];

                }
                
                if(chartCheckins.series.length > 1){
                    chartCheckins.series[1].update({data: desvCheckins});
                    chartCheckouts.series[1].update({data: desvCheckouts});
                    chartPorcentOcupacion.series[1].update({data: desvPorcOcupacion});
                    chartRevpar.series[1].update({data: desvREVPAR});

                }else{
                    chartCheckins.addSeries({
                        name: 'Checkins error',
                        type: 'errorbar',
                        data: desvCheckins,
                        tooltip: {
                            pointFormat: '(error range: {point.low}-{point.high} mm)<br/>'
                        }
                    });
                    chartCheckouts.addSeries({
                        name: 'Checkouts error',
                        type: 'errorbar',
                        data: desvCheckouts,
                        tooltip: {
                            pointFormat: '(error range: {point.low}-{point.high} mm)<br/>'
                        }
                    });
                    chartPorcentOcupacion.addSeries({
                        name: 'Porcent Ocupacion error',
                        type: 'errorbar',
                        data: desvPorcOcupacion,
                        tooltip: {
                            pointFormat: '(error range: {point.low}-{point.high} mm)<br/>'
                        }
                    });
                    chartRevpar.addSeries({
                        name: 'Revpar error',
                        type: 'errorbar',
                        data: desvREVPAR,
                        tooltip: {
                            pointFormat: '(error range: {point.low}-{point.high} mm)<br/>'
                        }
                    });

                }
                

            });
            
        }else{
            if(chartCheckouts.series.length > 1){
                chartCheckins.series[1].remove(true);
                chartCheckouts.series[1].remove(true);
                chartPorcentOcupacion.series[1].remove(true);
                chartRevpar.series[1].remove(true);
            }
            if(estadistico != 'Promedio'){
                document.getElementById("desviacion").checked = false;
                document.getElementById("desviacion").disabled = true;
            }
        }
        
    }

</script>
    
@endsection