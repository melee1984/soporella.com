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
                <input type="date" class="calendario form-control hasDatepicker" name="departure" placeholder="mm/dd/yyyy" id="departure">
                <div class="action_error_calendario hide">Please select date</div>
              </div>
            </div>
         </div>
                <!--Choose Ticket Type-->
        <div class="row">
          <div class="col-lg-12 ticket-type">
            <h4>Choose Ticket Type</h4>
            <div class="form-group">
            <!-- <select class="form-control">
            	<option value="0">Select</option>
            </select> -->
            displaying attraction variant here 
            </div>
          </div>
        </div>
        <!--Adult/Junior-->
        <div class="row">
            <div id="att-drops" class="priceRateDisplay"></div>
        </div>
        <div class="row">
           <div class="priceRateDisplay" id="subLevel"></div>
        </div>
        <!--Submit-->
        <div class="row">
          <div class="col-lg-6"></div>
          <div class="col-lg-6 ticket-submit">
            <div class="form-group">
              <input type="submit" class="form-control disabled" v-on:click="addCart" value="Add to Cart">
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
				<div class="col-lg-3 promo-single">
		          <h4> Yas Waterworld</h4>
		          <a href="https://soporella.com/others/yas-waterworld" title="Yas Waterworld">
		          		<img src="https://soporella.com/assets/images/activity/thumbnail/yas-waterworld-05.jpg" alt="Yas Waterworld" class="img-responsive"></a>
		          	<a class="buy" href="https://soporella.com/others/yas-waterworld">Buy Tickets</a>
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
           isSubmit: false,
           pageUrl: MAINURL,
        }
      },
      props: ['attraction'],
      mounted() {
        
      },
      created() {
       
      },
      methods: {
      	addCart: function() {

      		 this.$toasts.error("Adding cart isn't available yet");

      	}

      }

    }
</script>


