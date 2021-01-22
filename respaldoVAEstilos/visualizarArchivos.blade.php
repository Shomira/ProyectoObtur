@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
	 
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
        @isset ($alerta)
            <script>swal('No existen registros!','Aún no has subido archivos','warning')</script>
        @endisset
           
            <!-- Tabla de Establecimientos-->
            <!--Pone la tabla en uin container-->
       
        <div class="containerTab"  style="margin-top: 1em">
            <div class="card" style="margin: 0 auto;">
                <div class="container principal">
                    <div class="row">
                        <div class="col-lg-12 text-left">
                            <div class="row">
                                <!--tarjeta 1-->
                                <div class="col-lg-30  col-md-8 mb-4">
                                    <div class="card-section border rounded p-3">
                                        <div class="card-header-first rounded pb-4">
                                            <h5 class="card-header-title text-white pt-3">Establecimientos Existentes</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                    <div class="card-body">
                        <table class="table table-striped" style="width: 100%; margin: 0 auto" id='t_establecimientos'>
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
            <!-- Tabla de Registros-->  

        <div class="containerTab" style="margin-top: 2em;">                    
            <div class="card" style="margin: 0 auto">
                <!--panel de Filtros -->
                    <div class="container principal">
                        <div class="row">
                            <div class="col-lg-12 text-left">
                                <div class="row">
                                    <!--tarjeta 1-->
                                    <div class="col-lg-30  col-md-8 mb-4">
                                        <div class="card-section border rounded p-3">
                                            <div class="card-header-first rounded pb-4">
                                                <h5 class="card-header-title text-white pt-3">Registros</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p></p>
                    <form action="{{url('home/visualizarArchivos')}}" method="POST" class="visualizarArchivo" style="margin-left: 2em; margin-bottom: 2em;">
                        @csrf                 
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputState">Elige un Establecimiento: </label>
                                <select id="inputState" class="form-control" name="nombre" required>
                                    <option value="" selected>--Elija un establecimiento--</option>
                                        @foreach($establecimientos as $establecimiento)
                                            <option value="{{$establecimiento->nombre}}">{{$establecimiento->nombre}}</option>
                                        @endforeach
                                        <option value="Todos">TODOS</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Ver Registros desde:</label>
                                <input  type="date" name="inicio" value="23/12/2020"  class="form-control" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Ver registros hasta:</label>
                                <input type="date" name="fin" value="{{ old('fin') }}" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                            </div>
                            <div class="form-group col-md-2">
                                <br>
                            <!-- <button type="submit" class="btn btn-primary" >Consultar</button>-->
                                <input type="submit"  class="btn btn-warning" value="Consultar" style="margin-top: 0.5em;">
                            </div>
                        </div>
                    </form>
                
                <section style="margin: 1.2em; border-bottom: 3px solid black;">
                    <form>
                        <div class="row">
                            <div class="col">
                                <input type="text"  placeholder="" value="Establecimiento" style="border: 0; font-size:large;" >
                                <input type="text"  style="width: 50%;  background: white; border: 0; font-size:large;"  placeholder="{{$filtroEstabl}}" disabled>
                            </div>
                            
                            <div class="col">
                                <input type="text"  style="border: 0; font-size:large;" placeholder="" value="Desde: ">
                                <input type="text"  style="width: 50%;  background: white; border: 0; font-size:large;"  placeholder="{{$desde}}" disabled>
                            </div>
                            <div class="col">
                                <input type="text"  style="border: 0; font-size:large;"  placeholder="" value="Hasta: ">
                                <input type="text"  style="width: 50%;  background: white; border: 0; font-size:large;"   placeholder="{{$hasta}}" disabled >
                            </div>
                        </div>
                    </form>
                    <section class="linea" style=" border-top:4px solid rgba(255, 122, 40, 0.753)"></section>
                </section>
                
                <div class="card-body"  >
                    <table  class="table table-striped" style="width: 100%; margin: 0 auto" id='tabRegistros'>
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
        
    </section>
</section>
@endsection

@section('scripts')
   

    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"> <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script><script src="https://code.jquery.com/jquery-3.5.1.js"></script></script> -->
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script>
        $('#t_establecimientos').DataTable({
            responsive:true,
            autowidth:false,
            dom: 'Blfrtip',
            "lengthMenu": [ 5, 10, 20, 30, 50 ],
            
            buttons: [
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdfHtml5'
                    ],
            "language": {
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "Nada encontrado - disculpa",
                    "info": "Mostrando la página _PAGE_ de _PAGES_",
                    "infoEmpty": "Usuario no encontrado",
                    "infoFiltered": "(filtrado de _MAX_ usuarios totales)",
                    "search": "Buscar:",
                    "paginate": {    
                        "previous" : "Anterior",
                        "next": "Siguiente"   
                                },
                    "buttons":{"copy": "Copiar"}
            }
        
        });
        $('#tabRegistros').DataTable({
            responsive:true,
            autowidth:false,
            dom: 'Blfrtip',
           
            buttons: [
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdfHtml5'
                    ],
            "language": {
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "Nada encontrado - disculpa",
                    "info": "Mostrando la página _PAGE_ de _PAGES_",
                    "infoEmpty": "Usuario no encontrado",
                    "infoFiltered": "(filtrado de _MAX_ usuarios totales)",
                    "search": "Buscar:",
                    "paginate": {    
                        "previous" : "Anterior",
                        "next": "Siguiente"   
                                },
                    "buttons":{"copy": "Copiar"}
            }
        
        });

</script>
@endsection	
