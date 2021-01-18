@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
@endsection

@section('content')
<section class="fondo">
    <section class="fondo2">
        <nav class="navAdmin">
        <a style="background: white; color: #000000;font-weight: 800;" href="{{url('home/visualizarArchivos')}}">
            <img src="{{ asset('imgs/vision1.png')}}">Visualizar Archivos</a>
            <a href="{{url('home/archivos')}}"><img src="{{ asset('imgs/sub2.png')}}">Cargar Datos</a>      
            <a href="{{url('home/metricas')}}"><img src="{{ asset('imgs/metrica1.png')}}">Métricas</a>
            <a href="{{url('home/gestionUsuarios')}}"><img src="{{ asset('imgs/group.png')}}">Gestionar Usuarios</a>
        </nav>

        <section class="espacioVisualizarA">

            @isset ($alerta)
                <script>swal('No existen registros!','Aún no has subido archivos','warning')</script>
            @endisset

            <h3>Establecimientos Existentes</h3>
            <!-- Tabla de Establecimientos-->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="card">
                        <div class="card-header"> {{__('Lista de Establecimientos')}}</div>
                        <div class="card-body">
                            <div class="table-responsive table-striped ">
                                <table class="table col-12 table-responsive" id='t_establecimientos'>
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
        <!--                -->
        
        <form action="{{url('home/visualizarArchivos')}}" method="POST" class="visualizarArchivo">
            
            <div class="form-row">
                @csrf
                <p>Elige un Establecimiento: 
                <select name="nombre" required>
                    <option  value="" disabled selected >--Elija un establecimiento--</option>
                    @foreach($establecimientos as $establecimiento)
                        <option value="{{$establecimiento->nombre}}">{{$establecimiento->nombre}}</option>
                    @endforeach
                    <option value="Todos">TODOS</option>

                </select>
                </p> 
                <div class="col-md-5 mb-2">
    
                    <p>Ver registros desde:</p>
                    <div class="input-group"> 
                    <input type="date" name="inicio" value="23/12/2020"  class="form-control" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
                    </div>
                </div>
                <div class="col-md-5 mb-2">
                    <p>Ver registros hasta:</p>
                    <div class="input-group">  
                        <input type="date" name="fin" value="{{ old('fin') }}" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Consultar</button>
            </div>
            
        </form>
        <!--                -->

            <!-- Tabla de Registros-->
            <div class="container overflow-auto">

                <div class="row justify-content-center overflow-auto">
                    <!---->
                    <div class="card overflow-auto">
                        <div class="card-header overflow-auto"> {{$mensaje}}</div>
                        <div class="card-body overflow-auto">
                            <div class="table-responsive table-striped overflow-auto">
                                <table class="table col-12 table-responsive overflow-auto" id='t_registros'>
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Fecha</th>
                                            <th>Checkins</th>
                                            <th>Checkouts</th>
                                            <th>Pernoctaciones</th>
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
                                                <td>{{$registro->pernoctaciones}}</td>
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
</section>

@endsection


@section('scripts')
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script>
        $('#t_establecimientos').DataTable({responsive:true,autowidth:false});
        $('#t_registros').DataTable({responsive:true,autowidth:false});
    
    </script>
@endsection	
