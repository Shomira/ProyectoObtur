@extends('layouts.app')

@section('content')
    <section class="fondo">
        <section class="fondo2">
            <nav class="navAdmin">
                <a  style="background: white; color: #000000;font-weight: 800;" href="{{url('home/visualizarGraficas')}}"><img src="{{ asset('imgs/metrica1.png')}}">Visualizar Gráficas</a>
                <a href="{{url('home/visualizarRegistros')}}"><img src="{{ asset('imgs/vision1.png')}}"> Visualizar Registros </a>                
            </nav>
            <section class="espacioAdminEs">  
                <h2>GRÁFICA POR MES</h2>
                    <div class="form-row align-items-center">
                        <div class="row col-13">
                            <div class="form-group col-md-2">
                                
                                <form action="{{url('home/visualizarGraficas')}}" method="POST">
                                    @csrf
                                    <label for="inputState">Mes Inicio</label>
                                    <select id="inputState" name="mesInicio" class="form-control">
                                        <option disable selected>Elegir mes Inicio ...</option>
                                        @foreach($meses as $mes)
                                            <option value="{{$mes[1]}}">{{$mes[0]}}</option>
                                        @endforeach
                                        
                                    </select>
                                    <label for="inputState">Mes Final</label>
                                    <select id="inputState" name="mesFin" class="form-control">
                                        <option disable selected>Elegir mes Máximo ...</option>
                                        @foreach($meses as $mes)
                                            <option value="{{$mes[1]}}">{{$mes[0]}}</option>
                                        @endforeach
                                    </select>
                                    <label for="inputState">Columna</label>
                                    <select id="inputState" name="columna" class="form-control">
                                        <option disable selected>Elegir Columna ...</option>
                                        <option value="checkins">Checkins</option>
                                        <option value="checkouts">Checkouts</option>
                                        <option value="pernotaciones">Pernoctaciones</option>
                                        <option value="nacionales">Nacionales</option>
                                        <option value="extranjeros">Extranjeros</option>
                                        <option value="habitaciones_ocupadas">Habitaciones Ocupadas</option>
                                        <option value="habitaciones_disponibles">Habitaciones Disponibles</option>
                                        <option value="tarifa_promedio">Tarifa Promedio Habitación</option>
                                        <option value="TAR_PER">Tarifa Promedio Personas</option>
                                        <option value="ventas_netas">Ventas Netas</option>
                                        <option value="porcentaje_ocupacion">Porcentaje Ocupación</option>
                                        <option value="revpar">Revpar</option>
                                    </select>
                                    <p></p>
                                    <section>
                                        <button type="submit" class="btn btn-primary">Consultar</button>
                                    </section>
                                </form> 
                            </div>
                            <div class="form-group col-md-10">
                                <canvas id="graficaMeses" width="1400" height="500"></canvas>
                            </div>
                        </div>
                    </div>
            </section>       
        </section>
   </section>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

<script>
    var nombreMes = "";
    var meses = [];
    var columna = [];
    $(document).ready(function(){
            $.ajax({
                url:'{{url("home/visualizarGraficas/all")}}',
                method: 'POST',
                data:{
                    mesInicio:{{$mesInicio}},
                    mesFin:{{$mesFin}},
                    columna:"{{$columna}}",
                     _token: $('input[name="_token"]').val()
                }
                
            }).done(function(res){
                var arreglo = JSON.parse(res);
                
                for(var i=0;i<arreglo.length;i++){

                    if (arreglo[i].mes == 1)
                        nombreMes = "Enero";
                    else if (arreglo[i].mes == 2)
                        nombreMes = "Febrero";
                    else if (arreglo[i].mes == 3)
                        nombreMes = "Marzo";
                    else if (arreglo[i].mes == 4)
                        nombreMes = "Abril";
                    else if (arreglo[i].mes == 5)
                        nombreMes = "Mayo";
                    else if (arreglo[i].mes == 6)
                        nombreMes = "Junio";
                    else if (arreglo[i].mes == 7)
                        nombreMes = "Julio";
                    else if (arreglo[i].mes == 8)
                        nombreMes = "Agosto";
                    else if (arreglo[i].mes == 9)
                        nombreMes = "Septiembre";
                    else if (arreglo[i].mes == 10)
                        nombreMes = "Octubre";
                    else if (arreglo[i].mes == 11)
                        nombreMes = "Noviembre";
                    else 
                        nombreMes = "Diciembre";

                    meses.push(nombreMes);
                    columna.push(arreglo[i].columna);
                }
            
                graficaLinea();
            });
        });
   
        function graficaLinea(){
        var ctx2 = document.getElementById('graficaMeses').getContext('2d');
        var graficaMeses = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: meses,
                datasets: [{
                    label: '{{$columna}}',
                    data: columna,
                    backgroundColor: [
                        'rgba(211, 214, 30, 0.74)'
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
@endsection
