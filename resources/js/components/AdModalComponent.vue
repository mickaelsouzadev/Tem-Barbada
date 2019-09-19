<template>
	<div  class="modal fade" id="ad-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     	  <div class="modal-dialog" role="document">
     	    <div class="modal-content">
     	      <div class="modal-header bg-primary">
     	        <h5 class="modal-title" id="exampleModalLabel">Anúncio</h5>
     	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     	          <span aria-hidden="true">&times;</span>
     	        </button>
     	      </div>
     	    
     		    <div class="modal-body">
     		    	<div class="row justify-content-center" style="margin-bottom: 15px;">
     		      		<img :src="src+ad.logo" class="img-fluid rounded-circle col-lg-4">
     		      	</div>
     		    	<div class="col-lg-12">
     		    		<p><strong>Anuncio de: </strong>{{ ad.fantasy_name }}</p>
     		    	</div>
     		    	<div class="col-lg-12">
     		    		<p><strong>Título: </strong>{{ ad.title }}</p>
     		    	</div>
     		    	<div class="col-lg-12">
     		    		<p><strong>Descrição: </strong> {{ ad.description }}</p>
     		    	</div>
                     <div v-if="ad.city" class="col-lg-12">
                              
                         <p><strong>Cidate: </strong>{{ ad.city}}</p>
                     </div>
     		    	<div class="col-lg-12">
     		      		
     		      	<p><strong>Bairro: </strong>{{ ad.neighborhood }}</p>
     		      </div>
     		      <div class="col-lg-12">
     		      		
     		      	<p><strong>Rua: </strong>{{ ad.street }}</p>
     		      </div>
     		      <div class="col-lg-12">
     		      		
     		      	<p><strong>Número: </strong>{{ ad.number }}</p>
     		      </div>
     		      <div v-if="ad.address_extra" class="col-lg-12">
     		      		
     		      	<p><strong>Complemento: </strong>{{ ad.address_extra }}</p>
     		      </div>
                       <div class="col-lg-12">
                              
                         <p><strong>Email: </strong>{{ ad.email }}</p>
                     </div>
                      <div class="col-lg-12">
                              
                         <p><strong>Telefone: </strong>{{ ad.phone_1 }}</p>
                     </div>
                       <div class="col-lg-12">
                              
                         <p><strong>Telefone 2: </strong>{{ ad.phone_2 }}</p>
                     </div>
     		    	<div class="col-lg-12">
     		    		<p><strong>Valido até: </strong>{{ ad.end_date | formatDate}}</p>
     		    	</div>
     		      	
     		      
     		      	
     		    </div>
     		  
     	    </div>
     	  </div>
     	</div>
</template>
<script>
	export default {
		props: ['ad'],
		data() {
			return {
				src: '/img/'
			}
		},
		mounted () {

		}
	};

</script>