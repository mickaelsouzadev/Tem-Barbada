@extends('layouts.app')

@section('title', 'Erro!')

@section('header')
<nav class="navbar navbar-expand-lg fixed-top ">  
	 <a class="navbar-brand" href="/"><img src="{{ asset('img/logo-nav-2.png') }}" width="100"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">  
	 <span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">     <ul class="navbar-nav mr-4 ml-auto">
	 
	 <li class="nav-item">
	     <a class="nav-link" data-value="cadastre-se" href="/">Página Inicial <i class="fas fa-home"></i></a> 
	 </li> 
	</ul> 
	</div>
</nav>
@endsection

@section('content')
	<section class="container main-section page-out">
		<div class="col-lg-12 alert alert-danger text-center email-success">
			<h4>Não foi possível verificar o seu e-mail!<br><br> 
			Certifique-se de que seu email já não tenha sido verificado e tente novamente!</h4>
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
<script type="text/javascript">
	let app = document.getElementById('app')
	app.classList.add('app-flex')
</script>
@endsection



