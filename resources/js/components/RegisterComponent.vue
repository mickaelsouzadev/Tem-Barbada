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
		    	      	<input type="text" name="complemento" class="form-control" @change = "clearError('address_extra')" v-bind:class="{ 'is-invalid':  (errors.extra_address), 'is-valid': (errors.address_extra === false) }" placeholder="Complemento" v-model="params.adress_extra">
		    	      	<div class="invalid-feedback text-center" v-if="errors.extra_address">{{ errors.extra_address[0]}}</div>
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
	            <div class="col-md-6">
	                <div class="form-group">
	                  	<label>Telefone 1: </label>
	    	      		<input type="text" name="telefone-1" class="form-control" @change = "clearError('phone_1')" v-bind:class="{ 'is-invalid':  (errors.phone_1), 'is-valid': (errors.phone_1 === false) }" placeholder="Telefone 1" v-model="params.phone_1">
	    	      		<div class="invalid-feedback text-center" v-if="errors.phone_1">{{ errors.phone_1[0]}}</div>
	                </div>
	               
	            </div>
	            <div class="col-md-6">
	                <div class="form-group">
	                  	<label>Telefone 2: </label>
	    	      		<input type="text" name="telefone-2" class="form-control" @change = "clearError('phone_2')" v-bind:class="{ 'is-invalid':  (errors.phone_2), 'is-valid': (errors.phone_2 === false) }" placeholder="Telefone 2" v-model="params.phone_2">
	    	      		<div class="invalid-feedback text-center" v-if="errors.phone_2">{{ errors.phone_2[0]}}</div>
	            </div>
	                </div>
	              
	            <div class="col-md-12">
	              	<div class="form-group">
	                  	<label>Logo: </label>
	    	      		<input type="file" class="form-control-file" name="logo" @change="setImage">
	                </div>
	            </div>
	             <div class="col-md-12  text-center">
	              	<div class="form-group">
	                  	<button type="submit" class="btn btn-primary col-md-6">Cadastre-se</button>
	                </div>
	            </div>
	        </form>
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
    			image: '',
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

						axios.post('clients/', this.formData).then(() => {
						 	console.log(response)
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