<!doctype HTML>
<html>
<head>
	<title>Document</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	 <link rel="stylesheet" href="{{ elixir('css/all.css') }}">
</head>
<body>

	<div class="container">
		@include('partials.flash')


		@yield('content')

	</div>
	
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<script>
		$('div.alert').not('.alert-important').delay(3000).slideUp(300);

	</script>

	@yield('footer')
</body>
</html>