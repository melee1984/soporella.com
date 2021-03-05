@extends('front.template.inside')

@section('content')
	
<div class="container" id="page">
	
	<div class="row">
    <div id="login" class="col-lg-5">
      <h1>Contact Us</h1>
      <p>If you woultd like to know more about Soporella.com, please send us a message and we will get back to you shortly.</p>

    

    


       <form method="POST" action="https://soporella.com/contact-us/submit" accept-charset="UTF-8"><input name="_token" type="hidden" value="TlA6tuZ3KRbUF4x4GnDlHeLDa2EhIBmt6XHphtiy">
       <div class="form-group">
        <input type="text" name="name" class="form-control" placeholder="Name" required="">
      </div>
       <div class="form-group">
        <input type="email" name="email" class="form-control" placeholder="Email Address" required="">
      </div>

      <div class="form-group">
          <div class="row">
            <div class="col-lg-3"><input type="tel" class="form-control" placeholder="+971"></div>
            <div class="col-lg-9 padding-l0"><input type="tel" class="form-control" placeholder="Mobile Number" name="mobile"></div>
          </div>
        </div>


       <div class="form-group">
        <textarea placeholder="Message" class="form-control" name="txtMessage" required=""></textarea>
      </div>
       <div class="form-group">
        <input type="submit" value="Submit" class="form-control">
      </div>
     </form>
      <br><br>
      <p>Soporella is part of Creativo DMCC<br>
      Office 1508, Platinum Tower, Jumeirah Lake Towers, Cluster I,<br> Dubai, UAE<br>
      Tel +971 4 568 4882, info@soporella.com</p>
    </div>

     <div class="col-lg-7">
      <div class="video">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/I4HdO0sJEAw?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
      </div>
    </div>
    


  </div>
  

</div>

@endsection
