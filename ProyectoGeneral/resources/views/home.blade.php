@extends('layouts.app')

@section('content')

    @if(Auth::user()->rol == 'Administrador')
    <section class="fondo">
        <section class="fondo2">
            <nav class="navAdmin">
                <a class="etiquetaActiva"  href="{{url('home/')}}"><img src="{{ asset('imgs/inicio.png')}}">Inicio</a>
                <a href="{{url('home/visualizarArchivos')}}"><img src="{{ asset('imgs/vision1.png')}}">Visualizar Registros</a>
                <a href="{{url('home/archivos')}}"><img src="{{ asset('imgs/sub2.png')}}"> Cargar Archivos</a>
                <a href="{{url('home/gestionUsuarios')}}"><img src="{{ asset('imgs/group.png')}}">Gestionar Usuarios</a>
                
            </nav>
            <section class="espacioAdmin">
                <h2><img  class="imgAdmin" src="{{ asset('imgs/adminv.png')}}">Bienvenid@ {{ Auth::user()->name }}</h2>
                  
                <section class="datosAd">
                    <article class="datAd">
                        <section class="partsup"  ><h5>Visualizar Registros</h5></section>   
                        <p> <img src="{{ asset('imgs/verArchivos.png')}}"> Permite acceder a los registros y filtrarlos por fecha.</p>
                    </article >     
                    <article class="datAd">
                            <section class="partsup2"  ><h5>Cargar Archivos</h5></section>  
                                <p> <img src="{{ asset('imgs/cargarDatos.png')}}">Cumple la función de cargar los registros mediante la carga de archivos.csv.</p>
                    </article >
                    <article class="datAd">
                            <section class="partsup2" ><h5>Inicio</h5></section>  
                            <p><img src="{{ asset('imgs/inicioI.png')}}"> Muestra los módulos disponibles para el administrador con una breve descripción.</p>
                    </article>
                    <article class="datAd">
                            <section class="partsup" ><h5>Gestionar Usuarios</h5></section>    
                            <p><img src="{{ asset('imgs/gestionarUsuarios.png')}}">Muestra una lista de usuarios con las opciones: editar, eliminar y crear.</p>
                    </article>
                </section>                
            </section>

        </section>
    </section>

    <!--Parte del Usuario del Establecimiento-->
    @endif
    @if(Auth::user()->rol == 'Establecimiento')
    <section class="fondo">
        <section class="fondo2">
            <nav class="navAdmin">
                <a class="etiquetaActiva" href="{{url('home/')}}"><img src="{{ asset('imgs/inicio.png')}}">Inicio</a>
                <a  href="{{url('home/comparativas')}}"><img src="{{ asset('imgs/comparar.png')}}">Comparativas</a>
                <a  href="{{url('home/resumenMensual')}}"><img src="{{ asset('imgs/resumen.png')}}">Resumen Mensual</a>
                <a  href="{{url('home/analisisDeNegocio')}}"><img src="{{ asset('imgs/analisisNegocio.png')}}">Análisis De Negocio</a>
                <a href="{{url('home/visualizarRegistros')}}"><img src="{{ asset('imgs/vision1.png')}}"> Visualizar Registros</a>                
            </nav>
        
            <section class="espacioAdmin">
                <h2><img  class="imgAdmin" src="{{ asset('imgs/adminv.png')}}">Bienvenid@ {{ Auth::user()->name }}</h2>
                  
                <section class="datosAd">
                    <article class="datAd">
                        <section class="partsup"  ><h5>Comparativas</h5></section>   
                        <p> <img src="{{ asset('imgs/compararInicio.png')}}">Ofrece  dos gráficas detelladas, basadas en el tiempo según los parámetros seleccionados.</p>
                    </article >     
                    <article class="datAd">
                            <section class="partsup2"  ><h5>Resumen Mensual</h5></section>  
                                <p> <img src="{{ asset('imgs/resumenInicio.png')}}">Muestra características como: 
                                promedio, mínino y máximo según el tiempo.</p>
                    </article >
                    <article class="datAd">
                            <section class="partsup2" ><h5>Análisis De Negocio</h5></section>  
                                <p> <img src="{{ asset('imgs/analisisInicio.png')}}">Presenta los parámetros más destacados del establecimiento.</p>
                    </article >
                    <article class="datAd">
                            <section class="partsup"  ><h5>Visualizar Registros</h5></section>  
                                <p> <img src="{{ asset('imgs/verArchivos.png')}}">Permite acceder a los registros del establecimiento y filtrarlos por fecha.</p>
                    </article >
                </section>
            </section>                
        </section>

    </section>

    @endif

@endsection
