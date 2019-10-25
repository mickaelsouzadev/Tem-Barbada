<template>
    
      
      <div class="col-lg-3 ads" data-toggle="modal" data-target="#ad-modal" @click="showAd"> 
        <div class="card">
          <div class="card-header bg-primary" style="font-size: .95em">
            <i class="fas fa-building"></i> {{ ad.fantasy_name }}
          </div> 
          <div class="card-img-section" ref="card">
             <img :src="src + ad.logo" alt="Card image cap" ref="img" id="img">
          </div>
         
          
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
          let $img = $(this.$refs.img);
          let $card = $(this.$refs.card)

          const vue = this

          $img.on('load', function(){
            let aspectRatio = vue.getAspectRatio($(this).width(), $(this).height());
       
            if(aspectRatio == '4:3') {
              $img.addClass('img-card')
            } else {
              $card.css('padding', '2rem 0rem 2rem 0rem');
            }
           
          })
        },
        methods: {
        	showAd() {
            this.$emit('ad')
          },
          getAspectRatio(width, height) {
              let ratio = width / height;
              return ( Math.abs( ratio - 4 / 3 ) < Math.abs( ratio - 16 / 9 ) ) ? '4:3' : '16:9';
          }
        }
    };
</script>

