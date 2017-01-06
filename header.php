<!DOCTYPE html>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="google-site-verification" content="-1XKYdt9_gUnrr5TaFPPiwVqFI3eoSkxaiAbiqwLiTo" />

	<title><?php 
		wp_title( '&mdash;', true, 'right' );
		bloginfo( 'name' ); 

		if ( $paged >= 2 || $page >= 2 )
			echo ' &mdash; ' . sprintf( __( 'Page %s' ), max( $paged, $page ) );
		?></title>

		<?php get_template_part('parts/ascii'); ?>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="Designed by Everything Type Company, http://www.etc-nyc.com/ | Developed by Spellerberg Associates, http://www.spellerbergassociates.com/" />

		<!-- Fav Icons: Browser, iOS, Windows 8 -->
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon.ico">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-180.png" />
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-152.png" />
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-120.png" />
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-76.png" />
		<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-60.png" />
		<meta name="application-name" content="<?php bloginfo( 'name' ); ?>"/> 
		<meta name="msapplication-TileColor" content="#000000"/> 
		<meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-144.png"/>

		<?php wp_head(); ?>

</head>
<body <?php if ( is_search() ) echo 'class="black"'; ?>>

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
