@extends('layouts.main')

@section('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
@endsection


@section('contenido')
    <div class="containerTab ">
        <div class="cardV">
            <div class="lineaIzquierda">
                <div class="container principalV">
                    <div class="row">
                        <!--tarjeta 1-->
                        <div class=" tituloCargaArchivos pb-3">
                            <h5 class=" text-aling-center text-black pt-3">CARGA DE ARCHIVOS A LA BASE DE DATOS</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="estiloTabla">
                <div class="card mt-8 ml-0 mr-0">
                    <div class="card-header">
                        Importación de archivos a la base de datos
                    </div>
                    @if ($errors->any())
                        
                        @foreach ($errors->all() as $error)
                            <!-- <li>{{ $error }}</li>-->
                            <script>
                                var texto = "";
                                var cadena = '{{$error}}'.split('/')
                                for (let i = 1; i < cadena.length; i++) {

                                    texto += cadena[i]+"\n";
                                    
                                }
                                
                                swal({
                                    title: cadena[0],
                                    text: texto,
                                    icon: "error",
                                    button: "OK",
                                    });
                            </script> 
                        @endforeach
                    @endif

                    @if($message = Session::get('success'))
                        <script>swal("{!! Session::get('success')!!}",'success')</script>
                    @endif
                    <div class="card-body">
                        <form action="{{ url('import-excel') }}" method="POST" name="importform" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="import_file[]" class="form-control" multiple>
                            <br>
                            <button class="btn btnCargarAr" name="opcion" value="1">Cargar archivo</button>
                            <button class="btn btn-primary  btnProbarAr" name="opcion" value="2">Probar archivo</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <section class="col-6">
            @if($message = Session::get('eliminado'))
                <script>swal("{!! $message !!}",'success')</script>
            @endif
        </section>
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

            $(".btnEliminar").click(function(){
                idEliminar = $(this).data('id');
            });
            $(".btnModalEliminar").click(function(){
                $("#formEli_"+idEliminar).submit();
            });
        });
    </script>



@endsection