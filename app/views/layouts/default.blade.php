<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	{{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css') }}
    {{ HTML::style('http://fonts.googleapis.com/css?family=Noto+Sans') }}
	{{ HTML::style('css/fonts.css') }}
	{{ HTML::style('css/screen.css') }}
</head>
<body data-spy="scroll" data-target="#navbar" data-offset="-100">

    @include('navbar')

	<div id="content">

		<section id="section-visual" class="hero-unit">

			<article id="latest">

			</article>

		</section>

		<div class="container">

			<section id="section-bio" class="row">
				<h1>Bio</h1>
			</section>

			<section id="section-listen" class="row">
				<h1>Soundcloud</h1>
			</section>

			<section id="section-buy" class="row">
				<h1>Beatport</h1>
			</section>

			<section id="section-connect" class="row">

				<section id="section-media" class="col-md-8">
					<h1>Media</h1>
				</section>

				<section id="section-tweets" class="col-md-4">
					<h1>Tweets</h1>
					{{ $tweets }}
				</section>

			</section>

		</div>

		<section id="section-contact" class="contact">

			<div class="container">

				<div class="row">

					{{ $contact }}

				</div>

			</div>

		</section>

	</div>


	{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') }}
	{{ HTML::script('//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js') }}
	{{ HTML::script('http://www.parsecdn.com/js/parse-1.2.16.min.js') }}
	{{ HTML::script('js/jquery.localscroll-1.2.7-min.js') }}
	{{ HTML::script('js/jquery.scrollTo-1.4.2-min.js') }}
	{{ HTML::script('js/jquery.parallax-1.1.3.js') }}
	{{ HTML::script('js/main.js') }}
</body>
</html>
