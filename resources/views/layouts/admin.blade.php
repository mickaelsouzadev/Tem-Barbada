<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

     <!-- Custom fonts for this template-->
    <link href="{{ asset('admin-assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

     <!-- Custom styles for this template-->
    <link href="{{ asset('admin-assets/css/sb-admin-2.css') }}" rel="stylesheet">  
    <script src="{{ asset('js/app.js') }}" defer></script>    

</head>
<body id="page-top">

    <div id="app">
        <div id="wrapper">
             <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon mx-12"><img class="mx-auto d-block logo col-lg-8" src="{{ asset('img/logo-nav-2.png')}}"></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Painel de Controle</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
      <a class="nav-link" href="clientes.html">
        <i class="fas fa-fw fa-user"></i>
        <span>Clientes</span></a>
    </li>
     <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-list-ul"></i>
        <span>Categorias</span>
      </a>
      <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="#" data-toggle="modal" data-target="#add-category-modal">Adicionar Categoria</a>
          <a class="collapse-item" href="categorias.html">Ver Categorias</a>
        </div>
      </div>
    </li>
    <!-- Nav Item - Tables -->
    <!-- <li class="nav-item">
      <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
    </li> -->

    <!-- Divider -->
   {{--  <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
 --}}
  </ul>

  <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  

    <!-- Main Content -->
   

            <div id="content-wrapper" class="d-flex flex-column">

                @yield('content')
             
               
                @yield('footer')
            </div>
        </div>
        <a class="scroll-to-top rounded" href="#page-top">
           <i class="fas fa-angle-up"></i>
         </a>
    </div>

    <script src="{{ asset('admin-assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

      <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin-assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

      <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin-assets/js/sb-admin-2.min.js')}}"></script>
</body>
</html>
