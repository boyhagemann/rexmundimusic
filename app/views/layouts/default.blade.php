<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>

</head>
<body>

	<section id="section-tweets">
		{{ $tweets }}
	</section>

	<section id="section-contact">
		{{ $contact }}
	</section>

	{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') }}
	{{ HTML::script('http://www.parsecdn.com/js/parse-1.2.16.min.js') }}
	{{ HTML::script('js/main.js') }}
</body>
</html>
