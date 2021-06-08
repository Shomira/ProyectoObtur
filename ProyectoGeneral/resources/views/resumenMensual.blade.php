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
                                    <h5 class="card-header-title text-white pt-3">RESUMEN</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row filtroGraficaEs tituloFiltrosGraficasEs">
            <div class="col-sm-5">
                <div class="card cardResumenM" >
                <div class="card-body ">
                    <div>
                    <h5>Año-Mes:
                        <label for="inputState" >
                            <select id="idanioInicio" name="anioInicio" class="form-control" onchange="cambioAnio(this)"> 
                                @foreach($anios as $anio)
                                    <option value="{{$anio->anio}}">{{$anio->anio}}</option>
                                @endforeach
                            </select>
                        </label>
                        <label for="inputState">
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
                <div class="card-body cardBodyResumenM">
                    <h5>Estadísticos: 
                        <label for="inputState">
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
                <hr>
                <input type="checkbox" name="tarifa_promedio" id="tarifa_promedio" value="Tarifa Hab" onchange="seleccionarColumna(this)">
                <label for="tarifa_promedio"> Tarifa Prom. Hab.</label><br>
                <input type="checkbox" name="TAR_PER" id="TAR_PER" value="Tarifa Per" onchange="seleccionarColumna(this)">
                <label for="TAR_PER"> Tarifa Prom. Per.</label><br>
                <input type="checkbox" name="porcentaje_ocupacion" id="porcentaje_ocupacion" value="Porcent Ocupación" onchange="seleccionarColumna(this)" checked>
                <label for="porcentaje_ocupacion"> Porcent. Ocupación</label><br>
                <input type="checkbox" name="revpar" id="revpar" value="REVPAR" onchange="seleccionarColumna(this)">
                <label for="revpar"> REVPAR</label><br>
            
            </div> 
            <div class="form-group col-md-10">
                <div id="containerGrafica" style="height: 500px; min-width: 900px"></div>
            </div>

        </div>
    </section>
@endsection

@section('scripts')
<script src = "https://code.highcharts.com/highcharts.src.js"> </script>
<!-- Scripts Graficas Higcharts -->
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<script src="https://code.highcharts.com/stock/modules/export-data.js"></script>

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
    var columnas = ['Porcent Ocupación']

    var chartMes = Highcharts.chart('containerGrafica', {
        //'rgb(242,170,59)'
        colors: ['#F24333'],
        chart: {
            type: 'column',
        },
        title: {
            text: 'Gráfica Resumen Mensual',
            style: {
                color: '#000',
                font: 'bold 16px "Roboto Condensed", Verdana, sans-serif'
            }
        },
        xAxis: {
            categories: columnas
        },
        yAxis: {
            title: {
                text: 'Escala'
            }
        },
        series: [{
      
            name: estadistico,
            data: datos
        }]
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

            datoCheckins = parseFloat(datoCheckins);
            datoCheckouts = parseFloat(datoCheckouts);
            datoPernoctaciones = parseFloat(datoPernoctaciones);
            datoNacionales = parseFloat(datoNacionales);
            datoExtranjeros = parseFloat(datoExtranjeros);
            datoHabOcupadas = parseFloat(datoHabOcupadas);
            datoHabDisponibles = parseFloat(datoHabDisponibles);
            datoTarPromHab = parseFloat(datoTarPromHab);
            datoTarPromPer = parseFloat(datoTarPromPer);
            datoVentasNetas = parseFloat(datoVentasNetas);
            datoPorcOcupacion = parseFloat(datoPorcOcupacion);
            datoREVPAR = parseFloat(datoREVPAR);


            for(var i=0;i<columnas.length;i++){
                if(columnas[i] == 'Porcent Ocupación')
                    datos.push(datoPorcOcupacion);
                else if(columnas[i]  == 'Checkins')
                    datos.push(datoCheckins);
                else if(columnas[i]  == 'Checkouts')
                    datos.push(datoCheckouts);
                else if(columnas[i]  == 'Pernoctaciones')
                    datos.push(datoPernoctaciones);
                else if(columnas[i]  == 'Nacionales')
                    datos.push(datoNacionales);
                else if(columnas[i]  == 'Extranjeros')
                    datos.push(datoExtranjeros);
                else if(columnas[i]  == 'Hab Ocupadas')
                    datos.push(datoHabOcupadas);
                else if(columnas[i]  == 'Hab Disponibles')
                    datos.push(datoHabDisponibles);
                else if(columnas[i]  == 'Tarifa Hab')
                    datos.push(datoTarPromHab);
                else if(columnas[i]  == 'Tarifa Per')
                    datos.push(datoTarPromPer);
                else if(columnas[i]  == 'Ventas Netas')
                    datos.push(datoVentasNetas);
                else if(columnas[i]  == 'REVPAR')
                    datos.push(datoREVPAR);
                
            }

            chartMes.update( {
                series: [{
                    name: estadistico,
                    data: datos
                }],
                xAxis: {
                    categories: columnas
                 
                }
            });
            
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
                
                if(columnas[i] == 'Tarifa Hab' || columnas[i] == 'Tarifa Per'|| columnas[i] == 'Porcent Ocupación'|| columnas[i] == 'REVPAR'){
                    columnas.splice(i, 1);
                    datos.splice(i, 1);
                    
                    i--;
                }

            }
            
            chartMes.update( {
                series: [{
                    name: estadistico,
                    data: datos
                }],
                xAxis: {
                    categories: columnas
                }
            }); 

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
        }else if(valor == 'Porcent Ocupación'){
            dato = datoPorcOcupacion;
            bandera = document.getElementById('porcentaje_ocupacion').checked;
        }else if(valor == 'REVPAR'){
            dato = datoREVPAR;
            bandera = document.getElementById('revpar').checked;
        }
        
        if(bandera){
            
            columnas.push(valor);
            datos.push(dato);
           
            chartMes.update( {
                series: [{
                    name: estadistico,
                    data: datos
                }],
                xAxis: {
                    categories: columnas,
                                   
                }
            }); 

        }else{

            
            for(var i=0;i<columnas.length;i++){
                
                if(columnas[i] == valor){
                    columnas.splice(i, 1);
                    datos.splice(i, 1);
                }

            }

            chartMes.update( {
                series: [{
                    name: estadistico,
                    data: datos
                    
                }],
                xAxis: {
                    categories: columnas,
                }
            }); 
        }
        
    }
</script>
@endsection