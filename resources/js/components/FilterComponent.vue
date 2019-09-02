<template>
   <div class="row form-inline justify-content-center">
		<div class="form-group col-xs-8 col-sm-4 col-md-4 col-lg-2 mb-2">
			<select class="form-control  form-rounded col-md-12" name="estado" @change="getCities()" v-model="state">
				<option selected value="0" >Estado</option>
				<option v-for="state in states" :value="state.id">{{ state.name }}</option>
			</select>
		</div>
		<div class="form-group col-xs-8 col-sm-4 col-md-4 col-lg-2 mb-2">
			<select class="form-control  form-rounded col-md-12" name="cidade">
				<option>Cidade</option>
				<option v-for="city in cities" :value="city.id">{{ city.name }}</option>
			</select>
		</div>
		<div class="form-group col-xs-8 col-sm-4 col-md-4 col-lg-2 mb-2">
			<button class="btn btn-primary btn-outline btn-block">Selecionar</button>
		</div>
	</div>
</template>

<script>
    export default {
    	data() {
    		return { 
    			states: [],
    			cities: [],
    			state: 0,
    		}
    	},
        mounted() {
            axios.get('/states').then((response) => {
            	this.states = response.data;
           })
        },
        methods: {
        	getCities() {
        		if(this.state !== 0) {
        			axios.get('/cities', { 
        				params: 
        				{
        					state_id: this.state} 
        				}).then((response) => {
        			  	this.cities = response.data;
        			})
        		}
        		
        	}
        }
    };
</script>

