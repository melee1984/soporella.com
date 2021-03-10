@extends('front.template.inside')

@section('content')
	
<div id="page" class="container attraction">
  <!--Title-->
  <div class="row">
    <div class="col-lg-12">
      <h1>{{ $attraction->title }}</h1>
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
                <input class="calendario form-control hasDatepicker" name="departure" placeholder="mm/dd/yyyy" id="departure">
                <div class="action_error_calendario hide">Please select date</div>
                <script>
                    var plusCalendarDay = 2;
                    var dateY = 2020;
                    var dateM = 12;
                    var dateD = 34;
                </script>
              </div>
            </div>
          </div>
                <!--Choose Ticket Type-->
        <div class="row">
          <div class="col-lg-12 ticket-type">
            <h4>Choose Ticket Type</h4>
            <div class="form-group">
            <select name="optGenerateSelection" id="optGenerateSelection" class="form-control"><option>Select</option><option value="378">At the Top (Level 125 + 124)</option><option value="379">At the Top Sky (Level 148 + 125 + 124) </option></select>
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
              <input type="submit" class="form-control" value="Add to Cart">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--Left-->
    <div class="col-lg-8 col-lg-pull-4">
      <div class="row">
        <div class="col-lg-12">
          <!--YouTube-->
			<div class="video">
              <iframe frameborder="0" border="0" width="750" height="422" src="https://www.youtube.com/embed/oAZsg0iqMv0?autoplay=1&amp;showinfo=0&amp;controls=0&amp;rel=0"></iframe>
            </div>
           </div>
      </div>
      <!--Details-->
      <div class="row">
        <div class="col-lg-12">
          <h3>Ticket Details</h3>
          <div id="displayRateDescription">
          	
          </div>   
          <hr>
          <h3>Availability</h3>
	       <p>We require advance bookings due to the high volume of visitors.&nbsp;Tickets will only be booked upon receiving a confirmation email from Soporella.</p>

          <hr>
          <h3>Redemption</h3>        
                        <p>Entry passes, incl. all other bookings will be confirmed electronically after you completed the purchase process. The relevant entry pass will be sent to you electronically after the purchase process is completed. It is therefore imperative that your e-mail address is correctly inserted.</p>
<p>Should a destination allow only confirmations but not an actual entry pass(es), you will receive such confirmation electronically. This electronic confirmation has to be converted on the day of your visit to an entry pass at the allocated area at the destination itself.&nbsp;</p>
                        <hr>
          <h3>About At the Top &amp; Sky at Burj Khalifa</h3>
            <p>Burj Khalifa is the building that everyone talks about and is a true icon representing the growth of Dubai. "At the Top &amp; Sky" are observation decks of the world’s tallest building and from there, you will experience first-hand this modern architectural and engineering marvel and know at last what it is like to see the world from such a lofty height.</p>
<p>Begin your vertical ascent to the observation deck in a high-speed elevator, travelling up to 10 meters per second. As the doors open, floor-to-ceiling glass walls provide a breath-taking unobstructed 360-degree view of the city, desert and ocean. By night, sparkling lights and stars compete for your attention as the sky and city blend into one.</p>
<p>Special telescopes provide virtual time-travel visions of the scenes beyond and below. You’ll see close-up real-time views as well as the past and the future, by day and by night. You can also walk the entire perimeter for more complete views. If you wish, adventure outside onto the open-air terrace to enjoy another perspective of the expansive views below.</p>   
          <hr>    

          <h3 style="display: none;">Disclaimer</h3> 
          <p style="display: none;">
            <a class="img-pdf" href="https://soporella.com/assets/images/company/disclaimer"><img src="https://image.flaticon.com/icons/svg/303/303902.svg" width="58px" alt="Dislaimer">
            </a>
          </p>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection

