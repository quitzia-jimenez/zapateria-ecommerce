<!DOCTYPE html>
<html lang="en">

    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bomu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="icon" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/svgs/solid/lock.svg" type="image/svg+xml">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="icon" type="image/png" href="{{ asset('recursos/user/img/shoes.png') }}">


    <link rel="stylesheet" href="{{asset('recursos/admin/css/styles.min.css')}}" />
    @stack('styles')
    </head>

    <body>
    <!--  Body Wrapper -->
        <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
            data-sidebar-position="fixed" data-header-position="fixed">
            <!-- Sidebar Start -->
            <aside class="left-sidebar">
                <!-- Sidebar scroll-->
                <div>
                    <div class="brand-logo d-flex align-items-center justify-content-between">
                        <a href="{{ route('home.index') }}" >
                            <img src="{{ asset('recursos/user/img/bomu-logo.png') }}" width="180" alt="logo">
                        </a>
                        
                        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                            <i class="ti ti-x fs-8"></i>
                        </div>
                        </div>
                        <!-- Sidebar navigation-->
                        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                        <ul id="sidebarnav">
                            <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                            </li>
                            <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('admin.index')}}" aria-expanded="false">
                                <span>
                                <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                            </li>
                            <li class="nav-small-cap">
                            <i class="ti ti-layout-dashboard nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Inventario y pedidos</span>
                            </li>
                            <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('admin.products')}}" aria-expanded="false">
                                <span>
                                <i class="ti ti-article"></i>
                                </span>
                                <span class="hide-menu">Productos</span>
                            </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{route('admin.categories')}}" aria-expanded="false">
                                    <span>
                                    <i class="ti ti-article"></i>
                                    </span>
                                    <span class="hide-menu">Categorias</span>
                                </a>
                                </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{route('admin.coupons')}}" aria-expanded="false">
                                    <span>
                                    <i class="ti ti-file-description"></i>
                                    </span>
                                    <span class="hide-menu">Cupones</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{route('admin.orders')}}" aria-expanded="false">
                                    <span>
                                    <i class="ti ti-file-description"></i>
                                    </span>
                                    <span class="hide-menu">Pedidos</span>
                                </a>
                            </li>
                            
                            <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Usuarios</span>
                            </li>
                            <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('admin.users')}}" aria-expanded="false">
                                <span>
                                <i class="ti ti-user"></i>
                                </span>
                                <span class="hide-menu">Administrar</span>
                            </a>
                            </li>
                        </ul>
                
                    </nav>
            <!-- End Sidebar navigation -->
                </div>
                <!-- End Sidebar scroll-->
            </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
        <!--  Header Start -->
        <header class="app-header">
            <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
                </li>
            </ul>
            <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <img src="{{ asset('recursos/admin/img/user-1.jpg') }}" alt="" width="35" height="35" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <div class="message-body">
                            <form method="POST" action="{{route('logout')}}" id="logout-form">
                                @csrf
                                <a href="{{route('logout')}}" class="btn btn-outline-primary mx-3 mt-2 d-block" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Logout</a>

                            </form>
                            

                        </div>
                    </div>
                </li>
                </ul>
            </div>
            </nav>
        </header>
        <!--  Header End -->
            <!--  main container -->
            @yield('content')
            <!--  main container end -->
        </div>
    </div>
   
    <script src="{{asset('recursos/admin/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('recursos/admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('recursos/admin/js/sidebarmenu.js')}}"></script>
    <script src="{{asset('recursos/admin/js/app.min.js')}}"></script>
    <script src="{{asset('recursos/admin/libs/simplebar/dist/simplebar.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    @stack('scripts')
    
    </body>

</html>