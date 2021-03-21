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
              <input type="submit" class="form-control disabled" value="Add to Cart">
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
              <iframe frameborder="0" border="0" width="750" height="422" src="https://www.youtube.com/embed/XuMpPaft_WI?autoplay=1&amp;showinfo=0&amp;controls=0&amp;rel=0"></iframe>
            </div>
        </div>
      </div>
      <!--Details-->
      <div class="row">
        <div class="col-lg-12">
          <h3>Ticket Details</h3>
          <p>Ticket Information Here</p>
	      <section v-if="!attraction.availability">
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
    </div>
  </div>
</div>

</template>

<script>
    export default {
      data() {
        return {
           isSubmit: fals
        }
      },
      props: ['attraction'],
      mounted() {
        
      },
      created() {
       
      },
      methods: {

      }

    }
</script>


