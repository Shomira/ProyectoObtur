@extends('layouts.main')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
@endsection

@section('contenido')
    <!-- Mensajes de cambios éxito/error-->
    <section class="mensajes">
        <!-- Aviso de Éxito en crear/eliminar un usuario-->
        @if($message = Session::get('Listo'))
            <div class="col-12 alert alert-success alert-dismissable fade show" role="alert">
                <h5>Aviso: </h5>
                <span>{{$message}} </span>
            </div>

        @endif
    </section>
    <!-- Modal Crear Usuario-->
    <div class="modal fade" id="modalAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div  class="modal-header modalHeader">
                    <h5 class="modal-title"  id="exampleModalLabel">Nuevo Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url('home/gestionUsuarios')}}" method="POST">
                @csrf
                    <div class="modal-body">

                        <div class="form-group row">

                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nombre(como estan en los archivos a cargar)" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row">

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                                
                        <div class="form-group row">
                                <select  id="rol" type="text" class="form-control @error('rol') is-invalid @enderror" name="rol" placeholder="Rol" value="{{ old('rol') }}" >
                                <option selected>Elegir rol...</option>
                                <option disable >Establecimiento</option>
                                <option disable >Administrador</option>
                                @error('rol')
                            
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </select>
                        </div>
                            <div class="form-group row">

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">

                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Contraseña" required autocomplete="new-password">
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>  
        <!-- Tabla de usuarios-->  
    <div class="containerTab">  
        <div class="container principalV">
            <div class="row">
                <div class="col-lg-12 text-left">
                    <div class="row">
                        <!--tarjeta 1-->
                        <div class="col-lg-30  col-md-8 mb-4">
                            <div class="card-section2 border rounded p-3">
                                <div class="card-header-s rounded pb-4">
                                    <h5 class="card-header-title text-white pt-3">Lista Usuarios Existentes</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>     
        <!-- Button trigger modal para crear un usuario -->
        <button  type="button" class="btn  text-white crearUs"  data-toggle="modal" data-target="#modalAgregar">
            <img src="{{ asset('imgs/aus1.png')}}">Crear Usuario
        </button>
        <div class="card-body">
            <table id="tabUsuario" class="table table-striped " >
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Nombre</td>
                        <td>Rol</td>
                        <td>Email</td>
                        <td>Eliminar</td>
                        <td>Editar</td>
                        </tr>
                </thead>
                <tbody>
                        @foreach($usuarios as $usuario)
                        <tr>
                            <td> {{$usuario->id}} </td>
                            <td>{{$usuario->name}}</td>
                            <td>{{$usuario->rol}}</td>
                            <td>{{$usuario->email}}</td>
                            <td>
                                <button class="btn btn-danger btnEliminar" value="{{ $usuario->id }}" data-toggle="modal" data-target="#modalEliminar" onclick="eliminar(this)">
                                    <img src="{{ asset('imgs/eliminar.png')}}"></button>
                                                
                            </td>
                            <td>
                                <button class="btn btn-primary btnEditar" value="{{ $usuario->id }}"  data-toggle="modal" data-target="#modalEditar" onclick="editar(this)">
                                    <img src="{{ asset('imgs/ed3.png')}}">
                                </button>
                                <form action="{{ url('home/gestionUsuarios', ['id'=>$usuario->id ]) }}" method="POST" id="formEli_{{ $usuario->id }}">
                                    @csrf
                                        <input type="hidden" name="id" value="{{ $usuario->id }}">
                                        <input type="hidden" name="_method" value="delete">
                                </form>
                            </td>            
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
        <!-- Modal Eliminar Usuarios-->
    <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Desea Eliminar el Usuario?</h5>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger btnModalEliminar">Eliminar</button>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Modal Editar Usuario-->
    <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url('home/gestionUsuarios/edit')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="idEdit">
                        <div class="form-group row">

                            <input id="nameEditar" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nombre exactamente igual como en los archivos" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <input id="emailEditar" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <select id="rolEditar" type="text" class="form-control @error('rol') is-invalid @enderror" name="rol" placeholder="Rol" value="{{ old('rol') }}" required autocomplete="rol">
                                <option selected>Elegir rol...</option>
                                <option disable >Establecimiento</option>
                                <option disable >Administrador</option>
                                @error('rol')            
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
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
        $('#tabUsuario').DataTable({
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
        var idEliminar=0;
        $(document).ready(function(){
            
            @if($message = Session::get('ErrorInsert'))
                $("#modalAgregar").modal('show');
            @endif

            $(".btnModalEliminar").click(function(){
                $("#formEli_"+idEliminar).submit();
            });

        });

        function eliminar(val){
            idEliminar = val.value;
        }
        function editar(val){

            $.ajax({
                url:'{{url("home/gestionUsuarios/datosEditar")}}',
                method: 'POST',
                data:{
                    id: val.value,
                    _token: $('input[name="_token"]').val()
                }
            }).done(function(res){
                
                var arreglo = JSON.parse(res);

                $("#idEdit").val(arreglo[0].id);
                $("#nameEditar").val(arreglo[0].name);
                $("#emailEditar").val(arreglo[0].email);
                $("#rolEditar").val(arreglo[0].rol);

            });
        }

    </script>    
@endsection