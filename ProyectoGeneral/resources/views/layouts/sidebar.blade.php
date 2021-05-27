    <ul class="navbar-nav  sidebar sidebar-dark accordion" style="background-color: #004170" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/ ')}}">
            <div class="sidebar-brand-icon rotate-n-1">
                
                <i class="fas fa-map-marked-alt"></i>
            </div>
            <div class="sidebar-brand-text mx-1"> OBTUR-UTPL</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Divider -->
        <hr class="sidebar-divider">
        @if(Auth::user()->rol == 'Administrador')
        
            <!-- Heading -->
            <div class="sidebar-heading">
                MÓDULOS
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link  {{ request()->is('home/') ? 'activeA': ' '}} collapsed" href="{{url('home/')}}">
                    <i class="fa fa-home fa-fw"></i>
                    <span> Inicio</span>
                </a>
                
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('home/gestionUsuarios') ? 'activeA': ' '}}" href="{{url('home/gestionUsuarios')}}">
                    <i class="fa fa-users fa-fw" ></i>
                    <span> Gestionar Usuarios</span></a>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('home/metricas') ? 'activeA': ' '}}" href="{{url('home/metricas')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Métricas</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            
            <!-- Nav Item - Charts -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-table fa-fw"></i>
                    <span>Datos Cargados</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{url('home/visualizarArchivos')}}">Visualizar Registros</a>

                        <a class="collapse-item" href="{{url('home/visualizarEstablecimientos')}}">Establecimientos</a> 
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Archivos</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{url('home/archivos')}}">Cargar Archivos</a>
                    <div class="collapse-divider"></div>
                        <a class="collapse-item" href="{{url('home/visualizarArchivosCargados')}}">Lista de Archivos</a> 
                    </div>
                </div>
            </li>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
                <br>
            <!-- Sidebar Message -->
            <div class="sidebar-card">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="">
                <p class="text-center mb-2"><strong></strong> </p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">UTPL</a>
            </div>
        @endif

        @if(Auth::user()->rol == 'Establecimiento')
            <div class="sidebar-heading">
                MÓDULOS
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link  {{ request()->is('home/') ? 'activeA': ' '}} collapsed" href="{{url('home/')}}">
                    <i class="fa fa-home fa-fw"></i>
                    <span  style="font-weight: 800;"> Inicio</span>
                </a>
                
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('home/comparativas') ? 'activeA': ' '}}" href="{{url('home/comparativas')}}">
                    <i class="fa fa-chart-line fa-fw" ></i>
                    <span> Comparativas</span></a>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('home/resumenMensual') ? 'activeA': ' '}}" href="{{url('home/resumenMensual')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Resumen Mensual</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('home/analisisDeNegocio') ? 'activeA': ' '}}" href="{{url('home/analisisDeNegocio')}}">
                    <i class="fas fa-fw fa-chart-bar"></i>
                    <span>Analisis de Negocio</span></a>
            </li>

            <!-- Divider -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('home/visualizarRegistros') ? 'activeA': ' '}}" href="{{url('home/visualizarRegistros')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Visualizar Registros</span></a>
            </li>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
                <br>
            <!-- Sidebar Message -->
            <div class="sidebar-card">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="">
                <p class="text-center mb-2"><strong></strong> </p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">UTPL</a>
            </div>
        @endif

    </ul>