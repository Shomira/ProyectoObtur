@extends('layouts.app')

@section('content')
    
    <h2 class="tituloDatos" style="margin:0.1em;">INDICADORES DE ALOJAMIENTO EN LOJA <br><p></p> {{$nombreMes}}</h2>
    <section class="menu" style="background: none ">
        <nav class="navDatosEs" style="background: #2f1c35">
            <div class="btn-group d-md-flex justify-content-center">
                <a href=""></a>
            <form action="{{url('datosEstadisticos')}}" method="POST">
            @csrf
                <input type="hidden" name="mes" value="1">
                <button  type="submit"  class="btn btn-light; border:none btn-lg" style="color:white" >Enero</button>
            </form>

            <form action="{{url('datosEstadisticos')}}" method="POST">
            @csrf
                <input type="hidden" name="mes" value="2">
                <button  type="submit"  class="btn btn-light; border:none btn-lg" style="color:white" name="boton2">Febrero</button>
            </form>
            
            <form action="{{url('datosEstadisticos')}}" method="POST">
            @csrf
                <input type="hidden" name="mes" value="3">
                <button type="submit" class="btn btn-light; border:none btn-lg" style="color:white">Marzo</button>
            </form>
            
            <form action="{{url('datosEstadisticos')}}" method="POST">
            @csrf
                <input type="hidden" name="mes" value="4">
                <button type="submit" class="btn btn-light; border:none btn-lg" style="color:white">Abril</button>
            </form>
            
            <form action="{{url('datosEstadisticos')}}" method="POST">
            @csrf
                <input type="hidden" name="mes" value="5">
                <button type="submit" class="btn btn-light; border:none btn-lg" style="color:white">Mayo</button>
            </form>
            
            <form action="{{url('datosEstadisticos')}}" method="POST">
            @csrf
                <input type="hidden" name="mes" value="6">
                <button type="submit" class="btn btn-light; border:none btn-lg" style="color:white">Junio</button>
            </form>
            
            <form action="{{url('datosEstadisticos')}}" method="POST">
            @csrf
                <input type="hidden" name="mes" value="7">
                <button type="submit" class="btn btn-light; border:none btn-lg" style="color:white">Julio</button>
            </form>
            
            <form action="{{url('datosEstadisticos')}}" method="POST">
            @csrf
                <input type="hidden" name="mes" value="8">
                <button type="submit" class="btn btn-light; border:none btn-lg" style="color:white">Agosto</button>
            </form>
            
            <form action="{{url('datosEstadisticos')}}" method="POST">
            @csrf
                <input type="hidden" name="mes" value="9">
                <button type="submit" class="btn btn-light; border:none btn-lg" style="color:white">Septiembre</button>
            </form>
            
            <form action="{{url('datosEstadisticos')}}" method="POST">
            @csrf
                <input type="hidden" name="mes" value="10">
                <button type="submit" class="btn btn-light; border:none btn-lg" style="color:white">Octubre</button>
            </form>
            
            <form action="{{url('datosEstadisticos')}}" method="POST">
            @csrf
                <input type="hidden" name="mes" value="11">
                <button   type="submit" class="btn btn-light; border:none btn-lg"  style="color: white;" >Noviembre</button>
            </form>
            
            <form action="{{url('datosEstadisticos')}}" method="POST">
            @csrf
                <input type="hidden" name="mes" value="12">
                <button   type="submit" class="btn btn-light; border:none btn-lg" style="color:white">Diciembre</button>
            </form>

            </div> 
        
        </nav>
    </section>
    


    <section class="indicadores">
        <section class="huespedes">
            <h2 style="padding: 0.3em;"  ><img src="{{ asset('imgs/invitado.png')}}">HUÉSPEDES </h2>
            <h5><svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                </svg> 5 ESTRELLAS
            </h5>
            <section class="col-3">
                <canvas id="myChart" width="400" height="400"></canvas>
            </section>
        </section>
        <h2><img src="{{ asset('imgs/sigdolar.png')}}">TARIFA PROMEDIO</h2><br>
        <h4>Por Habitación</h4><br>
        <div class="row row-cols-1 row-cols-md-3 g-3">
            <div class="col text-center ">
                <div class="card h-40 border-success" style="border-radius: 45px; width: 50vh">     
                <div class="card-body">
                    <h5 class="card-title"> 
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 150 165">
                            <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                        </svg>
                        5 ESTRELLAS<br><h5>{{$arrTarifaH[0]}}</h5>
                    </h5>
                    @if( $arrTarifaH[2] === false)
                        <p> <img style="padding: 0.1em;" src="{{ asset('imgs/decrec.png')}}"> Decrecimiento de:{{$arrTarifaH[1]}}% </p>
                    @else
                        <p><img style="padding: 0.1em;" src="{{ asset('imgs/crec.png')}}">Crecimiento de: {{$arrTarifaH[1]}}%</p>
                    @endif
                </div>
                </div>
            </div>
            <div class="col text-center">
                <div class="card h-100 border-success" style="border-radius: 45px; width: 50vh">
                    <div class="card-body"> 
                        <h5 class="card-title">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                                <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                            </svg>
                            4 ESTRELLAS
                        </h5>
                        <h5 style="color:gray;">Datos no Disponibles</h5>
                    </div>
                </div>
            </div>

            <div class="col text-center">
                <div class="card h-100 border-success"  style="border-radius: 45px; height: 10px; width: 50vh">
                    <h5 class="card-title"><br>
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                            <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                        </svg>
                        3 ESTRELLAS
                    </h5>   
                   <h5 style="color:gray;">Datos no Disponibles</h5>
                
                </div>
            </div>
        
        </div>
        <!-- fin promedio por habitacion -->
   
        <!-- inicio promedio por persona -->
        <br><h4>Por Persona</h4><br>

        <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col text-center">
            <div class="card h-100 border-success"  style="border-radius: 45px; width: 50vh">
            
            <div class="card-body">
                <h5 class="card-title"> 
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                        <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                    </svg>
                    5 ESTRELLAS
                </h5>
                <h5>{{$arrTarifaP[0]}}</h5>
                @if( $arrTarifaP[2] === false)
                    <p><img style="padding: 0.1em;" src="{{ asset('imgs/decrec.png')}}"> Decrecimiento de: {{$arrTarifaP[1]}}%</p>
                @else
                    <p><img style="padding: 0.1em;" src="{{ asset('imgs/crec.png')}}"> Crecimiento de: {{$arrTarifaP[1]}}%</p>
                @endif
            </div>
            </div>
        </div>
        <div class="col text-center">
            <div class="card h-100 border-success"  style="border-radius: 45px; width: 50vh">
            
            <div class="card-body">
                <h5 class="card-title"> 
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                        <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                    </svg>
                    4 ESTRELLAS
                </h5>
                <h5 style="color:gray;">Datos no Disponibles</h5>
            </div>
            </div>
        </div>
        <div class="col text-center">
            <div class="card h-100 border-success"  style="border-radius: 45px; width: 50vh">
                
                <h5 class="card-title"> <br>
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                        <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                    </svg>
                    3 ESTRELLAS
                </h5>
                <h5 style="color:gray;">Datos no Disponibles</h5>
            
            </div>
        </div>

        </div>
        <!-- fin promedio por persona -->

        <!-- inicio promedio por ocupación -->

        
        <br><h2><img  style="padding-right:0.4em;" src="{{ asset('imgs/porciento.png')}}">PORCENTAJE DE OCUPACIÓN</h2><br>
                
        <div class="row row-cols-1 row-cols-md-3 g-4"><!-- sm -> small md-> medium--->
            <div class="col text-center">
                <div class="card h-100 border-success"  style="border-radius: 45px; width: 50vh">
                
                <div class="card-body">
                    <h5 class="card-title"> 
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                            <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                        </svg>
                        5 ESTRELLAS
                    </h5>
                    <h5>{{$arrOcupacion[0]}} %</h5>
                    @if( $arrOcupacion[2] === false)
                        <p><img style="padding: 0.1em;" src="{{ asset('imgs/decrec.png')}}"> Decrecimiento de: {{$arrOcupacion[1]}}%</p>
                    @else
                        <p><img style="padding: 0.1em;" src="{{ asset('imgs/crec.png')}}"> Crecimiento de: {{$arrOcupacion[1]}}%</p>
                    @endif
                    
                </div>
                </div>
            </div>
            <div class="col text-center ">
                <div class="card h-100 border-success"  style="border-radius: 45px; width: 50vh">
                
                <div class="card-body">
                    <h5 class="card-title"> 
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                            <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                        </svg>
                        4 ESTRELLAS
                    </h5>
                    <h5 style="color:gray;">Datos no Disponibles</h5>
                </div>
                </div>
            </div>
            <div class="col text-center">
                <div class="card h-100 border-success"  style="border-radius: 45px; width: 50vh">
                    <h5 class="card-title"> <br>
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                            <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                        </svg>
                        3 ESTRELLAS
                    </h5>     
                    <h5 style="color:gray;">Datos no Disponibles</h5>
                
                </div>
            </div>
        </div>
        <br></br>
        <section class="col-12">
                <canvas id="myLineChart" width="1000" height="400"></canvas>
        </section>
            
        <!-- fin promedio por ocupación--> 
        <!-- fin promedio por revpar-->  
        <br><h2><img src="{{ asset('imgs/sigdolar.png')}}">REVPAR</h2><br>

        <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col text-center">
            <div class="card h-100 border-success"  style="border-radius: 45px; width: 50vh">
            
            <div class="card-body">
                <h5 class="card-title"> 
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                        <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                    </svg>
                    5 ESTRELLAS
                </h5>
                <h5>{{$arrRevpar[0]}}</h5>
                @if( $arrOcupacion[2] === false)
                    <p><img style="padding: 0.1em;" src="{{ asset('imgs/decrec.png')}}"> Decrecimiento de: {{$arrRevpar[1]}}</p>
                @else
                    <p><img style="padding: 0.1em;" src="{{ asset('imgs/crec.png')}}"> Crecimiento de: {{$arrRevpar[1]}}</p>
                @endif
            </div>
            </div>
        </div>
        <div class="col text-center">
            <div class="card h-100 border-success"  style="border-radius: 45px; width: 50vh">
            
            <div class="card-body">
                <h5 class="card-title"> 
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                        <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                    </svg>
                    4 ESTRELLAS
                </h5>
                <h5 style="color:gray;">Datos no Disponibles</h5>
            </div>
            </div>
        </div>
        <div class="col text-center">
            <div class="card h-100 border-success"  style="border-radius: 45px; width: 50vh">
                
                <h5 class="card-title"> <br>
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                        <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                    </svg>
                    3 ESTRELLAS
                </h5>
                <h5 style="color:gray;">Datos no Disponibles</h5>
            
            </div>
        </div>

        </div>


        <br><h2><img  style="padding-right:0.4em;" src="{{ asset('imgs/estancia.png')}}">ESTADIA PROMEDIO</h2><br>

        <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col text-center">
            <div class="card h-100 border-success"  style="border-radius: 45px; width: 50vh">
            
            <div class="card-body">
                <h5 class="card-title"> 
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                        <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                    </svg>
                    5 ESTRELLAS
                </h5>
                <h5>{{$arrEstadiaP[0]}}</h5>
                @if( $arrEstadiaP[2] === false)
                    <p> <img style="padding-right: 0.2em;" src="{{ asset('imgs/decrec.png')}}">Decrecimiento de: {{$arrEstadiaP[1]}}</p>
                @else
                    <p> <img style="padding-right: 0.2em;" src="{{ asset('imgs/crec.png')}}">Crecimiento de: {{$arrEstadiaP[1]}}</p>
                @endif
            </div>
            </div>
        </div>
        <div class="col text-center">
            <div class="card h-100 border-success"  style="border-radius: 45px; width: 50vh">
            
            <div class="card-body">
                <h5 class="card-title"> 
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                        <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                    </svg>
                    4 ESTRELLAS
                </h5>
                <h5 style="color:gray;">Datos no Disponibles</h5>
            </div>
            </div>
        </div>
        <div class="col text-center">
            <div class="card h-100 border-success"  style="border-radius: 45px; width: 50vh">
                
                <h5 class="card-title"> <br>
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                        <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                    </svg>
                    3 ESTRELLAS
                </h5>
                <h5 style="color:gray;">Datos no Disponibles</h5>
            
            </div>
        </div>

        </div>

    </section>

