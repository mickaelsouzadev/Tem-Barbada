@extends('layouts.app')

@section('title', 'Painel do Cliente')

@section('header')
	@section('content')
	<profile></profile>
	@endsection

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
<script type="text/javascript">
	let app = document.getElementById('app')
	app.classList.add('app-flex')
</script>	
</footer>
@endsection