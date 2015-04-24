(function($) {

	$(document).ready( function() {

		var pagetitleTop = 0;

		if ($('#wpadminbar').length != 0) {
			var adminbarheight = $('#wpadminbar').outerHeight();
			$('.box').css('margin-top', adminbarheight + 'px');
		}

		$('.closelightbox').on("click", function(event) {
			$('#introshade').slideUp("fast");
		});

	});

})(jQuery);