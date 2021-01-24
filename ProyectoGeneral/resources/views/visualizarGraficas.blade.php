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
                                
                                <label for="inputState">Mes Inicio</label>
                                <select id="idmesInicio" name="mesInicio" class="form-control" onchange="cambioMesInicio(this)">
                                    <option disable>Elegir mes Inicio ...</option>
                                    @foreach($meses as $mes)
                                        <option value="{{$mes[1]}}">{{$mes[0]}}</option>
                                    @endforeach
                                </select>
                                <label for="inputState">Mes Final</label>
                                <select id="inputState" name="mesFin" class="form-control" onchange="cambioMesFin(this)">
                                    <option disable>Elegir mes Máximo ...</option>
                                    @foreach($meses as $mes)
                                        <option value="{{$mes[1]}}">{{$mes[0]}}</option>
                                    @endforeach
                                </select>
                                <label for="inputState">Columna</label>
                                <select id="idColumna" name="columna" class="form-control" data-valor="6" value="nose" onchange="cambioColumnaG1(this)">
                                    <option disable selected>Elegir Columna ...</option>
                                    <option value="checkins">Checkins</option>
                                    <option value="checkouts">Checkouts</option>
                                    <option value="pernoctaciones">Pernoctaciones</option>
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
                                
                            </div>
                            <div class="form-group col-md-10">
                                <canvas id="graficaMeses" width="1400" height="500"></canvas>
                            </div>
                        </div>
                    </div>

                <br>
                <br>

                <h2>GRÁFICA POR DÍAS</h2>
                    <div class="form-row align-items-center">
                        <div class="row col-13">
                            <div class="form-group col-md-2">
                                
                                <label for="inputState">Fecha Inicio</label>
                                <input type="date" name="inicio" class="form-control" id="cambioFechaInicio" value="{{$diaMin}}"> 
                                
                                <label for="inputState">Mes Final</label>
                                <input type="date" name="inicio" class="form-control" id="cambioFechaFin" value="{{$diaMax}}">
                                
                                <label for="inputState">Columna</label>
                                <select id="idColumna" name="columna" class="form-control" data-valor="6" value="nose" onchange="cambioColumnaG2(this)">
                                    <option disable selected>Elegir Columna ...</option>
                                    <option value="checkins">Checkins</option>
                                    <option value="checkouts">Checkouts</option>
                                    <option value="pernoctaciones">Pernoctaciones</option>
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
                                
                            </div>
                            <div class="form-group col-md-10">
                                <canvas id="graficaDias" width="1400" height="500"></canvas>
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
    var mesesGrafica1 = [];
    var columnaGrafica1 = [];
    var mesInicioGrafica1 = {{$mesInicio}};
    var mesFinGrafica1 = {{$mesFin}};
    var nomColumnaGrafica1 = '{{$columna}}';

    var diasGrafica2 = [];
    var datosGrafica2 = [];
    var fechaInicioGrafica2 = '{{$diaMin}}';
    var fechaFinGrafica2 = '{{$diaMax}}';
    var nomColumnaGrafica2 = '{{$columna}}';
    
    var ctx2 = document.getElementById('graficaMeses').getContext('2d');
    var graficaMeses = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: mesesGrafica1,
            datasets: [{
                label: nomColumnaGrafica1,
                data: columnaGrafica1,
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

    var ctx2 = document.getElementById('graficaDias').getContext('2d');
    var graficaDias = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: diasGrafica2,
            datasets: [{
                label: nomColumnaGrafica2,
                data: datosGrafica2,
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

    $(document).ready(function(){
        $('#cambioFechaInicio').focusout(function() {
            
            diasGrafica2 = [];
            datosGrafica2 = [];
            fechaInicioGrafica2 = $(this).val();
            alert(fechaInicioGrafica2);
            alert(fechaFinGrafica2);
        
            consultaDias(fechaInicioGrafica2, fechaFinGrafica2, nomColumnaGrafica2);
        });

        $('#cambioFechaFin').focusout(function() {
            
            diasGrafica2 = [];
            datosGrafica2 = [];
            fechaFinGrafica2 = $(this).val();
        
            consultaDias(fechaInicioGrafica2, fechaFinGrafica2, nomColumnaGrafica2);
        });
        
        $(".btnConsulta").click(function(){
            var nose = $(this).data('id');
            alert(nose);
        });
        
        consultaMeses(mesInicioGrafica1, mesFinGrafica1, nomColumnaGrafica1);
        consultaDias(fechaInicioGrafica2, fechaFinGrafica2, nomColumnaGrafica2);
        
    });

    function consultaMeses(mesInicioGrafica1, mesFinGrafica1, nomColumnaGrafica1){
        $.ajax({
            url:'{{url("home/visualizarGraficas/all")}}',
            method: 'POST',
            data:{
                mesInicio: mesInicioGrafica1,
                mesFin: mesFinGrafica1,
                columna: nomColumnaGrafica1,
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
                
                mesesGrafica1.push(nombreMes);
                columnaGrafica1.push(arreglo[i].columna);
            }
        
            graficaMeses.data.labels = mesesGrafica1;
            graficaMeses.data.datasets[0].data = columnaGrafica1;
            graficaMeses.data.datasets[0].label = nomColumnaGrafica1;
            graficaMeses.update();
        });

    }

    function consultaDias(fechaInicioGrafica2, fechaFinGrafica2, nomColumnaGrafica2){
        
        $.ajax({
            url:'{{url("home/visualizarGraficas/dias")}}',
            method: 'POST',
            data:{
                inicio: fechaInicioGrafica2,
                fin: fechaFinGrafica2,
                columna: nomColumnaGrafica2,
                _token: $('input[name="_token"]').val()
            }
        }).done(function(res){
            
            var arreglo = JSON.parse(res);
            
            for(var i=0;i<arreglo.length;i++){
                
                diasGrafica2.push(arreglo[i].fecha);
                datosGrafica2.push(arreglo[i].columna);

            }
        
            graficaDias.data.labels = diasGrafica2;
            graficaDias.data.datasets[0].data = datosGrafica2;
            graficaDias.data.datasets[0].label = nomColumnaGrafica2;
            graficaDias.update();
        });

    }

    function cambioMesInicio(val){
        mesesGrafica1 = [];
        columnaGrafica1 = [];
        mesInicioGrafica1 = val.value;
        
        consultaMeses(mesInicioGrafica1, mesFinGrafica1, nomColumnaGrafica1);
        
    }

    function cambioMesFin(val){
        mesesGrafica1 = [];
        columnaGrafica1 = [];
        mesFinGrafica1 = val.value;
        
        consultaMeses(mesInicioGrafica1, mesFinGrafica1, nomColumnaGrafica1);
    }
   
    function cambioColumnaG1(val){
        mesesGrafica1 = [];
        columnaGrafica1 = [];
        nomColumnaGrafica1 = val.value;
        
        consultaMeses(mesInicioGrafica1, mesFinGrafica1, nomColumnaGrafica1);
    }

    function cambioColumnaG2(val){
        diasGrafica2 = [];
        datosGrafica2 = [];
        nomColumnaGrafica2 = val.value;
        
        consultaDias(fechaInicioGrafica2, fechaFinGrafica2, nomColumnaGrafica2);
    }

</script>
@endsection
