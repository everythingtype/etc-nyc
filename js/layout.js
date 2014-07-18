(function($) {

	function setupGrid() {
		$('.grid').packery({
			itemSelector: '.griditem',
			transitionDuration: "0"
		});	

	}


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
		setupGrid();

		$('.griditem').on("hover", function () {
			$(this).find('.meta').slideToggle(100);
		});



	});


	$(window).load( function() {
		$('#loading').hide();
		setupGrid();
	});

	$(window).resize( function() {
		setupGrid();
	});

})(jQuery);