
@foreach($mentions as $tweet)
<article>

	<time>{{{ Twitter::ago($tweet->created_at) }}}</time>
	<img src="{{{ $tweet->user->profile_image_url }}}">
	<h2>{{{ $tweet->user->name }}}</h2>
	<p>{{ Twitter::linkify($tweet->text) }}</p>

</article>
@endforeach
