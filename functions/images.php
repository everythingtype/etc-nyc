<?php

// Post Thumbnails
add_theme_support( 'post-thumbnails' );

// High Quality
add_filter( 'jpeg_quality', create_function( '', 'return 100;' ) );

// Sets of sizes appropriate for srcset
add_image_size( 'gridthumb', 540 );

add_image_size( 'padmini', 1024 );
add_image_size( 'phone', 1136 );
add_image_size( 'phoneplus', 1334 );
add_image_size( 'padretina', 2048 );

function spellerberg_this_sites_sizesets() {

	$sets = Array();

	// WordPress Default Sizes
	$sets[] = Array('thumbnail','medium','large','full');

	// Custom sizes as defined via add_image_size, 
	// grouped into sets appropriate for srcset,
	// ordered from smallest to largest.
	$sets[] = Array('gridthumb');
	$sets[] = Array('padmini','phone','phoneplus','padretina');	

	return $sets;
}

//http://speakinginbytes.com/2012/11/responsive-images-in-wordpress/
function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'the_content', 'remove_thumbnail_dimensions', 10 );
add_filter( 'category_description', 'remove_thumbnail_dimensions', 10 );

?>