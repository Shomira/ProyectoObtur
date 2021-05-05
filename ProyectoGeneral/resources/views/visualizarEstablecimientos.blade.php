@extends('layouts.main')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
	 
@endsection


@section('contenido')

    @isset ($alerta)
        <script>swal('No existen registros!','Aún no has subido archivos','warning')</script>
    @endisset
        
        <!-- Tabla de Establecimientos-->
        <!--Pone la tabla en uin container-->
    
    <div class="containerTab">
        <div class="cardV">
            <div class="container principalV">
                <div class="row">
                    <div class="col-lg-12 text-left">
                        <div class="row">
                            <!--tarjeta 1-->
                            <div class="col-lg-30  col-md-8 mb-4">
                                <div class="card-section2 border rounded p-3">
                                    <div class="card-header-s rounded pb-4">
                                        <h5 class="card-header-title text-white pt-3">Establecimientos Existentes</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="card-body">
                <table class="table table-striped" id='t_establecimientos'>
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

       
        $('#t_establecimientos').DataTable( {
            responsive:true,
            autowidth:false,
            dom: 'Blfrtip',
            "lengthMenu": [ 5, 10, 20, 30, 50 ],
            
            buttons: [
                    
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
