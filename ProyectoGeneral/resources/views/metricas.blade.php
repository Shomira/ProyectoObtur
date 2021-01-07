@extends('layouts.app')

@section('content')
<section class="fondo">
    <nav class="navAdmin">
        <a href="{{url('home/archivos')}}"><img src="{{ asset('imgs/subir.png')}}">Cargar Datos</a>
        <a style="background: linear-gradient(rgba(161, 161, 159, 0.432), rgba(172, 171, 166, 0.664)); color: #fffb00;font-weight: 800;" href="{{url('home/metricas')}}">
        <img src="{{ asset('imgs/metrica.png')}}">Métricas</a>
        <a href="{{url('home/gestionUsuarios')}}"><img src="{{ asset('imgs/usuario.png')}}">Gestionar Usuarios</a>
    </nav>
    
    <section class="espacio">

    </section>
</section>
@endsection