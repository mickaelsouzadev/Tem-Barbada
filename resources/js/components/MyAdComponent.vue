<template>
	<div class="col-lg-3 ads" data-toggle="modal" data-target="#ad-modal" @click="showAd">
		<div class="card">
			<img class="card-img-top img-fluid" :src="src+ad.logo" alt="Card image cap">
		  <div class="card-body">
		  	<div class="text-center">
		  		 <h5 class="mt-1 mb-2 card-title-ad">{{ ad.title }}</h5> 
		    	<p class="card-text">{{ ad.description }}</p>
		  	</div>
		  
		    <div class="text-right mt-3" style="font-size: .92em;">
		    	{{ ad.end_date | formatDate }}
		    </div>
		    	
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
		methods: {
			showAd() {
				this.$emit('ad')
			}
		}
	};
</script>