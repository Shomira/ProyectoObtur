@extends('layouts.app')

@section('content')
<section class="fondo">
    <nav class="navAdmin">
        <a href="{{url('home/visualizarArchivos')}}"><img src="{{ asset('imgs/vision.png')}}">Visualizar Archivos</a>
        <a href="{{url('home/archivos')}}"><img src="{{ asset('imgs/subir.png')}}">Cargar Datos</a>
        <a style="background-color:#ece1cd; color: #000000;font-weight: 800;" href="{{url('home/metricas')}}">
        <img src="{{ asset('imgs/metrica.png')}}">Métricas</a>
        <a href="{{url('home/gestionUsuarios')}}"><img src="{{ asset('imgs/usuario.png')}}">Gestionar Usuarios</a>
    </nav>
    
    <section class="espacio">

    </section>
</section>
@endsection