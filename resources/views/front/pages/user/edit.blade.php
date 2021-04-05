<div id="page" class="container">
  <!--Title-->
  <div class="row">
    <div class="col-lg-12">
      <h1>Edit Personal Information</h1>
    </div>
  </div>
  <!--Content-->
  <div class="row">
    <div id="login" class="col-lg-8">
      <div class="errorWithLogin hide  popup_message_error"></div>      

      <form method="POST" action="https://soporella.com/my-account/settings/info/submit" accept-charset="UTF-8" id="updatePerfornationInformation"><input name="_token" type="hidden" value="e3ICMGdVl3g37ZjbsWh41rrhfhGItW25hGc8jRRR">
      <div class="form-group">
        <input class="form-control" type="text" name="name" placeholder="Fullname" value="Larry Parba">
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-lg-6 padding-r0">
            <select class="form-control" name="gender">
              <option value="" disabled="" selected="">Gender</option>
              <option selected="" value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>
          <div class="col-lg-6">
            <input id="birthdate" name="birthdate" class="calendario form-control hasDatepicker" placeholder="Birthdate" value="01/11/1984">
          </div>
        </div>
      </div>
      <div class="form-group">
        <input class="form-control" type="submit" value="Save">
      </div>
      </form>
    </div>
    <div class="col-lg-4">
      <div id="page_sidebar" class="m_down">
  <h3>Links</h3>
  <ul>
	<li><a href="{{ route('profile.tickets') }}">My Tickets</a></li>
    <li><a href="{{ route('logout') }}">Logout</a></li>
  </ul>
</div>
    </div>
  </div>
</div>