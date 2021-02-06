@extends('layouts.app')

@section('content')
<section class="fondo">
    <section class="fondo2">
        <nav class="navAdmin">
            <a  href="{{url('home/comparativas')}}"><img src="{{ asset('imgs/comparar.png')}}">Comparativas</a>
            <a   href="{{url('home/resumenMensual')}}"><img src="{{ asset('imgs/resumen.png')}}">Resumen Mensual</a>
            <a style="background: white; color: #000000;font-weight: 800;" href="{{url('home/analisisDeNegocio')}}"><img src="{{ asset('imgs/analisisNegocio.png')}}">Análisis De Negocio</a>
            <a href="{{url('home/visualizarRegistros')}}"><img src="{{ asset('imgs/vision1.png')}}"> Visualizar Registros</a> 
        </nav>
 	 	<section class="espacioAdminEs ">
            <div class="container principalV">
                <div class="row">
                    <div class="col-lg-12 text-left">
                        <div class="row">
                            <!--tarjeta 1-->
                            <div class="col-lg-30  col-md-8 mb-4">
                                <div class="card-section border rounded p-3">
                                    <div class="card-header-s rounded pb-4">
                                        <h5 class="card-header-title text-white pt-3">FILTROS</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
                
            <div class="form-row " style="margin-right: 4em">
                <div class="col-md-2">
                    <p class="pl-3">Select 1:</p>
                    
                    <div class="col-md-5 " >
                        <select class="form-select" style="width: 400%; height: 39px; border-color: rgb(83, 82, 85,0.25); border-radius:5px" >
                            <option selected>Seleccioname</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    
                </div>

                <div class="col-md-2">
                    <p class="pl-3">Select 2:</p>
                    <div class="col-md-5">
                        <select class="form-select" style="width: 400%; height: 39px; border-color: rgb(83, 82, 85,0.25); border-radius:5px" >
                            <option selected>Seleccioname</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    
                </div>
                <form action="{{url('home/analisisDeNegocio')}}" method="POST" class="visualizarArchivo">
                
                    <div class="form-row ">
                        @csrf
                        <div class="col-md-5">
                            <p>Ver registros desde:</p>
                            <div class="input-group"> 
                            <input type="date" name="inicio" value="23/12/2020"  class="form-control" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
                            </div>
                        </div>
                        <div class="col-md-5 ">
                            <p>Ver registros hasta:</p>
                            <div class="input-group">  
                                <input type="date" name="fin" value="{{ old('fin') }}" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <button type="submit" class="btn btn-warning mt-3">Consultar</button>
                        </div>
                        
                    </div>
                    
                </form>
            </div>

            <div class="card-group pb-4">
                <div class="card mr-3">
                    
                    <div class="card-body ">
                    <h5 class="card-header-second text-center pt-3 ">Card title</h5> <br>
                    <canvas id="myChart1"  height="200"></canvas>
                    </div>
                </div>
                <div class="card ml-3">
                    <div class="card-body">
                    <h5 class="card-header-second text-center pt-3">Card title</h5> <br>
                    <canvas id="myChart2"  height="200"></canvas>
                    </div>
                </div>
                
            </div>
            <div class="card-group">
                <div class="card mr-3">
                    <div class="card-body">
                        <h5 class="card-header-second text-center pt-3">Card title</h5><br>
                        <canvas id="myChart3"  height="200"></canvas>
                    </div>
                </div>
                <div class="card ml-3">
                <div class="card-body">
                    <h5 class="card-header-second text-center pt-3">Card title</h5> <br>
                    <canvas id="myChart4"  height="200"></canvas>
                    
                </div>
                </div>

            </div>

            
        </section>
    </section>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script>
    var ctx = document.getElementById('myChart1').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'horizontalBar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
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
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var ctx = document.getElementById('myChart2').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'horizontalBar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
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
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    var ctx = document.getElementById('myChart3').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'horizontalBar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
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
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    var ctx = document.getElementById('myChart4').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'horizontalBar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
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
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

</script>
    
@endsection