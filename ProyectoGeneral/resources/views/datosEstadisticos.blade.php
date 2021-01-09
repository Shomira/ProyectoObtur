@extends('layouts.app')

@section('content')

    <h2 class="tituloDatos">INDICADORES DE ALOJAMIENTO EN LOJA</h2>
    <section class="menu">
        <nav>
        <a href=""></a>
            <form action="{{url('datosEstadisticos')}}" method="POST">
            @csrf
                <input type="hidden" name="mes" value="1">
                <button type="submit" class="btn btn-primary">Enero</button>
            </form>

            <form action="{{url('datosEstadisticos')}}" method="POST">
            @csrf
                <input type="hidden" name="mes" value="2">
                <button type="submit" class="btn btn-primary">Febrero</button>
            </form>
            
            <form action="{{url('datosEstadisticos')}}" method="POST">
            @csrf
                <input type="hidden" name="mes" value="3">
                <button type="submit" class="btn btn-primary">Marzo</button>
            </form>
            
            <form action="{{url('datosEstadisticos')}}" method="POST">
            @csrf
                <input type="hidden" name="mes" value="4">
                <button type="submit" class="btn btn-primary">Abril</button>
            </form>
            
            <form action="{{url('datosEstadisticos')}}" method="POST">
            @csrf
                <input type="hidden" name="mes" value="5">
                <button type="submit" class="btn btn-primary">Mayo</button>
            </form>
            
            <form action="{{url('datosEstadisticos')}}" method="POST">
            @csrf
                <input type="hidden" name="mes" value="6">
                <button type="submit" class="btn btn-primary">Junio</button>
            </form>
            
            <form action="{{url('datosEstadisticos')}}" method="POST">
            @csrf
                <input type="hidden" name="mes" value="7">
                <button type="submit" class="btn btn-primary">Julio</button>
            </form>
            
            <form action="{{url('datosEstadisticos')}}" method="POST">
            @csrf
                <input type="hidden" name="mes" value="8">
                <button type="submit" class="btn btn-primary">Agosto</button>
            </form>
            
            <form action="{{url('datosEstadisticos')}}" method="POST">
            @csrf
                <input type="hidden" name="mes" value="9">
                <button type="submit" class="btn btn-primary">Septiembre</button>
            </form>
            
            <form action="{{url('datosEstadisticos')}}" method="POST">
            @csrf
                <input type="hidden" name="mes" value="10">
                <button type="submit" class="btn btn-primary">Octubre</button>
            </form>
            
            <form action="{{url('datosEstadisticos')}}" method="POST">
            @csrf
                <input type="hidden" name="mes" value="11">
                <button type="submit" class="btn btn-primary">Noviembre</button>
            </form>
            
            <form action="{{url('datosEstadisticos')}}" method="POST">
            @csrf
                <input type="hidden" name="mes" value="12">
                <button type="submit" class="btn btn-primary">Diciembre</button>
            </form>
            
        </nav>
    </section>

    
    
    <section class="huespedes">
        <h2>Huéspedes</h2>
        <section class="col-3">
            <canvas id="myChart" width="400" height="400"></canvas>
        </section>
    </section>

    <section class=tarifaProm>
        <h2>Tarifa promedio</h2>
        <h4>Por Habitación</h4>
        <h4>{{$tarifas[0]}}</h4>
        <h4>Por Persona</h4>
        <h4>{{$tarifas[1]}}</h4>
        <img style="width: 1000px;" src="{{ asset('imgs/Dehabita.PNG')}}"  alt="">
    </section>

    <section class= "indOcupacion">
        <h2>Indice de Ocupación</h2>
        <h4>{{$ocupacion}}</h4>
        <img  style="width: 1000px;" src="{{ asset('imgs/DePersona.PNG')}}"  alt="">
    </section>

    <section class="revpar">
        <h2>Revpar</h2>
        <h4>{{$revpar}}</h4>
        <img  style="width: 1000px;" src="{{ asset('imgs/DeRevpar.PNG')}}"  alt="">
    </section>

    <section class="revpar">
        <h2>Estadía Promedio</h2>
        <h4>{{$estadiaP}}</h4>
    </section>
    
@endsection


@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Nacionales', 'Extranjeros'],
                datasets: [{
                    label: '# of Votes',
                    data: [{{$arrHuespedes[0]}}, {{$arrHuespedes[1]}} ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            
        });
    </script>

@endsection
