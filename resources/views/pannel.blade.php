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
		</div>
			<my-ads></my-ads>
				
		
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


<add-ad-modal></add-ad-modal>
<profile></profile>





@endsection