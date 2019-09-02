<template>
    <div>
        <my-profile-modal :profile="profile"></my-profile-modal>
        <edit-my-info :profile="profile"></edit-my-info>
    </div>
</template>

<script>
    export default {
    	data() {
    		return { 
    			profile: []
    		}
    	},
        mounted() {
           axios.get('/clients').then((response) => {
                this.profile = response.data[0];
                console.log(this.profile)
            }).catch((error) => console.error('Erro: ', error));
        },
        methods: {
        	
        }
    };
</script>

