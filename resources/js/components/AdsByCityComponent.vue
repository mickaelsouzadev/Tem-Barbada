<template>
   <div v-show="showAll">
    <div v-if="ads.length !== 0" class="row">
      
     
      <div class="col-lg-12">
          <h2 class="title">Barbadas de Hoje em <strong><span style="color: #ff8389">{{ ads[0].local_name }}</span></strong></h2>
      </div>
      <ad v-for="ad in ads" :ad="ad" v-bind:key="ads.id" @ad="setAd(ad)"></ad>
     
       <div v-show="show">
         <ad-modal v-if="show" :ad="ad"></ad-modal>
       </div>
       
    </div>
    <div v-else class="row">
        <div class="col-lg-12 text-center alert-danger without-ad">
           <h2>Não há barbadas nesse local!</h2>
       </div>
    </div>
   </div>
</template>
<style>
  .without-ad{
    margin-bottom: 7rem;
    margin-top: 6.68rem;
    padding: 2rem;
  }
</style>
<script>
    export default {
    	props: ['city'],
    	data() {
    		return { 
    		  ads: [],
    		  ad: {},
    		  show: false,
          showAll: false,
    		  city_id: this.city
    		}
    	},
        mounted() {
          console.log('mounted')
          this.getAdsbyCity()
        },
        methods: {
        	getAdsbyCity() {
        		console.log(this.city_id)
        		axios.get('/skive/city/'+this.city_id).then((response) => {
           			this.ads = response.data;
                this.showAll = true;
                console.log(this.ads)
           		})
        	},
        	setAd(ad) {
        		this.ad = ad
        		this.show = true
        	}
        }
    };
</script>
