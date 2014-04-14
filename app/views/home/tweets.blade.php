
@foreach($mentions as $tweet)
<article class="row tweet">

	<div class="col-sm-2 tweet__profile">
		<img src="{{{ $tweet->user->profile_image_url }}}" class="tweet__image">
	</div>
	<div class="col-sm-10 tweet__content">
		<h2 class="tweet__name">{{{ $tweet->user->name }}}</h2>
		<time class="tweet__ago">{{{ Twitter::ago($tweet->created_at) }}}</time>
		<p class="tweet__message">{{ Twitter::linkify($tweet->text) }}</p>
	</div>

</article>
@endforeach
