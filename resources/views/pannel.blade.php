@extends('layouts.app')

@section('title', 'Painel do Cliente')

@section('header')
	<nav class="navbar navbar-expand-lg fixed-top ">  
		 <a class="navbar-brand" href="#"><img src="{{ asset('img/logo-nav-2.png') }}" width="100"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">  
		 <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">     <ul class="navbar-nav mr-4 ml-auto">
		 
		 <li class="nav-item">
		     <a class="nav-link" data-value="cadastre-se" href="index.html">Voltar <i class="fas fa-home"></i></a> 
		 </li> 
		 <li class="nav-item dropdown">
		 	<a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		 	    <img src="{{ asset('img/agostinho.jpg') }}" class="rounded-circle" width="46"> Meu Perfil  <i class="fas fa-caret-down"></i>
		 	</a>
		 	<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
		 	  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#perfil-modal"><i class="fas fa-user"></i>  Ver Pefil</a>
		 	  <a class="dropdown-item" href="#"  data-toggle="modal" data-target="#edit-modal"><i class="fas fa-edit"></i> Editar Minhas Informações </a>
		 	  <div class="dropdown-divider"></div>
		 	  <a class="dropdown-item" href="#">Sair <i class="fas fa-sign-out-alt"></i></a>
		 	</div>        
		 	
		 </li>  
		
		</ul> 
		</div>
	</nav>

@endsection

@section('content')

	<section class="container main-section page-out">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="title">Minhas Barbadas</strong></h2>
			</div>
			<div class="col-lg-3 ads" data-toggle="modal" data-target="#add-ad-modal">
				<div class="card text-center add-card">
					
				  <div class="card-body">
				  	<i class="fas fa-plus add-icon fa-6x"></i>
				    <h5 class="card-title add-title">Adicionar Anúncio</h5>
				  </div>
				</div>
			</div >
			<div class="col-lg-3 ads" data-toggle="modal" data-target="#ad-modal">
				<div class="card">
					<img class="card-img-top img-fluid" src=" {{ asset('img/agostinho.jpg')  }}" alt="Card image cap">
				  <div class="card-body">
				  	<div class="text-center">
				  		 <h5 class="mt-1 mb-2 card-title-ad">Promoção Frota Nova</h5> 
				    	<p class="card-text">Renovamos nossa frota...</p>
				  	</div>
				  
				    <div class="text-right mt-3" style="font-size: .92em;">
				    	Até 05/09/2019
				    </div>
				    	
				  </div>
				</div>
			</div >	
				
		</div>
	</section>
@endsection

@section('footer')
<footer class="bg-primary container-fluid footer footer-fixed">
	<div class="row justify-content-center">
		<div class="col-lg-12 text-center">
			Tem Barbada &copy; 2019
		</div>
		<div class="col-lg-12 text-center" id="footer-mini">
			Por Darby Biehl
		</div>
	</div>
	
</footer>

<my-ad-modal-component></my-ad-modal-component>
<add-ad-modal-component></add-ad-modal-component>
<profile-component></profile-component>
<edit-my-info-component></edit-my-info-component>




@endsection