<script src="{{ asset('theme/js/bootstrap.js') }}"></script>
<script src="{{ asset('theme/js/classie.js') }}"></script>

<script src="/js/lang.js"></script>


<script type="text/javascript">
	var page_url = '{{ Request::path() }}';
	var isLogged = '{{ Auth::check() }}';
	var MAINURL = '{{ URL::to('/') }}';

	@if (Auth::check()) 
		var api_token = '{{ Auth::User()->api_token }}';	
	@else 
		var api_token = '';
	@endif


</script>

