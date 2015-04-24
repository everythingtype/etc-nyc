<?php

// Includes
require_once( 'functions/columns.php' );
require_once( 'functions/enqueue.php' );
require_once( 'functions/images.php' );
require_once( 'functions/projects.php' );
require_once( 'functions/spellerberg_wpsrcset.php' );

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
	$isTypologies = false;
	$isClients = false;
	$isFonts = false;

	if ( is_category('news') || in_category('news') ) $isNews = true;
	if ( is_page('profile') || is_page('people') ) $isAbout = true;

	if ( is_tax('etc_project_typologies') ) $isTypologies = true;
	if ( is_tax('etc_project_clients') ) $isClients = true;

	if ( is_front_page() || $isClients == true || $isTypologies == true ) $isWork = true;


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
	elseif ( $label == 'clients' && $isClients == true ) :
		return true;
	elseif ( $label == 'fonts' && $isFonts == true ) :
		return true;
	endif;

}


function etc_singularize($term) {
	
	if ( $term == 'Publications' ) :
		return 'Publication';
	elseif ( $term == 'Case Studies' ) :
		return 'Case Study';
	else :
		return $term;
	endif;
	
}

?>