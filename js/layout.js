// ETC-NYC

(function($) {

	var toplinkVisible = false;
	var resizeTimer = null;
	var menuopen = false;
	var wasDesktop = true;

	jQuery.fn.openLightbox = function() {

		menuopen = true;

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
		$(this).stop().slideDown("fast");
	}

	jQuery.fn.closeLightbox = function() {

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

	jQuery.fn.resetLightbox = function() {

		if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {

			$('.scrollingcontent').css({
			    'top': "auto",
			    'position':'static'
			});

			$( "body" ).scrollTop( myScrollTop );
			myScrollTop = 0;

		}

		$('body').removeClass('haslightbox');
		$(this).stop().hide();
	}

	function handleResize() {

	    resizeTimer = null;

		setupGrid();

		if ( wasDesktop == true ) {

			menuopen = false;

			if ( isMobile() ) {

				wasDesktop = false;


			} else {


			}

		} else {
			if( !isMobile() ) {

				wasDesktop = true;
				resetNav();

			}
		}


	}


	function isMobile() {
		if ( $(".responsivecue").css("float") == "right" ) { 
			return false;
		} else {
			return true;
		}
	}

	function openNav() {
		$("#navshade").openLightbox();
	}

	function closeNav() {
		$("#navshade").closeLightbox();
	}

	function resetNav() {
		$("#navshade").resetLightbox();
	}


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

		resetNav();

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
		handleResize();

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

		$('.openmenu').on("click", function(event) {
			event.preventDefault();
			openNav();
		});

		$('.closemenu').on("click", function(event) {
			event.preventDefault();
			closeNav();
		});

	});


	$(window).load( function() {
		$('#loading').hide();
		handleResize();
	});

	$(window).resize(function(){
		// Resize actions are in handleResize()
	    if (resizeTimer) {
	        clearTimeout(resizeTimer);   // clear any previous pending timer
	    }
	    resizeTimer = setTimeout(handleResize, 25);   // set new timer

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