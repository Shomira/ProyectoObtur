<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Observatorio de Turistimo</title>
    <!-- Sweet Alert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- Custom fonts for this template-->
    <link href="{{asset('/dash/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Quantico&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('/dash/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">


        
    @yield('css')
</head>

<body id="page-top">
    

    <!-- Page Wrapper -->
    <div id="wrapper">
        

        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!--Inicio Barra-->
                    <section style="margin-top: 0.5em; padding-top: -1em;" ></section>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">

                        <h2><img style="margin-right: 0.5em; margin-bottom: -0.5em;" src="{{ asset('imgs/adminv.png')}}"> Bienvenid@ {{ Auth::user()->name }}</h2>
                        
                            <li class="nav-item dropdown no-arrow" >
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-3 d-none d-lg-inline text-gray-900 "> {{ Auth::user()->name }}</span>
                                    <img class="img-profile rounded-circle" 
                                        >
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Perfil
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Configuración
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Salir
                                    </a>
                                </div>
                            </li>
                    </div>
                    <hr>
                   
                    <!--Fin barra-->
                   @yield('contenido')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
        
            <div class="row marcasAdmin">
                <hr>
                <div class="col-sm-3 marcasImg" ></div>
                <div class="col-sm-3 marcasImg" ><img src="{{ asset('imgs/Recurso 8@3x.png')}}" alt=""></div>
                <div class="col-sm-3 marcasImg" ><img src="{{ asset('imgs/Recurso 13.png')}}" alt=""></div>
                
            </div>
       
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->




    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->


    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                 <!-- <div class="modal-header">
                  <h5 class="modal-title" action="{{ route('logout') }}" method="POST" id="exampleModalLabel">Salir</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>-->
                <div class="modal-body">¿Desea Salir ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button  class="btn btn-danger" type="submit" >Salir</button>
                    </form>

                </div>
            </div>
        </div>
    </div>






    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('/dash/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/dash/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('/dash/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('/dash/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('/dash/vendor/chart.js/Chart.min.js')}}"></script>

    
    <!-- Page level custom scripts -->
    <script src="{{asset('/dash/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('/dash/js/demo/chart-pie-demo.js')}}"></script>
    <main class="publico">
        @yield('content')
        @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    </main>
    @yield('scripts')
</body>

</html>