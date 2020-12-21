@extends('layouts.app')

@section('content')
 
<section class="containerSlider">
<!--inicia el slider-->
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="{{ asset('imgs/mangahurco131.png')}}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="{{ asset('imgs/img4.jpeg')}}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="{{ asset('imgs/img5P.png')}}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
            </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <script>
        var myCarousel = document.querySelector('#myCarousel')
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 1000,
            wrap: false
        })
    </script>

    
    <section class="sitiosLoja">
        <h2>Descubre en la Provincia de Loja</h2>
        <article class="sitios">    
                <img src="{{ asset('imgs/img1Hom.png')}}">
                <h4>Eventos</h4>
        </article >
        <article class="sitios" >
                <img src="{{ asset('imgs/img2Hom.png')}}">
                <h4>Plazas</h4>
        </article >
        <article class="sitios">
                <img  src="{{ asset('imgs/img3Hom.png')}}">
                <h4>Atractivos</h4>
        </article >
        <article class="sitios" >
                <img  src="{{ asset('imgs/img4Hom.png')}}">
                <h4>Parques</h4>
        </article>
    </section>

</section>


   
@endsection



