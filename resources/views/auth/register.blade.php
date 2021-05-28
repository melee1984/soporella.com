@extends('front.template.inside')

@section('content')

<div id="page" class="container">
    <div class="row">
        <!-- <div class="col-lg-7">
            <div class="video">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/GFPrQ6tRmvM?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        </div> -->
        <div class="col-lg-3"></div>
        <div id="login" class="col-lg-6">
            <h1>{{ trans('messages.REGISTER_POPUP_LABEL_REGISTER') }}</h1> <div class="errorWithLogin hide  popup_message_error"></div>            
            <p>{{ trans('messages.REGISTER_POPUP_TEXT') }}</p>

            @include('front.includes.error')

            <form action="{{ route('register') }}" method="post" accept-charset="UTF-8" id="formPopupRegistration">

            @csrf
        
           <div class="form-group">
                <input type="text" name="name" placeholder="{{ trans('messages.LABEL_FULLNAME') }}" class="form-control" class="@error('name') is-invalid @enderror" value="{{ old('name') }}"> 
            </div>

            <div class="form-group">
                <input type="email" name="email" id="email" placeholder="{{ trans('messages.LABEL_EMAIL_ADRESS') }}" class="form-control" class="@error('email') is-invalid @enderror" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-3">
                        <input type="tel" name="areacode" placeholder="+971" class="form-control"  class="@error('areacode') is-invalid @enderror" value="{{ old('areacode') }}">
                    </div>
                    <div class="col-lg-9 padding-l0">
                        <input type="tel" name="mobile" placeholder="{{ trans('messages.CART_CUSTOMER_MOBILE') }}" class="form-control"  class="@error('mobile') is-invalid @enderror" value="{{ old('mobile') }}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="{{ trans('messages.PASSWORD') }}" class="form-control"  class="@error('password') is-invalid @enderror" value="{{ old('password') }}" >
            </div>


            <div class="form-group">
                <input type="submit" value="{{ trans('messages.BTN_SUBMIT') }}" class="form-control">
            </div>
            </form>

            <p>{{ trans('messages.ALREADY_REGISTERED') }} <a href="{{ route('login') }}">{{ trans('messages.CLICK_HERE') }}</a></p>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>

@endsection
