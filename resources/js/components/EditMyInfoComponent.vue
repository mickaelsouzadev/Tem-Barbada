<template>

<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <h5 class="modal-title">Editar minhas informaçõese</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form>
              <div class="modal-body row">
                <div class="form-group col-lg-12">
                    <label>Email: </label>
                    <input type="email" name="email" class="form-control" v-model="profile.email" placeholder="Email">
                </div>
                <div class="form-group col-lg-12">
                    <label>Nome Fantasia: </label>
                    <input type="text" name="nome-fantasia" class="form-control" v-model="profileParams.fantasy_name" placeholder="Nome Fantasia">
                </div>
                <div class="form-group col-lg-12">
                    <label>Categoria: </label>
                    <select class="form-control">
                        <option>Categoria</option>
                        <option>Loja</option>
                        <option selected>Companhia de Taxi</option>
                    </select>
                </div>
                    <div class="form-group col-lg-12">
                    <label>Bairro: </label>
                    <input type="text" name="bairro" class="form-control" v-model="profileParams.neighborhood" placeholder="Bairro">
                </div>
                    <div class="form-group col-lg-12">
                    <label>Rua: </label>
                    <input type="text" name="rua" class="form-control" v-model="profileParams.street" placeholder="Rua">
                </div>
                <div class="form-group col-lg-12">
                    <label>Número: </label>
                    <input type="number" name="numero" class="form-control" v-model="profileParams.number" placeholder="Número">
                </div>
                <div class="form-group col-lg-12">
                    <label>Estado: </label>
                    <select class="form-control" v-model="profileParams.state" @change="getCities()">
                       <option v-for="state in states" :value="state.id">{{ state.name }}</option>
                    </select>
                </div>

                <div class="form-group col-lg-12" >
                    <label>Cidade: </label>
                    <select class="form-control" v-model="profileParams.city">
                        <option v-for="city in cities" :value="city.id">{{ city.name }}</option>
                    </select>
                </div>
                <div class="form-group col-lg-12">
                    <label>Telefone 1: </label>
                    <input type="text" name="telefone-1" v-model="profileParams.phone_1" class="form-control" placeholder="Telefone 1">
                </div>
                <div class="form-group col-lg-12">
                    <label>Telefone 2: </label>
                    <input type="text" name="telefone-2" v-model="profileParams.phone_2" class="form-control" placeholder="Telefone 2">
                </div>
                <div class="form-group col-lg-12">
                    <label>Logo: </label>
                    <input type="file" class="col-lg-12" name="logo">
                </div>
                <div class="form-group col-lg-12">
                    <button type="button" class="btn btn-primary col-lg-12">Salvar</button>
                </div>
              </div>
        </form>
        </div>
      </div>
    </div>
</template>

<script>
    export default {
        props: ['profile'],
    	data() {
    		return { 
    			states: [],
                cities: [],
                profileParams: [],
    		}
    	},
        mounted() {
            axios.get('/states').then((response) => {
                this.states = response.data;
            })
           
        },
        watch: {
            profile () {
                this.profileParams = this.profile
                this.getCities();
            }
        },
        methods: {
        	getCities() {
                if(this.profileParams.state !== 0) {
                    axios.get('/cities', { 
                        params: 
                        {
                            state_id: this.profileParams.state} 
                        }).then((response) => {
                        this.cities = response.data;
                        this.show = true;
                    })
                }
                
            }
        }
    };
</script>

