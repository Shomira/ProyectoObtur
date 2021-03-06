@extends('layouts.main')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
@endsection

@section('contenido')
    <section class="contened">

        @isset ($alerta)
            <script>swal('No existen registros!','Aún no has subido archivos','warning')</script>
        @endisset
        <div class="lineaIzquierda">
            <div class=" container principalV">
                <div class="row">  
                    <div class=" pb-3">
                        <h5 class=" pt-3">REGISTROS DEL ESTABLECIMIENTO</h5>
                    </div>
                </div>
            </div>
        </div>
        <!--                -->
        <!-- Tabla de Registros-->
        <div class="estiloTablasEsRegistros">   
            <div class="form-row ">
                <form action="{{url('home/visualizarRegistros')}}" method="POST" class="visualizarArchivo">
                
                    <div class="form-row tituloFiltrosGraficasEs">
                        @csrf
                        <div class="col-md-5">
                            <p>Ver registros desde:</p>
                            <div class="input-group"> 
                            <input type="date" name="inicio" value="23/12/2020"  class="form-control" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
                            </div>
                        </div>
                        <div class="col-md-5 ">
                            <p>Ver registros hasta:</p>
                            <div class="input-group">  
                                <input type="date" name="fin" value="{{ old('fin') }}" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <button type="submit" class="btn btnConsultar mt-3">Consultar</button>
                        </div>
                        
                    </div>
                    
                </form>
            </div>
            <!-- Tabla de Registros-->
        
                <div class="smsVisualizarRegistros" >{{$mensaje}}</div>
                
                <div class="card-body">
                    <table class="table tablaAr table-striped" id='t_registros'>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Fecha</th>
                                <th>Id Establecimiento</th>
                                <th>Checkins</th>
                                <th>Checkouts</th>
                                <th>Pernoctaciones</th>
                                <th>Nacionales</th>
                                <th>Extranjeros</th>
                                <th>Hab. Ocupadas</th>
                                <th>Tarifa Prom.</th>
                                <th>Ventas Netas</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($registros as $registro)
                                <tr>
                                    <td>{{$registro->id}} </td>
                                    <td>{{$registro->fecha}}</td>
                                    <td>{{$registro->idEstablecimiento}}</td>
                                    <td>{{$registro->checkins}}</td>
                                    <td>{{$registro->checkouts}}</td>
                                    <td>{{$registro->pernoctaciones}}</td>
                                    <td>{{$registro->nacionales}}</td>
                                    <td>{{$registro->extranjeros}}</td>
                                    <td>{{$registro->habitaciones_ocupadas}}</td>
                                    <td>{{$registro->tarifa_promedio}}</td>
                                    <td>{{$registro->ventas_netas}}</td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                      
               
        
        </div>

    </section>

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>    
    <script>
         
        $('#t_registros').DataTable({
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