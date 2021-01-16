@extends('layouts.app')

@section('content')
<section class="fondo">
    <section class="fondo2">
        <nav class="navAdmin">
            <a href="{{url('home/visualizarArchivos')}}"><img src="{{ asset('imgs/vision1.png')}}">Visualizar Archivos</a>
            <a style="background: white; color: #000000;font-weight: 800;" href="{{url('home/archivos')}}">
            <img src="{{ asset('imgs/sub2.png')}}">Cargar Datos</a>
            <a href="{{url('home/metricas')}}"><img src="{{ asset('imgs/metrica1.png')}}">Métricas</a>
            <a href="{{url('home/gestionUsuarios')}}"><img src="{{ asset('imgs/group.png')}}">Gestionar Usuarios</a>
        </nav>
        
        <section class="espacioCA">
            <h2><img style="padding-right: 1em;"  src="{{ asset('imgs/carga.png')}}">CARGA DE ARCHIVOS A LA BASE DE DATOS</h2>
            <div class="card mt-4">
                <div class="card-header">
                    Importación de archivos a la base de datos
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{ url('import-excel') }}" method="POST" name="importform" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="import_file[]" class="form-control" multiple>
                        <br>
                        <button class="btn btn-success">Importar archivo</button>
                    </form>
                </div>
            </div>

        </section>
        
        <section class="col-6">
            @if($message = Session::get('eliminado'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
        </section>

       <!-- Tabla de usuarios-->
       <div class="container">
            <div class="row justify-content-center">
                    <div class="card">
                        <div class="card-header"> {{__('Lista de Archivos')}}</div>
                        <div class="card-body">
                            <div class="table-responsive table-striped ">
                                <table class="table col-12 table-responsive">
                                    <thead>
                                        <tr>
                                            <td>Id</td>
                                            <td>Nombre</td>
                                            <td>idUsuario</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($files as $file)
                                            <tr>
                                            
                                                <td> {{$file->id}} </td>
                                                <td>{{$file->name}}</td>
                                                <td>{{$file->idUsuario}}</td>
                                                <td>
                                                    <a href="../storage/{{$file->name}}" class="btn btn-sm btn-outline-secondary">Ver</a>
                                                </td>
                                                <td>
                                                    <form action="{{ url('home/archivos', $file->id ) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                                                    
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
        
    </section>
</section>
    
@endsection

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
    <script>
        Dropzone.options.myAwesomeDropzone = {
            
            headers:{
                'X-CSRF-TOKEN' : "{{csrf_token()}}"
            },
            dictDefaultMessage: "Arrastre un archivo al recuadro para subirlo",
            acceptedFiles: ".csv",
            maxFiles: 4,
            init: function() {
                this.on("success", function(file) { alert("Archivo/s subido/s exitosamente"); });
            }
        };
    </script>

@endsection