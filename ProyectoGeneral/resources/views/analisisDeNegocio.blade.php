 @extends('layouts.main')

@section('contenido')

    <form action="" method="POST">
        @csrf
    </form>

    <section class="contenedorEs">
        <div class="container principalV">
            <div class="row">
                <div class="col-lg-12 text-left">
                    <div class="row">
                        <!--tarjeta 1-->
                        <div class="col-lg-30  col-md-8 mb-4">
                            <div class="card-section border rounded p-3">
                                <div class="card-header-s rounded pb-4">
                                    <h5 class="card-header-title text-white pt-3">ANÁLISIS DE NEGOCIO</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
            
        <br>
        <div  class="row tituloFiltrosGraficasEs" >
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
        </div>
        <hr>
        
        <br>
        <div class="card-group pb-4">
            <div class="card mr-3">
                <div class="card-body ">
                    <h5 class="card-header-second text-center pt-3 ">Checkins</h5> <br>
                    <div id="containerCheckins" style="height: 400px; width: 550px"></div>
                </div>
            </div>
            <div class="card ml-3">
                <div class="card-body">
                    <h5 class="card-header-second text-center pt-3">Checkouts</h5> <br>
                    <div id="containerCheckouts" style="height: 400px; width: 550px"></div>
                </div>
            </div>
        </div>
        <div class="card-group">
            <div class="card mr-3">
                <div class="card-body">
                    <h5 class="card-header-second text-center pt-3">Porcentaje Ocupación</h5><br>
                    <div id="containerPorcentajeOcup" style="height: 400px; width: 550px"></div>
                </div>
            </div>
            <div class="card ml-3">
                <div class="card-body">
                    <h5 class="card-header-second text-center pt-3">REVPAR</h5> <br>
                    <div id="containerRevpar" style="height: 400px; width: 550px"></div>
                </div>
            </div>
        </div>
        
    </section>
    
@endsection

@section('scripts')
<script src = "https://code.highcharts.com/highcharts.src.js"> </script>

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

    var chartCheckins = Highcharts.chart('containerCheckins', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Checkins'
        },
        xAxis: {
            categories: dias
        },
        yAxis: {
            title: {
                text: 'Fruit eaten'
            }
        },
        series: [{
            name: 'Checkins',
            data: dataCheckins
        }]
    });

    var chartCheckouts = Highcharts.chart('containerCheckouts', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Checkouts'
        },
        xAxis: {
            categories: dias
        },
        yAxis: {
            title: {
                text: 'Fruit eaten'
            }
        },
        series: [{
            name: 'Checkouts',
            data: dataCheckouts
        }]
    });

    var chartPorcentOcupacion = Highcharts.chart('containerPorcentajeOcup', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Porcentaje Ocupación'
        },
        xAxis: {
            categories: dias
        },
        yAxis: {
            title: {
                text: 'Fruit eaten'
            }
        },
        series: [{
            name: 'Porcentaje Ocupación',
            data: dataPorcOcupacion
        }]
    });

    var chartRevpar = Highcharts.chart('containerRevpar', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Revpar'
        },
        xAxis: {
            categories: dias
        },
        yAxis: {
            title: {
                text: 'Fruit eaten'
            }
        },
        series: [{
            name: 'Revpar',
            data: dataREVPAR
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

        });

        $('#cambioFechaFin').focusout(function() {
            
            dataCheckins = [];
            dataCheckouts = [];
            dataVentasNetas = [];
            dataPorcOcupacion = [];
            dataREVPAR = [];

            fechaFin = $(this).val();
        
            consulta();
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
    }

</script>
    
@endsection