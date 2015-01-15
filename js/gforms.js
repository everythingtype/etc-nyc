(function($) {

	$(document).bind('gform_post_render', function(){

		$('#input_1_1').attr('placeholder','Enter your name');
		$('#input_1_2').attr('placeholder','Enter your email');
		$('#input_1_3').attr('placeholder','Enter your message');

	});

})(jQuery);
