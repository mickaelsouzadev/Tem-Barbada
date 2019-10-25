<template>
	<nav class="navbar navbar-expand-lg fixed-top ">  
		 <a class="navbar-brand" href="/"><img src="/img/logo-nav-2.png" width="100"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">  
		 <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">     <ul class="navbar-nav mr-4 ml-auto">
		 
		 <li class="nav-item">
		     <a class="nav-link" data-value="cadastre-se" href="/">Voltar <i class="fas fa-home"></i></a> 
		 </li> 
		 <li class="nav-item dropdown">
		 	<a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		 	<!-- 	<div class="profile"> -->
		 			<img :src="src+info.logo" class="img-profile" /> 
		 	<!-- 	</div>  -->

		 		Meu Perfil  <i class="fas fa-caret-down"></i>
		 	   
		 	</a>
		 	<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
		 	  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#perfil-modal"><i class="fas fa-user"></i>  Ver Pefil</a>
		 	  <a class="dropdown-item" href="#"  data-toggle="modal" data-target="#edit-modal"><i class="fas fa-edit"></i> Editar Minhas Informações </a>
		 	  <div class="dropdown-divider"></div>
		 	  <a class="dropdown-item" href="/sair">Sair <i class="fas fa-sign-out-alt"></i></a>
		 	</div>        
		 	
		 </li>  
		
		</ul> 
		</div>
	</nav>
</template>
<script>
	export default {
		props:['info'],
		data() {
			return {
				src: '/img/'
			}
		},
		mounted() {
		
		},
		methods: {

		}
	};
</script>