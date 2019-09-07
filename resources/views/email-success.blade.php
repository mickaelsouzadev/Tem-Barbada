@extends('layouts.app')

@section('title', 'Sucesso!')

@section('header')

@endsection

@section('content')
	<section class="container main-section page-out">
		<div class="col-lg-12 alert alert-success text-center">
			<h4>Seu email foi verificado com sucesso!
			<a data-value="entrar" href="#" data-toggle="modal" data-target="#login-modal">Clique aqui para fazer o seu login</a></h4>
		</div>
	</section>
@endsection

@section('footer')
<login></login>
@endsection



