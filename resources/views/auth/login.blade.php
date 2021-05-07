@extends('front.template.inside')

@section('content')

<div id="page" class="container">
  <div class="row">
    <div class="col-lg-3"></div>
    <div id="login" class="col-lg-6">
      <h1>{{ trans('messages.LOGIN_POPUP_LABEL_LOGIN') }}</h1>

      <form method="POST" action="{{ route('login') }}" accept-charset="UTF-8">
        @csrf

        <div class="form-group">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ trans('messages.USERNAME') }}">

            @error('email')
                <span class="invalid-feedback text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        <div class="form-group">
           <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ trans('messages.PASSWORD') }}">

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

      <p>{{ trans('messages.NOT_REGISTERED') }} <a href="register">{{ trans('messages.CLICK_HERE')  }}</a>.</p>
      <p>{{ trans('messages.FORGOT_PASSWORD') }} <a href="{{ route('password.request') }}">{{ trans('messages.CLICK_HERE')  }}</a>.</p>
    </div>
    <div class="col-lg-3"></div>
  </div>
</div>

@endsection
