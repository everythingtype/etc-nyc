<?php

function enqueue_scripts_method() {

	$version = "b";

	// Remove Unnecessary Code
	// http://www.themelab.com/2010/07/11/remove-code-wordpress-header/

	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'start_post_rel_link');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'adjacent_posts_rel_link');

	// JS

	$packeryjs = get_template_directory_uri() . '/js/packery.pkgd.min.js';
	wp_register_script('packeryjs',$packeryjs, false, $version);

	$layoutjs = get_template_directory_uri() . '/js/layout.js';
	wp_register_script('layoutjs',$layoutjs, false, $version);

	$homepagejs = get_template_directory_uri() . '/js/homepage.js';
	wp_register_script('homepagejs',$homepagejs, false, $version);

	$projectjs = get_template_directory_uri() . '/js/project.js';
	wp_register_script('projectjs',$projectjs, false, $version);

	// CSS

	$fontscss = get_stylesheet_directory_uri() . '/fonts/fonts.css';
	wp_register_style('fontscss',$fontscss, false, $version);

	$themecss = get_stylesheet_directory_uri() . '/style.css';
	wp_register_style('themecss',$themecss, false, $version);

	// Enqueue

	if(!wp_script_is('jquery')) wp_enqueue_script("jquery");

	wp_enqueue_script( 'packeryjs',array('jquery'));
	wp_enqueue_script( 'layoutjs',array('jquery','packeryjs'));

	wp_enqueue_style( 'fontscss');
	wp_enqueue_style( 'themecss');

	if ( is_front_page() ) :
		wp_enqueue_script( 'homepagejs',array('jquery'));
	endif;

	if ( is_singular( 'etc_projects' ) ) :
		wp_enqueue_script( 'projectjs',array('jquery','flexsliderjs'));
	endif;


}

add_action('wp_enqueue_scripts', 'enqueue_scripts_method');

// Random Typekit font
function enqueue_type_method() {

	$version = "a";

	$items = array("futura", "nimbus", "adobe", "standard");
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
	else :
		// ETC Standard
		$etctypekitjs = '//use.typekit.net/swt5hli.js';
		$typecss = get_stylesheet_directory_uri() . '/css/standard.css';
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



// Override Gravity Forms styles
function etc_gravityforms_enqueue(){

	wp_dequeue_style( 'gforms_formsmain_css' );
	wp_dequeue_style( 'gforms_ready_class_css' );

	$csm_readyclass = get_template_directory_uri() . '/css/gforms-readyclass.css';
	wp_register_style('csm_readyclass',$csm_readyclass, false, $version);
	wp_enqueue_style( 'csm_readyclass');
	
	$csm_formsmain = get_template_directory_uri() . '/css/gforms-formsmain.css';
	wp_register_style('csm_formsmain',$csm_formsmain, false, $version);
	wp_enqueue_style( 'csm_formsmain');	

	$gformsjs = get_template_directory_uri() . '/js/gforms.js';
	wp_register_script('gformsjs',$gformsjs, false, $version);
	wp_enqueue_script( 'gformsjs',array('jquery'));

}
add_action("gform_enqueue_scripts_1", "etc_gravityforms_enqueue", 10, 2);


// Override Autocomplete styles
function etc_autocomplete_enqueue(){
	
	wp_dequeue_style( 'SearchAutocomplete-theme' );

}
add_action('wp_print_styles', 'etc_autocomplete_enqueue');

?>