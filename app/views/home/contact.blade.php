
<article class="col-md-5 col-md-offset-6">
                 
    <h2 class="contact__title-pre i__font_main">Enquiries and bookings</h2>
    <h1 class="contact__title i__font_main">Contact</h1>
                    
	{{ Form::open(array('url' => '/', 'name' => 'contact-form', 'id' => 'contact-form', 'role' => 'form', 'class' => 'contact__form')) }}

	<div class="form-group">
		<label for="exampleInputEmail1" class="contact__label">Your name</label>
		{{ Form::text('name', '', array('class' => 'form-control  contact__name')) }}
	</div>

	<div class="form-group">
		<label for="exampleInputEmail1" class="contact__label">Email address</label>
		{{ Form::email('email', '', array('class' => 'form-control contact__email')) }}
	</div>

	<div class="form-group">
		<label for="exampleInputEmail1" class="contact__label">Your message</label>
		{{ Form::textarea('text', '', array('class' => 'form-control contact__message')) }}
	</div>

	<div class="form-group">
		{{ Form::submit('submit', array('class' => 'btn btn-default btn-lg contact__button')) }}
	</div>

	{{ Form::close() }}

	<div id="contact-response"></div>

</article>
