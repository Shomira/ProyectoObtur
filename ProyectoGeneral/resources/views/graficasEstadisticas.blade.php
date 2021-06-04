@extends('layouts.app')
@section('content')

<section>
    <section class="graficaWelcome">
            <section class="tituloGrafica" ><h2>COMPARATIVAS DE DATOS HOTELEROS</h2></section>
            
            <section class="lineatituloGrafica" ></section>
            <div class="card-group" >
                <div class="card cardGraficaWelcome" >
                    <div class="row titulosPanel">
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title text-center">Fecha inicio</h5>
                                <div class="row">
                                    <div class="selectGraficaAnio" >
                                        <select id="idanioInicio" name="anioInicio" class="form-control" onchange="cambioAnioInicio(this)">
                                            <option disable>Elegir año</option>
                                            @foreach($anios as $anio)
                                                <option value="{{$anio->anio}}">{{$anio->anio}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div >
                                        <select id="idmesInicio" name="mesInicio" class="form-control" onchange="cambioMesInicio(this)">
                                            <option disable>Elegir mes</option>
                                            @foreach($meses as $mes)
                                                <option value="{{$mes[1]}}">{{$mes[0]}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title text-center">Fecha Fin</h5>
                                <div class="row">
                                    <div class="col-6" >
                                        <select id="idanioFin" name="anioFin" class="form-control" onchange="cambioAnioFin(this)">
                                            @foreach($anios as $anio)
                                                <option value="{{$anio->anio}}">{{$anio->anio}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div >
                                        <select id="inputState" name="mesFin" class="form-control" onchange="cambioMesFin(this)">
                                            @foreach($meses as $mes)
                                                <option value="{{$mes[1]}}">{{$mes[0]}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="card cardGraficaWelcome" >
                    <div class="row titulosPanel">
                        <div class="col-5">
                            <div class="card-body">
                                <h5 class="card-title text-center">¿Dias o Meses?</h5>
                                <div >
                                    <select id="inputState" name="ejeX" class="form-control" onchange="cambioEjeX(this)">
                                        <option value="1" >Meses</option>
                                        <option value="2">Días</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title text-center">Categoría</h5>
                                <div class="col-13">
                                    <select id="inputState" name="categoria" class="form-control" onchange="cambioCategoria(this)">
                                        <option value="Todas">Todas</option>
                                        @foreach($categorias as $categoria)
                                            <option value="{{$categoria->categoria}}">{{$categoria->categoria}}</option>
                                        @endforeach
                                    </select>
                                  </div>
                              </div>
    
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title text-center">Estadísticos</h5>
                                <div >
                                    <select id="inputState" name="estadistico" class="form-control" onchange="cambioEstadisticoComparativas(this)">
                                        <option value="prom">Promedio</option>
                                        <option value="total" >Total</option>
                                        <option value="max">Máximo</option>
                                        <option value="min" >Mínimo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="espacioGrafica" ></section>
            <div class="row col-13">
                <div class="form-group col-md-2 graficaColums titulosPanel" >
                    <h5 >Parámetros </h5> 
                    <input type="checkbox" name="checkins" id="checkins" value="checkins" onchange="seleccionarFilas(this)">
                    <label for="checkins"> Checkins</label><br>
                    <input type="checkbox" name="checkouts" id="checkouts" value="checkouts" onchange="seleccionarFilas(this)">
                    <label for="checkouts"> Checkouts</label><br>
                    <input type="checkbox" name="pernoctaciones" id="pernoctaciones" value="pernoctaciones" onchange="seleccionarFilas(this)">
                    <label for="pernoctaciones"> Pernoctaciones</label><br>
                    <input type="checkbox" name="nacionales" id="nacionales" value="nacionales" onchange="seleccionarFilas(this)">
                    <label for="nacionales"> Nacionales</label><br>
                    <input type="checkbox" name="extranjeros" id="extranjeros" value="extranjeros" onchange="seleccionarFilas(this)">
                    <label for="extranjeros"> Extranjeros</label><br>
                    <input type="checkbox" name="habitaciones_ocupadas" id="habitaciones_ocupadas" value="habitaciones_ocupadas" onchange="seleccionarFilas(this)">
                    <label for="habitaciones_ocupadas"> Hab. Ocupadas</label><br>
                    <input type="checkbox" name="habitaciones_disponibles" id="habitaciones_disponibles" value="habitaciones_disponibles" onchange="seleccionarFilas(this)">
                    <label for="habitaciones_disponibles"> Hab. Disponibles</label><br>
                    <input type="checkbox" name="ventas_netas" id="ventas_netas" value="ventas_netas" onchange="seleccionarFilas(this)">
                    <label for="ventas_netas"> Ventas Netas</label>
                    <hr>
                    <input type="checkbox" name="tarifa_promedio" id="tarifa_promedio" value="tarifa_promedio" onchange="seleccionarFilas(this)">
                    <label for="tarifa_promedio"> Tarifa Prom. Hab.</label><br>
                    <input type="checkbox" name="TAR_PER" id="TAR_PER" value="TAR_PER" onchange="seleccionarFilas(this)">
                    <label for="TAR_PER"> Tarifa Prom. Per.</label><br> 
                    <input type="checkbox" name="porcentaje_ocupacion" id="porcentaje_ocupacion" value="porcentaje_ocupacion" onchange="seleccionarFilas(this)" checked>
                    <label for="porcentaje_ocupacion"> Porcent. Ocupación</label><br>
                    <input type="checkbox" name="revpar" id="revpar" value="revpar" onchange="seleccionarFilas(this)">
                    <label for="revpar"> REVPAR</label><br> 
                </div>
                <div class="form-group col-md-9">
                    <br>
                    <canvas id="graficaMeses" width="1500" height="600"></canvas>
                </div>
            </div>
        </section>


        <section class="graficaWelcome">
            <section class="tituloGrafica" ><h2>DATOS HOTELEROS POR CATEGORÍA</h2></section>
            <section class="lineatituloGrafica" ></section>
                <div class="form-row align-items-center"> 
                    <div class="row row-cols-3 col-lg-12 pl-5 text-left titulosPanel2" >
                        <label> <h5>Año</h5></label>
                        <label> <h5 class="tituloEstadisticos">Estadísticos</h5></label>
                    </div>
                    <div class="row row-cols-2 col-3 ml-2 p-3 inicio">
                        <div class="row ml-3">
                            <select id="idanioInicio" name="anio" class="form-control" onchange="cambioAnio(this)">
                                @foreach($anios as $anio)
                                    <option value="{{$anio->anio}}">{{$anio->anio}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row row-cols-2 col-3 mr-2 ml-2 inicio">
                        <div class="row mr-2">
                            <select id="inputState" name="estadistico" class="form-control" onchange="cambioEstadistico(this)">
                                <option value="prom">Promedio</option>
                                <option value="total" >Total</option>
                                <option value="max">Máximo</option>
                                <option value="min" >Mínimo</option>
                            </select>
                        </div>
                    </div>
                </div>

                <section class="espacioGrafica" ></section>
                
                <div class="row col-13">
                    <div class="form-group col-md-2 graficaColums  titulosPanel" >
                        <h5 >Parámetros</h5>
                        <input type="checkbox" name="checkins2" id="checkins2" value="checkins" onchange="seleccionarFilas2(this)">
                        <label for="checkins2"> Checkins</label><br>
                        <input type="checkbox" name="checkouts2" id="checkouts2" value="checkouts" onchange="seleccionarFilas2(this)">
                        <label for="checkouts2"> Checkouts</label><br>
                        <input type="checkbox" name="pernoctaciones2" id="pernoctaciones2" value="pernoctaciones" onchange="seleccionarFilas2(this)">
                        <label for="pernoctaciones2"> Pernoctaciones</label><br>
                        <input type="checkbox" name="nacionales2" id="nacionales2" value="nacionales" onchange="seleccionarFilas2(this)">
                        <label for="nacionales2"> Nacionales</label><br>
                        <input type="checkbox" name="extranjeros2" id="extranjeros2" value="extranjeros" onchange="seleccionarFilas2(this)">
                        <label for="extranjeros2"> Extranjeros</label><br>
                        <input type="checkbox" name="habitaciones_ocupadas2" id="habitaciones_ocupadas2" value="habitaciones_ocupadas" onchange="seleccionarFilas2(this)">
                        <label for="habitaciones_ocupadas2"> Hab. Ocupadas</label><br>
                        <input type="checkbox" name="habitaciones_disponibles2" id="habitaciones_disponibles2" value="habitaciones_disponibles" onchange="seleccionarFilas2(this)">
                        <label for="habitaciones_disponibles2"> Hab. Disponibles</label><br>
                        <input type="checkbox" name="ventas_netas2" id="ventas_netas2" value="ventas_netas" onchange="seleccionarFilas2(this)">
                        <label for="ventas_netas2"> Ventas Netas</label>
                        <hr>
                        <input type="checkbox" name="tarifa_promedio2" id="tarifa_promedio2" value="tarifa_promedio" onchange="seleccionarFilas2(this)">
                        <label for="tarifa_promedio2"> Tarifa Prom. Hab.</label><br>
                        <input type="checkbox" name="TAR_PER2" id="TAR_PER2" value="TAR_PER" onchange="seleccionarFilas2(this)">
                        <label for="TAR_PER2"> Tarifa Prom. Per.</label><br>
                        <input type="checkbox" name="porcentaje_ocupacion2" id="porcentaje_ocupacion2" value="porcentaje_ocupacion" onchange="seleccionarFilas2(this)" checked>
                        <label for="porcentaje_ocupacion2"> Porcent. Ocupación</label><br>
                        <input type="checkbox" name="revpar2" id="revpar2" value="revpar" onchange="seleccionarFilas2(this)">
                        <label for="revpar2"> REVPAR</label><br>
                    </div>
                    <div class="form-group col-md-9">
                        <br>
                        <canvas id="barChartCategorias" width="1500" height="600"></canvas>
                    </div>
                </div>
        </section>

      
        
        <form action="" method="POST">
            @csrf
        </form>
        
</section>

@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>


 <!--Flecha-->
 <script>
    $(document).ready(function(){ //Hacia arriba
        irArriba();
    });

    function irArriba(){
        $('.flechaInicio').click(function(){ 
            $('body,html').animate({ scrollTop:'10px' },100); 
        });
        $(window).scroll(function(){
            if($(this).scrollTop() > 0){ 
                $('.flechaInicio').slideDown(600); 
            }else{ 
                $('.flechaInicio').slideUp(600);
            }
        });
        $('.flechaInicio').click(function(){ $('body,html').animate({ scrollTop:'0px' },2); });
        }
</script>

<script>
    
    var mesesGrafica1 = [];

    var dataCheckins = [];
    var dataCheckouts = [];
    var dataPernoctaciones = [];
    var dataNacionales = [];
    var dataExtranjeros = [];
    var dataHabOcupadas = [];
    var dataHabDisponibles = [];
    var dataTarPromHab = [];
    var dataTarPromPer = [];
    var dataVentasNetas = [];
    var dataPorcOcupacion = [];
    var dataREVPAR = [];


    var dataCheckins2 = [];
    var dataCheckouts2 = [];
    var dataPernoctaciones2 = [];
    var dataNacionales2 = [];
    var dataExtranjeros2 = [];
    var dataHabOcupadas2 = [];
    var dataHabDisponibles2 = [];
    var dataTarPromHab2 = [];
    var dataTarPromPer2 = [];
    var dataVentasNetas2 = [];
    var dataPorcOcupacion2 = [];
    var dataREVPAR2 = [];


    var porcentaje_ocupacion = {
                label: 'porcentaje_ocupacion',
                data: dataPorcOcupacion,
                backgroundColor: 'rgb(255,255,255,0.20)',
                borderColor: 'rgba(211, 214, 30, 0.74)',
                borderWidth: 3
            };

            
    var columnas = [porcentaje_ocupacion];

    var mesInicioGrafica1 = '{{$mesInicio}}';
    var mesFinGrafica1 = '{{$mesFin}}';
    var anioInicioGrafica1 = '{{$anioInicio}}';
    var anioFinGrafica1 = '{{$anioFin}}';
    var nomColumnaGrafica1 = '{{$columna}}';
    var nomCategoria = 'Todas';
    var ejeX = 1;
    var estadistico = 'prom'
    var anio = '{{$anioFin}}';
    var estadisticoBarras = 'prom'
    
    
    var ctx2 = document.getElementById('graficaMeses').getContext('2d');
    var graficaMeses = new Chart(ctx2, {
        type: "line",
        data: {
            labels: mesesGrafica1,
            datasets: columnas
        },
        options: {
            capBezierPoints: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
        
    });

    
    var porcentaje_ocupacion2 = {
                label: 'porcentaje_ocupacion',
                backgroundColor: "rgba(211, 214, 30,0.6)",
                borderColor: "rgba(211, 214, 30)",
                borderWidth: 2,
                data: dataPorcOcupacion2
            };

    var columnas2 = [porcentaje_ocupacion2];

    var ctx = document.getElementById('barChartCategorias').getContext('2d');
    var barChartCategorias = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["5 Estrellas", "4 Estrellas", "3 Estrellas", "2 Estrellas", "1 Estrella"],
            datasets: columnas2
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
        
        consultaMeses();
        consultaBarras();
        
    });

    function consultaMeses(){
        $.ajax({
            url:'{{url("/")}}',
            method: 'POST',
            data:{
                mesInicio: mesInicioGrafica1,
                mesFin: mesFinGrafica1,
                anioInicio: anioInicioGrafica1,
                anioFin: anioFinGrafica1,
                columna: nomColumnaGrafica1,
                categoria: nomCategoria,
                estadistico: estadistico,
                ejeX: ejeX,
                _token: $('input[name="_token"]').val()
            }
        }).done(function(res){

            var arreglo = JSON.parse(res);
            
            for(var i=0;i<arreglo.length;i++){

                if(ejeX == 1 ){
                    if (arreglo[i].mes == 1)
                        nombreMes = "Enero-"+arreglo[i].anio;
                    else if (arreglo[i].mes == 2)
                        nombreMes = "Febrero-"+arreglo[i].anio;
                    else if (arreglo[i].mes == 3)
                        nombreMes = "Marzo-"+arreglo[i].anio;
                    else if (arreglo[i].mes == 4)
                        nombreMes = "Abril-"+arreglo[i].anio;
                    else if (arreglo[i].mes == 5)
                        nombreMes = "Mayo-"+arreglo[i].anio;
                    else if (arreglo[i].mes == 6)
                        nombreMes = "Junio-"+arreglo[i].anio;
                    else if (arreglo[i].mes == 7)
                        nombreMes = "Julio-"+arreglo[i].anio;
                    else if (arreglo[i].mes == 8)
                        nombreMes = "Agosto-"+arreglo[i].anio;
                    else if (arreglo[i].mes == 9)
                        nombreMes = "Septiembre-"+arreglo[i].anio;
                    else if (arreglo[i].mes == 10)
                        nombreMes = "Octubre-"+arreglo[i].anio;
                    else if (arreglo[i].mes == 11)
                        nombreMes = "Noviembre-"+arreglo[i].anio;
                    else 
                        nombreMes = "Diciembre-"+arreglo[i].anio;
                    
                    mesesGrafica1.push(nombreMes);
                }else{
                    mesesGrafica1.push(arreglo[i].fecha);
                }

                    

                dataCheckins.push(arreglo[i].checkins);
                dataCheckouts.push(arreglo[i].checkouts);
                dataPernoctaciones.push(arreglo[i].pernoctaciones);
                dataNacionales.push(arreglo[i].nacionales);
                dataExtranjeros.push(arreglo[i].extranjeros);
                dataHabOcupadas.push(arreglo[i].habitaciones_ocupadas);
                dataHabDisponibles.push(arreglo[i].habitaciones_disponibles);
                dataTarPromHab.push(arreglo[i].tarifa_promedio);
                dataTarPromPer.push(arreglo[i].tar_per);
                dataVentasNetas.push(arreglo[i].ventas_netas);
                dataPorcOcupacion.push(arreglo[i].porcentaje_ocupacion);
                dataREVPAR.push(arreglo[i].revpar);
            }
            
            for(var i=0;i<columnas.length;i++){
                if(graficaMeses.data.datasets[i].label == 'porcentaje_ocupacion'){
                    graficaMeses.data.datasets[i].data = dataPorcOcupacion;
                }
                if(graficaMeses.data.datasets[i].label == 'checkins'){
                    graficaMeses.data.datasets[i].data = dataCheckins;
                }
                if(graficaMeses.data.datasets[i].label == 'checkouts'){
                    graficaMeses.data.datasets[i].data = dataCheckouts;
                }
                if(graficaMeses.data.datasets[i].label == 'pernoctaciones'){
                    graficaMeses.data.datasets[i].data = dataPernoctaciones;
                }
                if(graficaMeses.data.datasets[i].label == 'nacionales'){
                    graficaMeses.data.datasets[i].data = dataNacionales;
                }
                if(graficaMeses.data.datasets[i].label == 'extranjeros'){
                    graficaMeses.data.datasets[i].data = dataExtranjeros;
                }
                if(graficaMeses.data.datasets[i].label == 'habitaciones_ocupadas'){
                    graficaMeses.data.datasets[i].data = dataHabOcupadas;
                }
                if(graficaMeses.data.datasets[i].label == 'habitaciones_disponibles'){
                    graficaMeses.data.datasets[i].data = dataHabDisponibles;
                }
                if(graficaMeses.data.datasets[i].label == 'tarifa_promedio'){
                    graficaMeses.data.datasets[i].data = dataTarPromHab;
                }
                if(graficaMeses.data.datasets[i].label == 'TAR_PER'){
                    graficaMeses.data.datasets[i].data = dataTarPromPer;
                }
                if(graficaMeses.data.datasets[i].label == 'ventas_netas'){
                    graficaMeses.data.datasets[i].data = dataVentasNetas;
                }
                if(graficaMeses.data.datasets[i].label == 'revpar'){
                    graficaMeses.data.datasets[i].data = dataREVPAR;
                }
                
            }
        
            graficaMeses.data.labels = mesesGrafica1;
            graficaMeses.update();
            
        });

    }

    function consultaBarras(){

        $.ajax({
            url:'{{url("/barra")}}',
            method: 'POST',
            data:{
                anio: anio,
                columna: nomColumnaGrafica1,
                estadistico: estadisticoBarras,
                _token: $('input[name="_token"]').val()
            }
        }).done(function(res){
            
            var arreglo = JSON.parse(res);
            
            for(var i=0;i<arreglo.length;i++){
                
                dataCheckins2.push(arreglo[i].checkins);
                dataCheckouts2.push(arreglo[i].checkouts);
                dataPernoctaciones2.push(arreglo[i].pernoctaciones);
                dataNacionales2.push(arreglo[i].nacionales);
                dataExtranjeros2.push(arreglo[i].extranjeros);
                dataHabOcupadas2.push(arreglo[i].habitaciones_ocupadas);
                dataHabDisponibles2.push(arreglo[i].habitaciones_disponibles);
                dataTarPromHab2.push(arreglo[i].tarifa_promedio);
                dataTarPromPer2.push(arreglo[i].tar_per);
                dataVentasNetas2.push(arreglo[i].ventas_netas);
                dataPorcOcupacion2.push(arreglo[i].porcentaje_ocupacion);
                dataREVPAR2.push(arreglo[i].revpar);

            }
            
            

            for(var i=0;i<columnas2.length;i++){
                if(barChartCategorias.data.datasets[i].label == 'porcentaje_ocupacion'){
                    
                    barChartCategorias.data.datasets[i].data = dataPorcOcupacion2;
                }
                if(barChartCategorias.data.datasets[i].label == 'checkins'){
                    barChartCategorias.data.datasets[i].data = dataCheckins2;
                }
                if(barChartCategorias.data.datasets[i].label == 'checkouts'){
                    barChartCategorias.data.datasets[i].data = dataCheckouts2;
                }
                if(barChartCategorias.data.datasets[i].label == 'pernoctaciones'){
                    barChartCategorias.data.datasets[i].data = dataPernoctaciones2;
                }
                if(barChartCategorias.data.datasets[i].label == 'nacionales'){
                    barChartCategorias.data.datasets[i].data = dataNacionales2;
                }
                if(barChartCategorias.data.datasets[i].label == 'extranjeros'){
                    barChartCategorias.data.datasets[i].data = dataExtranjeros2;
                }
                if(barChartCategorias.data.datasets[i].label == 'habitaciones_ocupadas'){
                    barChartCategorias.data.datasets[i].data = dataHabOcupadas2;
                }
                if(barChartCategorias.data.datasets[i].label == 'habitaciones_disponibles'){
                    barChartCategorias.data.datasets[i].data = dataHabDisponibles2;
                }
                if(barChartCategorias.data.datasets[i].label == 'tarifa_promedio'){
                    barChartCategorias.data.datasets[i].data = dataTarPromHab2;
                }
                if(barChartCategorias.data.datasets[i].label == 'TAR_PER'){
                    barChartCategorias.data.datasets[i].data = dataTarPromPer2;
                }
                if(barChartCategorias.data.datasets[i].label == 'ventas_netas'){
                    barChartCategorias.data.datasets[i].data = dataVentasNetas2;
                }
                if(barChartCategorias.data.datasets[i].label == 'revpar'){
                    barChartCategorias.data.datasets[i].data = dataREVPAR2;
                }
                
            }
            
            barChartCategorias.update();

        });

    }

    function limpiarArreglosGraficaMeses(){
        mesesGrafica1 = [];
        dataCheckins = [];
        dataCheckouts = [];
        dataPernoctaciones = [];
        dataNacionales = [];
        dataExtranjeros = [];
        dataHabOcupadas = [];
        dataHabDisponibles = [];
        dataTarPromHab = [];
        dataTarPromPer = [];
        dataVentasNetas = [];
        dataPorcOcupacion = [];
        dataREVPAR = [];
    }

    function cambioMesInicio(val){

        limpiarArreglosGraficaMeses()

        mesInicioGrafica1 = val.value;
        
        consultaMeses();
        
    }

    function cambioMesFin(val){
        
        limpiarArreglosGraficaMeses()

        mesFinGrafica1 = val.value;
        
        consultaMeses();
    }

    function cambioAnioInicio(val){
        
        limpiarArreglosGraficaMeses()

        anioInicioGrafica1 = val.value;
        
        consultaMeses();
        
    }

    function cambioAnioFin(val){
        
        limpiarArreglosGraficaMeses()

        anioFinGrafica1 = val.value;
        
        consultaMeses();
    }
   

    function cambioCategoria(val){

        limpiarArreglosGraficaMeses()

        nomCategoria = val.value;
        
        consultaMeses();
    }

    function cambioEjeX(val){
        
        limpiarArreglosGraficaMeses()

        ejeX = val.value;
        
        consultaMeses();
    }

    function cambioEstadisticoComparativas(val){
        
        limpiarArreglosGraficaMeses()

        if(val.value == 'total'){

            document.getElementById("tarifa_promedio").checked = false;
            document.getElementById("TAR_PER").checked = false;
            document.getElementById("porcentaje_ocupacion").checked = false;
            document.getElementById("revpar").checked = false;

            document.getElementById("tarifa_promedio").disabled = true;
            document.getElementById("TAR_PER").disabled = true;
            document.getElementById("porcentaje_ocupacion").disabled = true;
            document.getElementById("revpar").disabled = true;

            for(var i=0;i<columnas.length;i++){
                
                if(columnas[i].label == 'tarifa_promedio' || columnas[i].label == 'TAR_PER'|| columnas[i].label == 'porcentaje_ocupacion'|| columnas[i].label == 'revpar'){
                    columnas.splice(i, 1);
                    i--;
                }

            }

            graficaMeses.update();


        }else{
            
            document.getElementById("tarifa_promedio").disabled = false;
            document.getElementById("TAR_PER").disabled = false;
            document.getElementById("porcentaje_ocupacion").disabled = false;
            document.getElementById("revpar").disabled = false;

        }

        estadistico = val.value;
        
        consultaMeses();
    }

    function cambioAnio(val){
        dataCheckins2 = [];
        dataCheckouts2 = [];
        dataPernoctaciones2 = [];
        dataNacionales2 = [];
        dataExtranjeros2 = [];
        dataHabOcupadas2 = [];
        dataHabDisponibles2 = [];
        dataTarPromHab2 = [];
        dataTarPromPer2 = [];
        dataVentasNetas2 = [];
        dataPorcOcupacion2 = [];
        dataREVPAR2 = [];

        anio = val.value;
        
        consultaBarras();
    }

    function cambioEstadistico(val){
        dataCheckins2 = [];
        dataCheckouts2 = [];
        dataPernoctaciones2 = [];
        dataNacionales2 = [];
        dataExtranjeros2 = [];
        dataHabOcupadas2 = [];
        dataHabDisponibles2 = [];
        dataTarPromHab2 = [];
        dataTarPromPer2 = [];
        dataVentasNetas2 = [];
        dataPorcOcupacion2 = [];
        dataREVPAR2 = [];

        if(val.value == 'total'){

            document.getElementById("tarifa_promedio2").checked = false;
            document.getElementById("TAR_PER2").checked = false;
            document.getElementById("porcentaje_ocupacion2").checked = false;
            document.getElementById("revpar2").checked = false;

            document.getElementById("tarifa_promedio2").disabled = true;
            document.getElementById("TAR_PER2").disabled = true;
            document.getElementById("porcentaje_ocupacion2").disabled = true;
            document.getElementById("revpar2").disabled = true;

            for(var i=0;i<columnas2.length;i++){
                
                if(columnas2[i].label == 'tarifa_promedio' || columnas2[i].label == 'TAR_PER'|| columnas2[i].label == 'porcentaje_ocupacion'|| columnas2[i].label == 'revpar'){
                    columnas2.splice(i, 1);
                    i--;
                }

            }

            barChartCategorias.update();


        }else{
            document.getElementById("tarifa_promedio2").disabled = false;
            document.getElementById("TAR_PER2").disabled = false;
            document.getElementById("porcentaje_ocupacion2").disabled = false;
            document.getElementById("revpar2").disabled = false;

        }

        estadisticoBarras = val.value;
        
        consultaBarras();
    }

    function seleccionarFilas(val){
        var valor = val.value;
        var datos;
        var bandera;
        var color;
        
        if(valor == 'checkins'){
            color = 'rgba(0, 0, 0)';
            datos = dataCheckins;
            bandera = document.getElementById('checkins').checked;
        }else if(valor == 'checkouts'){
            color = 'rgba(255, 0, 0)';
            datos = dataCheckouts;
            bandera = document.getElementById('checkouts').checked;
        }else if(valor == 'pernoctaciones'){
            color = 'rgba(110, 54, 54)';
            datos = dataPernoctaciones;
            bandera = document.getElementById('pernoctaciones').checked;
        }else if(valor == 'nacionales'){
            color = 'rgba(131, 119, 119)';
            datos = dataNacionales;
            bandera = document.getElementById('nacionales').checked;
        }else if(valor == 'extranjeros'){
            color = 'rgba(223, 172, 32)';
            datos = dataExtranjeros;
            bandera = document.getElementById('extranjeros').checked;
        }else if(valor == 'habitaciones_ocupadas'){
            color = 'rgba(109, 209, 84)';
            datos = dataHabOcupadas;
            bandera = document.getElementById('habitaciones_ocupadas').checked;
        }else if(valor == 'habitaciones_disponibles'){
            color = 'rgba(39, 215, 228)';
            datos = dataHabDisponibles;
            bandera = document.getElementById('habitaciones_disponibles').checked;
        }else if(valor == 'tarifa_promedio'){
            color = 'rgba(41, 77, 175)';
            datos = dataTarPromHab;
            bandera = document.getElementById('tarifa_promedio').checked;
        }else if(valor == 'TAR_PER'){
            color = 'rgba(99, 41, 175)';
            datos = dataTarPromPer;
            bandera = document.getElementById('TAR_PER').checked;
        }else if(valor == 'ventas_netas'){
            color = 'rgba(216, 44, 193)';
            datos = dataVentasNetas;
            bandera = document.getElementById('ventas_netas').checked;
        }else if(valor == 'porcentaje_ocupacion'){
            color = 'rgba(211, 214, 30)';
            datos = dataPorcOcupacion;
            bandera = document.getElementById('porcentaje_ocupacion').checked;
        }else if(valor == 'revpar'){
            color = 'rgba(19, 190, 153)';
            datos = dataREVPAR;
            bandera = document.getElementById('revpar').checked;
        }

        var aux = {
            label: valor,
            data: datos,
            backgroundColor: 'rgb(255,255,255,0.01)',
            borderColor: color,
            borderWidth: 3
        };
        
        if(bandera){

            columnas.push(aux);
            graficaMeses.update();


        }else{

            
            for(var i=0;i<columnas.length;i++){
                
                if(columnas[i].label == valor){
                    columnas.splice(i, 1);
                }

            }
            
            graficaMeses.update();
            
        }
        
    }

    function seleccionarFilas2(val){
        var valor = val.value;
        var datos;
        var bandera;
        var color;
        var borde;
        
        if(valor == 'checkins'){
            color = 'rgba(0, 0, 0,0.6)';
            borde = 'rgba(0, 0, 0)';
            datos = dataCheckins2;
            bandera = document.getElementById('checkins2').checked;
        }else if(valor == 'checkouts'){
            color = 'rgba(255, 0, 0,0.6)';
            borde = 'rgba(255, 0, 0)';
            datos = dataCheckouts2;
            bandera = document.getElementById('checkouts2').checked;
        }else if(valor == 'pernoctaciones'){
            color = 'rgba(110, 54, 54,0.6)';
            borde = 'rgba(110, 54, 54)';
            datos = dataPernoctaciones2;
            bandera = document.getElementById('pernoctaciones2').checked;
        }else if(valor == 'nacionales'){
            color = 'rgba(131, 119, 119,0.6)';
            borde = 'rgba(131, 119, 119)';
            datos = dataNacionales2;
            bandera = document.getElementById('nacionales2').checked;
        }else if(valor == 'extranjeros'){
            color = 'rgba(223, 172, 32,0.6)';
            borde = 'rgba(223, 172, 32)';
            datos = dataExtranjeros2;
            bandera = document.getElementById('extranjeros2').checked;
        }else if(valor == 'habitaciones_ocupadas'){
            color = 'rgba(109, 209, 84,0.6)';
            borde = 'rgba(109, 209, 84)';
            datos = dataHabOcupadas2;
            bandera = document.getElementById('habitaciones_ocupadas2').checked;
        }else if(valor == 'habitaciones_disponibles'){
            color = 'rgba(39, 215, 228,0.6)';
            borde = 'rgba(39, 215, 228)';
            datos = dataHabDisponibles2;
            bandera = document.getElementById('habitaciones_disponibles2').checked;
        }else if(valor == 'tarifa_promedio'){
            color = 'rgba(41, 77, 175,0.6)';
            borde = 'rgba(41, 77, 175)';
            datos = dataTarPromHab2;
            bandera = document.getElementById('tarifa_promedio2').checked;
        }else if(valor == 'TAR_PER'){
            color = 'rgba(99, 41, 175,0.6)';
            borde = 'rgba(99, 41, 175)';
            datos = dataTarPromPer2;
            bandera = document.getElementById('TAR_PER2').checked;
        }else if(valor == 'ventas_netas'){
            color = 'rgba(216, 44, 193,0.6)';
            borde = 'rgba(216, 44, 193)';
            datos = dataVentasNetas2;
            bandera = document.getElementById('ventas_netas2').checked;
        }else if(valor == 'porcentaje_ocupacion'){
            color = 'rgba(211, 214, 30,0.6)';
            borde = 'rgba(211, 214, 30)';
            datos = dataPorcOcupacion2;
            bandera = document.getElementById('porcentaje_ocupacion2').checked;
        }else if(valor == 'revpar'){
            color = 'rgba(19, 190, 153,0.6)';
            borde = 'rgba(19, 190, 153)';
            datos = dataREVPAR2;
            bandera = document.getElementById('revpar2').checked;
        }

        var aux = {
            label: valor,
            backgroundColor: color,
            borderColor: borde,
            borderWidth: 2,
            data: datos
        };
        
        if(bandera){

            columnas2.push(aux);
            barChartCategorias.update();


        }else{

            
            for(var i=0;i<columnas2.length;i++){
                
                if(columnas2[i].label == valor){
                    columnas2.splice(i, 1);
                }

            }
            
            
            barChartCategorias.update();
            
        }
        
    }

</script>

@endsection