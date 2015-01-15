<?php

// Frontend
function spellerberg_columnset_shortcode($atts){
	if ( !is_feed() ) :

		extract( shortcode_atts( array(
			'count' => '',
		), $atts ) );

		if  ( $count == "2" ) {
			$markup = '<div class="contentcolumns"><div class="contentcolumn">';
		} else {
			$markup = '</div></div>';
		}

		return $markup; 
	endif;
}
add_shortcode( 'columnset', 'spellerberg_columnset_shortcode' );


function spellerberg_columns_shortcode(){
	if ( !is_feed() ) :
		return '</div><div class="contentcolumn">';
	endif;
}
add_shortcode( 'column', 'spellerberg_columns_shortcode' );



?>