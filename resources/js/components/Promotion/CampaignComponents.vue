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
              <p>{{ campaign.language_string.description }}</p>
              <table class="table">
                    <tbody>
                        <span v-for="rates in campaign.attraction.rates">
                            {{ rates.language.title }}
                            <tr v-for="ratesDetail in rates.details">
                              <td>{{ ratesDetail.language.title }} </td>
                              <td><strike>{{ ratesDetail.price }}  {{ ratesDetail.currency }} </strike></td>
                              <td>{{ ratesDetail.markdown_price  }}  {{ ratesDetail.currency }} </td>
                            </tr>
                        </span>
                </tbody>
              </table>
              <a class="buy" :href="campaign.attraction.pageUrl">{{ messages.LABEL_BUY_TICKET }}</a> 

            </div>
            <div class="col-lg-4 offer-img">
                  <span v-for="index in 2" :key="index">
                    <img class="img-responsive" :src="campaign.attraction.images[index].photo" alt="" width="340">    
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

        <div class="col-lg-6 offer-single" v-for="campaign in campaigns"  v-if="campaign.display_option == 2">
          <h4>{{ campaign.attraction.title }}</h4>
          <!--Carousel-->
          <div id="#offer2" class="carousel slide" data-ride="carousel" data-interval="false">
            <div class="carousel-inner">
              <div class="item active"> 
                <a  :href="campaign.attraction.pageUrl" target="_blank">
                  <img :src="campaign.img_1" :alt="campaign.attraction.title" class="img-responsive" width="100%" v-if="campaign.img_1">
                  <img :src="campaign.attraction.img" :alt="campaign.attraction.title" class="img-responsive" width="100%" v-if="!campaign.img_1">
                </a>
              </div>
              <div class="rib-per">
                  <span><b>{{ campaign.discount_string }}</b><br><small>OFF</small></span>
              </div>
              <!--To be auto populated-->
            </div>
          </div>
          <p>{{ campaign.language_string.description }}</a></p>
              <table class="table">
                    <tbody>
                       <span v-for="rates in campaign.attraction.rates">
                            {{ rates.language.title }}
                            <tr v-for="ratesDetail in rates.details">
                              <td>{{ ratesDetail.language.title}} </td>
                              <td><strike>{{ ratesDetail.price }}  {{ ratesDetail.currency }} </strike></td>
                              <td>{{ ratesDetail.markdown_price  }}  {{ ratesDetail.currency }} </td>
                            </tr>
                        </span>
                </tbody>
              </table>
          <a class="buy" :href="campaign.attraction.pageUrl">{{ messages.LABEL_BUY_TICKET }}</a>
        </div>
        
        <div class="container offer" v-for="campaign in campaigns"  v-if="campaign.display_option == 3">
            <div class="row">
              <div class="col-lg-12 offer-last counter_4">
                <div class="row v-center">
                  <div class="col-lg-4 col-xs-12">
                     <a :href="campaign.attraction.pageUrl">
                      <img class="img-responsive" :src="campaign.attraction.img" :alt="campaign.attraction.title">
                    </a>
                  </div>
                  <div class="rib-per">
                      <span><b>{{ campaign.discount_string }}</b><br><small>OFF</small></span>
                    </div>
                  <div class="col-lg-8 col-xs-12">
                    <h4>{{ campaign.attraction.title }}</h4>
                    {{ campaign.language_string.description }}
                    <table class="table">
                        <tbody>
                            <span v-for="rates in campaign.attraction.rates">
                            {{ rates.language.title }}
                            <tr v-for="ratesDetail in rates.details">
                              <td>{{ ratesDetail.language.title}} </td>
                              <td><strike>{{ ratesDetail.price }}  {{ ratesDetail.currency }} </strike></td>
                              <td>{{ ratesDetail.markdown_price  }}  {{ ratesDetail.currency }} </td>
                            </tr>
                        </span>
                          </tbody>
                      </table>
                    <a class="buy" :href="campaign.attraction.pageUrl">{{ messages.LABEL_BUY_TICKET }}</a>
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
                 <a  :href="campaign.attraction.pageUrl">
                  <img :src="campaign.attraction.img" :alt="campaign.attraction.title" class="img-responsive" width="100%">
                </a>
              </div>
              <div class="rib-per">
                  <span><b>{{ campaign.discount_string }}</b><br><small>OFF</small></span>
              </div>
              <!--To be auto populated-->
            </div>
          </div>
          <p>{{ campaign.language_string.description }}</a></p>
              <table class="table">
                    <tbody>
                       <span v-for="rates in campaign.attraction.rates">
                            {{ rates.language.title }}
                            <tr v-for="ratesDetail in rates.details">
                              <td>{{ ratesDetail.language.title}} </td>
                              <td><strike>{{ ratesDetail.price }}  {{ ratesDetail.currency }} </strike></td>
                              <td>{{ ratesDetail.markdown_price  }}  {{ ratesDetail.currency }} </td>
                            </tr>
                        </span>
                </tbody>
              </table>
          <a class="buy" :href="campaign.attraction.pageUrl">{{ messages.LABEL_BUY_TICKET.LABEL_BUY_TICKET }}</a>
        </div>

      </div>
    </div>


</div>

</template>

<script>


    export default {
       data() {
        return {
            messages: this.trans.messages,
        }
      },
      mounted() {
          console.log('Component mounted.');
      },
      props: ['campaigns'],
    }
</script>
