<template>
   <div class="modal fade" id="ad-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Anúncio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
        <div v-if="!edit_mode" class="modal-body row">
            <div class="col-lg-12">
                    <p><strong>Título: </strong>Promoção Nova</p>
            </div>
            <div class="col-lg-12">
                    <p><strong>Descrição: </strong> Renovamos nossa frota, para comemorar estamos lançando essa promoção, 5% de desconto a cada 5km! Todos os dias apartir das 16 horas até as 23 horas!</p>
            </div>
            <div class="col-lg-12">
                    <p><strong>Valido apartir de: </strong>13/08/2019</p>
            </div>
            <div class="col-lg-12">
                <p><strong>Valido até: </strong>05/09/2019</p>
            </div>
            
          
            
        </div>
         <div v-else class="modal-body row">
            <div class="form-group col-lg-12">
                <label>Título: </label>
                <input class="form-control" type="text" name="titulo" placeholder="Título" value="Promoção Nova">
            </div>
            <div class="form-group col-lg-12">

                <label>Descrição: </label>
                <textarea class="form-control" name="descricao">Renovamos nossa frota, para comemorar estamos lançando essa promoção, 5% de desconto a cada 5km! Todos os dias apartir das 16 horas até as 23 horas!</textarea>
            </div>
            <div class="form-group col-lg-12">
                <label>Valido apartir de: </label>
                <input class="form-control" type="date" value="2019-08-13" name="apartir">
            </div>
            <div class="form-group col-lg-12">
                <label>Valido até: </label>
                <input class="form-control" type="date" value="2019-09-05" name="ate">
            </div>
          </div>
        <div v-if="!edit_mode" class="modal-footer">
            <button class="btn btn-info" @click="edit()">Editar <i class="fas fa-pencil-alt"></i></button>
            <button class="btn btn-danger">Excluir <i class="fas fa-trash"></i></button>
        </div>
         <div v-else class="modal-footer">
            <button class="btn btn-success" @click="saveEdit()">Salvar</button>
            <button class="btn btn-secondary" @click="saveEdit()">Cancelar</button>
        </div>
    </div>
  </div>
</div>
</template>

<script>
    export default {
    	data() {
    		return { 
    			edit_mode: false
    		}
    	},
        mounted() {
           
        },
        methods: {
        	edit() {
                this.edit_mode = true;
            },
            saveEdit() {
                this.edit_mode = false;
            }
        }
    };
</script>

