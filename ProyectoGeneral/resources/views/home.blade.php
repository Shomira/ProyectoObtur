@extends('layouts.app')

@section('content')

    @if(Auth::user()->rol == 'Admin')
    <section class="fondo">
        <section class="fondo2">
            <nav class="navAdmin">
                <a href="{{url('home/visualizarArchivos')}}"><img src="{{ asset('imgs/vision.png')}}">Visualizar Archivos</a>
                <a href="{{url('home/archivos')}}"><img src="{{ asset('imgs/subir.png')}}">Cargar Datos</a>
                <a href="{{url('home/metricas')}}"><img src="{{ asset('imgs/metrica.png')}}">Métricas</a>
                <a href="{{url('home/gestionUsuarios')}}"><img src="{{ asset('imgs/usuario.png')}}">Gestionar Usuarios</a>
            </nav>
        
            <section class="espacioAdmin">
                <h2><img style="margin-right: 0.5em;" src="{{ asset('imgs/adminv.png')}}">Bienvenid@ {{ Auth::user()->name }}</h2>
                <br>
                    <h5>En este apartado podra encontrar las caracteristicas de cada seccion de la barra de navegacion de administrador</h5>
                    <article>
                        <p><h4>Visualizar Archivos:</h4> Permite acceder a los registros y filtrarlos por fecha</p>
                    </article>
                    <article>
                        <p><h4>Cargar Datos:</h4> Cumple la funcion de cargar los registros mediante la carga de archivos.csv</p>
                    </article>
                    <article>
                        <p><h4>Métricas:</h4> Crea gráficas estadisticas mediante el uso de filtros.</p>
                    </article>
                    <article>
                        <p><h4>Gestionar Usuarios:</h4> Muestra una lista de usuarios con las opciones: editar, eliminar y crear.</p>
                    </article>
            </section>
           
        </section>
    </section>
    @else
        <section>
            <h3>Bienvenido a la sesión personal del usuario</h3>
        </section>
        <section class="espacio"></section>
    @endif

@endsection