@endsection


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

    

<script>
    var fecha = [];
    var ocupacion = [];

    $(document).ready(function(){
        $.ajax({
            url:'{{url("datosEstadisticos/all")}}',
            method: 'POST',
            data:{
                id:{{$mes}},
                _token: $('input[name="_token"]').val()
            }
        }).done(function(res){
            
            var arreglo = JSON.parse(res);
            
            for(var i=0;i<arreglo.length;i++){
                    fecha.push(arreglo[i].fecha);
                    ocupacion.push( arreglo[i].hab_ocupadas/ arreglo[i].hab_disponibles);
                }
            graficaPastel();
            graficaLinea();
        });
    });

    function graficaPastel(){
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Nacionales', 'Extranjeros'],
                datasets: [{
                    label: '# of Votes',
                    data: ['{{$arrHuespedes[0]}}' , '{{$arrHuespedes[1]}}'],
                    backgroundColor: [
                        'rgb(255,117,28)',
                        'rgb(255,202,112)'
                    ],
                    borderColor: [
                        'rgb(240,86,25)',
                        'rgb(240,86,25)'
                    ],
                    borderWidth: 1
                }]
            }
            
        });
    }
    function graficaLinea(){
        var ctx2 = document.getElementById('myLineChart').getContext('2d');
        var myLineChart = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: fecha,
                datasets: [{
                    label: 'Porcentaje Ocupación',
                    data: ocupacion,
                    backgroundColor: [
                        'rgb(180,255,112)'
                    ],
                    borderColor: [
                        ' rgb(69,202,0)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
            
        });
    }
</script>

<script>
    
</script>

@endsection
