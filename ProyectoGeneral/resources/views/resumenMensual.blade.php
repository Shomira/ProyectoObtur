@extends('layouts.app')

@section('content')
    <section class="fondo">
        <section class="fondo2">
            <nav class="navAdmin">
                <a href="{{url('home')}}"><img src="{{ asset('imgs/inicio.png')}}">Inicio</a>
                <a  href="{{url('home/comparativas')}}"><img src="{{ asset('imgs/comparar.png')}}">Comparativas</a>
                <a style="background: white; color: #000000;font-weight: 800;"  href="{{url('home/resumenMensual')}}"><img src="{{ asset('imgs/resumen.png')}}">Resumen Mensual</a>
                <a  href="{{url('home/analisisDeNegocio')}}"><img src="{{ asset('imgs/analisisNegocio.png')}}">Análisis De Negocio</a>
                <a href="{{url('home/visualizarRegistros')}}"><img src="{{ asset('imgs/vision1.png')}}"> Visualizar Registros</a> 
            </nav>

            <form action="" method="POST">
                @csrf
            </form>
           
            <section class="espacioAdminEs">  
                <div class="container principalV">
                    <div class="row">
                        <div class="col-lg-12 text-left">
                            <div class="row">
                                <!--tarjeta 1-->
                                <div class="col-lg-30  col-md-8 mb-4">
                                    <div class="card-section border rounded p-3">
                                        <div class="card-header-s rounded pb-4">
                                            <h5 class="card-header-title text-white pt-3">RESUMEN</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row" style="margin: -3%; background:none">
                    <div class="col-sm-5">
                      <div class="card" style="border:none">
                        <div class="card-body">
                          <div>
                            <h5 >Año-Mes:
                                <label for="inputState" style=" width:30%; padding-left: 4.5%; ">
                                    <select id="idanioInicio" name="anioInicio" class="form-control" onchange="cambioAnio(this)"> 
                                        @foreach($anios as $anio)
                                            <option value="{{$anio->anio}}">{{$anio->anio}}</option>
                                        @endforeach
                                    </select>
                                </label>
                                <label for="inputState"  style=" width:25%;">
                                    <select id="idmesInicio" name="mesInicio" class="form-control" onchange="cambioMes(this)">
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
                    <div class="col-sm-6">
                      <div class="card" style="border:none">
                        <div class="card-body">
                            <h5>Estadísticos: 
                                <label for="inputState" style="padding-left: 4.5%; margin:0">
                                    <select id="inputState" name="estadistico" class="form-control" onchange="cambioEstadistico(this)">
                                        <option value="Promedio">Promedio</option>
                                        <option value="Total" >Total</option>
                                        <option value="Max">Máximo</option>
                                        <option value="Min" >Mínimo</option>
                                    </select>
                                </label>
                            </h5>
                        </div>
                      </div>
                    </div>
                </div>
                <br><hr>
                <div class="row col-13">
                    <div class="form-group col-md-2 panelVisualColums" >
                    
                        <label for="inputState"><h5>Parámetros</h5></label><br>
                        <input type="checkbox" name="checkins" id="checkins" value="Checkins" onchange="seleccionarColumna(this)">
                        <label for="checkins"> Checkins</label><br>
                        <input type="checkbox" name="checkouts" id="checkouts" value="Checkouts" onchange="seleccionarColumna(this)">
                        <label for="checkouts"> Checkouts</label><br>
                        <input type="checkbox" name="pernoctaciones" id="pernoctaciones" value="Pernoctaciones" onchange="seleccionarColumna(this)">
                        <label for="pernoctaciones"> Pernoctaciones</label><br>
                        <input type="checkbox" name="nacionales" id="nacionales" value="Nacionales" onchange="seleccionarColumna(this)">
                        <label for="nacionales"> Nacionales</label><br>
                        <input type="checkbox" name="extranjeros" id="extranjeros" value="Extranjeros" onchange="seleccionarColumna(this)">
                        <label for="extranjeros"> Extranjeros</label><br>
                        <input type="checkbox" name="habitaciones_ocupadas" id="habitaciones_ocupadas" value="Hab Ocupadas" onchange="seleccionarColumna(this)">
                        <label for="habitaciones_ocupadas"> Hab. Ocupadas</label><br>
                        <input type="checkbox" name="habitaciones_disponibles" id="habitaciones_disponibles" value="Hab Disponibles" onchange="seleccionarColumna(this)">
                        <label for="habitaciones_disponibles"> Hab. Disponibles</label><br>
                        <input type="checkbox" name="ventas_netas" id="ventas_netas" value="Ventas Netas" onchange="seleccionarColumna(this)">
                        <label for="ventas_netas"> Ventas Netas</label><br>
                        <hr style="margin: 0.4em;">
                        <input type="checkbox" name="tarifa_promedio" id="tarifa_promedio" value="Tarifa Hab" onchange="seleccionarColumna(this)">
                        <label for="tarifa_promedio"> Tarifa Prom. Hab.</label><br>
                        <input type="checkbox" name="TAR_PER" id="TAR_PER" value="Tarifa Per" onchange="seleccionarColumna(this)">
                        <label for="TAR_PER"> Tarifa Prom. Per.</label><br>
                        <input type="checkbox" name="porcentaje_ocupacion" id="porcentaje_ocupacion" value="Porcn Ocupación" onchange="seleccionarColumna(this)" checked>
                        <label for="porcentaje_ocupacion"> Porcent. Ocupación</label><br>
                        <input type="checkbox" name="revpar" id="revpar" value="REVPAR" onchange="seleccionarColumna(this)">
                        <label for="revpar"> REVPAR</label><br>
                   
                    </div> 
                    <div class="form-group col-md-10">
                        <canvas id="graficaMes" width="1400" height="640"  ></canvas>
                    </div>
                </div>


            </section>
        </section>
    </section>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

