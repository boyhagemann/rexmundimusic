
{{ Form::open(array('url' => '/', 'name' => 'contact-form', 'id' => 'contact-form')) }}

{{ Form::text('name') }}
{{ Form::email('email') }}
{{ Form::textarea('text') }}
{{ Form::submit() }}

{{ Form::close() }}

<div id="contact-response"></div>