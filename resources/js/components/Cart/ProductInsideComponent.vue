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
        <div class="row" v-if="attraction.special_annoucement">
          <div class="col-lg-12 alert alert-danger">
            <p v-html="attraction.special_annoucement"></p>
          </div>
        </div>

       	<div class="row">
            <div class="col-lg-12 ticket-date">
              <h4>{{ messages.ACTIVITY_WHEN_ARE_YOU_GOING }} </h4>
              <div class="form-group">
                <input type="date" class="calendario form-control hasDatepicker" :min="dateMin" v-model="field.calendar" name="departure" placeholder="mm/dd/yyyy" id="departure">
                <div class="action_error_calendario hide">{{ messages.CART_DATE_GOING }}</div>
              </div>
            </div>
         </div>
                <!--Choose Ticket Type-->
        <div class="row">
          <div class="col-lg-12 ticket-type">
            <h4>{{ messages.TICKET_TYPE }}</h4>
            <div class="form-group">
              <select class="form-control" id="category" v-model="field.chooseTicket"  @change="fetchTimings($event, $event.target.selectedIndex)">>
              	<option value=""> {{ messages.SELECT_RATE }}</option>
                <option v-for="rate in attraction.rates" :value="rate.id">{{ rate.language_string.title }}</option>
              </select> 
            </div>
          </div>
        </div>
        <!--Adult/Junior-->
        <div class="row">
            <div id="att-drops" class="priceRateDisplay">
              <div v-for="(detail, index) in rateDetailsArray.details" class="col-lg-12  col-md-12 ticket-age">
                  <h4>{{ detail.language_string.title }}</h4>
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
              <input type="submit" class="form-control" v-on:click="addCart" :value=" messages.ADD_TO_CART" >
            </div>
            <div class="form-group" v-if="!formOkay">
              <input type="submit" class="form-control inactive"  v-on:click="validate" :value="messages.ADD_TO_CART" >
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--Left-->
    <div class="col-lg-8 col-lg-pull-4">

      <div class="row"  v-if="attraction.video">
        <div class="col-lg-12">
          	<!--YouTube-->
			       <div class="video">
                <iframe frameborder="0" border="0" width="750" height="422" :src="'https://www.youtube.com/embed/'+attraction.video+'?autoplay=1&amp;showinfo=0&amp;controls=0&amp;rel=0'"></iframe>
            </div>
        </div>
      </div>
       <div class="row" v-else-if="attraction.images.length>0">
        <div class="col-lg-12">
          	<div id="myCarousel" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                    <div  v-for="(image, index) in attraction.images" class="item" v-bind:class="{ 'active': index==1 }">
                      <img :src="image.img" :alt="attraction.title" class="img-responsive">
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
        <div class="row" v-else>
            <div class="col-lg-12">
                <img :src="attraction.photo" :alt="attraction.title" class="img-responsive">
            </div>
        </div>

      </div>
      <!--Details-->
      <div class="row">
        <div class="col-lg-12">
          <h3>Ticket Details</h3>
          <p>{{ rateDescription }}</p>
  	      <section v-if="attraction.language_string.availability">
  	          <hr>
  	          <h3>{{ messages.AVAILABILITY }}</h3>        
  	          <p v-html="attraction.language_string.availability"></p>
  	      </section>
          <section v-if="attraction.language_string.redemption">
          	<hr>
          	<h3>{{ messages.REDEMPTION }}</h3>        
            <span v-html="attraction.language_string.redemption"></span>
          </section>
          <section v-if="attraction.language_string.about">
            <hr>
            <h3>{{ messages.LABEL_ABOUT }}</h3>        
            <span v-html="attraction.language_string.about"></span>
          </section>
        </div>
      </div>

     <div  v-if="attraction.interested_in.length > 0">
        <hr><br><br>
     </div>

      <div id="promotions" class="container interested-in" v-if="attraction.interested_in.length > 0">

  		  <div class="row">
		    <div class="col-lg-12">
		      <h3>You might also be interested in...</h3>
		    </div>
		  </div>
        <div class="row">
				   <div v-for="interested in attraction.interested_in" class="col-lg-3 promo-single">
		          <h4>{{ interested.attraction.title }}</h4>
		          <a :href="interested.attraction.pageUrl" :title="interested.attraction.title">
		          		<img :src="interested.attraction.photo" :alt="interested.attraction.title" class="img-responsive"></a>
		          	<a class="buy" :href="interested.attraction.pageUrl">{{ messages.BTN_BUY_TICKETS }}</a>
		        </div>
        </div>
  		</div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        
          <div class="modal-body">
              
          <div class="jumbotron">
          <h1 class="display-4 text-center">Success!</h1>
          <p class="lead">
             <p class="text-center text-success">
             <span class="material-icons" style="font-size: 120px;">done</span>
            </p>
          </p>
          <hr class="my-4">
          <div class="alert alert-success text-center">
            <strong>Success!</strong> You have added item to your cart</a>.
          </div>  
          <p class="text-center">
            <a class="btn btn-secondary btn-md buy" href="/shopping-cart/basket" role="button" style="color: #fff;">{{ messages.CHECKOUT }}</a>
          </p>
           <p class="text-center">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ messages.Continue }}</button>
          </p>
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
          rateDescription: "-",
          rateHeader: this.attraction,
          isSubmit: false,
          pageUrl: MAINURL,
          rateDetailsArray: {},
          messages: this.trans.messages,
          dateMin: "",
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
      mounted() {
        // this.dateMin = "2021-05-23";
        this.dateMin = minDate;

        if (this.attraction.rates[0]) {
          this.field.chooseTicket = this.attraction.rates[0].id;  
          this.rateDescription = this.rateHeader.rates[0].language_string.description;
          this.rateDetailsArray = this.rateHeader.rates[0];
        }
        
      },
      methods: {
      	addCart: function() {
          var obj = {};
          obj = this.rateDetailsArray.details;

          axios.post('/api/cart/add/'+this.rateHeader.id+'/submit', {qty: obj, date: this.field.calendar}).then((response) => {
              if (response.data.status) {
                this.$toasts.success(response.data.message);
                $('#successModal').modal();
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
          this.rateDescription = this.rateHeader.rates[selectedIndex-1].language_string.description;
          this.rateDetailsArray = this.rateHeader.rates[selectedIndex-1];

        },
      }

    }
</script>


