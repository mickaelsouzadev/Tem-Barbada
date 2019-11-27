<template>
<div>
	<div class="row mt-4">
        <div v-for="client in clients" class="col-lg-3 client" data-toggle="modal" data-target="#client-modal" @click="setClient(client)">
            <div class="card">
                <img class="card-img-top img-fluid" :src="src+client.logo" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">{{ client.fantasy_name }}</p>
                </div>
            </div>
        </div >
    </div>
    <div class="modal fade" id="client-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header bg-warning">
             <h5 class="modal-title" id="exampleModalLabel">Perfil do Cliente</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div v-if="!edit_mode">
             <div  class="modal-body">
               <div class="row justify-content-center" style="margin-bottom: 15px;">
                 
                   <img :src="src + selectedClient.logo" class="img-fluid rounded-circle col-lg-4">
                 
               
               </div>
               <div class="col-lg-12">
                 <p><strong>Email: </strong>{{ selectedClient.email }}</p>
               </div>
               <div class="col-lg-12">
                 <p><strong>Nome Fantasia: </strong>{{ selectedClient.fantasy_name }}</p>
               </div>
               <div class="col-lg-12">
                 <p><strong>Categoria: </strong>{{ selectedClient.category_name }}</p>
               </div>
                <div class="col-lg-12">
                	<p><strong>Bairro: </strong>{{ selectedClient.neighborhood }}</p>
            	</div>
               <div class="col-lg-12">	
     		      	<p><strong>Rua: </strong>{{ selectedClient.street }}</p>
     		    </div>
     		    <div class="col-lg-12">
     		      	<p><strong>Número: </strong>{{ selectedClient.number }}</p>
     		      </div>
     		    <div v-if="selectedClient.address_extra != null" class="col-lg-12">	
     		      	<p><strong>Complemento: </strong>{{ selectedClient.address_extra }}</p>
     		   </div>
               <div class="col-lg-12">
                 <p><strong>Estado: </strong>{{ selectedClient.state_name }}</p>
               </div>
               <div class="col-lg-12">
                 <p><strong>Cidade: </strong>{{ selectedClient.city_name }}</p>
               </div>
               <div class="col-lg-12">
                 <p><strong>Telefone 1: </strong>{{ selectedClient.phone_1 }}</p>
               </div>
               <div class="col-lg-12" v-if="selectedClient.phone_2 != null">
                 <p><strong>Telefone 2: </strong>{{ selectedClient.phone_2 }}</p>
               </div>
               
                 
             
             
             </div>
              <div  class="modal-footer">
               <button class="btn btn-info" @click="edit()">Editar <i class="fas fa-pencil-alt"></i></button>
               <button class="btn btn-danger"  data-dismiss="modal" data-toggle="modal" data-target="#delete-client-modal">Excluir <i class="fas fa-trash"></i></button>
             </div>
           </div>
           <form v-else>
             <div class="modal-body row">
               <div class="form-group col-lg-12">
                    <label>Email: </label>
                    <input type="email" name="email" class="form-control" v-model="selectedClient.email" placeholder="Email">
                </div>
                <div class="form-group col-lg-12">
                    <label>Nome Fantasia: </label>
                    <input type="text" name="nome-fantasia" class="form-control" v-model="selectedClient.fantasy_name" placeholder="Nome Fantasia">
                </div>
                <div class="form-group col-lg-12">
                    <label>Categoria: </label>
                    <select class="form-control" v-model="selectedClient.categories_id">
                        <option value="">Categoria</option>
                        <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
                    </select>
                </div>
                    <div class="form-group col-lg-12">
                    <label>Bairro: </label>
                    <input type="text" name="bairro" class="form-control" v-model="selectedClient.neighborhood" placeholder="Bairro">
                </div>
                    <div class="form-group col-lg-12">
                    <label>Rua: </label>
                    <input type="text" name="rua" class="form-control" v-model="selectedClient.street" placeholder="Rua">
                </div>
                <div class="form-group col-lg-12">
                    <label>Número: </label>
                    <input type="number" name="numero" class="form-control" v-model="selectedClient.number" placeholder="Número">
                </div>
                 <div class="form-group col-lg-12">
                    <label>Complemento: </label>
                    <input type="test" name="complementp" class="form-control" v-model="selectedClient.address_extra" placeholder="Complemento">
                </div>
                <div class="form-group col-lg-12">
                    <label>Estado: </label>
                    <select class="form-control" v-model="selectedClient.state" @change="getCities()">
                       <option v-for="state in states" :value="state.id">{{ state.name }}</option>
                    </select>
                </div>

                <div class="form-group col-lg-12" >
                    <label>Cidade: </label>
                    <select class="form-control" v-model="selectedClient.city">
                        <option v-for="city in cities" :value="city.id">{{ city.name }}</option>
                    </select>
                </div>
                <div class="form-group col-lg-12">
                    <label>Telefone 1: </label>
                    <input type="text" name="telefone-1" v-model="selectedClient.phone_1" class="form-control" placeholder="Telefone 1">
                </div>
                <div class="form-group col-lg-12">
                    <label>Telefone 2: </label>
                    <input type="text" name="telefone-2" v-model="selectedClient.phone_2" class="form-control" placeholder="Telefone 2">
                </div>
                <div class="form-group col-lg-12">
                    <label>Logo: </label>
                    <input type="file" class="col-lg-12" name="logo" @change="setImage">
                </div>
                <div class="col-lg-12 alert alert-danger" v-show="error">
                    <div class="col-lg-8 ">
                         {{ errorMessage }}
                    </div>   
                   
                </div>
            </div>
             <div class="modal-footer">
             <button class="btn btn-success" @click="saveEdit">Salvar</button>
             <button class="btn btn-secondary" @click="cancelEdit">Cancelar</button>
           </div>
         </form>
           
       
         </div>
       </div>
     </div>
     <div class="modal fade" id="delete-client-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                      <h5>Deseja mesmo excluir esse Cliente?</h5>
                 </div>
                
             </div>
             <div class="modal-footer">
                 <button class="btn btn-danger" data-dismiss="modal" @click="deleteClient()">Excluir</button>
                 <button class="btn btn-secondary cancel" data-dismiss="modal">Cancelar</button>
             </div>
         </div>
       </div>
     </div>
