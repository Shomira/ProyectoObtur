@extends('layouts.main')

@section('contenido')
    <form action="" method="POST">
        @csrf
    </form>
    
    <div class="lineaIzquierda">
        <div class=" container principalV">
            <div class="row">
                <div class="pb-3">
                    <h5 class=" text-black pt-3">RESUMEN</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="estiloTablasEs">
        <div class="row filtroGraficaEs filtrosResumenMensual">
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
            <div class="col-sm-4">
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
            <div class="col-sm-3">
                <div class="card-body cardBodyResumenM">
                    <input type="checkbox" class="from-control" id="desviacion" onclick="desviacion()">Desviación estandar
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
                <div id="containerGrafica" ></div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')

<!-- Scripts Graficas Higcharts -->
<script src = "https://code.highcharts.com/highcharts.src.js"> </script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>

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

    var desvCheckins = 0;
    var desvCheckouts = 0;
    var desvPernoctaciones = 0;
    var desvNacionales = 0;
    var desvExtranjeros = 0;
    var desvHabOcupadas = 0;
    var desvHabDisponibles = 0;
    var desvTarPromHab = 0;
    var desvTarPromPer = 0;
    var desvVentasNetas = 0;
    var desvPorcOcupacion = 0;
    var desvREVPAR = 0;

    var desviaciones = [];
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
        desviacion();
    }

    function cambioAnio(val){
        datos = [];
        anio = val.value;
        consulta();
        desviacion();
    }

    function cambioMes(val){
        datos = [];
        mes = val.value;
        consulta();
        desviacion();
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
        desviacion();
    }

    
    function desviacion(){
        if(document.getElementById("desviacion").checked && estadistico == 'Promedio'){
            desviaciones = [];
            $.ajax({
                url:'{{url("home/resumenMensual/desviacion")}}',
                method: 'POST',
                data:{
                    mes: mes,
                    anio: anio,
                    _token: $('input[name="_token"]').val()
                }
            }).done(function(res){

                var arreglo = JSON.parse(res);

                desvCheckins = arreglo[0].checkins;
                desvCheckouts = arreglo[0].checkouts;
                desvPernoctaciones = arreglo[0].pernoctaciones;
                desvNacionales = arreglo[0].nacionales;
                desvExtranjeros = arreglo[0].extranjeros;
                desvHabOcupadas = arreglo[0].habitaciones_ocupadas;
                desvHabDisponibles = arreglo[0].habitaciones_disponibles;
                desvTarPromHab = arreglo[0].tarifa_promedio;
                desvTarPromPer = arreglo[0].tar_per;
                desvVentasNetas = arreglo[0].ventas_netas;
                desvPorcOcupacion = arreglo[0].porcentaje_ocupacion;
                desvREVPAR = arreglo[0].revpar;

                desvCheckins = parseFloat(desvCheckins);
                desvCheckouts = parseFloat(desvCheckouts);
                desvPernoctaciones = parseFloat(desvPernoctaciones);
                desvNacionales = parseFloat(desvNacionales);
                desvExtranjeros = parseFloat(desvExtranjeros);
                desvHabOcupadas = parseFloat(desvHabOcupadas);
                desvHabDisponibles = parseFloat(desvHabDisponibles);
                desvTarPromHab = parseFloat(desvTarPromHab);
                desvTarPromPer = parseFloat(desvTarPromPer);
                desvVentasNetas = parseFloat(desvVentasNetas);
                desvPorcOcupacion = parseFloat(desvPorcOcupacion);
                desvREVPAR = parseFloat(desvREVPAR);
                
                for(var i=0;i<columnas.length;i++){
                    if(columnas[i] == 'Porcent Ocupación')
                        desviaciones.push([datoPorcOcupacion-desvPorcOcupacion, datoPorcOcupacion+desvPorcOcupacion]);
                    else if(columnas[i]  == 'Checkins')
                        desviaciones.push([datoCheckins-desvCheckins, datoCheckins+desvCheckins]);
                    else if(columnas[i]  == 'Checkouts')
                        desviaciones.push([datoCheckouts-desvCheckouts, datoCheckouts+desvCheckouts]);
                    else if(columnas[i]  == 'Pernoctaciones')
                        desviaciones.push([datoPernoctaciones-desvPernoctaciones, datoPernoctaciones+desvPernoctaciones]);
                    else if(columnas[i]  == 'Nacionales')
                        desviaciones.push([datoNacionales-desvNacionales, datoNacionales+desvNacionales]);
                    else if(columnas[i]  == 'Extranjeros')
                        desviaciones.push([datoExtranjeros-desvExtranjeros, datoExtranjeros+desvExtranjeros]);
                    else if(columnas[i]  == 'Hab Ocupadas')
                        desviaciones.push([datoHabOcupadas-desvHabOcupadas, datoHabOcupadas+desvHabOcupadas]);
                    else if(columnas[i]  == 'Hab Disponibles')
                        desviaciones.push([datoHabDisponibles-desvHabDisponibles, datoHabDisponibles+desvHabDisponibles]);
                    else if(columnas[i]  == 'Tarifa Hab')
                        desviaciones.push([datoTarPromHab-desvTarPromHab, datoTarPromHab+desvTarPromHab]);
                    else if(columnas[i]  == 'Tarifa Per')
                        desviaciones.push([datoTarPromPer-desvTarPromPer, datoTarPromPer+desvTarPromPer]);
                    else if(columnas[i]  == 'Ventas Netas')
                        desviaciones.push([datoVentasNetas-desvVentasNetas, datoVentasNetas+desvVentasNetas]);
                    else if(columnas[i]  == 'REVPAR')
                        desviaciones.push([datoREVPAR-desvREVPAR, datoREVPAR+desvREVPAR]);
                    
                }
                console.log(desviaciones);
                if(chartMes.series.length > 1){
                    chartMes.series[1].update({data: desviaciones});
                }else{
                    chartMes.addSeries({
                        name: 'Promedio error',
                        type: 'errorbar',
                        data: desviaciones,
                        tooltip: {
                            pointFormat: '(error range: {point.low}-{point.high} mm)<br/>'
                        }
                    });
                }
                

            });

        }else{
            if(chartMes.series.length > 1){
                chartMes.series[1].remove(true);
            }
            if(estadistico != 'Promedio'){
                document.getElementById("desviacion").checked = false;
                document.getElementById("desviacion").disabled = true;
            }
        }
        
    }

</script>
@endsection