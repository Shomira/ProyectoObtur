
@extends('layouts.app')

@section('content')
    <section class="portfolioInforTuris">
        <img src="{{ asset('imgs/Itimg1.png')}}"  alt="">
        <img src="{{ asset('imgs/Itimg2.png')}}"  alt="">
        <img src="{{ asset('imgs/Itimg3.png')}}"  alt="">
        <img src="{{ asset('imgs/Itimg4.png')}}"  alt="">
        <img src="{{ asset('imgs/Itimag5.png')}}"  alt="">
        <img src="{{ asset('imgs/Itimg6.png')}}"  alt="">
        <img src="{{ asset('imgs/Itimg7.png')}}"  alt="">
        <img src="{{ asset('imgs/Itimg8.png')}}"  alt="">
        <img src="{{ asset('imgs/Itimg9.png')}}"  alt="">
        <img src="{{ asset('imgs/Itimg10.jpg')}}"  alt="">
       
    </section>

    
@endsection
    
@section('pieDePagina')
    @include('layouts.footer')
@endsection