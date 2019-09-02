@extends('layouts.app')

@section('title', 'Painel do Cliente')

@section('header')
	<profile-nav></profile-nav>

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

<my-ad-modal></my-ad-modal>
<add-ad-modal></add-ad-modal>
<profile></profile>





@endsection