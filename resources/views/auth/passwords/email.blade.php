
@extends('front.template.inside')

@section('content')

<div class="container" id="page">
    <div class="row justify-content-center">
        <div class="col-md-3"></div>
        <div class="col-md-6" id="login">
            <div class="card">
                <div class="card-header m-b-40"><h2>{{ __('Reset Password') }}</h2></div>
                <div class="card-body m-b-50">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf   
                        <div class="form-group row">
                            <label for="email" class="col-md-12 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-12   ">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('Enter email address') }}">

                                @error('email')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                                <input type="submit" value="Submit" class="form-control btn-block">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
@endsection
