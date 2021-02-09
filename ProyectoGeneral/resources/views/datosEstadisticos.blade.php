@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
@endsection

@section('content')
    <section class="fondoDatosEsta" >
        <h2 class="tituloDatos" >INDICADORES DE ALOJAMIENTO EN LOJA <br><p></p> {{$nombreMes}} - {{$anio}} </h2>
        <!-- Anerior con navbar-->
        <section class="menu">
            <nav class="navDatosEs">
                <div class="btn-group d-md-flex justify-content-center">    
                    <form action="{{url('datosEstadisticos')}}" method="POST" class="formDe">
                        <a class="flechaInicio"  javascript:void(0) title="Volver arriba">
                            <span class="fa-stack">
                                <i class="fa fa-arrow-up fa-stack-2x fa-inverse"></i>
                            </span>
                        </a>
                       
                        @csrf
                            <select name="anio"  class="form-select" required > 
                                @foreach($anios as $a)
                                    <option value="{{$a->anio}}">{{$a->anio}}</option>
                                @endforeach
                            </select>
                        
                        <input type="hidden" name="mes" value="1">
                        <button type="submit" class="btn btn-light;  btn-lg" name="mes" value="1">Enero</button>
                        <button type="submit" class="btn btn-light;  btn-lg" name="mes" value="2">Febrero</button>
                        <button type="submit" class="btn btn-light;  btn-lg" name="mes" value="3">Marzo</button>
                        <button type="submit" class="btn btn-light;  btn-lg" name="mes" value="4">Abril</button>
                        <button type="submit" class="btn btn-light;  btn-lg" name="mes" value="5">Mayo</button>
                        <button type="submit" class="btn btn-light;  btn-lg" name="mes" value="6">Junio</button>
                        <button type="submit" class="btn btn-light;  btn-lg" name="mes" value="7">Julio</button>
                        <button type="submit" class="btn btn-light;  btn-lg" name="mes" value="8">Agosto</button>
                        <button type="submit" class="btn btn-light;  btn-lg" name="mes" value="9">Septiembre</button>
                        <button type="submit" class="btn btn-light;  btn-lg" name="mes" value="10">Octubre</button>
                        <button type="submit" class="btn btn-light;  btn-lg" name="mes" value="11">Noviembre</button>
                        <button type="submit" class="btn btn-light;  btn-lg" name="mes" value="12">Diciembre</button>
                    </form>
                </div> 
            </nav>
        </section>
        
            

       
        <!-- Fin navbar anterior-->
        <!--Huespedes>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>-->
        <section class="fondoBlanco">
            <section class="indicadoresDeHues" id="huespedes">
                <h2 >
                    <img src="{{ asset('imgs/invitado.png')}}"> HUÉSPEDES 
                </h2><p></p> <hr>
                <div class="row row-cols-1 row-cols-md-3 g-3">
                    <div class="col-lg-4 col-md-12 mb-4">
                            <div class="card-sectionDeh  border rounded">
                                    <div class="card-headerDe5  rounded ">
                                        <canvas id="huespedes5" ></canvas>
                                    </div>
                                    <div class="card-body text-center mb-2" >
                                        @for ($i = 0; $i < 5; $i++)
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                                                <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                                            </svg> 
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 mb-4">
                                <div class="card-sectionDeh  border rounded">
                                    <div class="card-headerDe4  rounded ">
                                        <canvas id="huespedes4" ></canvas>
                                    </div>
                                    <div class="card-body text-center mb-2" >
                                        @for ($i = 0; $i < 4; $i++)
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                                                <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                                            </svg> 
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 mb-4">
                                <div class="card-sectionDeh  border rounded">
                                    <div class="card-headerDe3  rounded ">
                                        <canvas id="huespedes3" ></canvas>
                                    </div>
                                    <div class="card-body text-center mb-2" >
                                        @for ($i = 0; $i < 3; $i++)
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                                                <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                                            </svg> 
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <section class="row centrado">
                                <div class="col-lg-5">
                                    <div class="card-sectionDeh  border rounded ">
                                        <div class="card-headerDe2  rounded ">
                                            <canvas id="huespedes2" ></canvas>
                                        </div>
                                        <div class="card-body text-center mb-2" >
                                            @for ($i = 0; $i < 2; $i++)
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                                                    <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                                                </svg> 
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </section> 
                            
                            <section class="centrado2">
                                <div class="col-lg-5">
                                    <div class="card-sectionDeh  border rounded">
                                        <div class="card-headerDe1  rounded ">
                                            <canvas id="huespedes1" ></canvas>
                                        </div>
                                        <div class="card-body text-center mb-2" >
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                                            <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </section>
    
                        </div>
                    </div>
                </div>
                
            </section>
        </section>
        </section>
        <section class="fondoDatosEsta" >
            <!--Fin huespedes>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>-->
            <!--Tarifa promedio>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>-->
            
            <section class="indicadoresDe" id="tarifaPromedio">
                <h2><img src="{{ asset('imgs/sigdolar.png')}}">TARIFA PROMEDIO</h2>
                <p class="significadoEstadisticas">Dinero promedio que recepta un establecimiento, ya sea por cada persona que ingresa, o por cada habitación ocupada</p><hr>
                <h4>Por Habitación</h4><p></p><br>
                <div class="row row-cols-2 row-cols-md-4 g-3">
                    <div class="col-lg-2 col-md-2 mr-5 ">
                        <div class="card-sectionPo  border rounded">
                            
                            <div class="card-headerTp5 text-center mb-2 rounded">
                            <h2>5<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 150 165">
                                <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                            </svg></h2>  
                            </div>
                            <h4>${{$arrTarifaH5Est[0]}}</h4>
                                @if( $arrTarifaH5Est[2] === 1)
                                    <p> <img src="{{ asset('imgs/decrec.png')}}"> Decrecimiento de: $ {{$arrTarifaH5Est[1]}} vs mes anterior</p>
                                @elseif( $arrTarifaH5Est[2] === 2)
                                    <p><img  src="{{ asset('imgs/crec.png')}}">Crecimiento de: $ {{$arrTarifaH5Est[1]}} vs mes anterior</p>
                                @elseif( $arrTarifaH5Est[2] === 3)
                                    <p><img  src="{{ asset('imgs/crec.png')}}">No registra cambio vs el mes anterior</p>
                                @else
                                    <p>---------------</p>
                                @endif
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-2 mr-5">
                        <div class="card-sectionPo  border rounded">
                            <div class="card-headerTp4 text-center mb-2 rounded">
                                <h2>4<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 150 165">
                                    <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                                </svg></h2>  
                            </div>
                                <h4>${{$arrTarifaH4Est[0]}}</h4>
                                    @if( $arrTarifaH4Est[2] === 1)
                                        <p> <img src="{{ asset('imgs/decrec.png')}}"> Decrecimiento de: $ {{$arrTarifaH4Est[1]}} vs mes anterior</p>
                                    @elseif($arrTarifaH4Est[2] === 2)
                                        <p><img src="{{ asset('imgs/crec.png')}}">Crecimiento de: $ {{$arrTarifaH4Est[1]}} vs mes anterior</p>
                                    @elseif($arrTarifaH4Est[2] === 3)
                                        <p><img  src="{{ asset('imgs/crec.png')}}">No registra cambio vs mes anterior</p>
                                    @else
                                        <p>---------------</p>
                                    @endif
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 mr-5">
                        <div class="card-sectionPo  border rounded">
                            <div class="card-headerTp3 text-center mb-2 rounded">
                                <h2>3<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 150 165">
                                    <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                                </svg></h2>  
                            </div>
                            <h4 >${{$arrTarifaH3Est[0]}}</h4>
                                @if( $arrTarifaH3Est[2] === 1)
                                    <p> <img src="{{ asset('imgs/decrec.png')}}"> Decrecimiento de: $ {{$arrTarifaH3Est[1]}} vs mes anterior</p>
                                @elseif( $arrTarifaH3Est[2] === 2)
                                    <p><img src="{{ asset('imgs/crec.png')}}">Crecimiento de: $ {{$arrTarifaH3Est[1]}} vs mes anterior</p>
                                @elseif( $arrTarifaH3Est[2] === 3)
                                    <p><img src="{{ asset('imgs/crec.png')}}">No registra cambio vs mes anterior</p>
                                @else
                                    <p>---------------</p>
                                @endif
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 mr-5">
                        <div class="card-sectionPo  border rounded">
                            <div class="card-headerTp2 text-center mb-2 rounded">
                                <h2>2<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 150 165">
                                    <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                                </svg></h2>  
                            </div>
                            <h4>${{$arrTarifaH2Est[0]}}</h4>
                                @if( $arrTarifaH2Est[2] === 1)
                                    <p> <img src="{{ asset('imgs/decrec.png')}}"> Decrecimiento de: $ {{$arrTarifaH2Est[1]}} vs mes anterior</p>
                                @elseif( $arrTarifaH2Est[2] === 2)
                                    <p><img  src="{{ asset('imgs/crec.png')}}">Crecimiento de: $ {{$arrTarifaH2Est[1]}} vs mes anterior</p>
                                @elseif( $arrTarifaH2Est[2] === 3)
                                    <p><img  src="{{ asset('imgs/crec.png')}}">No registra cambio vs el mes anterior</p>
                                @else
                                    <p>---------------</p>
                                @endif
                        </div>
                    </div>
                
                    <div class="col-lg-2 col-md-2 mr-1">
                        <div class="card-sectionPo  border rounded">
                            <div class="card-headerTp1 text-center mb-2 rounded">
                                <h2>1<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 150 165">
                                    <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                                </svg></h2>  
                            </div>
                            <h4>${{$arrTarifaH1Est[0]}}</h4>
                                @if( $arrTarifaH1Est[2] === 1)
                                    <p> <img src="{{ asset('imgs/decrec.png')}}"> Decrecimiento de: $ {{$arrTarifaH1Est[1]}} vs mes anterior</p>
                                @elseif( $arrTarifaH1Est[2] === 2)
                                    <p><img  src="{{ asset('imgs/crec.png')}}">Crecimiento de: $ {{$arrTarifaH1Est[1]}} vs mes anterior</p>
                                @elseif( $arrTarifaH1Est[2] === 3)
                                    <p><img  src="{{ asset('imgs/crec.png')}}">No registra cambio vs el mes anterior</p>
                                @else
                                    <p>---------------</p>
                                @endif
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body" style="background-color: rgb(238,238,238);">
                        <canvas style="background-color: rgb(238,238,238);" id="tarifaPromHabitacion" width="800" height="300"></canvas>
                    </div>
                </div>
                <hr>
            </section>
                <!-- fin promedio por habitacion -->
                
                <!-- inicio promedio por persona -->
            <section class="indicadoresDe porPersona">
                <h3>Por Persona</h3><p></p><br>
                <div class="row row-cols-2 row-cols-md-4 g-3">
                    <div class="col-lg-2 col-md-2 mr-5 ">
                        <div class="card-sectionPo  border rounded">
                            <div class="card-headerTp5 text-center mb-2 rounded">
                                <h2>5<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 150 165">
                                <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                                </svg></h2>  
                            </div>
                                <h4>${{$arrTarifaP5Est[0]}}</h4>
                                @if( $arrTarifaP5Est[2] === 1)
                                    <p> <img src="{{ asset('imgs/decrec.png')}}"> Decrecimiento de: $ {{$arrTarifaP5Est[1]}} vs mes anterior</p>
                                @elseif( $arrTarifaP5Est[2] === 2)
                                    <p><img src="{{ asset('imgs/crec.png')}}">Crecimiento de: $ {{$arrTarifaP5Est[1]}} vs mes anterior</p>
                                @elseif( $arrTarifaP5Est[2] === 3)
                                    <p><img src="{{ asset('imgs/crec.png')}}">No registra cambio vs mes anterior</p>
                                @else
                                    <p>---------------</p>
                                @endif 
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 mr-5 ">
                        <div class="card-sectionPo  border rounded">
                            <div class="card-headerTp4 text-center mb-2 rounded">
                                <h2>4<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 150 165">
                                <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                                </svg></h2>  
                            </div>
                                <h4>${{$arrTarifaP4Est[0]}}</h4>
                                @if( $arrTarifaP4Est[2] === 1)
                                    <p> <img src="{{ asset('imgs/decrec.png')}}"> Decrecimiento de: $ {{$arrTarifaP4Est[1]}} vs mes anterior</p>
                                @elseif( $arrTarifaP4Est[2] === 2)
                                    <p><img  src="{{ asset('imgs/crec.png')}}">Crecimiento de: $ {{$arrTarifaP4Est[1]}} vs mes anterior</p>
                                @elseif( $arrTarifaP4Est[2] === 3)
                                    <p><img  src="{{ asset('imgs/crec.png')}}">No registra cambio vs mes anterior</p>
                                @else
                                    <p>---------------</p>
                                @endif
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 mr-5 ">
                        <div class="card-sectionPo  border rounded">
                            <div class="card-headerTp3 text-center mb-2 rounded">
                                <h2>3<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 150 165">
                                    <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                                </svg></h2>  
                            </div>
                                <h4>${{$arrTarifaP3Est[0]}}</h4>
                                @if( $arrTarifaP3Est[2] === 1)
                                    <p style="font-size:10px;"> <img src="{{ asset('imgs/decrec.png')}}"> Decrecimiento de: $ {{$arrTarifaP3Est[1]}} vs mes anterior</p>
                                @elseif( $arrTarifaP3Est[2] === 2)
                                    <p><img src="{{ asset('imgs/crec.png')}}">Crecimiento de: $ {{$arrTarifaP3Est[1]}} vs mes anterior</p>
                                @elseif( $arrTarifaP3Est[2] === 3)
                                    <p><img src="{{ asset('imgs/crec.png')}}">No registra cambio vs mes anterior</p>
                                @else
                                    <p>---------------</p>
                                @endif
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 mr-5 ">
                        <div class="card-sectionPo  border rounded">
                            <div class="card-headerTp2 text-center mb-2 rounded">
                                <h2>2<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 150 165">
                                <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                            </svg></h2>  
                            </div>
                                <h4>${{$arrTarifaP2Est[0]}}</h4>
                                @if( $arrTarifaP2Est[2] === 1)
                                    <p> <img src="{{ asset('imgs/decrec.png')}}"> Decrecimiento de: $ {{$arrTarifaP2Est[1]}} vs mes anterior</p>
                                @elseif( $arrTarifaP2Est[2] === 2)
                                    <p><img src="{{ asset('imgs/crec.png')}}">Crecimiento de: $ {{$arrTarifaP2Est[1]}} vs mes anterior</p>
                                @elseif( $arrTarifaP2Est[2] === 3)
                                    <p><img src="{{ asset('imgs/crec.png')}}">No registra cambio vs mes anterior</p>
                                @else
                                    <p>---------------</p>
                                @endif 
                        </div>
                    </div>
            
                    <div class="col-lg-2 col-md-2 mr-1 ">
                        <div class="card-sectionPo  border rounded">
                            <div class="card-headerTp1 text-center mb-2 rounded">
                                <h2>1<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 150 165">
                                <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                            </svg></h2>  
                            </div>
                                <h4>${{$arrTarifaP1Est[0]}}</h4>
                                @if( $arrTarifaP1Est[2] === 1)
                                    <p> <img src="{{ asset('imgs/decrec.png')}}"> Decrecimiento de: $ {{$arrTarifaP1Est[1]}} vs mes anterior</p>
                                @elseif( $arrTarifaP1Est[2] === 2)
                                    <p><img src="{{ asset('imgs/crec.png')}}">Crecimiento de: $ {{$arrTarifaP1Est[1]}} vs mes anterior</p>
                                @elseif( $arrTarifaP1Est[2] === 3)
                                    <p><img src="{{ asset('imgs/crec.png')}}">No registra cambio vs mes anterior</p>
                                @else
                                    <p>---------------</p>
                                @endif 
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body" style="background-color: rgb(238,238,238);">
                        <canvas style="background-color: rgb(238,238,238);" id="tarifaPromPerson" width="800" height="300"></canvas>
                    </div>
                </div>
            </section>
        
        <!--Segunda parte =======================================================================================================================================-->
            <!-- fin promedio por persona -->
            
            <!-- inicio promedio por ocupación -->
        <section class="fondoBlanco">
            <section class="indicadoresDe porcentajeFondo" id="porcentajeOcupacion">
                <h2 class="card-header-title mb-4 text-black">
                    <img  style="padding-right:0.4em;" src="{{ asset('imgs/porciento.png')}}">PORCENTAJE DE OCUPACIÓN</h2>
                    <p class="significadoEstadisticas">Es la relación entre las habitaciones ocupadas y las disponibles durante un período dado</p><hr>
                <div class="row row-cols-2 row-cols-md-4 g-3">
                    <div class="col-lg-2 col-md-2 mr-5 ">
                        <div class="card-sectionPo  border rounded">
                            <div class="card-headerPo5  rounded ">
                                <h2>5<svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                                    <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                                    </svg> </h2>
                            </div>
                                <h4>{{$arrOcupacion5Est[0]}}%</h4>
                                
                                @if( $arrOcupacion5Est[2] === 1)
                                    <p> <img src="{{ asset('imgs/decrec.png')}}"> Decrecimiento de: {{$arrOcupacion5Est[1]}}% vs mes anterior</p>
                                @elseif( $arrOcupacion5Est[2] === 2)
                                    <p><img src="{{ asset('imgs/crec.png')}}">Crecimiento de: {{$arrOcupacion5Est[1]}}% vs mes anterior</p>
                                @elseif( $arrOcupacion5Est[2] === 3)
                                    <p><img src="{{ asset('imgs/crec.png')}}">No registra cambio vs mes anterior</p>
                                @else
                                    <p>---------------</p>
                                @endif
                                
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 mr-5">
                        <div class="card-sectionPo  border rounded">
                            <div class="card-headerPo4  rounded ">
                                <h2>4<svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                                <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                                </svg> </h2>
                            </div>
                            <h4>{{$arrOcupacion4Est[0]}}%</h4>
                            
                            @if( $arrOcupacion4Est[2] === 1)
                                <p> <img  src="{{ asset('imgs/decrec.png')}}"> Decrecimiento de: {{$arrOcupacion4Est[1]}}% vs mes anterior</p>
                            @elseif( $arrOcupacion4Est[2] === 2)
                                <p><img src="{{ asset('imgs/crec.png')}}">Crecimiento de: {{$arrOcupacion4Est[1]}}% vs mes anterior</p>
                            @elseif( $arrOcupacion4Est[2] === 3)
                                <p><img src="{{ asset('imgs/crec.png')}}">No registra cambio vs mes anterior</p>
                            @else
                                <p>---------------</p>
                            @endif
                            
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 mr-5">
                        <div class="card-sectionPo  border rounded">
                            <div class="card-headerPo3  rounded ">
                                <h2>3<svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                                    <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                                </svg> </h2>
                            </div>
                            <h4>{{$arrOcupacion3Est[0]}}%</h4>
                            
                            @if( $arrOcupacion3Est[2] === 1)
                                <p> <img  src="{{ asset('imgs/decrec.png')}}"> Decrecimiento de: {{$arrOcupacion3Est[1]}}% vs mes anterior</p>
                            @elseif( $arrOcupacion3Est[2] === 2)
                                <p><img src="{{ asset('imgs/crec.png')}}">Crecimiento de: {{$arrOcupacion3Est[1]}}% vs mes anterior</p>
                            @elseif( $arrOcupacion3Est[2] === 3)
                                <p><img src="{{ asset('imgs/crec.png')}}">No registra cambio vs mes anterior</p>
                            @else
                                <p>---------------</p>
                            @endif
                            
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-2 mr-5">
                        <div class="card-sectionPo  border rounded">
                            <div class="card-headerTp2  rounded ">
                                <h2>2<svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                                    <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                                    </svg> </h2>
                            </div>
                                <h4>{{$arrOcupacion2Est[0]}}%</h4>
                                
                                @if( $arrOcupacion2Est[2] === 1)
                                    <p> <img src="{{ asset('imgs/decrec.png')}}"> Decrecimiento de: {{$arrOcupacion2Est[1]}}% vs mes anterior</p>
                                @elseif( $arrOcupacion2Est[2] === 2)
                                    <p><img src="{{ asset('imgs/crec.png')}}">Crecimiento de: {{$arrOcupacion2Est[1]}}% vs mes anterior</p>
                                @elseif( $arrOcupacion2Est[2] === 3)
                                    <p><img src="{{ asset('imgs/crec.png')}}">No registra cambio vs mes anterior</p>
                                @else
                                    <p>---------------</p>
                                @endif
                                
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 mr-1 ">
                        <div class="card-sectionPo  border rounded">
                            <div class="card-headerTp1  rounded ">
                                <h2>1<svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                                    <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                                    </svg> </h2>
                            </div>
                                <h4>{{$arrOcupacion1Est[0]}}%</h4>
                                
                                @if( $arrOcupacion1Est[2] === 1)
                                    <p> <img src="{{ asset('imgs/decrec.png')}}"> Decrecimiento de: {{$arrOcupacion1Est[1]}}% vs mes anterior</p>
                                @elseif( $arrOcupacion1Est[2] === 2)
                                    <p><img src="{{ asset('imgs/crec.png')}}">Crecimiento de: {{$arrOcupacion1Est[1]}}% vs mes anterior</p>
                                @elseif( $arrOcupacion1Est[2] === 3)
                                    <p><img src="{{ asset('imgs/crec.png')}}">No registra cambio vs mes anterior</p>
                                @else
                                    <p>---------------</p>
                                @endif
                                
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <canvas id="myLineChart" width="800" height="300"></canvas>
                    </div>
                </div>
                <!---->
            </section>
        </section>
        
        <!-- fin promedio por ocupación--> 


        <!-- Incio REVPAR--> 
        <section  class="indicadoresDe" id="revpar">
            <h2>
                <img  style="padding-right:0.4em;" src="{{ asset('imgs/revpar.png')}}">
                REVPAR
            <h2><p class="significadoEstadisticas">Significa "ingreso por habitación disponible" y sirve para valorar el rendimiento financiero</p> <hr>
            <div class="row row-cols-2 row-cols-md-4 g-3">
                <div class="col-lg-2 col-md-2 mr-5 ">
                    <div class="card-sectionPo  border rounded">
                        <div class="card-headerPo5  rounded ">
                            <h2>5<svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                                <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                            </svg> </h2>
                        </div>
                        <h4>${{$arrRevpar5Est[0]}}</h4>
                        
                        @if( $arrRevpar5Est[2] === 1)
                            <p> <img  src="{{ asset('imgs/decrec.png')}}"> Decrecimiento de: {{$arrRevpar5Est[1]}} vs mes anterior</p>
                        @elseif( $arrRevpar5Est[2] === 2)
                            <p><img src="{{ asset('imgs/crec.png')}}">Crecimiento de: {{$arrRevpar5Est[1]}} vs mes anterior</p>
                        @elseif( $arrRevpar5Est[2] === 3)
                            <p><img src="{{ asset('imgs/crec.png')}}">No registra cambio vs mes anterior</p>
                        @else
                            <p>---------------</p>
                        @endif
                        
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 mr-5 ">
                    <div class="card-sectionPo  border rounded">
                        <div class="card-headerPo4  rounded ">
                            <h2>4<svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                                <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                            </svg> </h2>
                        </div>
                        <h4>${{$arrRevpar4Est[0]}}</h4>
                        
                        @if( $arrRevpar4Est[2] === 1)
                            <p> <img  src="{{ asset('imgs/decrec.png')}}"> Decrecimiento de: {{$arrRevpar4Est[1]}} vs mes anterior</p>
                        @elseif( $arrRevpar4Est[2] === 2)
                            <p><img src="{{ asset('imgs/crec.png')}}">Crecimiento de: {{$arrRevpar4Est[1]}} vs mes anterior</p>
                        @elseif( $arrRevpar4Est[2] === 3)
                            <p><img src="{{ asset('imgs/crec.png')}}">No registra cambio vs mes anterior</p>
                        @else
                            <p>---------------</p>
                        @endif
                        
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 mr-5 ">
                    <div class="card-sectionPo  border rounded">
                        <div class="card-headerPo3  rounded ">
                            <h2>3<svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                                <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                            </svg> </h2>
                        </div>
                        <h4>${{$arrRevpar3Est[0]}}</h4>
                        
                        @if( $arrRevpar3Est[2] === 1)
                            <p> <img  src="{{ asset('imgs/decrec.png')}}"> Decrecimiento de: {{$arrRevpar3Est[1]}} vs mes anterior</p>
                        @elseif( $arrRevpar3Est[2] === 2)
                            <p><img src="{{ asset('imgs/crec.png')}}">Crecimiento de: {{$arrRevpar3Est[1]}} vs mes anterior</p>
                        @elseif( $arrRevpar3Est[2] === 3)
                            <p><img src="{{ asset('imgs/crec.png')}}">No registra cambio vs mes anterior</p>
                        @else
                            <p>---------------</p>
                        @endif
                        
                    </div>
                    
                </div>

                <div class="col-lg-2 col-md-2 mr-5 ">
                    <div class="card-sectionPo  border rounded">
                        <div class="card-headerTp2  rounded ">
                            <h2>2<svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                                <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                            </svg> </h2>
                        </div>
                        <h4>${{$arrRevpar2Est[0]}}</h4>
                        
                        @if( $arrRevpar2Est[2] === 1)
                            <p> <img  src="{{ asset('imgs/decrec.png')}}"> Decrecimiento de: {{$arrRevpar2Est[1]}} vs mes anterior</p>
                        @elseif( $arrRevpar2Est[2] === 2)
                            <p><img src="{{ asset('imgs/crec.png')}}">Crecimiento de: {{$arrRevpar2Est[1]}} vs mes anterior</p>
                        @elseif( $arrRevpar2Est[2] === 3)
                            <p><img src="{{ asset('imgs/crec.png')}}">No registra cambio vs mes anterior</p>
                        @else
                            <p>---------------</p>
                        @endif
                        
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 mr-1 ">
                    <div class="card-sectionPo  border rounded">
                        <div class="card-headerTp1  rounded ">
                            <h2>1<svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                                <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                            </svg> </h2>
                        </div>
                        <h4>${{$arrRevpar1Est[0]}}</h4>
                        
                        @if( $arrRevpar1Est[2] === 1)
                            <p> <img  src="{{ asset('imgs/decrec.png')}}"> Decrecimiento de: {{$arrRevpar1Est[1]}} vs mes anterior</p>
                        @elseif( $arrRevpar1Est[2] === 2)
                            <p><img src="{{ asset('imgs/crec.png')}}">Crecimiento de: {{$arrRevpar1Est[1]}} vs mes anterior</p>
                        @elseif( $arrRevpar1Est[2] === 3)
                            <p><img src="{{ asset('imgs/crec.png')}}">No registra cambio vs mes anterior</p>
                        @else
                            <p>---------------</p>
                        @endif
                            
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body" style="background-color: rgb(238,238,238);">
                    <canvas style="background-color: rgb(238,238,238);" id="MyLineREVPAR" width="800" height="300"></canvas>
                </div>
            </div>
        </section>
        <!-- Fin REVPAR--> 

        <!-- Incio Estadía promeidio--> 
            <section class="fondoBlanco">
                <section  class="indicadoresDe porcentajeFondo" id="estadiaPromedio">
                    <h2>
                        <img  style="padding-right:0.4em;" src="{{ asset('imgs/estancia.png')}}">
                        ESTADIA PROMEDIO
                    <h2><p class="significadoEstadisticas">Es una aproximación al número de días que por término medio permanece un viajero en un establecimiento</p><hr>
                    <div class="row row-cols-2 row-cols-md-4 g-3">
                        <div class="col-lg-2 col-md-2 mr-5 ">
                            <div class="card-sectionPo  border rounded">
                                <div class="card-headerPo5  rounded ">
                                    <h2>5<svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                                        <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                                    </svg> </h2>
                                </div>
                                <h4>{{$arrEstadiaP5Est[0]}}</h4>
                                
                                @if( $arrEstadiaP5Est[2] === 1)
                                    <p> <img  src="{{ asset('imgs/decrec.png')}}"> Decrecimiento de: {{$arrEstadiaP5Est[1]}} vs mes anterior</p>
                                @elseif( $arrEstadiaP5Est[2] === 2)
                                    <p><img src="{{ asset('imgs/crec.png')}}">Crecimiento de: {{$arrEstadiaP5Est[1]}} vs mes anterior</p>
                                @elseif( $arrEstadiaP5Est[2] === 3)
                                    <p><img src="{{ asset('imgs/crec.png')}}">No registra cambio vs mes anterior</p>
                                @else
                                    <p>----------</p>
                                @endif
                                    
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 mr-5 ">
                            <div class="card-sectionPo  border rounded">
                                <div class="card-headerPo4  rounded ">
                                    <h2>4<svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                                        <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                                    </svg> </h2>
                                </div>
                                <h4>{{$arrEstadiaP4Est[0]}}</h4>
                                
                                @if( $arrEstadiaP4Est[2] === 1)
                                    <p> <img  src="{{ asset('imgs/decrec.png')}}"> Decrecimiento de: {{$arrEstadiaP4Est[1]}} vs mes anterior</p>
                                @elseif( $arrEstadiaP4Est[2] === 2)
                                    <p><img src="{{ asset('imgs/crec.png')}}">Crecimiento de: {{$arrEstadiaP4Est[1]}} vs mes anterior</p>
                                @elseif( $arrEstadiaP4Est[2] === 3)
                                    <p><img src="{{ asset('imgs/crec.png')}}">No registra cambio vs mes anterior</p>
                                @else
                                    <p>---------------</p>
                                @endif
                                
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 mr-5 ">
                            <div class="card-sectionPo  border rounded">
                                <div class="card-headerPo3  rounded ">
                                    <h2>3<svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                                        <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                                    </svg> </h2>
                                </div>
                                <h4>{{$arrEstadiaP3Est[0]}}</h4>
                                
                                @if( $arrEstadiaP3Est[2] === 1)
                                    <p> <img  src="{{ asset('imgs/decrec.png')}}"> Decrecimiento de: {{$arrEstadiaP3Est[1]}} vs mes anterior</p>
                                @elseif( $arrEstadiaP3Est[2] === 2)
                                    <p><img src="{{ asset('imgs/crec.png')}}">Crecimiento de: {{$arrEstadiaP3Est[1]}} vs mes anterior</p>
                                @elseif( $arrEstadiaP3Est[2] === 3)
                                    <p><img src="{{ asset('imgs/crec.png')}}">No registra cambio vs mes anterior</p>
                                @else
                                    <p>---------------</p>
                                @endif
                                
                            </div>
                        </div>  
                        <div class="col-lg-2 col-md-2 mr-5 ">
                            <div class="card-sectionPo  border rounded">
                                <div class="card-headerTp2  rounded ">
                                    <h2>2<svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                                        <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                                    </svg> </h2>
                                </div>
                                <h4>{{$arrEstadiaP2Est[0]}}</h4>
                                
                                @if( $arrEstadiaP2Est[2] === 1)
                                    <p> <img  src="{{ asset('imgs/decrec.png')}}"> Decrecimiento de: {{$arrEstadiaP2Est[1]}} vs mes anterior</p>
                                @elseif( $arrEstadiaP2Est[2] === 2)
                                    <p><img src="{{ asset('imgs/crec.png')}}">Crecimiento de: {{$arrEstadiaP2Est[1]}} vs mes anterior</p>
                                @elseif( $arrEstadiaP2Est[2] === 3)
                                    <p><img src="{{ asset('imgs/crec.png')}}">No registra cambio vs mes anterior</p>
                                @else
                                    <p>----------</p>
                                @endif
                                    
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 mr-1 ">
                            <div class="card-sectionPo  border rounded">
                                <div class="card-headerTp1  rounded ">
                                    <h2>1<svg version="1.1" xmlns="http://www.w3.org/2000/svg"width="40" height="40" viewBox="0 0 150 165">
                                        <polygon fill="yellow" points="129,150 85,119 41,150 57,104 15,66,68,66 85,15 102,65 156,66 113,98" />
                                    </svg> </h2>
                                </div>
                                <h4>{{$arrEstadiaP1Est[0]}}</h4>
                                
                                @if( $arrEstadiaP1Est[2] === 1)
                                    <p> <img  src="{{ asset('imgs/decrec.png')}}"> Decrecimiento de: {{$arrEstadiaP1Est[1]}} vs mes anterior</p>
                                @elseif( $arrEstadiaP1Est[2] === 2)
                                    <p><img src="{{ asset('imgs/crec.png')}}">Crecimiento de: {{$arrEstadiaP1Est[1]}} vs mes anterior</p>
                                @elseif( $arrEstadiaP1Est[2] === 3)
                                    <p><img src="{{ asset('imgs/crec.png')}}">No registra cambio vs mes anterior</p>
                                @else
                                    <p>----------</p>
                                @endif
                                    
                            </div>
                        </div>

                    </div>
                    <div class="card">
                        <div class="card-body">
                            <canvas id="MyLineEstadiaP" width="800" height="300"></canvas>
                        </div>
                    </div>
                </section>
            </section>
    </section>
    <!-- Fin Estadía promeidio--> 
    
