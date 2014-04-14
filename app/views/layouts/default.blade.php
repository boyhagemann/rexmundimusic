<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	{{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css') }}
	{{ HTML::style('css/screen.css') }}
</head>
<body>

	<div class="container">

		<section id="section-tweets" class="col-md-8">

		</section>

		<section id="section-tweets" class="col-md-4">
			{{ $tweets }}
		</section>

		<section id="section-contact" class="col-md-8 offset-md-3">
			{{ $contact }}
		</section>

	</div>

	{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') }}
	{{ HTML::script('http://www.parsecdn.com/js/parse-1.2.16.min.js') }}
	{{ HTML::script('js/main.js') }}
</body>
</html>
