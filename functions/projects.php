<?php


// Post Type

function create_etc_project() {
	register_post_type( 'etc_projects',
		array(
			'labels' => array(
				'name' => 'Projects',
				'singular_name' => 'Project',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Project',
				'edit' => 'Edit',
				'edit_item' => 'Edit Project',
				'new_item' => 'New Project',
				'view' => 'View',
				'view_item' => 'View Project',
				'search_items' => 'Search Projects',
				'not_found' => 'No Projects found',
				'not_found_in_trash' => 'No Projects found in Trash',
				'parent' => 'Parent Project'
			),
			'public' => true,
			'hierarchical' => false,
			'supports' => array( 'title','editor','author','thumbnail','custom-fields','revisions', 'page-attributes'  ),
			'rewrite' => array('slug' => 'project'),
			'has_archive' => true
		)
	);
}

add_action( 'init', 'create_etc_project' );

// Taxonomies

// Dates
function create_etc_project_dates() {

	$labels = array(
		'name'              => _x( 'Project Dates', 'taxonomy general name' ),
		'singular_name'     => _x( 'Project Date', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Project Dates' ),
		'all_items'         => __( 'All Dates' ),
		'parent_item'       => __( 'Parent Date' ),
		'parent_item_colon' => __( 'Parent Date:' ),
		'edit_item'         => __( 'Edit Project Date' ),
		'update_item'       => __( 'Update Project Date' ),
		'add_new_item'      => __( 'Add New Project Date' ),
		'new_item_name'     => __( 'New Date Name' ),
		'menu_name'         => __( 'Dates' ),
	);

	$args = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'dates' ),
	);

	register_taxonomy( 'etc_project_dates', array( 'etc_projects' ), $args );
	
}

add_action( 'init', 'create_etc_project_dates', 0 );

// Typologies
function create_etc_project_typologies() {

	$labels = array(
		'name'              => _x( 'Project Typologies', 'taxonomy general name' ),
		'singular_name'     => _x( 'Project Typology', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Project Typologies' ),
		'all_items'         => __( 'All Typologies' ),
		'parent_item'       => __( 'Parent Typology' ),
		'parent_item_colon' => __( 'Parent Typology:' ),
		'edit_item'         => __( 'Edit Project Typology' ),
		'update_item'       => __( 'Update Project Typology' ),
		'add_new_item'      => __( 'Add New Project Typology' ),
		'new_item_name'     => __( 'New Typology Name' ),
		'menu_name'         => __( 'Typologies' ),
	);

	$args = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'typologies' ),
	);

	register_taxonomy( 'etc_project_typologies', array( 'etc_projects' ), $args );
	
}

add_action( 'init', 'create_etc_project_typologies', 0 );

// Clients
function create_etc_project_clients() {

	$labels = array(
		'name'              => _x( 'Project Clients', 'taxonomy general name' ),
		'singular_name'     => _x( 'Project Client', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Project Clients' ),
		'all_items'         => __( 'All Clients' ),
		'parent_item'       => __( 'Parent Client' ),
		'parent_item_colon' => __( 'Parent Client:' ),
		'edit_item'         => __( 'Edit Project Client' ),
		'update_item'       => __( 'Update Project Client' ),
		'add_new_item'      => __( 'Add New Project Client' ),
		'new_item_name'     => __( 'New Client Name' ),
		'menu_name'         => __( 'Clients' ),
	);

	$args = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'clients' ),
	);

	register_taxonomy( 'etc_project_clients', array( 'etc_projects' ), $args );
	
}

add_action( 'init', 'create_etc_project_clients', 0 );

// Fonts

function create_etc_project_fonts() {

	$labels = array(
		'name'              => _x( 'Project Fonts', 'taxonomy general name' ),
		'singular_name'     => _x( 'Project Font', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Project Fonts' ),
		'all_items'         => __( 'All Fonts' ),
		'parent_item'       => __( 'Parent Font' ),
		'parent_item_colon' => __( 'Parent Font:' ),
		'edit_item'         => __( 'Edit Project Font' ),
		'update_item'       => __( 'Update Project Font' ),
		'add_new_item'      => __( 'Add New Project Font' ),
		'new_item_name'     => __( 'New Font Name' ),
		'menu_name'         => __( 'Fonts' ),
	);

	$args = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'fonts' ),
	);

	register_taxonomy( 'etc_project_fonts', array( 'etc_projects' ), $args );
	
}

add_action( 'init', 'create_etc_project_fonts', 0 );

?>