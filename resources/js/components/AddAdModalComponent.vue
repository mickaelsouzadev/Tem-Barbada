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
                <input class="form-control" type="text" name="titulo" placeholder="Título"  @change = "clearError('title')" v-model="params.title" v-bind:class="{ 'is-invalid':  (errors.title), 'is-valid': (errors.title === false) }">
                <div class="invalid-feedback text-center" v-if="errors.title">{{ errors.title[0]}}</div>
            </div>
            <div class="form-group col-lg-12">
                <label>Descrição: </label>
                <textarea class="form-control" name="descricao" placeholder="Descrição"  @change = "clearError('description')"  v-model="params.description" v-bind:class="{ 'is-invalid':  (errors.description), 'is-valid': (errors.description === false) }"></textarea>
                <div class="invalid-feedback text-center" v-if="errors.description">{{ errors.description[0]}}</div>
            </div>
            <div class="form-group col-lg-12">
                <label>Valido apartir de: </label>
                <input class="form-control" :min="startMin" type="date" id="apartir"  @change = "clearError('start_date'); updateDateMinMax()" v-model="params.start_date"  v-bind:class="{ 'is-invalid':  (errors.start_date), 'is-valid': (errors.start_date === false) }">
                <div class="invalid-feedback text-center" v-if="errors.start_date">{{ errors.start_date[0]}}</div>
            </div>
            <div class="form-group col-lg-12">
                <label>Valido até: </label>
                <input class="form-control" :min="endMin" :max="endMax" type="date" id="ate"  @change = "clearError('end_date')" v-model="params.end_date" v-bind:class="{ 'is-invalid':  (errors.end_date), 'is-valid': (errors.end_date === false) }">
                <div class="invalid-feedback text-center" v-if="errors.end_date">{{ errors.end_date[0]}}</div>
            </div>
             <div class="col-lg-8 alert alert-danger" v-show="error">
                {{ errorMessage }}
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
      props:['limit'],
    	data() {
    		return { 
    			params: {
            'title': '',
            'description': '',
            'start_date': '',
            'end_date': '',
          },
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
        addAd() {
          this.params.limit = this.limit;
          console.log(this.limit);
          console.log(this.params.limit);
          axios.post('skive', this.params).then((response) => {
            // console.log();
            this.$emit('create', response.data);
            if(response) {
              $('#add-ad-modal').modal('hide')
            }
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
          let today = moment();
          today = today.format();

          this.startMin = today.split("T")[0];

         
          let tomorrow = moment(today).add(1, 'days');
          tomorrow = tomorrow.format();

          this.endMin = tomorrow.split("T")[0];


          let fiveAfter = moment(today).add(5, 'days')
          fiveAfter = fiveAfter.format()

          
          this.endMax = fiveAfter.split("T")[0];
          // console.log(this.endMin)
          // console.log(this.endMax)
        },
        updateDateMinMax() {
       
          let start = moment(this.params.start_date);
          start = start.format()

          let tomorrow = moment(start).add(1, 'days')
          tomorrow = tomorrow.format()

          this.endMin = tomorrow.split("T")[0];

          let fiveAfter = moment(start).add(5, 'days')
          fiveAfter = fiveAfter.format()

          this.endMax = fiveAfter.split("T")[0];

        },
        clearError(name) {
          this.errors[name] = false
        },
      }
    };
</script>

