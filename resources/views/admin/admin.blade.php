@extends('layouts.admin')

@section('title', 'Admin Tembarbada')

@section('content')
    <div id="content">

      <!-- Topbar -->
      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

          <!-- Nav Item - Search Dropdown (Visible Only XS) -->
         

          <div class="topbar-divider d-none d-sm-block"></div>

          <!-- Nav Item - User Information -->
          <li class="nav-item">
            <a href="#" class="nav-link">Sair</a>
          </li>

        </ul>

      </nav>
      <!-- End of Topbar -->

      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Painel de controle</h1>
        

    </div>
      <div class="modal fade" id="add-category-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h5 class="modal-title title-bg" id="exampleModalLabel">Adicionar Categoria</h5>
          <button type="button" class="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      
        
         <div class="modal-body row">
            <div class="form-group col-lg-12">
              <label>Nome: </label>
                <input class="form-control" type="text" name="nome" placeholder="Nova Categoria">
            </div>
          </div>
         <div class="modal-footer">
          <button class="btn btn-success">Salvar</button>
           <button class="btn btn-secondary"  data-dismiss="modal">Cancelar</button>
        </div>  
      </div>
    </div>
</div>
@endsection

@section('footer')
  <footer class="sticky-footer mt-5 bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Tem Barbada 2019</span>
          </div>
        </div>
      </footer>
@endsection

