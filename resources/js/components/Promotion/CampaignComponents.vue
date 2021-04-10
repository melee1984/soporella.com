<template>
<div>
    <!-- Header --> 
     <div id="offer-one" class="container offer hidden-xs" v-for="campaign in campaigns"  v-if="campaign.display_option == 1">
      <div class="row v-center">
        <div class="offer-bgr col-lg-12 v-center">
          <img class="img-responsive" :src="campaign.large_img" alt="Offer">
          <div class="offer-wrap v-center">
            <div class="col-lg-8 offer-txt">
              <h3>{{ campaign.attraction.title }}</h3>
              <p>{{ campaign.attraction.description }}</p>
              <table class="table">
                    <tbody>
                        <span v-for="rates in campaign.attraction.rates">
                            {{ rates.title }}
                            <tr v-for="ratesDetail in rates.details">
                              <td>{{ ratesDetail.title}} </td>
                              <td><strike>{{ ratesDetail.price }}  {{ ratesDetail.currency }} </strike></td>
                              <td>{{ ratesDetail.markdown_price  }}  {{ ratesDetail.currency }} </td>
                            </tr>
                        </span>
                </tbody>
              </table>
              <a class="buy" :href="campaign.attraction.pageUrl">Buy Ticket</a>
            </div>
            <div class="col-lg-4 offer-img">
                <span v-for="image in campaign.attraction.images">
                    <img class="img-responsive" :src="image.img" alt="">    
                </span>
            </div>
          </div>
        </div>
      </div>
      <div class="rib-per">
          <span><b>{{ campaign.discount_string }}</b><br>
              <small>OFF</small>
          </span>
      </div>
    </div>
    <!-- Header --> 

    <div class="container offer">
      <div class="row">

        <div class="col-lg-6 offer-single" id="2" v-for="campaign in campaigns"  v-if="campaign.display_option == 2">
          <h4>{{ campaign.attraction.title }}</h4>
          <!--Carousel-->
          <div id="#offer2" class="carousel slide" data-ride="carousel" data-interval="false">
            <div class="carousel-inner">
              <div class="item active"> 
                <a href="#" target="_blank">
                  <img :src="campaign.attraction.img" :alt="campaign.attraction.title" class="img-responsive" width="100%">
                </a>
              </div>
              <div class="rib-per">
                  <span><b>{{ campaign.discount_string }}</b><br><small>OFF</small></span>
              </div>
              <!--To be auto populated-->
            </div>
          </div>
          <p>{{ campaign.attraction.description }}</a></p>
              <table class="table">
                    <tbody>
                       <span v-for="rates in campaign.attraction.rates">
                            {{ rates.title }}
                            <tr v-for="ratesDetail in rates.details">
                              <td>{{ ratesDetail.title}} </td>
                              <td><strike>{{ ratesDetail.price }}  {{ ratesDetail.currency }} </strike></td>
                              <td>{{ ratesDetail.markdown_price  }}  {{ ratesDetail.currency }} </td>
                            </tr>
                        </span>
                </tbody>
              </table>
          <a class="buy" :href="campaign.attraction.pageUrl">Buy Ticket</a>
        </div>
        
        <div class="container offer" v-for="campaign in campaigns"  v-if="campaign.display_option == 3">
            <div class="row">
              <div class="col-lg-12 offer-last counter_4">
                <div class="row v-center">
                  <div class="col-lg-4 col-xs-12">
                    <img class="img-responsive" :src="campaign.attraction.img" :alt="campaign.attraction.title">
                  </div>
                  <div class="rib-per">
                      <span><b>{{ campaign.discount_string }}</b><br><small>OFF</small></span>
                    </div>
                  <div class="col-lg-8 col-xs-12">
                    <h4>{{ campaign.attraction.title }}</h4>
                    {{ campaign.attraction.description }}
                    <table class="table">
                        <tbody>
                            <span v-for="rates in campaign.attraction.rates">
                            {{ rates.title }}
                            <tr v-for="ratesDetail in rates.details">
                              <td>{{ ratesDetail.title}} </td>
                              <td><strike>{{ ratesDetail.price }}  {{ ratesDetail.currency }} </strike></td>
                              <td>{{ ratesDetail.markdown_price  }}  {{ ratesDetail.currency }} </td>
                            </tr>
                        </span>
                          </tbody>
                      </table>
                    <a class="buy" :href="campaign.attraction.pageUrl">Buy Ticket</a>
                  </div>
                </div>
              </div>
            </div>
        </div>
      
          <div class="col-lg-6 offer-single" id="2" v-for="campaign in campaigns"  v-if="campaign.display_option == 4">
          <h4>{{ campaign.attraction.title }}</h4>
          <!--Carousel-->
          <div id="#offer2" class="carousel slide" data-ride="carousel" data-interval="false">
            <div class="carousel-inner">
              <div class="item active"> 
                <a href="#" target="_blank">
                  <img :src="campaign.attraction.img" :alt="campaign.attraction.title" class="img-responsive" width="100%">
                </a>
              </div>
              <div class="rib-per">
                  <span><b>{{ campaign.discount_string }}</b><br><small>OFF</small></span>
              </div>
              <!--To be auto populated-->
            </div>
          </div>
          <p>{{ campaign.attraction.description }}</a></p>
              <table class="table">
                    <tbody>
                       <span v-for="rates in campaign.attraction.rates">
                            {{ rates.title }}
                            <tr v-for="ratesDetail in rates.details">
                              <td>{{ ratesDetail.title}} </td>
                              <td><strike>{{ ratesDetail.price }}  {{ ratesDetail.currency }} </strike></td>
                              <td>{{ ratesDetail.markdown_price  }}  {{ ratesDetail.currency }} </td>
                            </tr>
                        </span>
                </tbody>
              </table>
          <a class="buy" :href="campaign.attraction.pageUrl">Buy Ticket</a>
        </div>



      </div>
    </div>


</div>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        props: ['campaigns'],

    }
</script>
