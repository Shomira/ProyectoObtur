@extends('layouts.app')

@section('content')
<section class="fondo">
    <section class="fondo2">
        <nav class="navAdmin">
            <a href="{{url('home/visualizarArchivos')}}"><img src="{{ asset('imgs/vision.png')}}">Visualizar Archivos</a>
            <a style="background: white; color: #000000;font-weight: 800;" href="{{url('home/archivos')}}">
            <img src="{{ asset('imgs/subir.png')}}">Cargar Datos</a>
            <a href="{{url('home/metricas')}}"><img src="{{ asset('imgs/metrica.png')}}">Métricas</a>
            <a href="{{url('home/gestionUsuarios')}}"><img src="{{ asset('imgs/usuario.png')}}">Gestionar Usuarios</a>
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
                        <input type="file" name="import_file" class="form-control">
                        <br>
                        <button class="btn btn-success">Importar archivo</button>
                    </form>
                </div>
            </div>

        </section>

       
        
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