</div>
</template>
<script>
	export default {
		data() {
			return {
				states: [],
                cities: [],
                categories: [],
 				errors: [],
                error: false,
				src: '/img/',
				clients: [],
				selectedClient: {},
				cachedClient: {},
				oldClient: {},
				formData: null,
				formError: false,
				edit_mode : false,
				errorMessage: '',
                image: '',
			}
		},
		mounted () {
			axios.get('/states').then((response) => {
			    this.states = response.data;
			})
			axios.get('/categories').then((response) => {
			    this.categories = response.data
			})
			this.getClients();
		
			this.formData = new FormData();
		},
		methods: {
			getClients() {
	            axios.get('/admin/clients').then((response) => {
	                this.clients = response.data;
	                console.log('A')
	            })
	        },
	        setClient(client) {
	        	this.selectedClient = client;
	        	
	        	this.cachedClient = Object.assign({}, this.selectedClient);

	        	axios.get('/cities', { 
                    selectedClient: 
                    {
                        state_id: client.state} 
                    }).then((response) => {
                    this.cities = response.data;
               })
	        },
	        edit() {
	        	this.edit_mode = true;
	        },
	        cancelEdit() {
	        	this.selectedClient = this.cachedClient;
	        	this.edit_mode = false;
	        },
	        saveEdit(e) {
	        	
	            e.preventDefault();

	            if(this.selectedClient.address_extra == null){
	                this.selectedClient.address_extra = ''
	            }

	            if(this.selectedClient.phone_2 == null){
	                this.selectedClient.phone_2 = ''
	            }


	            this.setFormData(this.selectedClient)
	                .then(() => {
	                               
	                    const config = { headers: { 'content-type': 'multipart/form-data' } }

	                    axios.post('../clients/'+this.selectedClient.id, this.formData).then((response) => {

	                        if(response.data.logo) {
	                             this.selectedClient.logo = response.data.logo;
	                        }


	                        this.$emit('update', this.selectedClient);

	                       	this.edit_mode = false;

	                        // this.selectedClient = Object.assign({}, this.cachedClient);


	                    }).catch((error) => {
	                        let status = error.response.status

	                        switch(status) {
	                            case 422:
	                                this.error = false;
	                                this.errors = JSON.parse(JSON.stringify(error.response.data.errors));
	                                            this.formError = true;
	                                console.log(this.errors)
	                                break;
	                            default:
	                                this.error = true;
	                                this.errorMessage = "Erro interno no servidor, tente novamente mais tarde!";
	                                this.formError = false;
	                        }
	                    })

	                })
	                    
	        },
	        clearError(name) {
	            this.errors[name] = false
	        },
	        setImage(e) {
	            console.log(e.target.files[0]);
	            this.image = e.target.files[0];
	        },
	        deleteClient() {
	        	// axios.delete('../clients/'+this.selectedClient.id).then((response) => {
                   	for(let index in this.clients) {
		          		if(this.clients[index].id === this.selectedClient.id) {
		          			console.log('index:', index);
		          			console.log('id:', this.selectedClient.id);
		          			this.clients.splice(index, 1);
		          		}
	          		}
                // })
	        },
	        async setFormData(data) {
	            for(let key in data) {
	                if(data[key] !== 'logo') {
	                                this.formData.append(key, data[key])
	                }
	                        
	            }

	            if(this.image) {
	                this.formData.append('logo', this.image)
	            }

	            this.formData.append('_method', 'PUT')
	        }            
	    }
	};
</script>