<template>
    
      
      <div class="col-lg-3 ads" data-toggle="modal" data-target="#ad-modal" @click="showAd"> 
        <div class="card">
          <div class="card-header bg-primary" style="font-size: .95em">
            <i class="fas fa-building"></i> {{ ad.fantasy_name }}
          </div> 
          <img class="card-img-top img-fluid" :src="src + ad.logo" alt="Card image cap">
          
          <div class="card-body text-center">
            <!-- <strong style="font-size: .9em;">Taxi Carrara ou Carrara Taxi</strong> -->
            <h5 class="mt-2 mb-2 card-title-ad">{{ ad.title }}</h5>
              <div v-if="ad.description.length<40"><p class="card-text">{{ ad.description }}</p></div>
              <div v-else><p class="card-text">{{ ad.description.substring(0,40)+"..."  }}</p></div> 
          
            
            <button class="btn btn-primary mt-2 mb-1" data-toggle="modal" data-target="#ad-modal" @click="showAd">Saiba Mais</button>
          </div>
      
          
      
        </div>
      </div >
   

</template>

<script>
    export default {
      props: ['ad'],
    	data() {
    		return { 
    			src: '/img/'
    		}
    	},
        mounted() {
           
        },
        methods: {
        	showAd() {
            this.$emit('ad')
          }
        }
    };
</script>

