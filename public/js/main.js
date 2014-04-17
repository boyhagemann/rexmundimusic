$(document).ready(function() {

	fixVisualHeight();
	initMail();

	$('#section-visual').parallax("50%", 0.2);
	$('#section-contact').parallax("100%", 0.4);

});

$(window).bind('resize', function() {
	fixVisualHeight();
});


var initMail = function() {

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

}



var visual = $('#section-visual');
var navbar = $('#navbar');

var fixVisualHeight = function() {

	var visualHeight = Math.min( $(window).height() - navbar.height(), 800 );
	visual.height(visualHeight);

};





function parallax(scrollTop) {

	for (var id in parallaxElements) {

		// distance of element from top of viewport
		var viewportOffsetTop = parallaxElements[id].initialOffsetY - scrollTop;

		// distance of element from bottom of viewport
		var viewportOffsetBottom = windowHeight - viewportOffsetTop;

		if ((viewportOffsetBottom >= parallaxElements[id].start) && (viewportOffsetBottom <= parallaxElements[id].stop)) {
			// element is now active, fix the position so when we scroll it stays fixed

			var speedMultiplier = parallaxElements[id].speed || 1;
			var pos = (windowHeight - parallaxElements[id].start);

			$(parallaxElements[id].elm)
				.css({
					position: 'fixed',
					top: pos+'px',
					left: '50%',
					marginLeft: -(parallaxElements[id].width/2) +'px'
				});

		} else if (viewportOffsetBottom > parallaxElements[id].stop) {
			// scrolled past the stop value, make position relative again

			$(parallaxElements[id].elm)
				.css({
					position: 'relative',
					top: (parallaxElements[id].stop-parallaxElements[id].start)+'px',
					left: 'auto',
					marginLeft: 'auto'
				});

		} else if (viewportOffsetBottom < parallaxElements[id].start) {
			// scrolled up back past the start value, reset position

			$(parallaxElements[id].elm)
				.css({
					position: 'relative',
					top: 0,
					left: 'auto',
					marginLeft: 'auto'
				});

		}
	}
}