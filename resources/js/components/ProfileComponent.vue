<template>
    <div>
        <profile-nav :info="profile"></profile-nav>
        <my-profile-modal :profile="profile"></my-profile-modal>
        <edit-my-info :profile="profile" @update="updateProfile(...arguments)"></edit-my-info>
        <section class="container main-section page-out">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title">Minhas Barbadas</strong></h2>
                </div>
            </div>
                <my-ads :logo="profile.logo" :limit="profile.limit_ad"></my-ads>
                    
            
        </section>
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
        	updateProfile(updated) {
                this.profile = updated;
            }
        }
    };
</script>

