<template>
	<div class="row" v-show="showAds">
		<div v-if="ads.length != limit" class="col-lg-3 ads" data-toggle="modal" data-target="#add-ad-modal">
				<div class="card text-center add-card">
					
				  <div class="card-body">
				  	<i class="fas fa-plus add-icon fa-6x"></i>
				    <h5 class="card-title add-title">Adicionar Anúncio</h5>
				   
				  </div>
				</div>
			</div >
		<div v-else class="col-lg-3 ads blocked">
			<div class="card text-center add-card">
					
				  <div class="card-body">
				  	<i class="far fa-times-circle add-icon fa-5x text-danger"></i>
				    <h5 class="card-title add-title text-danger mb-2">Limite de anúncios excedido</h5>
				   	<p class="card-text text-danger">Seu limite de anúncios 1/1 foi excedido, aguarde os seus respectivos prazos acabarem ou exclua algum deles.</p>
				  </div>
				</div>
		</div>
		<my-ad v-for="ad in ads" @ad="setAd(ad)" :logo="logo" :ad="ad" :key="ad.id" ></my-ad>
		<div v-show="show">
			<my-ad-modal :ad="ad" @update="updateAd(ad)" @delete="deleteAd(ad)"></my-ad-modal >	
		</div>
		<add-ad-modal @create="createAd(...arguments)" :limit="limit"></add-ad-modal>	
	</div>
</template>
<style>
	.blocked {
		cursor:not-allowed;
	}
</style>
<script>
	export default {
	   props:['logo', 'limit'],
	   data() {
	        return { 
	          ads: [],
	          ad: {},
	          show: false,
	          showAds: false,
	          state_id: this.state
	        }
	    },
	    mounted() {
	        this.getMyAds()
	    },
	    methods: {
	          getMyAds() {
	            axios.get('/skive').then((response) => {
	                this.ads = response.data;
	               	this.showAds = true
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