

<div class="row">

	{{ Form::open(array('url' => '/', 'name' => 'contact-form', 'id' => 'contact-form', 'role' => 'form')) }}

	<div class="form-group">
		<label for="exampleInputEmail1">Your name</label>
		{{ Form::text('name', '', array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		<label for="exampleInputEmail1">Email address</label>
		{{ Form::email('email', '', array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		<label for="exampleInputEmail1">Your message</label>
		{{ Form::textarea('text', '', array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::submit('submit', array('class' => 'btn btn-default btn-lg')) }}
	</div>

	{{ Form::close() }}

	<div id="contact-response"></div>

</div>
