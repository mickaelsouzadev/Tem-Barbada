@extends('layouts.app')

@section('title', 'Tem Barbada')

@section('header')
<nav class="navbar navbar-expand-lg fixed-top ">  
	 <a class="navbar-brand" href="#"><img src="{{ asset('img/logo-nav-2.png')}}" width="100"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">  
	 <span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">     <ul class="navbar-nav mr-4 ml-auto">
	<li class="nav-item">
	     <a class="nav-link" data-value="cadastre-se" href="#como-funciona">Como funciona?</a> 
	 </li> 
	 <li class="nav-item">
	     <a class="nav-link" data-value="cadastre-se" href="#planos">Planos</a> 
	 </li> 
	  <li class="nav-item">
	     <a class="nav-link" data-value="cadastre-se" href="#contato">Contato</a> 
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
	     <a class="nav-link" data-value="cadastre-se" href="/cadastre-se">Cadastre-se  <i class="fas fa-sign-in-alt"></i></a> </li>  
	<li class="nav-item">
	    <a class="nav-link " data-value="entrar" href="#" data-toggle="modal" data-target="#login-modal">Entrar <i class="fas fa-lock"></i></a>   </li> 
	@endif
	</ul> 
	</div>
</nav>

<header class="header main-header">
	<div class="header-section">
		<div class="row justify-content-center">
			<img src="{{ asset('img/logo1.png')}}" class="col-lg-4">
		</div>
		<filter-component></filter-component>
	</div>
</header>
@endsection

@section('content')
	<section class="container main-section" id="como-funciona">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="title text-center">Como funciona?</h2>
					<p class="main-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas quis enim rutrum, feugiat urna at, hendrerit mauris. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce sed leo nec arcu volutpat accumsan.</p>
				</div>
				<div class="col-lg-4 step">
					<div class="card">
						<img class="card-img-top" src="{{ asset('img/bg.jpg')}}" alt="Card image cap">
					  <div class="card-body r">
					    <h5 class="card-title text-center">Passo 1</h5>
					    <h6 class="card-subtitle mb-2 text-muted text-center">Lorem Ipsum</h6>
					    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  </div>
					</div>
				</div>
				<div class="col-lg-4 step">
					<div class="card">
						<img class="card-img-top" src="{{ asset('img/bg.jpg')}}" alt="Card image cap">
					  <div class="card-body">
					    <h5 class="card-title text-center">Passo 2</h5>
					    <h6 class="card-subtitle mb-2 text-muted text-center">Lorem Ipsum</h6>
					    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  </div>
					</div>
				</div>
				<div class="col-lg-4 step">
					<div class="card">
						<img class="card-img-top" src="{{ asset('img/bg.jpg')}}" alt="Card image cap">
					  <div class="card-body">
					    <h5 class="card-title text-center">Passo 3</h5>
					    <h6 class="card-subtitle mb-2 text-muted text-center">Lorem Ipsum</h6>
					    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  </div>
					</div>
				</div>
			</div>
		</section>
		
			<section class="container main-section" id="planos">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="title">Planos</h2>
					<p class="main-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas quis enim rutrum, feugiat urna at, hendrerit mauris. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce sed leo nec arcu volutpat accumsan.</p>
				</div>
			</div>
			<div class="row justify-content-center pricing">
				<div class="card col-lg-3 price-card text-center">
				  <div class="card-body">
				    <h5 class="card-title title">Plano Básico</h5>
				     <p class="text-center price">10 R$</p>
				    <ul class="list-group">
				    	<li class="list-group-item">Anúncios por 24 horas</li>
				    	<li class="list-group-item">Até 5 Anúncios por dia</li>
				    </ul>
				   
				  </div>
				  <div class="card-footer price-footer">
				  	<button class="btn btn-primary">Selecionar</button>
				  </div>
				</div>
				<div class="card col-lg-3 price-card text-center">
				  <div class="card-body">
				    <h5 class="card-title title">Plano Pro</h5>
				    <p class="text-center price">30 R$</p>
				    <ul class="list-group">
				    	<li class="list-group-item">Anúncios por até uma semana</li>
				    	<li class="list-group-item">Até 15 anúncios por semana</li>
				    </ul>
				    
				  </div>
				  <div class="card-footer price-footer">
				  	<button class="btn btn-primary">Selecionar</button>
				  </div>
				</div>
				<div class="card col-lg-3 price-card text-center">
				  <div class="card-body">
				    <h5 class="card-title title">Plano Master</h5>
				    <p class="text-center price">65 R$</p>
				    <ul class="list-group">
				    	<li class="list-group-item">Anúncios por tempo ilimitado</li>
				    	<li class="list-group-item">Sem Limite de Anúncios</li>
				    </ul>
				    
				  </div>
				  <div class="card-footer price-footer">
				  	<button class="btn btn-primary">Selecionar</button>
				  </div>
				</div>			
			</div>
		</section>
		<section class="container main-section" id="locais">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="title">Tem Barbada em: </h2>
				</div>
			</div>
			<div class="row justify-content-center pricing">
				<div class="card col-lg-3 price-card local-card  text-center">
				  <div class="card-body">
				    <h1 class="card-title title local-title">3</h1>
				     <p class="text-center local-subtitle">Estados</p>
				  </div>
				  
				</div>
			
			
				<div class="card col-lg-3 price-card local-card text-center">
				  <div class="card-body">
				    <h1 class="card-title title local-title">5</h1>
				     <p class="text-center local-subtitle">Cidades</p>
				  </div>
				  
				</div>
			
			
			
				<div class="card col-lg-3 price-card local-card text-center">
				  <div class="card-body">
				    <h1 class="card-title title local-title">10</h1>
				     <p class="text-center local-subtitle">Estabelecimentos</p>
				  </div>
				  
				</div>
			
			</div>
		</section>
		<section class="container main-section" id="contato">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="title">Contato</h2>
				</div>
			</div>
			<div class="row ">
				<div class="col-lg-5 contact-col">
					<form>
						<div class="form-group">
							<label>Nome</label>
							<input type="text" name="nome" class="form-control" placeholder="Seu Nome">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" placeholder="Seu Email">
						</div>
						<div class="form-group">
							<label>Mensagem</label>
							<textarea name="msg" placeholder="Sua Mensagem" class="form-control" ></textarea>
								
							
						</div>
						<div class="form-group text-center">
							<button class="btn btn-primary" style="padding: 0.6rem 2rem" >Enviar Mensagem</button>
						</div>
					</form>
				</div>
				<div class="col-lg-6" id="contact-infos">
					<div class="col-lg-12 contact-info">
						<strong><i class="fas fa-envelope fa-1x"></i></strong> tembarbada@tembarbada.com
					</div>
					<div class="col-lg-12 contact-info">
						<strong><i class="fas fa-phone-alt fa-1x"></i></strong> (51)9999-0000
					</div>
					<div class="col-lg-12 contact-info" id="contact-img">

						<img src="{{ asset('img/user.jpg')}}" class="rounded-circle" width="46">
							
						<span style="margin-left: 5px">Darby Biehl</span>
						<br>
						<!-- <span style="margin-left: 3.2rem; color: #777; font-size: 1rem">Mais outras informações</span> -->
							
							
							
					</div>
					
				</div>
			</div>
		</section>
@endsection

@section('footer')
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
	<login></login>
	
@endsection