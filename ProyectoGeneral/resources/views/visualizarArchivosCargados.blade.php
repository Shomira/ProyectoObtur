@extends('layouts.main')

@section('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
@endsection


@section('contenido')
    <section class="col-6">
        @if($message = Session::get('eliminado'))
            <script>swal("{!! $message !!}",'success')</script>
        @endif
    </section>
    <div class="containerTab">
        
        <div class="container principalV ">
            <div class="row">
                <div class="col-lg-12 text-left">
                    <div class="row">
                        <!--tarjeta 1-->
                        <div class="col-lg-30  col-md-8 mb-4">
                            <div class="card-section2 border rounded p-3">
                                <div class="card-header-s rounded pb-4">
                                    <h5 class="card-header-title text-white pt-3">Lista de Archivos</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
     
            
        <!-- Tabla de Archivos-->        
        <div class="card-body">
            <table class="table table-striped tablaAr" id='t_archivos' >
                <thead>
                    <tr>
                        <td>Nombre</td>
                        <td>Fecha de carga</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($files as $file)
                        <tr>
                            <td>{{$file->nombre}}</td>
                            <td>{{$file->created_at}}</td>
                            <td>
                                <a href="../storage/{{$file->nombre}}" class="btn btn-sm btn-outline-secondary">Descargar</a>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-outline-danger" id="btnEliminar" data-id="{{ $file->id }}" data-toggle="modal" data-target="#modalEliminar">
                                    Eliminar
                                </button>
                                
                                <form action="{{ url('home/visualizarArchivosCargados', $file->id ) }}" method="POST" id="formEli_{{ $file->id }}">
                                    @method('DELETE')
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $file->id }}">
                                    <input type="hidden" name="_method" value="delete">
                                
                                </form>
                                
                            </td>
                        
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    

        <!-- Modal Eliminar Archivos-->
        <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar Archivo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>


                        <div class="modal-body">
                            <h5>¿Desea Eliminar el Archivo?</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-danger" id="btnModalEliminar">Eliminar</button>
                        </div>
                    
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts') 
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>    
    <script>
        $('#t_archivos').DataTable({
            responsive:true,
            autowidth:false,
            dom: 'Blfrtip',
            
            buttons: [
                   
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

    
    <script>
        var idEliminar=0;
        $(document).ready(function(){

            $("#btnEliminar").click(function(){
                idEliminar = $(this).data('id');
            });
            $("#btnModalEliminar").click(function(){
                $("#formEli_"+idEliminar).submit();
            });
        });
    </script>



@endsection