@endsection

@section('pieDePagina')
    @include('layouts.footer')
@endsection


@section('scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

<script>
    $(document).ready(function(){ //Hacia arriba
        irArriba();
    });

    function irArriba(){
        $('.flechaInicio').click(function(){ 
            $('body,html').animate({ scrollTop:'10px' },100); 
        });
        $(window).scroll(function(){
            if($(this).scrollTop() > 0){ 
                $('.flechaInicio').slideDown(600); 
            }else{ 
                $('.flechaInicio').slideUp(600);
            }
        });
        $('.flechaInicio').click(function(){ $('body,html').animate({ scrollTop:'0px' },2); });
        }
</script>

<script>
    var fecha = [];
    var ocupacion = [];
    var tarifaPH = [];
    var tarifaPP = [];
    var revpar = [];
    var estadiaProm = [];

    $(document).ready(function(){
        $.ajax({
            url:'{{url("datosEstadisticos/all")}}',
            method: 'POST',
            data:{
                mes:{{$mes}},
                anio:{{$anio}},
                _token: $('input[name="_token"]').val()
            }
        }).done(function(res){
            
            var arreglo = JSON.parse(res);
            
            for(var i=0;i<arreglo.length;i++){
                    var auxOcupacion = (( arreglo[i].hab_ocupadas/ arreglo[i].hab_disponibles)*100).toFixed(2);
                    var auxTarifaPH = (( arreglo[i].ventasNetas/ arreglo[i].hab_ocupadas)*100).toFixed(2);
                    var auxTarifaPP = (( arreglo[i].ventasNetas/ arreglo[i].pernoctaciones)*100).toFixed(2);
                    var auxRevpar = (( arreglo[i].ventasNetas/ arreglo[i].hab_disponibles)*100).toFixed(2);
                    var auxEstadiaProm = (( arreglo[i].pernoctaciones/ arreglo[i].checkins)*100).toFixed(2);

                    fecha.push(arreglo[i].fecha);
                    ocupacion.push(auxOcupacion);
                    tarifaPH.push(auxTarifaPH);
                    tarifaPP.push(auxTarifaPP);
                    revpar.push(auxRevpar);
                    estadiaProm.push(auxEstadiaProm);
            }
            graficasPastel();
            graficaLineaPorcentajeO();
            graficaLineaTarifaPromP();
            graficaLineaTarifaPromH();
            graficaLineaREVPAR();
            graficaLineaEstadiaP();
        });
    });

    function graficasPastel(){
        var ctx5 = document.getElementById('huespedes5');
        var huespedes5 = new Chart(ctx5, {
            type: 'pie',
            data: {
                labels: ['Nacionales', 'Extranjeros'],
                datasets: [{
                    label: '# of Votes',
                    data: ['{{$arrHuespedes5Est[0]}}' , '{{$arrHuespedes5Est[1]}}'],
                    backgroundColor: [
                        'rgb(148, 243, 122)',
                        'rgb(255, 236, 60)'
                    ],
                    
                    borderWidth: 1
                }]
            }
            
        });

        var ctx4 = document.getElementById('huespedes4');
        var huespedes4 = new Chart(ctx4, {
            type: 'pie',
            data: {
                labels: ['Nacionales', 'Extranjeros'],
                datasets: [{
                    label: '# of Votes',
                    data: ['{{$arrHuespedes4Est[0]}}' , '{{$arrHuespedes4Est[1]}}'],
                    backgroundColor: [
                        'rgb(148, 243, 122)',
                        'rgb(255, 236, 60)'
                    ],
                    
                    borderWidth: 1
                }]
            }
            
            
        });


        var ctx3 = document.getElementById('huespedes3');
        var huespedes3 = new Chart(ctx3, {
            type: 'pie',
            data: {
                labels: ['Nacionales', 'Extranjeros'],
                datasets: [{
                    label: '# of Votes',
                    data: ['{{$arrHuespedes3Est[0]}}' , '{{$arrHuespedes3Est[1]}}'],
                    backgroundColor: [
                        'rgb(148, 243, 122)',
                        'rgb(255, 236, 60)'
                    ],
                    
                    borderWidth: 1
                }]
            }
            
            
        });

        var ctx2 = document.getElementById('huespedes2');
        var huespedes2 = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: ['Nacionales', 'Extranjeros'],
                datasets: [{
                    label: '# of Votes',
                    data: ['{{$arrHuespedes2Est[0]}}' , '{{$arrHuespedes2Est[1]}}'],
                    backgroundColor: [
                        'rgb(148, 243, 122)',
                        'rgb(255, 236, 60)'
                    ],
                    
                    borderWidth: 1
                }]
            }
            
            
        });

        var ctx1 = document.getElementById('huespedes1');
        var huespedes1 = new Chart(ctx1, {
            type: 'pie',
            data: {
                labels: ['Nacionales', 'Extranjeros'],
                datasets: [{
                    label: '# of Votes',
                    data: ['{{$arrHuespedes1Est[0]}}' , '{{$arrHuespedes1Est[1]}}'],
                    backgroundColor: [
                        'rgb(148, 243, 122)',
                        'rgb(255, 236, 60)'
                    ],
                    
                    borderWidth: 1
                }]
            }
            
            
        });

    }
    
    function graficaLineaPorcentajeO(){
        var ctx2 = document.getElementById('myLineChart').getContext('2d');
        var myLineChart = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: fecha,
                datasets: [{
                    label: 'Porcentaje Ocupación',
                    data: ocupacion,
                    backgroundColor: [
                        'rgb(125, 255, 102, 0.7)'
                    ],
                    borderColor: [
                        ' rgb(69,202,0)'
                    ],
                    borderWidth: 2,
                    pointRadius: 6
                }]
            },
            options: {
                
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
            
        });
    }
    function graficaLineaTarifaPromP(){
        var ctx2 = document.getElementById('tarifaPromPerson').getContext('2d');
        var tarifaPromPerson = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: fecha,
                datasets: [{
                    label: 'Tarifa Promedio por Persona',
                    data: tarifaPP,
                    
                    backgroundColor: [
                        'rgb(125, 255, 102, 0.7)'
                    ],
                    borderColor: [
                        ' rgb(69,202,0)'
                    ],
                    borderWidth: 2,
                    pointRadius: 6
                }]
            },
            options: {
                
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
            
        });
    }
    function graficaLineaTarifaPromH(){
        var ctx2 = document.getElementById('tarifaPromHabitacion').getContext('2d');
        var tarifaPromHabitacion = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: fecha,
                datasets: [{
                    label: 'Tarifa Promedio por Habitación',
                    data: tarifaPH,
                    backgroundColor: [
                        'rgb(125, 255, 102, 0.7)'
                    ],
                    borderColor: [
                        ' rgb(69,202,0)'
                    ],
                    borderWidth: 2,
                    pointRadius: 6
                }]
            },
            options: {
                
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    backgroundColor: [
                        'rgb(125, 255, 102)'
                    ]
                }
            }
            
        });
    }
    function graficaLineaREVPAR(){
        var ctx2 = document.getElementById('MyLineREVPAR').getContext('2d');
        var MyLineREVPAR = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: fecha,
                datasets: [{
                    label: 'REVPAR',
                    data: revpar,
                    backgroundColor: [
                        'rgb(125, 255, 102, 0.7)'
                    ],
                    borderColor: [
                        ' rgb(69,202,0)'
                    ],
                    borderWidth: 2,
                    pointRadius: 6
                }]
            },
            options: {
                
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
            
        });
    }
    function graficaLineaEstadiaP(){
        var ctx2 = document.getElementById('MyLineEstadiaP').getContext('2d');
        var MyLineEstadiaP = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: fecha,
                datasets: [{
                    label: 'Tarifa Promedio por Persona',
                    data: estadiaProm,
                    backgroundColor: [
                        'rgb(125, 255, 102,0.7)'
                    ],
                    borderColor: [
                        ' rgb(69,202,0)'
                    ],
                    borderWidth: 2,
                    pointRadius: 6
                }]
            },
            options: {
                
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
            
        });
    }
</script>



@endsection

