<template>

<div class="modal fade" id="perfil-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title">Meu Perfil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
          <div class="modal-body">
           <div class="row justify-content-center" style="margin-bottom: 15px;">
                
                  
                
            
            </div>
            <div class="col-lg-12">
                <p><strong>Email: </strong>{{ profile.email }}</p>
            </div>
            <div class="col-lg-12">
                <p><strong>Nome Fantasia: </strong>{{ profile.fantasy_name }}</p>
            </div>
            <div class="col-lg-12">
                <p><strong>Categoria: </strong>Companhia de Taxi</p>
            </div>
            <div class="col-lg-12">
                
                <p><strong>Bairro: </strong>{{ profile.neighborhood }}</p>
            </div>
            <div class="col-lg-12">
                
                <p><strong>Rua: </strong>{{ profile.street }}</p>
            </div>
            <div class="col-lg-12">
                
                <p><strong>Número: </strong>{{ profile.number }}</p>
            </div>
            <div class="col-lg-12">
                <p><strong>Estado: </strong>{{ profile.state_name }}</p>
            </div>
            <div class="col-lg-12">
                <p><strong>Cidade: </strong>{{ profile.city_name }}</p>
            </div>
            <div class="col-lg-12">
                <p><strong>Telefone 1: </strong> {{ profile.phone_1 }}</p>
            </div>
            <div class="col-lg-12">
                <p><strong>Telefone 2: </strong> {{ profile.phone_2 }}</p>
            </div>
            
                
          
          
          </div>
  
    </div>
  </div>
</div>
</template>

<script>
    export default {
        props: ['profile'],
    	data() {
    		return { 
    			
    		}
    	},
        mounted() {
           console.log(this.profile)
        },
        methods: {
        	
        }
    };
</script>

