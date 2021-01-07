@extends('layouts.app')

@section('content')

    @if(Auth::user()->rol == 'Admin')
        <section class="fondo">
            <nav class="navAdmin">
                <a href="{{url('home/archivos')}}"><img src="{{ asset('imgs/subir.png')}}">Cargar Datos</a>
                <a href="{{url('home/metricas')}}"><img src="{{ asset('imgs/metrica.png')}}">Métricas</a>
                <a href="{{url('home/gestionUsuarios')}}"><img src="{{ asset('imgs/usuario.png')}}">Gestionar Usuarios</a>
            </nav>

            <section class="espacio">

            </section>
        </section>
    @else
        <section>
            <h3>Bienvenido a la sesión personal del usuario</h3>
        </section>
        <section class="espacio"></section>
    @endif

@endsection
