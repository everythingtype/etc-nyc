<?php

// Includes

require_once( 'functions/projects.php' );


function enqueue_scripts_method() {

	$version = "o";

	// Remove Unnecessary Code
	// http://www.themelab.com/2010/07/11/remove-code-wordpress-header/

	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'start_post_rel_link');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'adjacent_posts_rel_link');

	if(!wp_script_is('jquery')) wp_enqueue_script("jquery");

	$packeryjs = get_template_directory_uri() . '/js/packery.pkgd.min.js';
	wp_register_script('packeryjs',$packeryjs, false, $version);
	wp_enqueue_script( 'packeryjs',array('jquery'));

	$layoutjs = get_template_directory_uri() . '/js/layout.js';
	wp_register_script('layoutjs',$layoutjs, false, $version);
	wp_enqueue_script( 'layoutjs',array('jquery','packeryjs'));

	$themecss = get_stylesheet_directory_uri() . '/style.css';
	wp_register_style('themecss',$themecss, false, $version);
	wp_enqueue_style( 'themecss');

}

add_action('wp_enqueue_scripts', 'enqueue_scripts_method');





if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}

function is_page_or_subpage_of($slug) {

	global $post;

	if ( is_page() || is_search() ) :

		if ( is_page($slug) ) :

			return true;

		else :

			$targetid = get_ID_by_slug($slug);

			$ancestors = get_post_ancestors($post->ID);
			
			if (in_array($targetid, $ancestors)) return true;

		endif;

	endif;

}

function get_ID_by_slug($page_slug) {
	global $wpdb;
	$page_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE ( post_name = '".$page_slug."' or post_title = '".$page_slug."' ) and post_status = 'publish' and post_type='page' ");
	return $page_id;
}


// Is ETC Section

function is_etc_section( $label ) {

	$isWork = false;
	$isNews = false;
	$isAbout = false;
	$isFeatured = false;
	$isEverything = false;
	$isCategories = false;
	$isClients = false;
	$isFonts = false;

	if ( is_page('featured-work') ) $isFeatured = true;
	if ( is_page('everything') ) $isEverything = true;
	if ( is_page('categories') ) $isCategories = true;
	if ( is_page('clients') ) $isClients = true;
	if ( is_page('fonts') ) $isFonts = true;

	if ( $isFeatured == true || $isEverything == true || $isCategories == true || $isClients == true || $isFonts == true ) $isWork = true;

	if ( is_category('news') || in_category('news') ) $isNews = true;
	if ( is_page('profile') || is_page('people') || is_page('credits') ) $isAbout = true;

	// echo "isWork: " . $isWork;
	// echo "isNews: " . $isNews;
	// echo "isAbout: " . $isAbout;
	// echo "isFeatured: " . $isFeatured;
	// echo "isEverything: " . $isEverything;
	// echo "isCategories: " . $isCategories;
	// echo "isClients: " . $isClients;
	// echo "isFonts: " . $isFonts;

	if ( $label == 'work' && $isWork == true ) :
		return true;
	elseif ( $label == 'news' && $isNews == true ) :
		return true;
	elseif ( $label == 'about' && $isAbout == true ) :
		return true;
	elseif ( $label == 'featured' && $isFeatured == true ) :
		return true;
	elseif ( $label == 'everything' && $isEverything == true ) :
		return true;
	elseif ( $label == 'categories' && $isCategories == true ) :
		return true;
	elseif ( $label == 'clients' && $isClients == true ) :
		return true;
	elseif ( $label == 'fonts' && $isFonts == true ) :
		return true;
	endif;

}


?>