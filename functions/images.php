<?php

// Post Thumbnails
add_theme_support( 'post-thumbnails' );


// Image Sizes
add_image_size( 'gridthumb', 540 );
add_image_size( 'padmini', 1024 );
add_image_size( 'phone', 1136 );
add_image_size( 'phoneplus', 1334 );
add_image_size( 'padretina', 2048 );

function spellerberg_get_image($imageid,$fallbacksize = 'full') {

	$gridthumb = wp_get_attachment_image_src( $imageid, 'gridthumb');
	$padmini = wp_get_attachment_image_src( $imageid, 'padmini');
	$phone = wp_get_attachment_image_src( $imageid, 'phone');
	$phoneplus = wp_get_attachment_image_src( $imageid, 'phoneplus');
	$padretina = wp_get_attachment_image_src( $imageid, 'padretina');
	$full = wp_get_attachment_image_src( $imageid, 'full');
	$fallback = wp_get_attachment_image_src( $imageid, $fallbacksize);

	$alt_text = get_post_meta($imageid, '_wp_attachment_image_alt', true);

	if ( !$alt_text || $alt_text == "" ) :
		$attachment = get_post($imageid);
		$alt_text = $attachment->post_title;
	endif;

	$output = '<img srcset="' . $gridthumb[0] . ' ' . $gridthumb[1] . 'w,
				' . $padmini[0] . ' ' . $padmini[1] . 'w,
				' . $phone[0] . ' ' . $phone[1] . 'w,
				' . $phoneplus[0] . ' ' . $phoneplus[1] . 'w,
				' . $padretina[0] . ' ' . $padretina[1] . 'w,
				' . $full[0] . ' ' . $full[1] . 'w" 
		src="' . $fallback[0] . '"
		alt="' . $alt_text . '">';

	return $output;

}


function spellerberg_the_image($imageid,$fallbacksize = 'full') {
	echo spellerberg_get_image($imageid,$fallbacksize);
}

function spellerberg_get_thumbnail($post_id, $fallbacksize = 'full') {
	$imageid = get_post_thumbnail_id( $post_id );
	if ( $imageid ) :
		return spellerberg_get_image($imageid,$fallbacksize);
	endif;
}

function spellerberg_the_thumbnail($post_id, $fallbacksize = 'full') {
	echo spellerberg_get_thumbnail($post_id, $fallbacksize);
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