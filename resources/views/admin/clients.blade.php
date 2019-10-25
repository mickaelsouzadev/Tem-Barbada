@extends('layouts.admin')

@section('title', 'Admin Tembarbada')

@section('content')

 <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Clientes</h1>
          <div class="row mt-2">
            <div class="col-lg-6">
              <form class="form-inline">
                <div class="form-group mx-1">
                  <select class="form-control" name="filtro">
                    <option value="">Filtro</option>
                    <option value="estado">Estado</option>
                    <option value="cidade">Cidade</option>
                    <option value="email">Email</option>
                  </select>
                </div>
                <div class="form-group mx-1">
                  <input class="form-control" type="text" name="buscar" placeholder="Buscar Usuário">
                </div>
                 <div class="form-group mx-1">
                  <input class="form-control btn btn-info" type="submit" value="Buscar">
                </div>
              </form>
            </div>  
          </div>
        <admin-client></admin-client>

      </div>
{{--     --}}
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

