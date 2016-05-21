(function($) {

	jQuery.fn.openSplash = function() {

		if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {
			myScrollTop = $('body').scrollTop();

			var wpadminbar = 0; 
			if ($('#wpadminbar').length != 0) {
				wpadminbar = $('#wpadminbar').outerHeight();
			}

			thisOffset = myScrollTop - wpadminbar;
			offsetString = "-" + thisOffset + "px";

			$('.scrollingcontent').css({
			    'top': offsetString,
			    'position':'fixed'
			});

		}

		$('body').addClass('haslightbox');
		$(this).show();
	}

	jQuery.fn.closeSplash = function() {

		if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {

			$('.scrollingcontent').css({
			    'top': "auto",
			    'position':'static'
			});

			$( "body" ).scrollTop( myScrollTop );
			myScrollTop = 0;

		}

		$('body').removeClass('haslightbox');
		$(this).stop().slideUp("fast");
	}


	function switchType() {

		var thespan = $('#types');

		if ( thespan.hasClass('alltypes-01') ) {
			thespan.removeClass('alltypes-01').addClass('alltypes-02');
		} else if ( thespan.hasClass('alltypes-02') ) {
			thespan.removeClass('alltypes-02').addClass('alltypes-03');
		} else if ( thespan.hasClass('alltypes-03') ) {
			thespan.removeClass('alltypes-03').addClass('alltypes-04');
		} else if ( thespan.hasClass('alltypes-04') ) {
			thespan.removeClass('alltypes-04').addClass('alltypes-05');
		} else if ( thespan.hasClass('alltypes-05') ) {
			thespan.removeClass('alltypes-05').addClass('alltypes-06');
		} else if ( thespan.hasClass('alltypes-06') ) {
			thespan.removeClass('alltypes-06').addClass('alltypes-07');
		} else if ( thespan.hasClass('alltypes-07') ) {
			thespan.removeClass('alltypes-07').addClass('alltypes-08');
		} else if ( thespan.hasClass('alltypes-08') ) {
			thespan.removeClass('alltypes-08').addClass('alltypes-09');
		} else if ( thespan.hasClass('alltypes-09') ) {
			thespan.removeClass('alltypes-09').addClass('alltypes-10');
		} else if ( thespan.hasClass('alltypes-10') ) {
			thespan.removeClass('alltypes-10').addClass('alltypes-11');
		} else if ( thespan.hasClass('alltypes-11') ) {
			thespan.removeClass('alltypes-11').addClass('alltypes-12');
		} else if ( thespan.hasClass('alltypes-12') ) {
			thespan.removeClass('alltypes-12').addClass('alltypes-13');
		} else if ( thespan.hasClass('alltypes-13') ) {
			thespan.removeClass('alltypes-13').addClass('alltypes-14');
		} else if ( thespan.hasClass('alltypes-14') ) {
			thespan.removeClass('alltypes-14').addClass('alltypes-15');
		} else if ( thespan.hasClass('alltypes-15') ) {
			thespan.removeClass('alltypes-15').addClass('alltypes-16');
		} else if ( thespan.hasClass('alltypes-16') ) {
			thespan.removeClass('alltypes-16').addClass('alltypes-17');
		} else if ( thespan.hasClass('alltypes-17') ) {
			thespan.removeClass('alltypes-17').addClass('alltypes-18');
		} else if ( thespan.hasClass('alltypes-18') ) {
			thespan.removeClass('alltypes-18').addClass('alltypes-01');
		}	
	}

	$(document).ready( function() {

		var pagetitleTop = 0;

		if ($('#wpadminbar').length != 0) {
			var adminbarheight = $('#wpadminbar').outerHeight();
			$('.box').css('margin-top', adminbarheight + 'px');
		}

		$('.closelightbox').on("click", function(event) {
			$('#introshade').closeSplash();
			window.history.replaceState("", "Everything", "/everything");
		});

		$('#introshade').openSplash();

	});

	$(window).load( function() {
		var tid = setInterval(switchType, 500);
	});

})(jQuery);