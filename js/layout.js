(function($) {

	var toplinkVisible = false;

	function showToplink() {
		if ( toplinkVisible == false ) {
			toplinkVisible = true;
			$(".toplink").stop().fadeIn("fast");
		}
	}

	function hideToplink() {
		if ( toplinkVisible == true ) {
			toplinkVisible = false;
			$(".toplink").stop().fadeOut("fast");
		}
	}

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
			$('.topbar').css('top', adminbarheight + 'px');
			$('.pagenav').css('top', adminbarheight + 'px');

			pagetitleTop += adminbarheight;
		}

		var headerPadding = $('.header .padding').outerHeight();

	}


	function closeSearch(first) {

		$( ".searchbox" ).slideToggle( "fast", function() {
			$('.searchtoggle').removeClass('active');
		  });

	}

	function openSearch() {

		$( ".searchbox" ).slideToggle( "fast", function() {
		    // Animation complete.
		  });

		$('.searchtoggle').addClass('active');

	}


	$(document).ready( function() {
		setupLayout();
		setupGrid();

		$('.griditem').on("hover", function () {
			$(this).find('.meta').slideToggle(100);
		});

		// Prevent search submission of default value
		$('#searchform').submit(function(e){
		    if ( $("#search_input").val() == "Search here...") {
				return false;
		    }
		});


		$('li.searchtoggle a').on('click', function( event ){
			event.preventDefault();
			if ( $(this).parent().hasClass('active') ) {
				closeSearch();
			} else {
				openSearch();
			}
		});

		$('.closesearch').on('click', function( event ) {
			event.preventDefault();
			closeSearch();
		});

		$(".toplink").hide();

		$('.toplink').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 200);
			return false;
		});



	});


	$(window).load( function() {
		$('#loading').hide();
		setupGrid();
	});

	$(window).resize( function() {
		setupGrid();
	});


	$(window).scroll(function() {
		var viewportHeight = $(window).height();
		var scrolltop = $(window).scrollTop();

		if ( scrolltop > viewportHeight * 0.5 ) {
			showToplink();
		} else {
			hideToplink();
		}
	});


})(jQuery);