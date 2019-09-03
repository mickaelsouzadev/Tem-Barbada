@extends('layouts.app')

@section('title', 'Barbadas')

@section('header')
	<nav class="navbar navbar-expand-lg fixed-top ">  
		 <a class="navbar-brand" href="#"><img src="{{ asset('img/logo-nav-2.png') }}" width="100"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">  
		 <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">     <ul class="navbar-nav mr-4 ml-auto">
		 
		 <li class="nav-item">
		     <a class="nav-link" data-value="cadastre-se" href="/">Voltar <i class="fas fa-home"></i></a> 
		 </li> 
		 @if (Auth::guard('client')->check())
		  	<li class="nav-item">
		 	    <a class="nav-link " data-value="entrar" href="/painel-cliente">Meu painel <i class="fas fa-lock"></i></a>   
		 	</li> 
		 	<li class="nav-item">
		 	    <a class="nav-link " data-value="entrar" href="/sair">Sair <i class="fas fa-sign-out-alt"></i></a>   
		 	</li> 
		@else
			<li class="nav-item">
			 	<a class="nav-link" data-value="cadastre-se" href="/cadastre-se">Cadastre-se  <i class="fas fa-sign-in-alt"></i></a> 
			</li>  
			<li class="nav-item">
			 	  <a class="nav-link " data-value="entrar" href="#" data-toggle="modal" data-target="#login-modal">Entrar <i class="fas fa-lock"></i></a>   
			 </li> 
		 @endif		 
		
		</ul> 
		</div>
	</nav>

@endsection

@section('content')
	<section class="container main-section page-out">
		
		@if($data['type'] === 'city')
			<ads-by-city :city={{ $data['id'] }}></ads-by-city>
		@else
			<ads-by-state :state={{ $data['id'] }}></ads-by-state>
		@endif
		
	</section>
@endsection

@section('footer')
<login></login>
<footer class="bg-primary container-fluid footer">
		<div class="row justify-content-center">
			<div class="col-lg-12 text-center">
				Tem Barbada &copy; 2019
			</div>
			<div class="col-lg-12 text-center" id="footer-mini">
				Por Darby Biehl
			</div>
		</div>
		
	</footer>
@endsection

