@extends('layouts.app')

@section('content')
<section class="fondo">
    <section class="fondo2">
        <nav class="navAdmin">
        <a href="{{url('home/')}}"><img src="{{ asset('imgs/inicio.png')}}">Inicio</a>
            <a  href="{{url('home/comparativas')}}"><img src="{{ asset('imgs/comparar.png')}}">Comparativas</a>
            <a  href="{{url('home/resumenMensual')}}"><img src="{{ asset('imgs/resumen.png')}}">Resumen Mensual</a>
            <a style="background: white; color: #000000;font-weight: 800;" href="{{url('home/analisisDeNegocio')}}"><img src="{{ asset('imgs/analisisNegocio.png')}}">Análisis De Negocio</a>
            <a href="{{url('home/visualizarRegistros')}}"><img src="{{ asset('imgs/vision1.png')}}"> Visualizar Registros</a> 
        </nav>

        <form action="" method="POST">
            @csrf
        </form>

 	 	<section class="espacioAdminEs ">
            <div class="container principalV">
                <div class="row">
                    <div class="col-lg-12 text-left">
                        <div class="row">
                            <!--tarjeta 1-->
                            <div class="col-lg-30  col-md-8 mb-4">
                                <div class="card-section border rounded p-3">
                                    <div class="card-header-s rounded pb-4">
                                        <h5 class="card-header-title text-white pt-3">Análisis</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
                
            <br>
            <div class="row">
                <div>
                    <h5 class="pl-3 pt-2 pr-2">Estadísticos:</h5>
                </div>
                <div>
                    <select class="form-select" style="padding-right: 3em; width: 100%; height: 36px; border-color: rgb(83, 82, 85,0.15); border-radius:5px" onchange="cambioEstadistico(this)">
                        <option value="Promedio">Promedio</option>
                        <option value="Total" >Total</option>
                        <option value="Max">Máximo</option>
                        <option value="Min" >Mínimo</option>
                    </select>
                </div>
                <div class="pt-2 pr-2">
                    <h5 style="padding-left: 1em;">Ver registros desde:</h5>
                </div>
                <div>
                    <input type="date" name="inicio" value="{{$diaMin}}" class="form-control" id="cambioFechaInicio"  aria-describedby="inputGroupPrepend2" >
                </div>
                <div class="pt-2 pr-2 pl-3">
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
                    <canvas id="myChartCheckins"  height="200"></canvas>
                    </div>
                </div>
                <div class="card ml-3">
                    <div class="card-body">
                    <h5 class="card-header-second text-center pt-3">Checkouts</h5> <br>
                    <canvas id="myChartCheckouts"  height="200"></canvas>
                    </div>
                </div>
                
            </div>
            <div class="card-group">
                <div class="card mr-3">
                    <div class="card-body">
                        <h5 class="card-header-second text-center pt-3">Porcentaje Ocupación</h5><br>
                        <canvas id="myChartPorcentajeOcup"  height="200"></canvas>
                    </div>
                </div>
                <div class="card ml-3">
                <div class="card-body">
                    <h5 class="card-header-second text-center pt-3">REVPAR</h5> <br>
                    <canvas id="myChartRevpar"  height="200"></canvas>
                    
                </div>
                </div>

            </div>

            
        </section>
    </section>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
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


    var ctx = document.getElementById('myChartCheckins').getContext('2d');
    var myChartCheckins = new Chart(ctx, {
        type: 'horizontalBar',
        data: {
            labels: dias,
            datasets: [{
                label: '# of Votes',
                data: dataCheckins,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            legend:{
                    position:'bottom',
                    labels:{
                        padding: 20,
                        fontColor:'black'
                    }

                },
            scales: {
                xAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var ctx = document.getElementById('myChartCheckouts').getContext('2d');
    var myChartCheckouts = new Chart(ctx, {
        type: 'horizontalBar',
        data: {
            labels: dias,
            datasets: [{
                label: '# of Votes',
                data: dataCheckouts,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            legend:{
                    position:'bottom',
                    labels:{
                        padding: 20,
                        fontColor:'black'
                    }

                },
            scales: {
                xAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var ctx = document.getElementById('myChartPorcentajeOcup').getContext('2d');
    var myChartPorcentajeOcup = new Chart(ctx, {
        type: 'horizontalBar',
        data: {
            labels: dias,
            datasets: [{
                label: '# of Votes',
                data: dataPorcOcupacion,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            legend:{
                    position:'bottom',
                    labels:{
                        padding: 20,
                        fontColor:'black'
                    }

                },
            scales: {
                xAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    var ctx = document.getElementById('myChartRevpar').getContext('2d');
    var myChartRevpar = new Chart(ctx, {
        type: 'horizontalBar',
        data: {
            labels: dias,
            datasets: [{
                label: '# of Votes',
                data: dataREVPAR,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            legend:{
                    position:'bottom',
                    labels:{
                        padding: 20,
                        fontColor:'black'
                    }

                },
            scales: {
                xAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
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
            
            myChartCheckins.data.datasets[0].data = dataCheckins;
            myChartCheckins.update();
            myChartCheckouts.data.datasets[0].data = dataCheckouts;
            myChartCheckouts.update();
            myChartPorcentajeOcup.data.datasets[0].data = dataPorcOcupacion;
            myChartPorcentajeOcup.update();
            myChartRevpar.data.datasets[0].data = dataREVPAR;
            myChartRevpar.update();

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