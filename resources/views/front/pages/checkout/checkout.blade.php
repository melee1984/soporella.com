@extends('front.template.inside')

@section('content')

<div id="page" class="container">

	<div class="row">
		<div class="col-lg-12">
			<h1>{{ __('Checkout') }}</h1>
		</div>
	</div>

	<checkout-page></checkout-page>

</div>

@endsection
