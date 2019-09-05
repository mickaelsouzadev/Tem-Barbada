<template>
  <div class="row">
      <div class="col-lg-12">
        <h2 class="title">Barbadas de Hoje em <strong><span style="color: #ff8389">{{ ads[0].local_name }}</span></strong></h2>
      </div>
     <ad v-for="ad in ads" :ad="ad" v-bind:key="ads.id" @ad="setAd(ad)"></ad>
     <div v-show="show">
       <ad-modal v-if="show" :ad="adModal"></ad-modal>
     </div>
     
  </div>
 
</template>

<script>
   export default {
      props: ['state'],
      data() {
        return { 
          ads: [],
          adModal: null,
          show: false,
          state_id: this.state
        }
      },
        mounted() {
          this.getStates()
        },
        methods: {
          getStates() {
            axios.get('/ads/state/'+this.state_id).then((response) => {
                this.ads = response.data;
              })
          },
          setAd(ad) {
            this.show = true
            this.adModal = ad
            console.log(ad)
          }
        }
    };
</script>

