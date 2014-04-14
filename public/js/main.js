$(document).ready(function() {

	Parse.initialize("g6fXsgx67rCJpOwrxwWJMcvvmrbtEwcP2yfmt2yz", "MBNp62MlNiHLDZ0ORVhJUnCFUvcCeUmq0td2X9tS");

	$("#contact-form").on("submit", function(e) {

		e.preventDefault();

		var data = {
			name	: $(this).find('input[name="name"]').val(),
			email	: $(this).find('input[name="email"]').val(),
			message	: $(this).find('textarea[name="message"]').val()
		}

		Parse.Cloud.run("sendEmail", data, {
			success: function(object) {
				$('#contact-response').html('Email sent!').addClass('success').fadeIn('fast');
			},

			error: function(object, error) {
				console.log(error);
				$('#contact-response').html('Error! Email not sent!').addClass('error').fadeIn('fast');
			}
		});

	});

});