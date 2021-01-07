@extends('layouts.app')

@section('content')

<section class="fondo">
    <nav class="navAdmin">
        <a href="{{url('home/visualizarArchivos')}}"><img src="{{ asset('imgs/vision.png')}}">Visualizar Archivos</a>
        <a href="{{url('home/archivos')}}"><img src="{{ asset('imgs/subir.png')}}">Cargar Datos</a>
        <a href="{{url('home/metricas')}}"><img src="{{ asset('imgs/metrica.png')}}">Métricas</a>
        <a style="background-color:#ece1cd; color: #000000 ;font-weight: 800;" href="{{url('home/gestionUsuarios')}}"><img src="{{ asset('imgs/usuario.png')}}">Gestionar Usuarios</a>
    </nav>
    

    <section class="espacioUsuarios">

        <!-- Mensajes de cambios éxito/error-->
        <section class="mensajes">

            <!-- Aviso de Errores en falla de crear un usuario-->
            @if($message = Session::get('ErrorInsert'))
                <div class="col-12 alert alert-danger alert-dismissable fade show" role="alert">
                    <h5>Errores: </h5>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}} </li>
                        @endforeach
                    </ul>
                </div>

            @endif
            <!-- Aviso de Éxito en crear/eliminar un usuario-->
            @if($message = Session::get('Listo'))
                <div class="col-12 alert alert-success alert-dismissable fade show" role="alert">
                    <h5>Aviso: </h5>
                    <span>{{$message}} </span>
                </div>

            @endif
        </section>

        <!-- Button trigger modal para crear un usuario -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAgregar">
        Crear Usuario
        </button>

        <!-- Modal Crear Usuario-->
        <div class="modal fade" id="modalAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>


                    <form action="{{url('home/gestionUsuarios')}}" method="POST">
                    @csrf
                        <div class="modal-body">

                            <div class="form-group row">

                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nombre" value="{{ old('name') }}" required autocomplete="name" autofocus>

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

                                <input id="rol" type="text" class="form-control @error('rol') is-invalid @enderror" name="rol" placeholder="Rol" value="{{ old('rol') }}" required autocomplete="rol">

                                @error('rol')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
    </section>

    <!-- Tabla de usuarios-->
    <div class="container">
        <div class="row justify-content-center">
            
                <div class="card">
                    <div class="card-header"> {{__('Lista de Usuarios')}}</div>
                    <div class="card-body">
                        <div class="table-responsive table-striped ">
                            <table class="table col-12 table-responsive">
                                <thead>
                                    <tr>
                                        <td>Id</td>
                                        <td>Nombre</td>
                                        <td>Rol</td>
                                        <td>Email</td>
                                        <td>&nbsp;</td>
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
                                                <button class="btn btn-danger btnEliminar" data-id="{{ $usuario->id }}" data-toggle="modal" data-target="#modalEliminar">Eliminar</button>
                                                <button class="btn btn-primary btnEditar" 
                                                    data-id="{{ $usuario->id }}" 
                                                    data-name="{{ $usuario->name }}" 
                                                    data-email="{{ $usuario->email }}" 
                                                    data-rol="{{ $usuario->rol }}"
                                                    data-toggle="modal" data-target="#modalEditar"> Editar 
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
                </div>
            
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

                            <input id="nameEditar" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nombre" value="{{ old('name') }}" required autocomplete="name" autofocus>

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

                            <input id="rolEditar" type="text" class="form-control @error('rol') is-invalid @enderror" name="rol" placeholder="Rol" value="{{ old('rol') }}" required autocomplete="rol">

                            @error('rol')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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

</section>


@endsection

@section('scripts')
    <script>
        var idEliminar=0;
        $(document).ready(function(){
            @if($message = Session::get('ErrorInsert'))
                $("#modalAgregar").modal('show');
            @endif
            $(".btnEliminar").click(function(){
                idEliminar = $(this).data('id');
            });
            $(".btnModalEliminar").click(function(){
                $("#formEli_"+idEliminar).submit();
            });
            $(".btnEditar").click(function(){
                $("#idEdit").val($(this).data('id'));
                $("#nameEditar").val($(this).data('name'));
                $("#emailEditar").val($(this).data('email'));
                $("#rolEditar").val($(this).data('rol'));
            });
        });
    </script>

@endsection
