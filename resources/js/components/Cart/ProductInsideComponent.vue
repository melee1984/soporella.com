<template>
<div id="page" class="container attraction">
  <!--Title-->
  <div class="row">
    <div class="col-lg-12">
      <h1>{{ attraction.title }}</h1>
    </div>
  </div>
  <!--Upsell Link-->
  <!--Content-->
  <div class="row">
    <!--Right-->
    <div class="col-lg-4 col-lg-push-8 tickets">
      <div class="sticky">
        <div class="row">
          <div class="col-lg-12">
            <!--Messenger-->
          </div>
        </div>
        <!--When are you going-->
       	<div class="row">
            <div class="col-lg-12 ticket-date">
              <h4>When are you going?</h4>
              <div class="form-group">
                <input type="date" class="calendario form-control hasDatepicker" v-model="field.calendar" name="departure" placeholder="mm/dd/yyyy" id="departure">
                <div class="action_error_calendario hide">Please select date</div>
              </div>
            </div>
         </div>
                <!--Choose Ticket Type-->
        <div class="row">
          <div class="col-lg-12 ticket-type">
            <h4>Choose Ticket Type</h4>
            <div class="form-group">
              <select class="form-control" id="category" v-model="field.chooseTicket"  @change="fetchTimings($event, $event.target.selectedIndex)">>
              	<option value="">Select</option>
                <option v-for="rate in attraction.rates" :value="rate.id">{{ rate.title }}</option>
              </select> 
            </div>
          </div>
        </div>
        <!--Adult/Junior-->
        <div class="row">
            <div id="att-drops" class="priceRateDisplay">
              <div v-for="(detail, index) in rateDetailsArray.details" class="col-lg-6 ticket-age">
                  <h4>{{ detail.title }}</h4>

                  <h5 class="ticket-price" v-if="!detail.markdown_price==0"><strike>{{ detail.price }}</strike> {{ detail.markdown_price }} {{ detail.currency }}</h5>
                  <h5 class="ticket-price" v-if="detail.markdown_price==0">{{ detail.price }} {{ detail.currency }}</h5>

                  <div class="form-group">
                      <input type="number" min="0" class="form-control" placeholder="0" value="1" :key="index" v-model="detail.qty">
                  </div>
              </div>
            </div>
        </div>

        <!--Submit-->
        <div class="row">
          <div class="col-lg-6"></div>
          <div class="col-lg-6 ticket-submit">
            <div class="form-group" v-if="formOkay">
              <input type="submit" class="form-control" v-on:click="addCart" value="Add to Cart" >
            </div>
            <div class="form-group" v-if="!formOkay">
              <input type="submit" class="form-control inactive"  v-on:click="validate" value="Add to Cart" >
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--Left-->
    <div class="col-lg-8 col-lg-pull-4">
      <div class="row"  v-if="attraction.video!=''">
        <div class="col-lg-12">
          	<!--YouTube-->
			<div class="video">
              <iframe frameborder="0" border="0" width="750" height="422" :src="'https://www.youtube.com/embed/'+attraction.video+'?autoplay=1&amp;showinfo=0&amp;controls=0&amp;rel=0'"></iframe>
            </div>
        </div>
      </div>
       <div class="row">
        <div class="col-lg-12">
          	<div id="myCarousel" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="item">
                      <img :src="pageUrl+'/products/images/'+attraction.photo" :alt="attraction.title" class="img-responsive">
                    </div>
                </div>
              </div>
              <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-menu-left"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-menu-right"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
        </div>
      </div>
      <!--Details-->
      <div class="row">
        <div class="col-lg-12">
          <h3>Ticket Details</h3>
          <p>Ticket Information Here</p>
	      <section v-if="attraction.availability!=''">
	          <hr>
	          <h3>Availability</h3>        
	          <p>{{ attraction.availability }}</p>
	      </section>
          <section v-if="!attraction.redemption">
          	<hr>
          	<h3>Redemption</h3>        
          	<p>{{ attraction.redemption }}</p>
          </section>
        </div>
      </div>

      <hr><br><br>
      <div id="promotions" class="container">
  		  <div class="row">
		    <div class="col-lg-12">
		      <h3>You might also be interested in...</h3>
		    </div>
		  </div>
		  <!--List-->
		  
        <div class="row">
  				   <div v-for="interested in attraction.interested_in" class="col-lg-3 promo-single">
  		          <h4>{{ interested.attraction.title }}</h4>
  		          <a :href="interested.attraction.pageUrl" :title="interested.attraction.title">
  		          		<img :src="interested.attraction.photo" :alt="interested.attraction.title" class="img-responsive"></a>
  		          	<a class="buy" :href="interested.attraction.pageUrl">Buy Tickets</a>
  		        </div>
        </div>
  		</div>

    </div>
  </div>
</div>


</template>

<script>
    export default {
      data() {
        return {
          field: {
            chooseTicket: "",
            calendar: "mm/dd/yyyy",
            qties: {},
          },
          rateHeader: this.attraction,
          isSubmit: false,
          pageUrl: MAINURL,
          rateDetailsArray: {},
        }
      },
      props: ['attraction'],
      computed: {
            formOkay: function () {

              if (!this.field.chooseTicket)  {
                return false;
              }
              else if(!this.field.calendar) {
                return false;
              }
              else if(this.field.calendar == "mm/dd/yyyy"){
                return false;
              }

              return true;
            }
        },
      methods: {
      	addCart: function() {
          this.formOkay = false;
          var obj = {};
          obj = this.rateDetailsArray.details;

          axios.post('/api/cart/add/'+this.rateHeader.id+'/submit', {qty: obj, date: this.field.calendar}).then((response) => {
              if (response.data.status) {
                this.$toasts.success(response.data.message);
                this.formOkay = true;
                Event.$emit('refreshBasket');
              }
              else {
                this.$toasts.error(response.data.message);
              }
            }).catch((errors) => {
                this.$toasts.error(response.data.message);
            }); 
      	},
        validate: function() {
         
          ('#departure').removeClass('is-invalid')
          ('#category').removeClass('is-invalid')

          if (field.chooseTicket=="") {
            $('#departure').addClass('is-invalid')
          }
          if(this.field.calendar == "mm/dd/yyyy"){
              $('#departure').addClass('is-invalid')
          }
          if (field.calendar=="") {
            $('#category').addClass('is-invalid')
          }

        },
        fetchTimings: function(event, selectedIndex) {
          if (selectedIndex == 0) {
            this.rateDetailsArray = {};
            return;
          }
          this.rateDetailsArray = this.rateHeader.rates[selectedIndex-1];

        },
      }

    }
</script>


