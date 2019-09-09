<template>
    <div>
    <form @submit.prevent="resetPassword" v-if="!success">
 	  <div class="row justify-content-center">
            <div class="col-lg-6">
            <div class="col-lg-12 text-center">
                <h5>Redefenir Senha</h5>
            </div>
 	      	<div class="form-group col-lg-12 ">
 	      		<input type="password" name="password" v-bind:class="{ 'is-invalid': formError }" v-model="password" class="form-control" placeholder="Nova Senha">
                <div class="invalid-feedback text-center" v-if="errors.password">{{ errors.password }}</div>
 	      	</div> 
            <div class="form-group col-lg-12 ">
                <input type="password" name="repeat-password" v-bind:class="{ 'is-invalid': formError }" v-model="repeatPassword" class="form-control" placeholder="Repetir Nova Senha">
                <div class="invalid-feedback text-center" v-if="errors.repeatPassword">{{ errors.repeatPassword }}</div>
            </div>
 	      	<div class="form-group col-lg-12">
 	      		<button  type="submit" class="btn btn-primary col-lg-12">Enviar</button>

 	      		
 	      	</div>
 	      
            </div>
 	      </div>
   	</form>
    
 	<div class="row justify-content-center" style="border: none">
 		<div v-show="error" class="alert alert-danger col-lg-6">{{ errorMessage }}</div>
        <div v-show="success" class="alert alert-success col-lg-6"> Sua senha foi alterada com sucesso! </div>
 	</div>
    </div>
</template>

<script>

    export default {
    	data() {
    		return { 
    			password: '',
                repeatPassword: '', 
    			error: false,
    			errorMessage: '',
                success: false,
                successMessage: '',
                errors: [],
                formError: false
    		}
    	},
        mounted() {
           
        },
        methods: {
        	resetPassword () {

                this.formError = false;
                this.errors.password = ""
                this.errors.repeatPassword = ""

                if(this.password != this.repeatPassword) {
                    this.formError = true;
                    this.errors.password = "Senhas não conferem"
                    this.errors.repeatPassword = "Senhas não conferem"
                    return;
                }

                if(this.password == '') {
                    this.formError = true;
                    this.errors.password = "Preencha a sua nova senha"
                    return;
                    
                }

                if(this.repeatPassword == '') {
                    this.formError = true;
                    this.errors.repeatPassword = "Confirme a sua nova senha"
                    return;
                    
                }

                this.formError = false;
                this.errors = {}

        		const params = {
        		 	password: this.password
        		}

                axios.put('/reset-password', params).then((response) => {
                    this.success = true
                }).catch((error) => {
                    
                    let status = error.response.status

                    switch(status) {
                        case 400: 
                            this.error = true;
                            this.errorMessage = error.response.data.message;
                            this.success = false
                            break;
                        default:
                            this.error = true;
                            this.errorMessage = "Erro interno no servidor, tente novamente mais tarde!";
                            this.formError = true;
                            this.success = false;
                    }

                    
                })
        		
        	},
           
        }
    };
</script>

