@extends('layouts.app')

@section('content')
    <section class="fondo">
        <nav class="navAdmin">
        <a style="background-color:#ece1cd; color: #000000;font-weight: 800;" href="{{url('home/visualizarArchivos')}}">
            <img src="{{ asset('imgs/vision.png')}}">Visualizar Archivos</a>
            <a href="{{url('home/archivos')}}"><img src="{{ asset('imgs/subir.png')}}">Cargar Datos</a>      
            <a href="{{url('home/metricas')}}"><img src="{{ asset('imgs/metrica.png')}}">Métricas</a>
            <a href="{{url('home/gestionUsuarios')}}"><img src="{{ asset('imgs/usuario.png')}}">Gestionar Usuarios</a>
        </nav>

        <section class="espacioVisualizarA">
            <h3>Establecimientos Existentes</h3>
            <!-- Tabla de Establecimientos-->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="card">
                        <div class="card-header"> {{__('Lista de Establecimientos')}}</div>
                        <div class="card-body">
                            <div class="table-responsive table-striped ">
                                <table class="table col-12 table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Clasificación</th>
                                            <th>Categoria</th>
                                            <th>Habitaciones</th>
                                            <th>Plazas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($establecimientos as $establecimiento)
                                            <tr>
                                                <td>{{$establecimiento->id}} </td>
                                                <td>{{$establecimiento->nombre}}</td>
                                                <td>{{$establecimiento->clasificacion}}</td>
                                                <td>{{$establecimiento->categoria}}</td>
                                                <td>{{$establecimiento->habitaciones}}</td>
                                                <td>{{$establecimiento->plazas}}</td>
                                            
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <h3>Registros</h3>

            <form action="{{url('home/visualizarArchivos')}}" method="POST">
            @csrf
                <p>Elige un Establecimiento: 
                <select name="nombre">
                    <option value="" disabled selected >--Elija un establecimiento--</option>
                    @foreach($establecimientos as $establecimiento)
                        <option value="{{$establecimiento->nombre}}">{{$establecimiento->nombre}}</option>
                    @endforeach
                </select>
                </p>
                
                <p>Ver registros desde:</p>
                <input type="date" name="inicio" value="23/12/2020" >
                <p>Ver registros hasta:</p>
                <input type="date" name="fin" value="{{ old('fin') }}">
                <p></p>
                <button type="submit" class="btn btn-primary">Consultar</button>
            </form>

            <!-- Tabla de Registros-->
            <div class="container overflow-auto">
                <div class="row justify-content-center overflow-auto">
                    <!---->
                    <div class="card overflow-auto">
                        <div class="card-header overflow-auto"> {{__('Lista de Registros')}}</div>
                        <div class="card-body overflow-auto">
                            <div class="table-responsive table-striped overflow-auto">
                                <table class="table col-12 table-responsive overflow-auto">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Fecha</th>
                                            <th>Checkins</th>
                                            <th>Checkouts</th>
                                            <th>Pernotaciones</th>
                                            <th>Nacionales</th>
                                            <th>Extranjeros</th>
                                            <th>Hab. Ocupadas</th>
                                            <th>Tarifa Prom.</th>
                                            <th>Ventas Netas</th>
                                            <th>Id Establecimiento</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($registros as $registro)
                                            <tr>
                                                <td>{{$registro->id}} </td>
                                                <td>{{$registro->fecha}}</td>
                                                <td>{{$registro->checkins}}</td>
                                                <td>{{$registro->checkouts}}</td>
                                                <td>{{$registro->pernotaciones}}</td>
                                                <td>{{$registro->nacionales}}</td>
                                                <td>{{$registro->extranjeros}}</td>
                                                <td>{{$registro->habitaciones_ocupadas}}</td>
                                                <td>{{$registro->tarifa_promedio}}</td>
                                                <td>{{$registro->ventas_netas}}</td>
                                                <td>{{$registro->idEstablecimiento}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </section>

@endsection


