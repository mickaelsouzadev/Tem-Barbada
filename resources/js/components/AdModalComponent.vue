<template>
	<div  class="modal fade" id="ad-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     	  <div class="modal-dialog" role="document">
     	    <div class="modal-content">
     	      <div class="modal-header bg-primary">
     	        <h5 class="modal-title" id="exampleModalLabel">{{ ad.fantasy_name }}</h5>
     	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     	          <span aria-hidden="true">&times;</span>
     	        </button>
     	      </div>
     	    
     		    <div class="modal-body">
     		    	<div class="row justify-content-center" style="margin-bottom: 15px;">
                        <div class="thumbnail">
                            <img :src="src+ad.logo">
                        </div>
     		      		
     		      	</div>
     		    	<div class="col-lg-12 text-center" style="font-size: 1.15rem;">
     		    		<p><strong>{{ ad.fantasy_name }}</strong></p>
     		    	</div>
                    <hr>
                    <div class="col-lg-12 text-center" style="font-size: 1.12rem;">     
                         <p><strong>{{ ad.title }}</strong> </p>
                    </div>
     		    	<div class="col-lg-12">
     		    		<p>{{ ad.description }}</p>
     		    	</div>
                    <div class="col-lg-12">
                        <p id="end"><strong>Valido até: </strong>{{ ad.end_date | formatDate}}</p>
                    </div>
                    <hr>
                    <div class="col-lg-12" style="font-size: 1.2rem;">     
                         <p><strong>Gostou da barbada? Entre em contato com o anúnciante:</strong> </p>
                    </div>
                    <div v-if="ad.city" class="col-lg-12">
                              
                         <p><strong>Cidade: </strong>{{ ad.city}}</p>
                     </div>
                      <div v-else class="col-lg-12">
                              
                         <p><strong>Cidade: </strong>{{ ad.local_name}}</p>
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
     		      <div v-if="ad.address_extra != null" class="col-lg-12">
     		      		
     		      	<p><strong>Complemento: </strong>{{ ad.address_extra }}</p>
     		      </div>
                       <div class="col-lg-12">
                              
                         <p><strong>Email: </strong>{{ ad.email }}</p>
                     </div>
                      <div class="col-lg-12">
                              
                         <p><strong>Telefone: </strong>{{ ad.phone_1 }}</p>
                     </div>
                       <div  v-if="ad.phone_2 != null" class="col-lg-12">
                              
                         <p><strong>Telefone 2: </strong>{{ ad.phone_2 }}</p>
                     </div>
     		    	
     		      	
     		      
     		      	
     		    </div>
     		  
     	    </div>
     	  </div>
     	</div>
</template>
<style type="text/css">
    #end {
        color: #08d68f;
    }
</style>
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