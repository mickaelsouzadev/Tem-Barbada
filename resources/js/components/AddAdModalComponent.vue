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
    
        <form @submit.prevent="addAd">
         <div class="modal-body row">
            <div class="form-group col-lg-12">
                <label>Título: </label>
                <input class="form-control" type="text" name="titulo" placeholder="Título" v-model="params.title">
            </div>
            <div class="form-group col-lg-12">
                <label>Descrição: </label>
                <textarea class="form-control" name="descricao" placeholder="Descrição"  v-model="params.description"></textarea>
            </div>
            <div class="form-group col-lg-12">
                <label>Valido apartir de: </label>
                <input class="form-control" type="date" name="apartir"  v-model="params.start_date">
            </div>
            <div class="form-group col-lg-12">
                <label>Valido até: </label>
                <input class="form-control" type="date" name="ate"  v-model="params.end_date">
            </div>
          </div>
           <div class="modal-footer">
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>  
      </form>
    </div>
  </div>
</div>
</template>

<script>
    export default {
    	data() {
    		return { 
    			params: {
            'title': '',
            'description': '',
            'start_date': '',
            'end_date': '',
          }
    		}
    	},
      mounted() {
           
      },
      methods: {
        addAd() {
          axios.post('ads', this.params).then((response) => {
            console.log(response)
          })
        }
      }
    };
</script>

