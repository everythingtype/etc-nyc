// ETC-NYC

(function($) {

	var toplinkVisible = false;
	var resizeTimer = null;
	var menuopen = false;
	var wasDesktop = true;
	var myScrollTop = 0;

	jQuery.fn.openLightbox = function() {

		console.log('openLightbox');

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

		$('.openmenu').hide();
		$('.closemenu').show();

		$('body').addClass('haslightbox');
		$(this).stop().slideDown("fast");

	}

	jQuery.fn.closeLightbox = function() {

		console.log('closeLightbox');

		var menuopen = false;

		if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {

			$('.scrollingcontent').css({
			    'top': "auto",
			    'position':'static'
			});

			$( "body" ).scrollTop( myScrollTop );
			myScrollTop = 0;

		}

		$('.openmenu').show();
		$('.closemenu').hide();

		$('body').removeClass('haslightbox');
		$(this).stop().slideUp("fast");
	}

	jQuery.fn.resetLightbox = function() {

		console.log('resetLightbox');

		var menuopen = false;

		if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {

			$('.scrollingcontent').css({
			    'top': "auto",
			    'position':'static'
			});

			$( "body" ).scrollTop( myScrollTop );
			myScrollTop = 0;

		}

		$('.openmenu').show();
		$('.closemenu').hide();

		$('body').removeClass('haslightbox');
		$(this).stop().hide();

	}

	function setupHeights() {

		console.log('setupHeights');

		if ($('#wpadminbar').length != 0) {

			var adminbarheight = $('#wpadminbar').outerHeight();
			$('.menutoggle').css('top', adminbarheight + 'px');
			$('.topbar').css('top', adminbarheight + 'px');
			$('.pagenav').css('top', adminbarheight + 'px');
			$('#navshade .box').css('margin-top', adminbarheight + 'px');

		}

	}

	function handleResize() {

		console.log('handleResize');

	    resizeTimer = null;

		setupHeights();
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

		console.log('setupGrid');

		$('.grid').packery({
			itemSelector: '.griditem',
			transitionDuration: "0"
		});	

	}

	function setupLayout() {

		console.log('setupLayout');

		resetNav();
		handleResize();

		$('body').addClass('js');

		$('#loading').html('<span>Loading...</span>');

		$(".toplink").hide();

	}

	$(document).ready( function() {

		setupLayout();

		$('.griditem').on("hover", function () {
			$(this).find('.meta').slideToggle(100);
		});

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