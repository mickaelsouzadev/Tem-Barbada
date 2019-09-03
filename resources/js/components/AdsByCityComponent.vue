<template>
    <div  class="col-lg-12">
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
          this.getCities()
        },
        methods: {
        	getCities() {
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
