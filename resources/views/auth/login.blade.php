@extends('front.template.inside')

@section('content')

<div id="page" class="container">
  <div class="row">
    <div class="col-lg-3"></div>
    <div id="login" class="col-lg-6">
      <h1>Login</h1>

      <form method="POST" action="{{ route('login') }}" accept-charset="UTF-8">
        @csrf

        <div class="form-group">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Username/Email Address">

            @error('email')
                <span class="invalid-feedback text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        <div class="form-group">
           <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

            @error('password')
                <span class="invalid-feedback text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        <div class="form-group">
                      <input type="hidden" name="redirectedUrl" value="">
          <input type="submit" class="form-control" value="Submit">
        </div>
      </form>

      <p>Not yet registered? <a href="register">Click Here</a>.</p>
      <p>Forgot password? <a href="{{ route('password.request') }}">Click Here</a>.</p>
    </div>
    <div class="col-lg-3"></div>
  </div>
</div>

@endsection
