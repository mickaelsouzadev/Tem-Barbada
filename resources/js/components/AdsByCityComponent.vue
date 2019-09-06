<template>
    <div  class="row">
    	<div class="col-lg-12">
        <h2 class="title">Barbadas de Hoje em <strong><span style="color: #ff8389">{{ ads[0].local_name }}</span></strong></h2>
      </div>
     	<ad v-for="ad in ads" :ad="ad" v-bind:key="ads.id" @ad="setAd(ad)"></ad>
     	<div v-if="show">
     		<ad-modal :ad="ad"></ad-modal>
     	</div>
     	
  </div>
</template>

<script>
    export default {
    	props: ['city'],
    	data() {
    		return { 
    		  ads: [],
    		  ad: {},
    		  show: false,
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
        		axios.get('/ads/city/'+this.city_id).then((response) => {
           			this.ads = response.data;
           		})
        	},
        	setAd(ad) {
        		this.ad = ad
        		this.show = true
        	}
        }
    };
</script>
