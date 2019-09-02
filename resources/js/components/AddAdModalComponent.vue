<template>
  <div class="modal fade" id="add-ad-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar Anúncio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
        
         <div class="modal-body row">
            <div class="form-group col-lg-12">
                <label>Título: </label>
                <input class="form-control" type="text" name="titulo" placeholder="Título">
            </div>
            <div class="form-group col-lg-12">
                <label>Descrição: </label>
                <textarea class="form-control" name="descricao" placeholder="Descrição"></textarea>
            </div>
            <div class="form-group col-lg-12">
                <label>Valido apartir de: </label>
                <input class="form-control" type="date" name="apartir">
            </div>
            <div class="form-group col-lg-12">
                <label>Valido até: </label>
                <input class="form-control" type="date" name="ate">
            </div>
          </div>
           <div class="modal-footer">
            <button class="btn btn-success">Salvar</button>
        </div>  
    </div>
  </div>
</div>
</template>

<script>
    export default {
    	data() {
    		return { 
    			
    		}
    	},
        mounted() {
           
        },
        methods: {
        	
        }
    };
</script>

