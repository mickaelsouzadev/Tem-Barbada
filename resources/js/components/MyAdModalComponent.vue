<template>
<div>
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
                    <p><strong>Título: </strong>{{ ad.title }}</p>
            </div>
            <div class="col-lg-12">
                    <p><strong>Descrição: </strong>{{ ad.description }}</p>
            </div>
            <div class="col-lg-12">
                    <p><strong>Valido apartir de:  </strong>{{ ad.start_date | formatDate }}</p>
            </div>
            <div class="col-lg-12">
                <p><strong>Valido até:  </strong>{{ ad.end_date | formatDate }}</p>
            </div>
            
          
            
        </div>
         <div v-else class="modal-body row">
            <div class="form-group col-lg-12">
                <label>Título: </label>
                <input class="form-control" type="text" v-model="ad.title" name="titulo"  @change = "clearError('title')" placeholder="Título" value="Promoção Nova" v-bind:class="{ 'is-invalid':  (errors.title), 'is-valid': (errors.title === false) }">
                <div class="invalid-feedback text-center" v-if="errors.title">{{ errors.title[0]}}</div>
                    
            </div>
            <div class="form-group col-lg-12">

                <label>Descrição: </label>
                <textarea class="form-control" placeholder="Descrição" name="descricao"  @change = "clearError('description')"  v-model="ad.description" v-bind:class="{ 'is-invalid':  (errors.description), 'is-valid': (errors.description === false) }">Renovamos nossa frota, para comemorar estamos lançando essa promoção, 5% de desconto a cada 5km! Todos os dias apartir das 16 horas até as 23 horas!</textarea>
                <div class="invalid-feedback text-center" v-if="errors.description">{{ errors.description[0]}}</div>
                    
            </div>
            <div class="form-group col-lg-12">
                <label>Valido apartir de: </label>
                <input class="form-control" type="date" :min="startMin" id="apartir"  @change = "clearError('start_date'); updateDateMinMax()"  name="apartir" v-model="ad.start_date" v-bind:class="{ 'is-invalid':  (errors.start_date), 'is-valid': (errors.start_date === false) }">
                <div class="invalid-feedback text-center" v-if="errors.start_date">{{ errors.start_date[0]}}</div>
                    
            </div>
            <div class="form-group col-lg-12">
                <label>Valido até: </label>
                <input class="form-control" :min="endMin" :max="endMax" type="date" id="ate"  @change = "clearError('end_date')"name="ate" v-model="ad.end_date" v-bind:class="{ 'is-invalid':  (errors.end_date), 'is-valid': (errors.end_date === false) }">
                <div class="invalid-feedback text-center" v-if="errors.end_date">{{ errors.end_date[0]}}</div>
                   
            </div>
            <div class="col-lg-8 alert alert-danger" v-show="error">
                {{ errorMessage }}
            </div>
          </div>
        <div v-if="!edit_mode" class="modal-footer">
            <button class="btn btn-info" @click="edit()">Editar <i class="fas fa-pencil-alt"></i></button>
            <button class="btn btn-danger" data-dismiss="modal"  data-toggle="modal" data-target="#delete-modal">Excluir <i class="fas fa-trash"></i></button>
        </div>
         <div v-else class="modal-footer">
            <button class="btn btn-success" @click="saveEdit()">Salvar</button>
            <button class="btn btn-secondary" @click="saveEdit()">Cancelar</button>
        </div>
    </div>
  </div>
</div>
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" style="color: #fff">Excluir</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
        <div  class="modal-body row">
            <div class="col-lg-12">
                 <h5>Deseja mesmo excluir essa barbada?</h5>
            </div>
           
        </div>
        <div class="modal-footer">
            <button class="btn btn-danger" data-dismiss="modal" @click="deleteAd()">Excluir</button>
            <button class="btn btn-secondary cancel" data-dismiss="modal">Cancelar</button>
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
    			edit_mode: false,
                errors: [],
                error: false,
                errorMessage: '',
                startMin: '',
                endMin: '',
                endMax:''
    		}
    	},
        mounted() {
            this.setDateMinMax()
        },
        methods: {
        	edit() {
                this.edit_mode = true;
            },
            saveEdit() {
              
                axios.put('ads/'+this.ad.id, this.ad).then((response) => {
                    this.edit_mode = false;
                }).catch((error) => {
                    let status = error.response.status

                    switch(status) {
                        case 422:
                        this.error = false;
                        this.errors = JSON.parse(JSON.stringify(error.response.data.errors));
                        break;
                    default:
                        this.error = true;
                        this.errorMessage = "Erro interno no servidor, tente novamente mais tarde!";
                    }
                })
            },
            setDateMinMax(){
              let today = new Date();

              this.startMin = today.toISOString().split("T")[0];

                
              let tomorrow = today
              tomorrow.setDate(today.getDate() + 1)

              this.endMin = tomorrow.toISOString().split("T")[0];

              let fiveAfter = today
              fiveAfter.setDate(today.getDate() + 4)

              
              this.endMax = fiveAfter.toISOString().split("T")[0];
              console.log(this.endMin)
              console.log(this.endMax)
            },
            updateDateMinMax() {
              let start = new Date(Date.parse(this.ad.start_date))

              let tomorrow = start
              tomorrow.setDate(start.getDate() + 1)

              this.endMin = tomorrow.toISOString().split("T")[0];

              let fiveAfter = start
              fiveAfter.setDate(start.getDate() + 4)

              this.endMax = fiveAfter.toISOString().split("T")[0];

            },
            deleteAd() {
                axios.delete('ads/'+this.ad.id).then((response) => {
                    this.$emit('delete')
                })
            },
            clearError(name) {
                this.errors[name] = false
            },
        }
    };
</script>

