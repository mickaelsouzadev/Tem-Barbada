<template>
	<div class="col-lg-5 contact-col">
		<form @submit.prevent="send">
			<div class="form-group">
				<label>Nome</label>
				<input type="text" v-model="params.name" v-bind:class="{ 'is-invalid':  (empty.name), 'is-valid': (empty.name === false) }" class="form-control" placeholder="Seu Nome" @change = "clearError('name')">
				<div class="invalid-feedback text-center" v-if="empty.name" >Preencha o seu nome</div>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" v-model="params.email" v-bind:class="{ 'is-invalid':  (empty.email), 'is-valid': (empty.email === false) }"  class="form-control" placeholder="Seu Email" @change = "clearError('email')">
				<div class="invalid-feedback text-center" v-if="empty.email"> Preencha o seu email</div>
			</div>
			<div class="form-group">
				<label>Mensagem</label>
				<textarea v-model="params.message" v-bind:class="{ 'is-invalid':  (empty.message), 'is-valid': (empty.message === false) }"  placeholder="Sua Mensagem" class="form-control" @change = "clearError('message')"></textarea>
				<div class="invalid-feedback text-center" v-if="empty.message" >Insira uma mensagem</div>
					
				
			</div>
			<div class="form-group text-center">
				<button class="btn btn-primary" style="padding: 0.6rem 2rem" >Enviar Mensagem</button>
			</div>
		</form>
		<div class="alert alert-danger" v-show="error">
			Não foi possível enviar a sua mensagem!
		</div>
		<div class="alert alert-success" v-show="success">
			Mensagem enviada com sucesso!
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				params: {
					name: '',
					email: '',
					message: '',
					
				},
				error: false,
				success: false,
				empty: [],
			}
		},
		methods: {
			send() {

				if(this.params.name === '') {
					this.empty['name'] = true
				}

				if(this.params.email === '') {
					this.empty['email'] = true
				}

				if(this.params.message === '') {
					this.empty['message'] = true
				}

				axios.post('/contact', this.params)
					.then((response) => {
						this.error = false;
						this.success = true;
					}).catch((error) => {
						this.error = true;
						this.success = false;
					});
			},
			clearError(name) {
				console.log(name)
				this.empty[name] = false
				console.log(this.empty)
			}
		},
		
	};
</script>