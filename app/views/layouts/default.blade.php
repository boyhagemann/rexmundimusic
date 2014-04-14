<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	{{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css') }}
    {{ HTML::style('http://fonts.googleapis.com/css?family=Noto+Sans') }}
	{{ HTML::style('http://rexmundimusic.comrexmundimusic.s3-website-us-east-1.amazonaws.com/css/fonts.css') }}
	{{ HTML::style('http://rexmundimusic.comrexmundimusic.s3-website-us-east-1.amazonaws.com/css/screen.css') }}
</head>
<body>

    @include('navbar');
    
    <section class="hero-unit">

        <article id="latest">

        </article>

    </section>
    
	<div class="container">

		<section id="section-tweets" class="col-md-8">

		</section>

		<section id="section-tweets" class="col-md-4">
			{{ $tweets }}
		</section>

	</div>

    <section id="section-contact" class="contact">

        <div class="container">

            <div class="row">    

                {{ $contact }}

            </div>

        </div>

    </section>

	{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') }}
	{{ HTML::script('http://www.parsecdn.com/js/parse-1.2.16.min.js') }}
	{{ HTML::script('js/main.js') }}
</body>
</html>
