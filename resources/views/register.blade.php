@extends('layouts.app')

@section('title', 'Tem Barbada - Cadastre-se')

@section('header')
	<nav class="navbar navbar-expand-lg fixed-top ">  
		 <a class="navbar-brand" href="#"><img src="{{ asset('img/logo-nav-2.png')}}" width="100"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">  
		 <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">     
		<ul class="navbar-nav mr-4 ml-auto">
		<li class="nav-item">
		     <a class="nav-link" data-value="cadastre-se" href="/">Voltar <i class="fas fa-home"></i></a> 
		 </li> 
		</ul> 
		</div>
	</nav>


@endsection

@section('content')
	<section class="container main-section mt-5" id="planos">
		<div class="row justify-content-center pricing">
			<div class="col-lg-12 text-center">
				<h3 class="title">Cadastre-se</h3>
			</div>
			{{-- <div class="card col-lg-9 price-card">
			  <div class="card-body">
			    <form class="form-inline">
			    	      	
			    </form>
			  </div>
			</div> --}}
			<div class="col-md-8">
			        <form class="row form">
			            <div class="col-md-6">
			                <div class="form-group">
			                   	<label>Email: </label>
			    	      		<input type="email" name="email" class="form-control" placeholder="Email">
			                </div>
			            </div>
			            <div class="col-md-6">
			                <div class="form-group">
			                   	<label>Senha: </label>
			    	      		<input type="password" name="senha" class="form-control" placeholder="Senha">
			                </div>
			            </div>
			            <div class="col-md-6">
			                <div class="form-group">
			                    <label>Nome Fantasia: </label>
			    	      		<input type="text" name="nome-fantasia" class="form-control" placeholder="Nome Fantasia">
			                </div>
			            </div>
			            <div class="col-md-6">
			            	<div class="form-group">
				                <label>Categoria: </label>
				    	      	<select class="form-control">
				    	      		<option>Categoria</option>
				    	      		<option>Loja</option>
				    	      	</select>
				    	    </div>
			            </div>
			             <div class="col-md-4">
			                <div class="form-group">
			                  	<label>Bairro: </label>
			    	      		<input type="text" name="bairro" class="form-control" placeholder="Bairro">
			                </div>
			            </div>
			            <div class="col-md-5">
			                <div class="form-group">
			                  	<label>Rua: </label>
			    	      		<input type="text" name="rua" class="form-control" placeholder="Rua">
			                </div>
			            </div>
			            <div class="col-md-3">
			                <div class="form-group">
			                  	<label>Número: </label>
				    	      	<input type="number" name="numero" class="form-control" placeholder="Número">
			                </div>
			            </div>
			            <div class="col-md-4">
			                <div class="form-group">
			                  	<label class="mb-1">Complemento: </label>
				    	      	<input type="text" name="complemento" class="form-control" placeholder="Complemento">
			                </div>
			            </div>
			            <div class="col-md-3">
			                <div class="form-group">
			                  	<label>Estado: </label>
			    	      		<select class="form-control col-md-12">
			    					<option>Estado</option>
			    					<option>Rio Grande do Sul</option>
			    				</select>
			                </div>
			            </div>
			            <div class="col-md-5">
			                <div class="form-group">
			                  	<label>Cidade: </label>
			    	      		<select class="form-control col-md-12">
			    					<option>Cidade</option>
			    					<option>Porto Alegre</option>
			    				</select>
			                </div>
			            </div>
			            <div class="col-md-6">
			                <div class="form-group">
			                  	<label>Telefone 1: </label>
			    	      		<input type="text" name="telefone-1" class="form-control" placeholder="Telefone 1">
			                </div>
			            </div>
			            <div class="col-md-6">
			                <div class="form-group">
			                  	<label>Telefone 2: </label>
			    	      		<input type="text" name="telefone-2" class="form-control" placeholder="Telefone 2">
			                </div>
			            </div>
			            <div class="col-md-12">
			              	<div class="form-group">
			                  	<label>Logo: </label>
			    	      		<input type="file" class="form-control-file" name="logo">
			                </div>
			            </div>
			             <div class="col-md-12  text-center">
			              	<div class="form-group">
			                  	<button type="button" class="btn btn-primary col-md-6">Cadastre-se</button>
			                </div>
			            </div>
			        </form>
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
		<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header bg-primary">
	        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <form>
		      <div class="modal-body row justify-content-center">
		      	<div class="form-group col-lg-8">
		      		<input type="email" name="email" class="form-control" placeholder="Email">
		      	</div>
		      	<div class="form-group col-lg-8 ">
		      		<input type="password" name="senha" class="form-control" placeholder="Senha">
		      	</div>
		      	<div class="form-group col-lg-8">
		      		<button type="button" class="btn btn-primary col-lg-12">Login</button>

		      		
		      	</div>
		      	<div class="col-lg-8 pb-1 text-center">
		      		Ainda não é cadastrado? <a href="cadastre-se.html">Cadastre-se</a>
		      	</div> 
		      	  <div class="col-lg-8 pb-1 text-center">
		      		Esqueceu sua senha? <a href="cadastre-se.html">Alterar senha</a>
		      	</div>
		      </div>
	  	</form>
	    </div>
	  </div>
	</div>
@endsection

