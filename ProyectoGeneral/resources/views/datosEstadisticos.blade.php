@extends('layouts.app')

@section('content')

    <h2 class="tituloDatos">INDICADORES DE ALOJAMIENTO EN LOJA</h2>
    <section class="menu">

    </section>
    <section class="huespedes">
        <h2>Huéspedes</h2>
        <img src="{{ asset('imgs/Deimagen1.png')}}"  alt="">
        <img src="{{ asset('imgs/Deimagen2.png')}}"  alt="">
    </section>
    <section class=tarifaProm>
        <h2>Tarifa promedio</h2>
        <img style="width: 1000px;" src="{{ asset('imgs/Dehabita.PNG')}}"  alt="">
    </section>
    <section class= "indOcupacion">
        <h2>Indice de Ocupación</h2>
        <img  style="width: 1000px;" src="{{ asset('imgs/DePersona.PNG')}}"  alt="">
    </section>
    <section class="revpar">
        <h2>Revpar</h2>
        <img  style="width: 1000px;" src="{{ asset('imgs/DeRevpar.PNG')}}"  alt="">
    </section>
    
@endsection
