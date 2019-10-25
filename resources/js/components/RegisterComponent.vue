<template>
	<div class="col-md-8">
	        <form class="row form" @submit.prevent="register" enctype="multipart/form-data">
	            <div class="col-md-6">
	                <div class="form-group">
	                   	<label>Email: </label>
	    	      		<input type="text" name="email" class="form-control" @change = "clearError('email')" v-bind:class="{ 'is-invalid': (errors.email), 'is-valid': (errors.email === false) }" placeholder="Email" v-model="params.email">
	    	      		<div class="invalid-feedback text-center" v-if="errors.email">{{ errors.email[0]}}</div>
	                </div>
	            </div>
	            <div class="col-md-6">
	                <div class="form-group">
	                   	<label>Senha: </label>
	    	      		<input type="password" name="senha" class="form-control" @change = "clearError('password')" v-bind:class="{ 'is-invalid':  (errors.password), 'is-valid': (errors.password === false) }" placeholder="Senha" v-model="params.password">
	    	      		<div class="invalid-feedback text-center" v-if="errors.password">{{ errors.password[0]}}</div>
	                </div>
	            </div>
	            <div class="col-md-6">
	                <div class="form-group">
	                    <label>Nome Fantasia: </label>
	    	      		<input type="text" name="nome-fantasia" class="form-control" @change = "clearError('fantasy_name')" v-bind:class="{ 'is-invalid':  (errors.fantasy_name), 'is-valid': (errors.fantasy_name === false) }" placeholder="Nome Fantasia" v-model="params.fantasy_name">
	    	      		<div class="invalid-feedback text-center" v-if="errors.fantasy_name">{{ errors.fantasy_name[0]}}</div>
	                </div>
	            </div>
	            <div class="col-md-6">
	            	<div class="form-group">
		                <label>Categoria: </label>
		    	      	<select class="form-control" @change = "clearError('categories_id')" v-bind:class="{ 'is-invalid':  (errors.categories_id), 'is-valid': (errors.categories_id === false) }" v-model="params.categories_id">
		    	      		<option value="">Categoria</option>
		    	      		<option v-for="category in categories" :value="category.id">{{ category.name }}</option>
		    	      	</select>
		    	      	<div class="invalid-feedback text-center" v-if="errors.categories_id">{{ errors.categories_id[0]}}</div>
		    	    </div>
	            </div>
 				<div class="col-md-3">
	                <div class="form-group">
	                  	<label>Estado: </label>
	    	      		<select class="form-control col-md-12" v-bind:class="{ 'is-invalid':  (errors.state), 'is-valid': (errors.state === false) }" v-model="params.state" @change="getCities() | clearError('state')">
	    					<option value="">Estado</option>
	    					<option v-for="state in states" :value="state.id">{{ state.name }}</option>
	    				</select>
	    				<div class="invalid-feedback text-center" v-if="errors.state">{{ errors.state[0]}}</div>
	                </div>
	            </div>
	            <div class="col-md-5">
	                <div class="form-group">
	                  	<label>Cidade: </label>
	    	      		<select class="form-control col-md-12" @change = "clearError('city')" v-bind:class="{ 'is-invalid':  (errors.city), 'is-valid': (errors.city === false) }" v-model="params.city">
	    					<option value="">Cidade</option>
	    					<option v-for="city in cities" :value="city.id">{{ city.name }}</option>
	    				</select>
	    				<div class="invalid-feedback text-center" v-if="errors.city">{{ errors.city[0]}}</div>
	                </div>
	            </div>	            
	             <div class="col-md-4">
	                <div class="form-group">
	                  	<label>Bairro: </label>
	    	      		<input type="text" name="bairro" class="form-control" @change = "clearError('neighborhood')" v-bind:class="{ 'is-invalid':  (errors.neighborhood), 'is-valid': (errors.neighborhood === false) }" placeholder="Bairro" v-model="params.neighborhood">
	    	      		<div class="invalid-feedback text-center" v-if="errors.neighborhood">{{ errors.neighborhood[0]}}</div>
	                </div>
	            </div>
	            <div class="col-md-5">
	                <div class="form-group">
	                  	<label>Rua: </label>
	    	      		<input type="text" name="rua" class="form-control" @change = "clearError('street')" v-bind:class="{ 'is-invalid':  (errors.street), 'is-valid': (errors.street === false) }" placeholder="Rua" v-model="params.street">
	    	      		<div class="invalid-feedback text-center" v-if="errors.street">{{ errors.street[0]}}</div>
	                </div>
	            </div>
	            <div class="col-md-3">
	                <div class="form-group">
	                  	<label>Número: </label>
		    	      	<input type="number" name="numero" class="form-control" @change = "clearError('number')" v-bind:class="{ 'is-invalid':  (errors.number), 'is-valid': (errors.number === false) }" placeholder="Número" v-model="params.number">
		    	      	<div class="invalid-feedback text-center" v-if="errors.number">{{ errors.number[0]}}</div>
	                </div>
	            </div>
	            <div class="col-md-4">
	                <div class="form-group">
	                  	<label class="mb-1">Complemento: </label>
		    	      	<input type="text" name="complemento" class="form-control" @change = "clearError('address_extra')" v-bind:class="{ 'is-invalid':  (errors.extra_address), 'is-valid': (errors.address_extra === false) }" placeholder="Complemento" v-model="params.address_extra">
		    	      	<div class="invalid-feedback text-center" v-if="errors.extra_address">{{ errors.extra_address[0]}}</div>
	                </div>
	            </div>
	            <div class="col-md-6">
	                <div class="form-group">
	                  	<label>Telefone 1: </label>
	    	      		<input type="tel" v-mask="phoneMask1" name="telefone-1" class="form-control" @change = "clearError('phone_1'); changeMask1()" v-bind:class="{ 'is-invalid':  (errors.phone_1), 'is-valid': (errors.phone_1 === false) }" placeholder="(00) 9999-0000" v-model="params.phone_1">
	    	      		<div class="invalid-feedback text-center" v-if="errors.phone_1">{{ errors.phone_1[0]}}</div>
	                </div>
	               
	            </div>
	            <div class="col-md-6">
	                <div class="form-group">
	                  	<label>Telefone 2: </label>
	    	      		<input type="tel" v-mask="phoneMask2" name="telefone-2" class="form-control" @change = "clearError('phone_2'); changeMask2()" v-bind:class="{ 'is-invalid':  (errors.phone_2), 'is-valid': (errors.phone_2 === false) }" placeholder="(00) 9999-0000" v-model="params.phone_2" >
	    	      		<div class="invalid-feedback text-center" v-if="errors.phone_2">{{ errors.phone_2[0]}}</div>
	            </div>
	                </div>
	              
	            <div class="col-md-12">
	              	<div class="form-group">
	                  	<label>Logo: </label>
	    	      		<input type="file" class="form-control-file" name="logo" @change="setImage">
	                </div>
	            </div>
	            <div class="col-md-12 alert alert-danger" v-show="error">
	                {{ errorMessage }}
	            </div>
	             <div class="col-md-12  text-center">
	              	<div class="form-group">
	                  	<button type="submit" class="btn btn-primary col-md-6">Cadastre-se</button>
	                </div>
	            </div>
	        </form>


	       <div class="modal fade" ref="successModal" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	          <div class="modal-dialog" role="document">
	            <div class="modal-content">
	              <div class="modal-header bg-success">
	                <h5 class="modal-title" style="color: #fff">Sucesso!</h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                  <span aria-hidden="true">&times;</span>
	                </button>
	              </div>
	            
	                <div  class="modal-body row">
	                    <div class="col-lg-12">
	                         <h5>{{ successMessage }}</h5>
	                    </div>
	                   
	                </div>
	                <div class="modal-footer">
	                    <button class="btn btn-success" data-dismiss="modal" @click="goHome()">Ok</button>
	                </div>
	            </div>
	          </div>
	        </div>
	         <div class="modal fade" ref="errorModal" id="danger-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	          <div class="modal-dialog" role="document">
	            <div class="modal-content">
	              <div class="modal-header bg-danger">
	                <h5 class="modal-title" style="color: #fff">Erro!</h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                  <span aria-hidden="true">&times;</span>
	                </button>
	              </div>
	            
	                <div  class="modal-body row">
	                    <div class="col-lg-12">
	                         <h5>{{ errorMessage }}</h5>
	                    </div>
	                   
	                </div>
	                <div class="modal-footer">
	                    <button class="btn btn-danger" data-dismiss="modal">Ok</button>
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
				params: {
					'email': '',
					'password': '',
					'fantasy_name': '',
					'neighborhood': '',
					'street': '',
					'number': '',
					'address_extra': '',
					'phone_1': '',
					'phone_2': '',
					'state': '',
					'city': '',
					'categories_id': '',
				},
				categories: [],
				states: [],
    			cities: [],
    			errors: [],
    			error: false,
    			formError: false,
    			formData: null,
    			errorMessage: '',
    			success: false,
    			successMessage: '',
    			image: '',
    			phoneMask1: '(##) ?# ####-####',
    			phoneMask2: '(##) ?# ####-####',
			}
		},
		mounted() {
			axios.get('/categories').then((response) => {
				this.categories = response.data
			})
			axios.get('/states').then((response) => {
            	this.states = response.data;
           	})

           	this.formData = new FormData();

          	$(this.$refs.successModal).on("hidden.bs.modal", this.goHome);
		},
		methods: {
			getCities() {
        		if(this.params.state !== 0) {
        			axios.get('/cities', { 
        				params: 
        				{
        					state_id: this.params.state
        				} 
        				}).then((response) => {
        			  	this.cities = response.data;
        			})
        		}
        		
        	},
			register(e) {
				e.preventDefault();

				this.setFormData(this.params)
					.then(() => {

						const config = { headers: { 'content-type': 'multipart/form-data' } }

						axios.post('/register', this.formData).then((response) => {
							this.error = false;
						 	this.success = true;
						 	this.successMessage = response.data.message;
						 	$(this.$refs.successModal).modal('show');
						}).catch((error) => {
						 	let status = error.response.status

						 	switch(status) {
						 	    case 422:
						 	        this.error = false;
						 	        this.errors = JSON.parse(JSON.stringify(error.response.data.errors));
						 	        this.formError = true;
						 	        this.errorMessage = "Não foi possível realizar o seu cadastro! Verifique suas informações e certifique que tenha as inserido corretamente!";
						 	        if(this.errors.email && Object.keys(this.errors).length <= 2) {
						 	        	this.errorMessage = this.errors.email[0];
						 	        }
						 	        $(this.$refs.errorModal).modal('show');
						 	        break;
							    default:
							        this.error = true;
							        this.errorMessage = "Erro interno no servidor, tente novamente mais tarde!";
							        this.formError = false;
							        $(this.$refs.errorModal).modal('show');
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
			goHome() {
				window.location.href="/";
			},
			changeMask1() {
			
				if(this.params.phone_1.length < 16) {
					this.phoneMask1 = '(##) ####-####'
				} else {
					this.phoneMask1 = '(##) ?# ####-####'
				}
				
			},
			changeMask2() {
				console.log(this.params.phone_2.length)
				if(this.params.phone_2.length < 16) {
					this.phoneMask2 = '(##) ####-####'
				} else {
					this.phoneMask2 = '(##) ?# ####-####'
				}
			},
			async setFormData(data) {
				for(let key in data) {
					this.formData.append(key, data[key])
				}

				if(this.image) {
					this.formData.append('logo', this.image)
				}
			}
		}
	};
</script>