<script>

    var anio = '{{$anioFin}}';
    var mes = '{{$mesFin}}';
    var estadistico = 'Promedio';

    var datoCheckins = 0;
    var datoCheckouts = 0;
    var datoPernoctaciones = 0;
    var datoNacionales = 0;
    var datoExtranjeros = 0;
    var datoHabOcupadas = 0;
    var datoHabDisponibles = 0;
    var datoTarPromHab = 0;
    var datoTarPromPer = 0;
    var datoVentasNetas = 0;
    var datoPorcOcupacion = 0;
    var datoREVPAR = 0;

    var datos = [];
    var columnas = ['Porcn Ocupación']

    var ctx2 = document.getElementById('graficaMes').getContext('2d');
    var graficaMes = new Chart(ctx2, {
        type: "bar",
        data: {
            labels: columnas,
            datasets: [{
                label: estadistico,
                width: 6,
                barPercentage: 0.5,
                barThickness: 30,
                maxBarThickness: 30,
                minBarLength: 2,
                
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(255, 159, 64, 0.5)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],

                data: datos
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

        
        consulta();
        
        
    });

    function consulta(){
        $.ajax({
            url:'{{url("home/resumenMensual")}}',
            method: 'POST',
            data:{
                mes: mes,
                anio: anio,
                estadistico: estadistico,
                _token: $('input[name="_token"]').val()
            }
        }).done(function(res){
            
            var arreglo = JSON.parse(res);

            datoCheckins = arreglo[0].checkins;
            datoCheckouts = arreglo[0].checkouts;
            datoPernoctaciones = arreglo[0].pernoctaciones;
            datoNacionales = arreglo[0].nacionales;
            datoExtranjeros = arreglo[0].extranjeros;
            datoHabOcupadas = arreglo[0].habitaciones_ocupadas;
            datoHabDisponibles = arreglo[0].habitaciones_disponibles;
            datoTarPromHab = arreglo[0].tarifa_promedio;
            datoTarPromPer = arreglo[0].tar_per;
            datoVentasNetas = arreglo[0].ventas_netas;
            datoPorcOcupacion = arreglo[0].porcentaje_ocupacion;
            datoREVPAR = arreglo[0].revpar;

            for(var i=0;i<columnas.length;i++){
                if(columnas[i] == 'Porcn Ocupación'){
                    datos.push(datoPorcOcupacion);
                }
                if(columnas[i]  == 'Checkins'){
                    datos.push(datoCheckins);
                }
                if(columnas[i]  == 'Checkouts'){
                    datos.push(datoCheckouts);
                }
                if(columnas[i]  == 'Pernoctaciones'){
                    datos.push(datoPernoctaciones);
                }
                if(columnas[i]  == 'Nacionales'){
                    datos.push(datoNacionales);
                }
                if(columnas[i]  == 'Extranjeros'){
                    datos.push(datoExtranjeros);
                }
                if(columnas[i]  == 'Hab Ocupadas'){
                    datos.push(datoHabOcupadas);
                }
                if(columnas[i]  == 'Hab Disponibles'){
                    datos.push(datoHabDisponibles);
                }
                if(columnas[i]  == 'Tarifa Hab'){
                    datos.push(datoTarPromHab);
                }
                if(columnas[i]  == 'Tarifa Per'){
                    datos.push(datoTarPromPer);
                }
                if(columnas[i]  == 'Ventas Netas'){
                    datos.push(datoVentasNetas);
                }
                if(columnas[i]  == 'REVPAR'){
                    datos.push(datoREVPAR);
                }
                
            }
            
            graficaMes.data.datasets[0].data = datos;
            graficaMes.data.datasets[0].label = estadistico;
            graficaMes.update();            

        });
    }

    function cambioEstadistico(val){

        datos = [];

        if(val.value == 'Total'){

            document.getElementById("tarifa_promedio").checked = false;
            document.getElementById("TAR_PER").checked = false;
            document.getElementById("porcentaje_ocupacion").checked = false;
            document.getElementById("revpar").checked = false;

            document.getElementById("tarifa_promedio").disabled = true;
            document.getElementById("TAR_PER").disabled = true;
            document.getElementById("porcentaje_ocupacion").disabled = true;
            document.getElementById("revpar").disabled = true;

            for(var i=0;i<columnas.length;i++){
                
                if(columnas[i] == 'Tarifa Hab' || columnas[i] == 'Tarifa Per'|| columnas[i] == 'Porcn Ocupación'|| columnas[i] == 'REVPAR'){
                    columnas.splice(i, 1);
                    datos.splice(i, 1);
                    i--;
                }

            }
            
            graficaMes.data.labels = columnas;
            graficaMes.data.datasets[0].data = datos;
            graficaMes.update(); 


        }else{
            document.getElementById("tarifa_promedio").disabled = false;
            document.getElementById("TAR_PER").disabled = false;
            document.getElementById("porcentaje_ocupacion").disabled = false;
            document.getElementById("revpar").disabled = false;

        }
        

        estadistico = val.value;
        
        consulta();
    }

    function cambioAnio(val){

        datos = [];

        anio = val.value;
        
        consulta();
    }

    function cambioMes(val){

        datos = [];

        mes = val.value;

        consulta();
    }

    function seleccionarColumna(val){
        var valor = val.value;
        var dato;
        var bandera;

        if(valor == 'Checkins'){
            dato = datoCheckins;
            bandera = document.getElementById('checkins').checked;
        }else if(valor == 'Checkouts'){
            dato = datoCheckouts;
            bandera = document.getElementById('checkouts').checked;
        }else if(valor == 'Pernoctaciones'){
            dato = datoPernoctaciones;
            bandera = document.getElementById('pernoctaciones').checked;
        }else if(valor == 'Nacionales'){
            dato = datoNacionales;
            bandera = document.getElementById('nacionales').checked;
        }else if(valor == 'Extranjeros'){
            dato = datoExtranjeros;
            bandera = document.getElementById('extranjeros').checked;
        }else if(valor == 'Hab Ocupadas'){
            dato = datoHabOcupadas;
            bandera = document.getElementById('habitaciones_ocupadas').checked;
        }else if(valor == 'Hab Disponibles'){
            dato = datoHabDisponibles;
            bandera = document.getElementById('habitaciones_disponibles').checked;
        }else if(valor == 'Tarifa Hab'){
            dato = datoTarPromHab;
            bandera = document.getElementById('tarifa_promedio').checked;
        }else if(valor == 'Tarifa Per'){
            dato = datoTarPromPer;
            bandera = document.getElementById('TAR_PER').checked;
        }else if(valor == 'Ventas Netas'){
            dato = datoVentasNetas;
            bandera = document.getElementById('ventas_netas').checked;
        }else if(valor == 'Porcn Ocupación'){
            dato = datoPorcOcupacion;
            bandera = document.getElementById('porcentaje_ocupacion').checked;
        }else if(valor == 'REVPAR'){
            dato = datoREVPAR;
            bandera = document.getElementById('revpar').checked;
        }
        
        if(bandera){
            
            columnas.push(valor);
            datos.push(dato);

            graficaMes.data.labels = columnas;
            graficaMes.data.datasets[0].data = datos;
            graficaMes.update();   

        }else{

            
            for(var i=0;i<columnas.length;i++){
                
                if(columnas[i] == valor){
                    columnas.splice(i, 1);
                    datos.splice(i, 1);
                }

            }
            
            graficaMes.data.labels = columnas;
            graficaMes.data.datasets[0].data = datos;
            graficaMes.update(); 
            
        }
        
    }
    

</script>
@endsection