<template>
 	<div class="row justify-content-center">

        <div class="col-lg-6">

        <div class="card o-hidden border-0 shadow-lg my-5 ">
            <div class="card-body p-0 mt-3" >
                <!-- Nested Row within Card Body -->
              
                <div class="col-lg-12">
                    <div class="pr-5 pl-5 pb-2">
                      <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                      </div>
                        <form class="user" @submit.prevent="login">
                            <div class="form-group">
                              <input type="text" v-model="email" v-bind:class="{ 'is-invalid': formError }" class="form-control form-control-user"  id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email"> 
                              <div class="invalid-feedback text-center" v-if="errors.email">{{ errors.email[0]}}</div>
                              <div class="invalid-feedback text-center" v-if="!errors.email && formError">{{ errorMessage }}</div>
                            </div>
                            <div class="form-group">
                              <input type="password" v-model="password" v-bind:class="{ 'is-invalid': formError }" class="form-control form-control-user" id="exampleInputPassword" placeholder="Senha">
                              <div class="invalid-feedback text-center" v-if="errors.password">{{ errors.password[0]}}</div>
                             <div class="invalid-feedback text-center" v-if="!errors.password && formError">{{ errorMessage }}</div>
                            </div>
                            
                            <button type="submit" class="btn btn-success btn-user btn-block">
                              Login
                            </button>

                        </form>
                         <div class="row justify-content-center  mb-4">
                            <div v-show="error" class="alert alert-danger col-lg-12 mt-5">{{ errorMessage }}</div>
                        </div>
                  </div>
                   
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
    			email: '',
    			password: '',
                username: '',
    			errorMessage: '',
                errors: [],
                error: false,
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

        		axios.post('login', params).then((response) => {
        			this.error = false;
                    this.formError = false;
        			this.message = '';
        			window.location.href="/admin";
        		}).catch((error) => {
        			
                    let status = error.response.status

                    switch(status) {
                        case 400: 
                            this.error = true;
                            this.errorMessage = error.response.data.message;
                            this.formError = true;
                            break;
                        case 422:
                            this.error = false;
                            this.errors = JSON.parse(JSON.stringify(error.response.data.errors));
                            this.formError = true;
                            break;
                        default:
                            this.error = true;
                            this.errorMessage = "Erro interno no servidor, tente novamente mais tarde!";
                            this.formError = true;;
                    }

        			
        		})
        	},
           
        }
    };
</script>

