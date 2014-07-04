(function($) {

	function setupLayout() {

		$('body').addClass('js');

		$('#loading').html('<span>Loading...</span>');

		var pagetitleTop = 0;

		if ($('#wpadminbar').length != 0) {
			var adminbarheight = $('#wpadminbar').outerHeight();
			$('.header').css('top', adminbarheight + 'px');
			pagetitleTop += adminbarheight;
		}

		var headerPadding = $('.header .padding').outerHeight();

	}

	$(document).ready( function() {
		setupLayout();

	});

	$(window).load( function() {
		$('#loading').hide();
	});

})(jQuery);