<template>
 	<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header bg-primary">
         <h5 class="modal-title" id="exampleModalLabel">Login</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <form @submit.prevent="login">
 	      <div class="modal-body row justify-content-center">
 	      	<div class="form-group col-lg-8">
 	      		<input type="email" name="email" v-bind:class="{ 'is-invalid': formError }" v-model="email" class="form-control" placeholder="Email">
                <div class="invalid-feedback text-center" v-if="errors.email">{{ errors.email[0]}}</div>
 	      	</div>
 	      	<div class="form-group col-lg-8 ">
 	      		<input type="password" name="password" v-bind:class="{ 'is-invalid': formError }" v-model="password" class="form-control" placeholder="Senha">
                <div class="invalid-feedback text-center" v-if="errors.password">{{ errors.password[0]}}</div>
 	      	</div>
 	      	<div class="form-group col-lg-8">
 	      		<button  type="submit" class="btn btn-primary col-lg-12">Login</button>

 	      		
 	      	</div>
 	      	<div class="col-lg-8 pb-1 text-center">
 	      		Ainda não é cadastrado? <a href="/cadastre-se">Cadastre-se</a>
 	      	</div> 
 	      	  <div class="col-lg-8 pb-1 text-center">
 	      		Esqueceu sua senha? <a href="/">Alterar senha</a>
 	      	</div>

 	      </div>
   	</form>
 		<div class="modal-footer row justify-content-center" style="border: none">
 			<div v-show="error" class="alert alert-danger col-lg-10">{{ errorMessage }}</div>
 		</div>
     </div>
   </div>
 </div>
</template>

<script>

    export default {
    	data() {
    		return { 
    			email: '',
    			password: '',
    			error: false,
    			errorMessage: '',
                errors: [],
                formError: false
    		}
    	},
        mounted() {
           
        },
        methods: {
        	login () {

        		const params = {
        			email: this.email,
        			password: this.password
        		}

        		axios.post('/login', params).then((response) => {
        			this.error = false;
                    this.formError = false;
        			this.message = '';
        			window.location.href="/painel-cliente";
        		}).catch((error) => {
        			
                    let status = error.response.status

                    switch(status) {
                        case 400: 
                            this.error = true;
                            this.errorMessage = error.response.data.message;
                            break;
                        case 422:
                            this.error = false;
                            this.errors = JSON.parse(JSON.stringify(error.response.data.errors));
                            this.formError = true;
                            break;
                        default:
                            this.error = true;
                            this.errorMessage = "Erro interno no servidor, tente novamente mais tarde!";
                            this.formError = true;
                    }

        			
        		})
        	}
        }
    };
</script>

