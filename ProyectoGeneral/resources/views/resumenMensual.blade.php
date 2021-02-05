@extends('layouts.app')

@section('content')
<section class="fondo">
    <section class="fondo2">
        <nav class="navAdmin">
            <a  href="{{url('home/comparativas')}}"><img src="{{ asset('imgs/metrica1.png')}}">Comparativas</a>
            <a style="background: white; color: #000000;font-weight: 800;"  href="{{url('home/resumenMensual')}}"><img src="{{ asset('imgs/metrica1.png')}}">Resumen Mensual</a>
            <a  href="{{url('home/analisisDeNegocio')}}"><img src="{{ asset('imgs/metrica1.png')}}">Análisis De Negocio</a>
            <a href="{{url('home/visualizarRegistros')}}"><img src="{{ asset('imgs/vision1.png')}}"> Visualizar Registros</a> 
        </nav>

        

    </section>
</section>

@endsection