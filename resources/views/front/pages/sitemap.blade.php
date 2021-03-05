@extends('front.template.inside')

@section('content')
	
<div class="container" id="page">
	
	<div class="col-lg-12">

      <h1>Sitemap</h1>
      <table width="100%">
	      	<tbody><tr>
	      		<td>
	      			<ul>
				     	<li><a href="http://www.soporella.com/">Home</a></li>
				      	<li><a href="{{ URL::to('themeparks') }}">Themeparks</a></li>
				      	<li><a href="{{ URL::to('waterparks') }}">Waterparks</a></li>
				      	<li><a href="{{ URL::to('sightseeing') }}">Sightseeing</a></li>
				      	<li><a href="{{ URL::to('family') }}">Family</a></li>
				      	<li><a href="{{ URL::to('adventure') }}">Adventure</a></li>
				      	<li><a href="{{ URL::to('sports') }}">Sports</a></li>
				      	<li><a href="{{ URL::to('culture') }}">Culture</a></li>
				      	<li><a href="{{ URL::to('promotions') }}">Promotions</a></li>
				    </ul>
	      		</td>
	      		<td>
	      			<ul>
	      				<li><a href="{{ URL::to('about-us') }}">About Us</a></li>
	      				<li><a href="{{ URL::to('sell-tickets-with-us') }}">Sell Tickets With Us</a></li>
	      				<li><a href="{{ URL::to('disclaimer') }}">Disclaimer</a></li>
	      				<li><a href="{{ URL::to('terms-and-condition') }}">Terms &amp; Conditions</a></li>
	      				<li><a href="{{ URL::to('privacy-policy') }}">Privacy Policy</a></li>
	      				<li><a href="{{ URL::to('shipping-and-return-policy') }}">Shipping &amp; Return Policy</a></li>
	      				<li><a href="{{ URL::to('sitemap') }}">About Us</a></li>
	      				<li><a href="{{ URL::to('contact-us') }}">Contact Us</a></li>
	      			</ul>
	      		</td>
	      		<td>
	      			<ul>
	      				<li><a href="{{ URL::to('login') }}">Login</a></li>
	      				<li><a href="{{ URL::to('register') }}">Register</a></li>
	      			</ul>
	      		</td>
	      	</tr>
	      </tbody>
	  </table>
      
    </div>

</div>

@endsection
