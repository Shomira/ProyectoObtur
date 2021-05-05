@extends('layouts.main')
@section('contenido')

    @if(Auth::user()->rol == 'Administrador')
   
    <section class="espacioAdmin">
        <section class="datosAd">
            <article class="datAd">
                <section class="partsup"  ><h5>Visualizar Registros</h5></section>   
                <p> <img src="{{ asset('imgs/verArchivos.png')}}"> Permite acceder a los registros y filtrarlos por fecha.</p>
            </article >     
            <article class="datAd">
                    <section class=" partsup partsup2"  ><h5>Cargar Archivos</h5></section>  
                        <p> <img src="{{ asset('imgs/cargarDatos.png')}}">Cumple la función de cargar los registros mediante la carga de archivos.csv.</p>
            </article >
            <article class="datAd">
                    <section class="partsup partsup2" ><h5>Inicio</h5></section>  
                    <p><img src="{{ asset('imgs/inicioI.png')}}"> Muestra los módulos disponibles para el administrador con una breve descripción.</p>
            </article>
            <article class="datAd">
                    <section class="partsup" ><h5>Gestionar Usuarios</h5></section>    
                    <p><img src="{{ asset('imgs/gestionarUsuarios.png')}}">Muestra una lista de usuarios con las opciones: editar, eliminar y crear.</p>
            </article>
        </section>                
    </section>


    <!--Parte del Usuario del Establecimiento-->
    @endif
    @if(Auth::user()->rol == 'Establecimiento')

    <section class="espacioAdmin">          
        <section class="datosAd">
            <article class="datAd">
                <section class="partsup"  ><h5>Comparativas</h5></section>   
                <p> <img src="{{ asset('imgs/compararInicio.png')}}">Ofrece  dos gráficas detelladas, basadas en el tiempo según los parámetros seleccionados.</p>
            </article >     
            <article class="datAd">
                    <section class="partsup partsup2"  ><h5>Resumen Mensual</h5></section>  
                        <p> <img src="{{ asset('imgs/resumenInicio.png')}}">Muestra características como: 
                        promedio, mínino y máximo según el tiempo.</p>
            </article >
            <article class="datAd">
                    <section class="partsup partsup2" ><h5>Análisis De Negocio</h5></section>  
                        <p> <img src="{{ asset('imgs/analisisInicio.png')}}">Presenta los parámetros más destacados del establecimiento.</p>
            </article >
            <article class="datAd">
                    <section class="partsup"  ><h5>Visualizar Registros</h5></section>  
                        <p> <img src="{{ asset('imgs/verArchivos.png')}}">Permite acceder a los registros del establecimiento y filtrarlos por fecha.</p>
            </article >
        </section>
    </section>                
       
    @endif

@endsection
