<!DOCTYPE html>

<html lang="en">
<head>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="google-site-verification" content="-1XKYdt9_gUnrr5TaFPPiwVqFI3eoSkxaiAbiqwLiTo" />

		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon.ico">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-180.png" />
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-152.png" />
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-120.png" />
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-76.png" />
		<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-60.png" />
		<meta name="application-name" content="<?php bloginfo( 'name' ); ?>"/>
		<meta name="msapplication-TileColor" content="#000000"/>
		<meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-144.png"/>

		<script type="text/javascript">

			  var _gaq = _gaq || [];
			  _gaq.push(['_setAccount', 'UA-19832694-1']);
			  _gaq.push(['_trackPageview']);

			  (function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			  })();

		</script>

		<?php wp_head(); ?>

</head>
<body>

<div class="topbar">

	<div class="headeranchor">
		<div class="header">

			<div class="logo">
				<h1><a href="/everything">
					<span class="e">E<span>verything</span></span>
					<span class="t">T<span>ype</span></span>
					<span class="c">C<span>ompany</span></span>
				</a></h1>
			</div>

			<?php get_template_part('parts/navigation'); ?>

		</div>
	</div>

</div>

<div class="scrollingcontent">

<div class="layout">

	<div class="maincolumn">
