<template>
	<div class="row">
		<div class="col-lg-3 ads" data-toggle="modal" data-target="#add-ad-modal">
				<div class="card text-center add-card">
					
				  <div class="card-body">
				  	<i class="fas fa-plus add-icon fa-6x"></i>
				    <h5 class="card-title add-title">Adicionar Anúncio</h5>
				  </div>
				</div>
			</div >
		<my-ad v-for="ad in ads" @ad="setAd(ad)" :logo="logo" :ad="ad" :key="ad.id" ></my-ad>
		<div v-show="show">
			<my-ad-modal :ad="ad" @update="updateAd(ad)" @delete="deleteAd(ad)"></my-ad-modal >	
		</div>
		<add-ad-modal @create="createAd(...arguments)"></add-ad-modal>	
	</div>
</template>
<script>
	export default {
	   props:['logo'],
	   data() {
	        return { 
	          ads: [],
	          ad: {},
	          show: false,
	          state_id: this.state
	        }
	    },
	    mounted() {
	        this.getMyAds()
	    },
	    methods: {
	          getMyAds() {
	            axios.get('/ads').then((response) => {
	                this.ads = response.data;
	              })
	          },
	          setAd(ad) {
	            this.show = true
	            this.ad = ad
	            console.log(ad)
	          },
	          deleteAd(deletedAd) {
	          	for(let index in this.ads) {

	          		if(this.ads[index].id == deletedAd.id) {
	          			console.log('aaaaaaa')
	          			this.ads.splice(index)
	          		}
	          	}
	          },
	          createAd(newAd) {
	          	this.ads.push(newAd)
	          }
	        }
    };
</script>