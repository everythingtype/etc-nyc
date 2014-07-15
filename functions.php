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

// Random Typekit font
function enqueue_type_method() {

	$version = "a";

	$items = array("futura", "nimbus", "adobe", "courier", "bell");
	$lottery = $items[array_rand($items)];

	if ( $lottery == "futura" ) :
		// ETC Futura
		$etctypekitjs = '//use.typekit.net/mca0vgq.js';
		$typecss = get_stylesheet_directory_uri() . '/css/futura.css';
	elseif ( $lottery == "nimbus" ) :
		// ETC Nimbus
		$etctypekitjs = '//use.typekit.net/mzk2gdi.js';
		$typecss = get_stylesheet_directory_uri() . '/css/nimbus.css';
	elseif ( $lottery == "adobe" ) :
		// ETC Adobe
		$etctypekitjs = '//use.typekit.net/ynf7ugg.js';
		$typecss = get_stylesheet_directory_uri() . '/css/adobe.css';
	elseif ( $lottery == "courier" ) :
		// ETC Courier
		$etctypekitjs = '//use.typekit.net/kxa8dle.js';
		$typecss = get_stylesheet_directory_uri() . '/css/courier.css';
	else : 
		// ETC Bell
		$etctypekitjs = '//use.typekit.net/ule7ccp.js';
		$typecss = get_stylesheet_directory_uri() . '/css/bell.css';
	endif;

	wp_register_style('typecss',$typecss, false, $version);
	wp_enqueue_style( 'typecss');

	wp_register_script('etctypekitjs',$etctypekitjs, false, $version);
	wp_enqueue_script( 'etctypekitjs');

}
add_action('wp_enqueue_scripts', 'enqueue_type_method');


function theme_typekit_inline() {
  if ( wp_script_is( 'etctypekitjs', 'done' ) ) echo '<script type="text/javascript">try{Typekit.load();}catch(e){}</script>';
}
add_action( 'wp_head', 'theme_typekit_inline' );


// Featured Images
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}



//http://speakinginbytes.com/2012/11/responsive-images-in-wordpress/
function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'the_content', 'remove_thumbnail_dimensions', 10 );
add_filter( 'category_description', 'remove_thumbnail_dimensions', 10 );



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