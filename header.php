<!DOCTYPE html>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php 
		wp_title( '&mdash;', true, 'right' );
		bloginfo( 'name' ); 

		if ( $paged >= 2 || $page >= 2 )
			echo ' &mdash; ' . sprintf( __( 'Page %s' ), max( $paged, $page ) );
		?></title>

		<?php get_template_part('parts/ascii'); ?>

		<meta name="author" content="Designed by Everything Type Company, http://www.etc-nyc.com/ | Developed by Marty Spellerberg, http://www.martyspellerberg.com/" />
	
		<!-- Fav Icons: Browser, iOS, Windows 8 -->
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon.ico">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-114.png" />
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-72.png" />
		<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-57.png" />
		<meta name="application-name" content="<?php bloginfo( 'name' ); ?>"/> 
		<meta name="msapplication-TileColor" content="#000000"/> 
		<meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-144.png"/>

		<?php wp_head(); ?>

</head>
<body <?php if ( is_search() ) echo 'class="black"'; ?>>

<div class="topbar">

	<div class="searchbox" style="display: none;">
		<form method="get" id="searchform" action="/">
			<span class="closesearch">Close</span>
			<div class="inputmargin">
				<div class="searchborder"></div>
				<input type="search" name="s" id="s" onfocus="if(this.value == 'Search...') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Search...'; }" value="Search...">
			</div>
		</form>
	</div>

	<div class="headeranchor">
		<div class="header">

			<div class="logo">
				<h1><a href="/">
					<span class="e">E<span>verything</span></span>
					<span class="t">T<span>ype</span></span>
					<span class="c">C<span>ompany</span></span>
				</a></h1>
			</div>

			<?php get_template_part('parts/navigation'); ?>

		</div>
	</div>

</div>

<div class="layout">
	
	<div class="maincolumn">